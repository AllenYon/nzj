<?php
/**
 * Created by PhpStorm.
 * User: dingping
 * Date: 15-1-30
 * Time: 下午4:30
 */
class User extends  General{
    private static $ins = null;

    public static function getInstance(){
        if(self::$ins == null){
            self::$ins = new self();
        }
        return self::$ins;
    }

    public function getTableName(){
        return DBConstants::$TABLE_NAME_USER;
    }

    public function getMetaData(){
        return DBConstants::$TABLE_META_USER;
    }

    /**
     * 根据微信的openId生成一个用户
     * @param $openId
     * @param $name
     * @return array|bool
     */
    public function createUser($openId,$name){
        if(empty($openId) || empty($name)){
            return false;
        }else{
            $userId = $this->insert(array(
                'openId' => $openId,
                'name' => $name,
                'created' => time(),
                'updated' => time(),
            ));
            if(empty($userId)){
                return false;
            }else{
                return array(
                    'id' => $userId,
                    'openId' => $openId,
                    'name' => $name,
                    'created' =>time(),
                    'updated' => time(),
                );
            }
        }
    }

    /**
     * 根据wx openId获取用户信息
     */
    public function getByWxOpenId($openId){
        if(empty($openId)){
            return false;
        }
        $ret = $this->select('*',array(
            'openId' => $openId
        ),0,1);
        return $ret;
    }

    /**
     * 根据name获取用户信息
     * @param $name
     * @return bool
     */
    public function getByName($name){
        if(empty($name)){
            return false;
        }else{
            $ret = $this->select('*', array(
                'name' => $name
            ),0,1);
            return $ret;
        }
    }
}

