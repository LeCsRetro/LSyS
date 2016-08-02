<?php
/**
 * Created By LeCs.
 * Date: 12/08/2015 19:47
 * lbase - base.php
 */

@require_once('config.php');

function __autoload($class){
    require_once "inc/classi/".strtolower($class).".php";
}

$connect = new sessione($data_type, $data_host, $data_name, $data_password, $data_db, $jabbo_url);