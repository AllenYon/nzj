<?php

/**
 * Created by PhpStorm.
 * User: alin
 * Date: 15-1-7
 * Time: 下午10:45
 */
class UserGroupmodel extends CI_Model
{

    var $id;
    var $group_id;
    var $user_id;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

}