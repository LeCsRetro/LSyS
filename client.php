<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 28/01/2016 18:54
 * LSyS - client.php
 */
include('base.php');

$sessione = new sessione($connect, 2);

$lang['page'] = 'client';
$lang['emu_ip'] = '127.0.0.1';
$lang['emu_port'] = '30000';
$lang['site_url'] = 'http://localhost';
$lang['dcr_variables'] = 'http://localhost/r63/gamedata/external_variables.txt?'.$connect->time();
$lang['dcr_texts'] = 'http://localhost/r63/gamedata/texts1.txt'.$connect->time();
$lang['dcr_productdata'] = 'http://localhost/r63/gamedata/productdata.txt';
$lang['dcr_furnidata'] = 'http://localhost/r63/gamedata/furnidata.txt';
$lang['dcr_hof_furni'] = 'http://localhost/r63/dcr/hof_furni/';
$lang['dcr_base'] = 'http://localhost/r63/gordon/r63/';
$lang['dcr_swf'] = 'http://localhost/r63/gordon/r63/Habbo.swf?'.$connect->time();
$lang['sso'] = $connect->sso();
$connect->exe(array('QUERY' => "UPDATE users SET auth_ticket = :sso, ip_last = :ip, last_online = :last_on WHERE username = :uname", ':sso' => $lang['sso'], ':ip' => $connect->ip_ses, ':last_on' => $connect->time(), ':uname' => $sessione->user['username']));
$lang['user'] = $sessione->user;
$tema = new tema($connect, $lang);
$tema->head_open($lang['client_title']);

$tema->load_page();
$connect->close();



