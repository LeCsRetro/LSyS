<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 21/02/2016 16:02
 * LSyS - staff.php
 */

include('base.php');

$sessione = new sessione($connect, 2);
$permessi = $connect->exe(array("QUERY" => 'SELECT is_admin FROM permissions_cms WHERE id = :id LIMIT 1', ':id' => $sessione->user['rank']));
$staff = new staff($connect);

$lang['page'] = 'staff';
$lang['is_admin'] = $permessi['is_admin'];
$lang['user'] = $sessione->user;
$lang['staff_9'] = $staff->getrank(9);
$lang['staff_8'] = $staff->getrank(8);
$lang['staff_7'] = $staff->getrank(7);
$tema = new tema($connect, $lang);
$tema->head_open($lang['staff_title']);
$tema->dir_include('js','jquery-2.2.0.min.js');
$tema->dir_include('js','menu.js');
$tema->dir_include('style','globale.php?'.$connect->time());
$tema->head_close();

$tema->load_page();
$connect->close();