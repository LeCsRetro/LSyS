<?php
/**
 * Created By LeCs.
 * Date: 12/08/2015 19:53
 * lbase - connection.php
 */

class connection{
    private $type;
    private $host;
    private $name;
    private $pass;
    private $db;

    public function __construct($type, $host, $name, $pass, $db, $jabbo_url){
        date_default_timezone_set('Europe/Rome');

        $this->type = $type;
        $this->host = $host;
        $this->name = $name;
        $this->pass = $pass;
        $this->db = $db;
        $this->richiesta = $_SERVER['SERVER_NAME'];
        $this->ip_ses = $_SERVER['REMOTE_ADDR'];
        $this->jabbo_url = $jabbo_url;


        $data_info = "$type:host=$host;dbname=$db";

        try {
            $this->connessione = new PDO($data_info, $name, $pass);
			$this->connessione->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch (PDOException $e) {
            echo 'Errore nella connessione: ' . $e->getMessage();
            exit;
        }
    }
}