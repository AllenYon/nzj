<?php

/**
 * Created by PhpStorm.
 * User: alin
 * Date: 15-1-7
 * Time: 下午10:45
 */
class UserActivitymodel extends CI_Model
{

    var $id;
    var $user_id;
    var $activity_id;
    var $is_join;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

}