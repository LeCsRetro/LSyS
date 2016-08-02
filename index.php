<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 24/12/2015 17:46
 * LSyS - index.php
 */

include('base.php');

$sessione = new sessione($connect, 1); //apro la sessione

$lang['page'] = 'index'; //definisco la pagina
$tema = new tema($connect,$lang); //passo i dati al loader
$tema->head_open($lang['index_title']); // carico il tema
$tema->dir_include('js','jquery-2.2.0.min.js');
$tema->dir_include('js','index.js?'.$connect->time());
$tema->dir_include('style','index.php?'.$connect->time());
$tema->head_close();

$tema->load_page();
$connect->close();