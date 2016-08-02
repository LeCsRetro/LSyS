<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 21/02/2016 16:02
 * LSyS - news.php
 */

include('base.php');

$sessione = new sessione($connect, 2);
$permessi = $connect->exe(array("QUERY" => 'SELECT is_admin FROM permissions_cms WHERE id = :id LIMIT 1', ':id' => $sessione->user['rank']));
$news = new news($connect);

if(isset($_GET['id'])){
   $news_id = $news->return_id($_GET['id']);
} else {
    $news_id = $news->return_id(0);
}

$lang['elenco_news'] = $news->get_news();
$lang['news_newstitle'] = $news->get_title($news_id);
$lang['news_authorndate'] = $news->get_newsinfo($news_id);
$lang['news_newstext'] = $news->build_text($news_id);
$lang['page'] = 'news';
$lang['is_admin'] = $permessi['is_admin'];
$lang['user'] = $sessione->user;
$tema = new tema($connect, $lang);
$tema->head_open($lang['news_title']);
$tema->dir_include('js','jquery-2.2.0.min.js');
$tema->dir_include('js','menu.js');
$tema->dir_include('style','globale.php?'.$connect->time());
$tema->head_close();

$tema->load_page();
$connect->close();