<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 24/12/2015 17:36
 * LSyS - base.php
 */

function __autoload($class){
    require_once "inc/classi/".strtolower($class).".php";
}

$config = new config();
$connect = new connection($config);

$theme_dir = $config->tema;
$lang_dir = $config->lang;
include("inc/temi/{$theme_dir}/lang/{$lang_dir}.php");
