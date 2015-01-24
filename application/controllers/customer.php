<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller
{

    public function index()
    {
        echo 'Hello World!';
    }

    public function add()
    {
//        $data = array(
//            'name' => $_GET['name'],
//            'address' => $_GET['address'],
//            'city' => $_GET['city']
//        );
        $this->load->model('Customermodel');
        $this->Customermodel->add(
            $_GET['name'],
            $_GET['address'],
            $_GET['city']);
    }

    public function show()
    {
        $this->load->model('Customermodel');
        $data['query'] = $this->Customermodel->get_last_ten_entries();
        $this->load->view('customer_show', $data);
//        var_dump($data['query']);//['customerid']);
//        var_dump($data['query'][0]->customerid);
    }
}