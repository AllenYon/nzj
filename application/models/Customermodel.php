<?php
/**
 * Created by PhpStorm.
 * User: alin
 * Date: 15-1-4
 * Time: 下午1:24
 */
class Customermodel extends CI_Model{
    var $customerid;
    var $name;
    var $address;
    var $city;

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_last_ten_entries() {
        $this->load->database();
        $query = $this->db->get('customers', 10);
        return $query->result();
    }
    function add($name,$address,$city){
        $this->load->database();
        $this->name=$name;
        $this->address=$address;
        $this->city=$city;
        return $this->db->insert('customers', $this);
//        return $query->result();
    }


}