<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 25/01/2016 16:35
 * LSyS - login.php
 */

include('../../../../../base.php');

if($_SERVER['SERVER_NAME'] != $connect->url){
    echo 'connect_error';
} else {
    $login = new login($connect);
    $login->doLogin($_POST['username'], $_POST['password']);
}