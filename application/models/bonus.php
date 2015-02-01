<?php
/**
 * Created by PhpStorm.
 * User: dingping
 * Date: 15-1-31
 * Time: 下午5:05
 */
class Bonus extends General{
    private static $ins = null;

    public static function getInstance(){
        if(self::$ins == null){
            self::$ins = new self();
        }
        return self::$ins;
    }

    public function getTableName(){
        return DBConstants::$TABLE_NAME_BONUS;
    }

    public function getMetaData(){
        return DBConstants::$TABLE_META_BONUS;
    }

    /**
     * 新增一条比一比
     * @param $userId
     * @param $nickCompany
     * @param $bonus
     * @param $comment
     * @return array|bool
     */
    public function newBonus($userId,$nickCompany,$bonus,$comment){
        if(empty($userId) || empty($nickCompany) || empty($bonus) ){
            return false;
        }else{
            $bonus = self::bonusStandardize($bonus);
            $company = self::companyStandardize($nickCompany);
            $lastId = $this->insert(array(
                'userId' => $userId,
                'nickCompany' => $nickCompany,
                'company' => $company,
                'bonus' => $bonus,
                'comment' => $comment,
                'created' => time(),
                'updated' => time()
            ));
            if(empty($lastId)){
                return false;
            }else{
                return array(
                    'id' => $lastId,
                    'userId' => $userId,
                    'nickCompany' => $nickCompany,
                    'company' => $company,
                    'bonus' => $bonus,
                    'comment' => $comment,
                    'created' => time(),
                    'updated' => time(),
                );
            }
        }
    }

    /**
     * 赞
     * @param $userId
     * @param $bonusId
     * @return bool|int
     */
    public function like($userId,$bonusId){
        if(empty($userId) || empty($bonusId)){
            return false;
        }else{
            $ret = Favor::getInstance()->like($userId,$bonusId);
            if(!empty($ret)){
                $this->db->set('like',"`like`+1",false);
                $this->db->set('updated',time());
                $this->db->where('userId',$userId);
                $this->db->where('id',$bonusId);
                $cnt = $this->db->update($this->getTableName());
                return $cnt;
            }else{
                return 0;
            }
        }
    }

    /**
     * 踩
     * @param $userId
     * @param $bonusId
     * @return bool|int
     */
    public function unlike($userId,$bonusId){
        if(empty($userId) || empty($bonusId)){
            return false;
        }else{
            $ret = Favor::getInstance()->unLike($userId,$bonusId);
            if(!empty($ret)){
                $this->db->set('unlike',"`unlike`+1",false);
                $this->db->set('updated',time());
                $this->db->where('userId',$userId);
                $this->db->where('id',$bonusId);
                $cnt = $this->db->update($this->getTableName());
                return $cnt;
            }else{
                return 0;
            }
        }
    }


    /**
     * 标准化
     * @param $bonus
     * @return int
     */
    public static function bonusStandardize($bonus){
        $bonus = trim($bonus);
        if(strstr($bonus,"k")){
            $bonus = (str_replace("k",'',$bonus)*1000);
        }
        if(strstr($bonus,"K")){
            $bonus = (str_replace("K",'',$bonus)*1000);
        }
        $bonus *= 100;
        return $bonus;
    }


    public static function companyStandardize($company){
        return 'unknown';
    }
}