<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 26/12/2015 12:41
 * LSyS - config.php
 */

class config{

    # DB Connection #
    const db_type = 'mysql';
    const db_host = 'localhost';
    const db_port = '3306';
    const db_username = 'root';
    const db_password = 'pass';

    # DB Selection #
    const db_name = 'db';

    # MUS Configuration #
    const mus_ip = '127.0.0.1';
    const mus_port = '30001';

    # SITE Configuration #
    public $timezone = 'Europe/Rome';
    public $lang = 'IT';
    public $sitename = 'JaBBoFL';
    public $tema = 'jfl';
    public $url = 'localhost';
    public $radiourl = 'plugins/radio/jabboplayer.php';

    # ERROR Configuration #
    const php_errors = 1;
    const mysql_errors = 1;
    const mysql_errors_logs = 1;
    const mysql_query_logs = 1;
    const mus_logs = 1;

    public function __construct(){
        ini_set('display_errors', self::php_errors);
        error_reporting(self::php_errors);
    }
}