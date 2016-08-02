<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 25/01/2016 22:55
 * LSyS - registrazione.php
 */

class registrazione{

    private $connect;

    public function __construct($connection){
        $this->connect = $connection;
    }

    public function doRegister($username, $password, $email){
        $username = str_ireplace(" ","_",$username);
        $username = str_ireplace("%20","_",$username);
        $username = str_ireplace("mod-","",$username);
        $username = (preg_match('/^([a-zA-Z.,-_]){1,20}$/', $username)? $username : 'register_us_char');

        if($username != '' && $password != '' && $email != ''){
            if($username != 'register_us_char'){
                $utente = $this->connect->exe(array('QUERY' => 'SELECT id FROM users WHERE username = :username LIMIT 1', ':username' => $username), 'null', TRUE);
                if($utente['NUM'] == 0){
                    $cloni = $this->connect->exe(array('QUERY' => 'SELECT id FROM users WHERE ip_last = :ip_last', ':ip_last' => $this->connect->ip_ses), 'null', TRUE);
                    if($cloni['NUM'] <= 4){
                        if(strlen($password) > 5){
                            if($this->exeReg($username, $password, $email) == true) {
                                session_start();
                                $_SESSION['lecs_sess_uname'] = $username;
                                $_SESSION['lecs_sess_secure_ip'] = $this->connect->ip_ses;
                                echo 'DONE';
                            } else {
                                echo 'connection_error';
                            }
                        } else {
                            echo 'register_pw_ts';
                        }
                    } else {
                        echo 'register_clone';
                    }
                } else {
                    echo 'register_us_tkn';
                }
            } else {
                echo 'register_us_char';
            }
        } else {
            echo 'compilation_error';
        }
    }

    public function exeReg($username, $password, $email){
        $query = $this->connect->exe(array
            ("QUERY" => "INSERT INTO users (username, password, mail, rank, credits, look, gender, ip_last, ip_reg, account_created, last_online, motto, auth_ticket) VALUES (:username, :pass, :email, :rank,'1000000', 'ch-3111-63-62.hd-3102-1.hr-3163-39.lg-285-77.sh-305-78', 'M', :ip_last, :ip, :datacr, :ultimavisita, :motto, :sso)",
                ":username" => $username,
                ":pass"     => $this->connect->sha1_crypt($password),
                ":email"    => $email,
                ":rank"     => "1",
                ":ip_last"  => $this->connect->ip_ses,
                ":ip"       => $this->connect->ip_ses,
                ":datacr"   => $this->connect->time(),
                ":ultimavisita" => $this->connect->data($this->connect->time()),
                ":motto"    => 'Benvenuto in hotel',
                ":sso"      => $this->connect->sso()
            )
        );

        if(in_array('errore', $query)){
            return false;
        } else {
            return true;
        }
    }
}