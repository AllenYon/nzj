<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller
{

    const TABLE_NAME = "nzj";
    const TABLE_NZJ_RANK = "nzj_rank";


    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array(
            'form',
            'url',
        ));
        $this->load->library('session');
        $this->load->database();

    }

    public function index()
    {
        $session_id = $this->session->userdata('session_id');
        $result = $this->db->get_where('nzj', array('session_id' => $session_id))->result();
        if (empty($result)) {
            $data['is_login'] = false;
            $this->load->view('welcome', $data);
        } else {
            $data['is_login'] = false;
            $session_data = array(
                'id' => $result[0]->id
            );
            $this->session->set_userdata($session_data);
            $this->load->view('welcome', $data);
        }
    }


    /**
     * 暂时不做
     */
    public function anymous()
    {
        //todo fix me
        $top10_user_in_top10_company = array(
            array('company' => '阿里巴巴', 'amount' => 250000),
            array('company' => '腾讯', 'amount' => 250000),
            array('company' => '百度', 'amount' => 250000),
            array('company' => '蘑菇街', 'amount' => 250000),
            array('company' => '小米', 'amount' => 250000),
        );

        //todo fix me
        $posts = $this->db->get('nzj')->result();

        $data = array(
            'anymous' => true,
            'top10_user_in_top10_company' => $top10_user_in_top10_company,
            'posts' => $posts,
        );
        $this->load->view('detail', $data);
    }


    public function pre_post()
    {
        $data['rand_name'] = self::randName();
        $this->load->view('index', $data);
    }


    public function post()
    {
        $user_data = array(
            'session_id' => $this->session->userdata('session_id'),
            'company' => $_POST['company'],
            'amount' => $_POST['amount'],
            'rand_name' => $_POST['rand_name'],
            'content' => $_POST['content'],
            'create_time' => time(),
            'update_time' => time(),
        );
        if ($user_data['amount'] > 99999999999) {
            return;
        }

        $this->db->insert(self::TABLE_NAME, $user_data);
        $user_data['id'] = $this->db->insert_id(); //存储user_id
        $this->session->set_userdata($user_data);

        //用户在全国排名
        $urank_in_all = $this->get_urank_in_all($user_data);
        // 自己在公司排名
        $urank_in_company = $this->get_urank_in_company($user_data);
        // 公司前10
        $top10_user_in_company = $this->get_top10_user_in_company($user_data);

        $posts = $this->get_posts();

        $data = array(
            'anymous' => false,
            'urank_in_all' => $urank_in_all, // 用户在全国排名 百分比
            'urank_in_company' => $urank_in_company, //用户在公司排名 百分比
            'top10_user_in_company' => $top10_user_in_company,
            'posts' => $posts,
        );

        $this->load->view('detail', $data);
    }

    public function detail()
    {
        $id = $this->session->userdata("id");
        if (empty($id)) {
            log_message('debug', "id is empty");
            return;
        }
        $user_data = $this->db->get_where(self::TABLE_NAME, array('id' => $id))->result()[0];
        //用户在全国排名
        $urank_in_all = $this->get_urank_in_all($user_data);
        // 自己在公司排名
        $urank_in_company = $this->get_urank_in_company($user_data);
        // 公司前10
        $top10_user_in_company = $this->get_top10_user_in_company($user_data);
        $posts = $this->get_posts();
        $data = array(
            'anymous' => false,
            'urank_in_all' => $urank_in_all, // 用户在全国排名 百分比
            'urank_in_company' => $urank_in_company, //用户在公司排名 百分比
            'top10_user_in_company' => $top10_user_in_company,
            'posts' => $posts,
        );

        $this->load->view('detail', $data);
    }

    public function feedback()
    {
        $this->load->view('feedback');
    }

    public function check1()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = "mogujie_wsylg513";
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);


        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }

    public function sessiontest()
    {
        $session_id = $this->session->userdata('session_id');
        echo $session_id;
        exit;
    }


    private function randName()
    {
        $random_names = array();
        $handle = @fopen("./res/dic.txt", "r");
        if ($handle) {
            while (!feof($handle)) {
                $buffer = fgets($handle, 4096);
                $names = explode(" ", $buffer);
                foreach ($names as $name) {
                    array_push($random_names, $name);
                }
            }
            fclose($handle);
        }
        shuffle($random_names);
        return $random_names[0] . $random_names[1];
    }

    /**
     * @param $user_data
     * @return float|string
     */
    public function get_urank_in_company($user_data)
    {
        $sql = "select count(amount) as cont from nzj where amount <= ? and company = ?";
        $result = $this->db->query($sql, array($user_data['amount'], $user_data['company']))->result()[0];
        $count_min = $result->cont;
        $sql = "select count(*) as cont from nzj where company = ?";
        $result = $this->db->query($sql, array($user_data['company']))->result()[0];
        $count_max = $result->cont;
        if ($count_max == 0) {
            return "100.0";
        }
        $rank = number_format($count_min * 100 / $count_max, 1);
        return $rank;
    }

    /**
     * 自己在公司的排名
     * @param $user_data
     * @return mixed
     */
    public function get_top10_user_in_company($user_data)
    {
        $this->db->select('*');
        $this->db->from(self::TABLE_NAME);
        $this->db->where('company', $user_data['company']);
        $this->db->order_by('amount', 'desc');
        $this->db->limit(10);
        $result = $this->db->get()->result();
        return $result;
    }

    /**
     * @param $user_data
     * @return float
     */
    public function get_urank_in_all($user_data)
    {
        $sql = "select count(amount) as cont from nzj where amount < ?";
        $result = $this->db->query($sql, array($user_data['amount']))->result()[0];
        $count_min = $result->cont;
        $sql = "select count(*) as cont from nzj";
        $result = $this->db->query($sql)->result()[0];
        $count_max = $result->cont;
        $rank = number_format($count_min * 100 / $count_max, 1);
        return $rank;
    }

    public function like() {
        $result = array(
            'code' => 1001
        );
        echo json_encode($result);
        exit;
    }

    /**
     * @return mixed
     */
    public function get_posts()
    {
        $sql = "select * from nzj where  content <> '' order by  create_time desc limit 10;";
        $posts = $this->db->query($sql)->result();
        return $posts;
    }

}