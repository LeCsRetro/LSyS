<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 24/12/2015 17:41
 * LSyS - sessione.php
 */

class sessione{

    public $user;
    private $connect;

    public function __construct($connection, $page = ''){
        $this->connect = $connection;
        session_start();
        session_regenerate_id();
        $this->user = $this->get_users_data();
        $get_maintenance = $this->connect->exe(array('QUERY' => "SELECT * FROM cms_settings WHERE variable = 'site_closed' LIMIT 1"));
        $this->manutenzione = $get_maintenance['value'];
        $this->page_check($page);
    }

    private function get_users_data(){
        if(!isset($_SESSION['lecs_sess_uname'])){
            $user_data = 'null';
        } else {
            if($_SESSION['lecs_sess_secure_ip'] == $this->connect->ip_ses) {
                $user_data = $this->connect->exe(array("QUERY" => "SELECT * FROM users WHERE username = :username LIMIT 1", ':username' => $_SESSION['lecs_sess_uname']), 'fetch', true);
            } else {
                session_destroy();
                header("location:esci.php");
                exit;
            }
        }
        return $user_data;
    }

    private function page_check($page){
        if($this->manutenzione == 1){
            header("location:manutenzione.php");
            exit;
        } else {
            switch($page){
                case 1:
                    if(isset($_SESSION['lecs_sess_uname'])){
                        header("location:me.php");
                        exit;
                    }
                    break;
                case 2:
                    if(!isset($_SESSION['lecs_sess_uname'])){
                        header("location:index.php");
                        exit;
                    }
                    break;
                case 3:
                    if(!isset($_SESSION['lecs_sess_uname']) && $this->permissions_check() != 1){
                        header("location:me.php");
                        exit;
                    }
                    break;
            }
        }
    }

    private function permissions_check(){
        if(isset($_SESSION['lecs_sess_uname'])){
           $permessi = $this->connect->exe(array("QUERY" => "SELECT is_admin FROM permissions_cms WHERE id = :id LIMIT 1",':id' => $this->user['rank']));
        } else {
            $permessi = 0;
        }
        return $permessi;
    }


}