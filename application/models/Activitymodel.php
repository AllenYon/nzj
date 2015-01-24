<?php

/**
 * Created by PhpStorm.
 * User: alin
 * Date: 15-1-7
 * Time: 下午10:45
 */
class Activitymodel extends CI_Model
{

    var $id;
    var $group_id;
    var $status;
    var $amount;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

}