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
    public function index(){
        $this->load->view('welcome');
    }


    public function pre_post()
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
        $top10_user_in_company = array(
            array('rand_name'=>'小飞哥','amount'=>250000),
            array('rand_name'=>'司马丽','amount'=>250000),
            array('rand_name'=>'小龙女','amount'=>250000),
            array('rand_name'=>'哗啦啦','amount'=>250000),
        );

        //todo fix me
        $top10_company_in_all = array(
            array('company'=>'阿里巴巴','amount'=>250000),
            array('company'=>'腾讯','amount'=>250000),
            array('company'=>'百度','amount'=>250000),
            array('company'=>'蘑菇街','amount'=>250000),
            array('company'=>'小米','amount'=>250000),
            array('company'=>'司马丽','amount'=>250000),
            array('company'=>'小龙女','amount'=>250000),
            array('company'=>'哗啦啦','amount'=>250000),

        );

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

    public  function check1()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = "mogujie_wsylg513";
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );


        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }

    public function sessiontest(){
        $session_id = $this->session->userdata('session_id');
        echo $session_id;
        exit;
    }

}