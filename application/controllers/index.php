<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array(
            'form',
            'url'
        ));
        $this->load->library('session');
        $this->load->database();
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        if (!empty($user_id)) {
//            redirect('/detail?user_id=' . $user_id, 'refresh');
//            $this->post();
            return;
        }
        $data['rand_name'] = "BB姐";
        $this->load->view('index', $data);
    }


    public function post()
    {

        $user_data = array(
            'company' => $_POST['company'],
            'amount' => $_POST['amount'],
            'rand_name' => $_POST['rand_name'],
            'content' => $_POST['company'].' '.$_POST['amount'].' '.$_POST['content'],
        );


        $this->db->insert('nzj', $user_data);
        $user_data['id'] = $this->db->insert_id(); //存储user_id

        log_message('debug', $user_data);
        $this->session->set_userdata($user_data);

        // 自己在公司的排名
        $rank_in_company = $this->db->get_where('nzj', array('company' => $user_data['company']))->result();

        $rank_in_all=array(

        );

        $posts = $this->db->get('nzj')->result();

        $data = array(
            'rank' => 100,
            'rank_percent' => 0.12,
            'rank_percent_in_company' => 0.40,
            'rank_in_company' => $rank_in_company,
            'rank_in_all' => $rank_in_all,
            'posts' => $posts,
        );

//        var_dump($data);

        $this->load->view('detail', $data);

    }

}