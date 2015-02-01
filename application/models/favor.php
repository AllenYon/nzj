<?php
/**
 * Created by PhpStorm.
 * User: dingping
 * Date: 15-1-31
 * Time: 下午5:49
 */
class Favor extends General{
    private static $ins = null;

    const LIKE = 1;

    const UNLIKE = 0;

    public static function getInstance(){
        if(self::$ins == null){
            self::$ins = new self();
        }
        return self::$ins;
    }

    public function getTableName(){
        return DBConstants::$TABLE_NAME_FAVOR;
    }

    public function getMetaData(){
        return DBConstants::$TABLE_META_FAVOR;
    }

    /**
     * 点赞
     * @param $userId
     * @param $bonusId
     * @return array|bool
     */
    public function like($userId,$bonusId){
        if(empty($userId) || empty($bonusId)){
            return false;
        }else{
            if(!$this->isExist($userId,$bonusId,self::LIKE)){
                $lastId = $this->insert(array(
                    'userId' => $userId,
                    'bonusId' => $bonusId,
                    'type' => self::LIKE,
                    'created' => time(),
                    'updated' => time()
                ));
                return array(
                    'id' => $lastId,
                    'userId' => $userId,
                    'bonusId' => $bonusId,
                    'type' => self::LIKE,
                    'created' => time(),
                    'updated' => time(),
                );
            }
            return false;
        }
    }

    /**
     * 踩
     * @param $userId
     * @param $bonusId
     * @return array|bool
     */
    public function unLike($userId,$bonusId){
        if(empty($userId) || empty($bonusId)){
            return false;
        }else{
            if(!$this->isExist($userId,$bonusId,self::UNLIKE)){
                $lastId = $this->insert(array(
                    'userId' => $userId,
                    'bonusId' => $bonusId,
                    'type' => self::UNLIKE,
                    'created' => time(),
                    'updated' => time()
                ));
                return array(
                    'id' => $lastId,
                    'userId' => $userId,
                    'bonusId' => $bonusId,
                    'type' => self::UNLIKE,
                    'created' => time(),
                    'updated' => time(),
                );
            }
            return false;
        }
    }

    /**
     * 判断该用户对该条比一比是否已经评论过
     * @param $userId
     * @param $bonusId
     * @param $type
     * @return bool
     */
    public function isExist($userId,$bonusId,$type){
        if(empty($userId)||empty($bonusId)||!isset($type)){
            return false;
        }else{
            $ret = $this->select('*',array(
                'userId' => $userId,
                'bonusId' => $bonusId,
                'type' => $type,
            ));
            return !empty($ret);
        }
    }

}