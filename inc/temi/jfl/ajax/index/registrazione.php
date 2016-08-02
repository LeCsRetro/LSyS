<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 25/01/2016 21:56
 * LSyS - registrazione.php
 */

include('../../../../../base.php');

if($_SERVER['SERVER_NAME'] != $connect->url){
    echo 'connect_error';
} else {
    $registrazione = new registrazione($connect);
    $registrazione->doRegister($_POST['username'], $_POST['password'], $_POST['mail']);
}