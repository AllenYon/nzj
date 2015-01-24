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

    public function anymous()
    {

        //todo fix me
        $top10_user_in_top10_company = array();

        //todo fix me
        $posts = $this->db->get('nzj')->result();

        $data = array(
            'anymous' => true,
            'top10_user_in_top10_company' => $top10_user_in_top10_company,
            'posts' => $posts,
        );
        $this->load->view('detail', $data);
    }


    public function post()
    {

        $user_data = array(
            'company' => $_POST['company'],
            'amount' => $_POST['amount'],
            'rand_name' => $_POST['rand_name'],
            'content' => $_POST['company'] . ' ' . $_POST['amount'] . ' ' . $_POST['content'],
        );


        $this->db->insert('nzj', $user_data);
        $user_data['id'] = $this->db->insert_id(); //存储user_id

        log_message('debug', $user_data);
        $this->session->set_userdata($user_data);

        // 自己在公司的排名
        //todo fix me
        $top10_user_in_company = $this->db->get_where('nzj', array('company' => $user_data['company']))->result();

        //todo fix me
        $top10_company_in_all = array();

        //todo fix me
        $posts = $this->db->get('nzj')->result();

        $data = array(
            'anymous' => false,
            'urank_in_all' => '80%',// 用户在全国排名 百分比
            'urank_in_company' => '12%',//用户在公司排名 百分比
            'top10_user_in_company' => $top10_user_in_company,
            'crank_in_all' => '49%', //公司在全国排名 百分比
            'top10_company_in_all' => $top10_company_in_all,
            'posts' => $posts,
        );

        $this->load->view('detail', $data);

    }

}