<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 24/12/2015 17:18
 * LSyS - connection.php
 */

class connection{
    protected $connessione;
    private $config;
    private $mysql_errors_logs;
    private $mysql_query_logs;
    private $mus_logs;

    public function __construct($config){
        $this->config = $config;
        $this->mysql_errors_logs = $_SERVER['DOCUMENT_ROOT'].'\logs\mysql_errors.log';
        $this->mysql_query_logs = $_SERVER['DOCUMENT_ROOT'].'\logs\mysql_query_logs.log';
        $this->mus_logs = $_SERVER['DOCUMENT_ROOT'].'\logs\mus_logs.log';
        $this->url = $config->url;
        $this->radiourl = $config->radiourl;

        # Theme Loader Configuration #
        $this->sitename = $config->sitename;
        $this->tema = $config->tema;

        # Request Configuration #
        $this->richiesta = $_SERVER['SERVER_NAME'];
        if(isset($_SERVER['HTTP_CF_CONNECTING_IP'])){
            $this->ip_ses = $_SERVER['HTTP_CF_CONNECTING_IP'];
        } else {
            $this->ip_ses = $_SERVER['REMOTE_ADDR'];
        }

        # DB Connection #
        $pdo_options = array(
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

        $data_info = config::db_type.":host=".config::db_host.";port=".config::db_port.";dbname=".config::db_name;
        try {
            $this->connessione = new PDO($data_info, config::db_username, config::db_password,$pdo_options);
        } catch (PDOException $e) {
            echo 'Errore nella connessione: ' . $e->getMessage();
            exit;
        }
    }

    # GENERAL Functions #

    public function data($time){
        date_default_timezone_set($this->config->timezone);
        return date('d/m/Y H:i:s',$time);
    }

    public function time(){
        date_default_timezone_set($this->config->timezone);
        return time();
    }

    public function exe($query, $fetch_type = 'fetch', $get_num = FALSE){
        try{

            $sql = $this->connessione->prepare($query['QUERY']);
            foreach($query as $key => &$value){
               if($key != 'QUERY'){
                   $value = $this->Filter($value);
                   $sql->bindParam($key, $value);
               }
            }
            $sql->execute();
            $querylog = json_encode($query);
            $this->mysql_query_log($querylog);

            if($fetch_type == 'all'){
                $row = $sql->FetchAll(PDO::FETCH_ASSOC);
            } elseif($fetch_type == 'fetch'){
                $row = $sql->Fetch(PDO::FETCH_ASSOC);
            } else {
                $row = null;
            }

            if($get_num === TRUE){
                if(!is_array($row)){
                    $row = array();
                }
                $num = array('NUM' => $sql->rowCount());
                $row = array_merge($row, $num);
            }


        } catch (PDOException $e){
            $this->mysql_error_log($e->getMessage(), json_encode($query));
            $row = array('errore' => $e->GetMessage());
        }

        return $row;
    }

    private function mysql_error_log($error, $query){

        if (config::mysql_errors == 1) {
            echo 'Errore nella esequzione della query: ' . $error;
        }

        if (config::mysql_errors_logs == 1) {
            $var = fopen($this->mysql_errors_logs, "a");
            fwrite($var, $this->data($this->time()) . ': Errore: ' . $error . ' Query: ' . $query . "\r\n\r\n");
            fclose($var);
        }

    }

    private function mysql_query_log($query){
        if (config::mysql_query_logs == 1){
            $var = fopen($this->mysql_query_logs, "a");
            fwrite($var, $this->data($this->time()) . '- QUERY: ' . $query . "\r\n\r\n");
            fclose($var);
        }
    }

    private function mus_log($header, $data){
        if(config::mus_logs == 1){
            $var = fopen($this->mus_logs, "a");
            fwrite($var, $this->data($this->time()) . ' - COMANDO: '.$header. ' ' .$data. "\r\n\r\n");
            fclose($var);
        }
    }

    # FILTER Functions #

    public function Filter($str){
        $str = str_ireplace("SELECT", "", ($str));
        $str = str_ireplace("INSERT", "", ($str));
        $str = str_ireplace("insert", "", ($str));
        $str = str_ireplace("CREATE", "", ($str));
        $str = str_ireplace("create", "", ($str));
        $str = str_ireplace("UNION", "", ($str));
        $str = str_ireplace("union", "", ($str));
        $str = str_ireplace("delete", "", ($str));
        $str = str_ireplace("'", "&apos;", ($str));
        $str = str_ireplace("exec", "", ($str));
        $str = str_ireplace("eval", "", ($str));
        $str = str_ireplace("sql", "", ($str));
        $str = str_ireplace("from", "", ($str));
        $str = str_ireplace("drop", "", ($str));
        $str = str_ireplace("999", "", ($str));
        $str = str_ireplace("<script>", "", ($str));
        $str = str_ireplace("script", "", ($str));
        $str = str_ireplace("java", "", ($str));
        $str = str_ireplace("</script>", "", ($str));
        $str = str_ireplace(";", "", ($str));
        $str = str_ireplace("$", "&dollar;", ($str));
        return $str;
    }

    public function NewsFix($str){
        $str = str_ireplace("à", "&agrave;", ($str));
        $str = str_ireplace("<br />", "<br>", ($str));
        $str = str_ireplace("è", "&egrave;", ($str));
        $str = str_ireplace("ì", "&igrave;", ($str));
        $str = str_ireplace("ò", "&ograve;", ($str));
        $str = str_ireplace("ù", "&ugrave;", ($str));
        $str = str_ireplace("exe", "", ($str));
        $str = str_ireplace("Ã¨", "è", ($str));
        $str = str_ireplace("Ã¬", "ì", ($str));
        $str = str_replace("Ã²", "ò", ($str));
        $str = str_replace("Ã¹", "ù", ($str));
        return $str;
    }

    public function xss_filter($data){
        $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
        $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
        $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
        $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');
        $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);
        $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);
        do
        {
            $old_data = $data;
            $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
        }
        while ($old_data !== $data);

        return $data;
    }

    public function close(){
        $this->connessione = null;
    }

    # SITE Functions #

    public function sha1_crypt($string){
        return sha1($string);
    }

    public function trow($intNumber){
        if($intNumber % 2 == 0){
            return true;
        }else {
            return false;
        }
    }

    # GAME Functions #

    public function sso(){
        $data = '';
        for ($i=1; $i<=6; $i++){
            $data = $data . rand(0,10);
        }
        for ($i=1; $i<=20; $i++){
            $data = $data . rand(0,10);
        }
        $data = $data . rand(0,10);

        return $data;
    }

    public function mus($header, $data=''){
        $musData = $header . chr(1) . $data;
        $sock = @socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));
        @socket_connect($sock, config::mus_ip, config::mus_port);
        @socket_send($sock, $musData, strlen($musData), MSG_DONTROUTE);
        @socket_close($sock);
        $this->mus_log($header, $data);
    }

}