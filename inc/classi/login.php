<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 25/01/2016 22:46
 * LSyS - login.php
 */

class login{

    private $connect;

    public function __construct($connection){
        $this->connect = $connection;
    }

    public function doLogin($username, $password){
        $password = $this->connect->sha1_crypt($password);
        $user = $this->connect->exe(array("QUERY" => 'SELECT username,password FROM users WHERE username = :username LIMIT 1' , ':username' => $username),'fetch',TRUE);

        if($username != '' && $password != ''){
            if($user['NUM'] == 1){
                if($password == $user['password']){
                    $ban = $this->ban_check($username);
                    if($ban['banned'] == 0){
                        session_start();
                        $_SESSION['lecs_sess_uname'] = $user['username'];
                        $_SESSION['lecs_sess_secure_ip'] = $this->connect->ip_ses;
                        echo 'DONE';
                    } else {
                        echo 'login_us_banned:-:'.$this->connect->data($ban['expire']);
                    }
                } else {
                    echo 'login_pass_error';
                }
            } else {
                echo 'login_us_notreg';
            }
        } else {
            echo 'compilation_error';
        }
    }

    public function ban_check($username){
        $query = $this->connect->exe(array("QUERY" => 'SELECT * FROM bans WHERE value = :valore OR value = :ip LIMIT 1', ':valore' => $username, ':ip' => $this->connect->ip_ses), 'fetch', true);

        if($query['NUM'] == 1){
            if($query['expire'] > $this->connect->time()){
                $banned = 1;
                $expire = $query['expire'];
            } else {
                $this->connect->exe(array("QUERY" => 'DELETE FROM bans WHERE value = :valore OR value = :ip', ':valore' => $username, ':ip' => $this->connect->ip_ses));
                $this->connect->mus('reloadbans');
                $banned = 0;
                $expire = null;
            }
        } else {
            $banned = 0;
            $expire = null;
        }

        return array('banned' => $banned, 'expire' => $expire);
    }
}