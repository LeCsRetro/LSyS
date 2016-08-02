<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 26/01/2016 15:49
 * LSyS - esci.php
 */

include('base.php');

$sessione = new sessione($connect, 2);
$lang['user'] = $sessione->user;
$connect->mus("signout", $lang['user']['id']);
$connect->exe(array('QUERY' => "UPDATE users SET online = '0' WHERE username = :username", ':username' => $lang['user']['username']));
session_destroy();
$connect->close();
header("location: index.php");
exit;
