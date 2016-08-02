<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 25/01/2016 22:55
 * LSyS - me.php
 */
include('base.php');
$sessione = new sessione($connect, 2);
$permessi = $connect->exe(array("QUERY" => 'SELECT is_admin FROM permissions_cms WHERE id = :id LIMIT 1', ':id' => $sessione->user['rank']));
$news = new news($connect);

$lang['page'] = 'me';
$lang['is_admin'] = $permessi['is_admin'];
$lang['user'] = $sessione->user;
$lang['elenco_news'] = $news->get_news(3);
$tema = new tema($connect, $lang);
$tema->head_open($lang['me_title']);
$tema->dir_include('js','jquery-2.2.0.min.js');
$tema->dir_include('js','menu.js');
$tema->dir_include('style','globale.php?'.$connect->time());
$tema->head_close();

$tema->load_page();
$connect->close();