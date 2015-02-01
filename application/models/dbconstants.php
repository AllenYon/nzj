<?php
/**
 * Created by PhpStorm.
 * User: dingping
 * Date: 15-1-30
 * Time: 下午5:25
 */
class DBConstants{
    /**
     * User表
     */
    public static $TABLE_NAME_USER = 'User';

    /**
     * User DataMeta
     */
    public static $TABLE_META_USER = array(
        'id' => 'int',
        'name' => 'varchar',
        'pwd' => 'varchar',
        'phone' => 'varchar',
        'mail' => 'varchar',
        'thirdType' => 'smallint',
        'openId' => 'varchar',
        'valid' => 'smallint',
        'gender' => 'smallint',
        'company' => 'varchar',
        'created' => 'int',
        'updated' => 'int',
    );

    /**
     * Bonus年终奖吐槽表
     * @var string
     */
    public static $TABLE_NAME_BONUS = 'Bonus';

    /**
     * Bonus的数据内容
     * @var array
     */
    public static $TABLE_META_BONUS = array();

    /**
     * Favor 赞和踩
     * @var string
     */
    public static $TABLE_NAME_FAVOR = 'Favor';

    /**
     * Favor meta
     * @var array
     */
    public static $TABLE_META_FAVOR = array();
}