<?php

/**
 * Created by PhpStorm.
 * User: alin
 * Date: 15-1-7
 * Time: 下午10:45
 */
class UGroupmodel extends CI_Model
{

    var $id;
    var $owner_user_id;
    var $create_time;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function getAllUGroup()
    {
        $query = $this->db->get('ugroup');
        return $query->result();
    }

    /**
     * 创建一个新的小饭桌组织
     */
    public function create($uid){
        $data= array(
            'owner_user_id' => $uid,
            'create_time' => time(),
        );
        $result=$this->db->insert('ugroup',$data);
    }

}