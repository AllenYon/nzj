<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Detail extends CI_Controller
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
//        $_GET['user_id']

//        $this->load->view('index', $data);
    }



}