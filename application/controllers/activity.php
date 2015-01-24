<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array(
            'form',
            'url'
        ));
        $this->load->library('session', 'jquery');
        $this->load->database();
    }

    public function index()
    {

    }

    public function detail()
    {
        $activity_id = $_GET['activity_id'];
        $result['data'] = $this->db->get_where('user_activity',
            array('activity_id' => $activity_id)
        );

        $this->db->select('user_activity.id,activity_id,user_id,is_join,username,phone');
        $this->db->from('user_activity');
        $this->db->join('user', 'user_activity.user_id = user.id', 'left');
        $this->db->where('activity_id', $activity_id);
        $result['data'] = $this->db->get();
        $result['activity_id'] = $activity_id;
        $this->load->view('activity_detail', $result);
    }

    public function update()
    {
        $activity_id = $_POST['activity_id'];
        $is_join_user_list = $_POST['is_join'];
        foreach ($is_join_user_list as $item) {
            $data = array(
                'is_join' => 1
            );
            $this->db->update('user_activity', $data, array(
                'user_id' => $item,
                'activity_id' => $activity_id
            ));
        }
        //反查group_id
        $query = $this->db->get_where('activity', array(
            'id' => $activity_id
        ), 1);
        foreach ($query->result() as $item) {
            $group_id = $item->group_id;
        }
        //跳转ugroup_detail
        redirect('/ugroup/detail?group_id=' . $group_id, 'refresh');
    }

    public function finish($activity_id)
    {
        $result['activity_id'] = $activity_id;
        $query = $this->db->get_where('user_activity', array(
            'activity_id' => $activity_id,
            'is_join' => 1
        ));
        $result['num_rows'] = $query->num_rows();
        $this->load->view('activity_finish', $result);
    }

    public function finishConfirm()
    {
        $activity_id = $_POST['activity_id'];
        $amount = $_POST['amount'];

        $data = array(
            'status' => 1,
            'amount' => $amount
        );
        $this->db->where('id', $activity_id);
        $this->db->update('activity', $data);

        //反查group_id
        $query = $this->db->get_where('activity', array(
            'id' => $activity_id
        ), 1);
        foreach ($query->result() as $item) {
            $group_id = $item->group_id;
        }
        //跳转ugroup_detail
//        redirect('/ugroup/detail?group_id=' . $group_id, 'refresh');

        $result=array(
            'code'=>1001,
            'rst'=>array(
                'group_id'=>$group_id
            )
        );
        echo json_encode($result);
    }

}