<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 21/02/2016 14:25
 * LSyS - password.php
 */

include('../../../../../base.php');

if($_SERVER['SERVER_NAME'] != $connect->url){
    echo 'connect_error:-:'.$lang['connect_error'];
} else {
    $sessione = new sessione($connect, 2);
    $impostazioni = new impostazioni($connect, $sessione, $lang);
    $impostazioni->changePass($_POST['oldpassword'], $_POST['password'], $_POST['password1']);
}