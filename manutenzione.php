<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 07/07/2016 00:01
 * LSyS - manutenzione.php
 */

include('base.php');
$manutenzione = $connect->exe(array('QUERY' => "SELECT * FROM cms_settings WHERE variable = 'site_closed'"));
if($manutenzione['value'] == 0){
    header("location:index.php");
    exit;
} else {
    $lang['page'] = 'manutenzione'; //definisco la pagina
    $tema = new tema($connect,$lang); //passo i dati al loader
    $tema->head_open($lang['maintenance_title']); // carico il tema
    $tema->dir_include('js','jquery-2.2.0.min.js');
    $tema->dir_include('js','jcarousellite1.0.1_min.js');
    $tema->dir_include('js','jquery.countdown.js');
    $tema->dir_include('style','manutenzione.css?'.$connect->time());
    $tema->head_close();

    $tema->load_page();
}
$connect->close();
?>