<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 28/01/2016 22:31
 * LSyS - impostazioni.php
 */
include('base.php');

$sessione = new sessione($connect,2);
$permessi = $connect->exe(array("QUERY" => 'SELECT is_admin FROM permissions_cms WHERE id = :id LIMIT 1', ':id' => $sessione->user['rank']));

$lang['page'] = 'impostazioni';
$lang['is_admin'] = $permessi['is_admin'];
$lang['user'] = $sessione->user;
$tema = new tema($connect, $lang);
$tema->head_open($lang['settings_title']);
$tema->dir_include('js','jquery-2.2.0.min.js');
$tema->dir_include('js','impostazioni.js');
$tema->dir_include('js','menu.js');
$tema->dir_include('style','globale.php?'.$connect->time());
$tema->head_close();

$tema->load_page();
$connect->close();