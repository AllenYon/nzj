<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends CI_Controller
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
        $this->load->view('feedback');
    }
    public function feedback(){

    }



}