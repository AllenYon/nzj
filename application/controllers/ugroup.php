<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ugroup extends CI_Controller
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
        $this->load->model('UGroupmodel');
        $data['result'] = $this->UGroupmodel->getAllUGroup();
        $this->load->view('ugroup', $data);
    }

    public function create()
    {
        $user_id = $this->session->userdata('user_id');
        if (empty($user_id)) {
            echo('user id is empty');
            return;
        }
        $this->load->model('UGroupmodel');
        //创建新饭桌成功
        $this->UGroupmodel->create($user_id);
        redirect('/ugroup', 'refresh');
    }

    /**
     * 显示小饭桌 的所有参与者和
     * 所有活动
     */
    public function detail()
    {
        $group_id = $_GET['group_id'];
        //select group_id, user_id,username from user_group
        // left join user on user_group.user_id = user.id where group_id = '1'
        $this->db->select('group_id,user_id,username,phone');
        $this->db->from('user_group');
        $this->db->join('user', 'user_group.user_id = user.id', 'left');
        $this->db->where('group_id', $group_id);
        $user_group = $this->db->get();
        $data['user_group'] = $user_group->result();
        $activity = $this->db->get_where('activity',
            array('group_id' => $group_id)
        );
        $data['activity'] = $activity->result();
        $data['group_id'] =$group_id;
        $this->load->view('ugroup_detail', $data);
    }

    /**
     * 加入一个小饭桌
     *  废弃
     */
    public function add()
    {
        $user_id = $this->session->userdata('user_id');
        $this->db->insert();
    }


    public function addUser()
    {
        $group_id = $_POST['group_id'];
        //todo 验证数据
        $new_user = array(
            'username' => $_POST['username'],
            'phone' => $_POST['phone'],
            'password' => md5($_POST['phone']), // 实际为随机一个密码
        );

        $this->db->insert('user', $new_user);
        $new_user['user_id'] = $this->db->insert_id(); //存储user_id

        $add_to_group = array(
            'group_id' => $group_id,
            'user_id' => $new_user['user_id'],
        );
        //新注册的团员 加入到该组中。
        $this->db->insert('user_group', $add_to_group);
        redirect('/ugroup/detail?group_id=' . $group_id, 'refresh');
    }

    /**
     * 由团长创建一次活动 邀请
     *
     */
    public function createActivity(){
        $group_id=$_POST['group_id'];
        $data=array(
            'group_id'=>$group_id,
            'status' => 0,// 0: 发起活动 1：结束活动
            'create_time' => time()
        );
        $this->db->insert('activity',$data);
        $activity_id= $this->db->insert_id(); //存储user_id


        //查询所有 加入该group的用户
        $query=$this->db->get_where('user_group',
            array('group_id'=>$group_id));


        //插入到user_acitivty 表
        foreach ($query->result() as $row) {
            $insert_data=array(
                'user_id' => $row->user_id,
                'activity_id' => $activity_id,
                'is_join' => 0,
            );
            $this->db->insert('user_activity',$insert_data);
        }
        //插完

        //跳转activity_detail
        redirect('/activity/detail?activity_id='.$activity_id,'refresh');
    }



}