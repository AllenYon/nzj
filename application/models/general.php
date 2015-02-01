<?php
/**
 * Created by PhpStorm.
 * User: dingping
 * Date: 15-1-30
 * Time: 下午4:46
 */
class General extends CI_Model{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * 获取表名
     * @return mixed
     */
    public function getTableName(){
        return "plz implement first";
    }

    /**
     * 获取数据库的datameta
     * @return mixed
     */
    public function getMetaData(){
        return "plz implement first";
    }

    /**
     * 插入db数据
     * @param $array
     * @return mixed
     * @throws exception
     */
    public function insert($array){
        $this->db->insert($this->getTableName(),$array);
        $lastId = $this->db->insert_id();
        if(empty($lastId)){
            throw new exception("insert error, param:". var_dump($array));
        }
        return $lastId;
    }

    /**
     * 更新数据库操作
     * @param $whereCondition
     * @param $array
     * @return int
     */
    public function update($whereCondition,$updateArray,$offset=0,$limit=0){
        if(count($updateArray) || empty($updateArray)){
            return 0;
        }else{
            if(isset($whereCondition)){
                foreach($whereCondition as $key => $value){
                    $this->db->where($key, $value);
                }
            }
            if(isset($updateArray)){
                foreach($updateArray as $key => $value){
                    $this->db->set($key, $value);
                }
            }
            $cnt = $this->db->update($this->getTableName());
            return $cnt;
        }
    }

    /**
     * select方法
     * @param $columns
     * @param $whereCondition
     * @param $offset
     * @param $limit
     * @return mixed
     */
    public function select($columns,$whereCondition,$offset=0,$limit=999){
        $this->db->select($columns);
        $this->db->from($this->getTableName());
        if(isset($whereCondition)){
            foreach($whereCondition as $key => $value){
                $this->db->where($key, $value);
            }
        }
        $this->db->limit($limit,$offset);
        $ret = $this->db->get()->result();
        return $ret;
    }

}