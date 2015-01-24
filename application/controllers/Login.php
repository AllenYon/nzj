<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
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
        $this->load->view('login');
    }

    public function formsubmit()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            if (isset ($_POST ['submit']) && !empty ($_POST ['submit'])) {
                $data = array(
                    'username' => $_POST ['phone'],
                    'phone' => $_POST ['phone'],
                    'password' => md5($_POST ['password'])
                );
                $newdata = array(
                    'username' => $data['username'],
                    'phone' => $data ['phone'],
//                    'userip'     => $_SERVER['REMOTE_ADDR'],
//                    'luptime'   =>time()
                );
                if ($_POST ['submit'] == 'login') {
                    $query = $this->db->get_where('user', array(
                        'phone' => $data ['phone']
                    ), 1, 0);

                    foreach ($query->result() as $row) {
                        $pass = $row->password;
                        $user_id = $row->id;
                    }
                    if ($pass == $data ['password']) {
                        $newdata['user_id'] = $user_id;
                        $this->session->set_userdata($newdata);
                        redirect('/ugroup', 'refresh');
                    } else {
                        $this->load->view('login_error');
                    }
                } else if ($_POST ['submit'] == 'register') {
                    $this->db->insert('user', $data);
                    $newdata['user_id'] = $this->db->insert_id(); //存储user_id
                    $this->session->set_userdata($newdata);
                    redirect('/ugroup', 'refresh');
                } else {
                    $this->session->sess_destroy();
                    $this->load->view('login');
                }
            }
        }
    }


    private  function login(){

    }

}