<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 21/02/2016 14:30
 * LSyS - impostazioni.php
 */

class impostazioni{

    private $connect;
    private $user;
    private $lang;

    public function __construct($connection, $user, $lang){
        $this->connect = $connection;
        $this->user = $user->user;
        $this->lang = $lang;
    }

    public function changePass($oldpassword, $password, $password1){
        $oldpassword = $this->connect->sha1_Crypt($oldpassword);

        if ($password == $password1) {
            if ($this->user['password'] == $oldpassword) {
                if(strlen($password) > 5){
                    $this->connect->exe(array('QUERY' => "UPDATE users SET password = :password WHERE username = :username LIMIT 1",
                        ':password' => $this->connect->sha1_Crypt($password),
                        ':username' => $this->user['username']
                    ));
                    echo 'DONE:-:' . $this->lang['settings_pass_changed'] . $this->connect->xss_Filter($password);
                } else {
                    echo 'set_pass_ts:-:' . $this->lang['settings_pass_ts'];
                }
            } else {
                echo 'set_pass_error:-:' . $this->lang['settings_pass_error'];
            }
        } else {
            echo 'set_pass_dm:-:' . $this->lang['settings_pass_dm'];
        }
    }

    public function changeMail($mail){

        if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
            $this->connect->exe(array('QUERY' => "UPDATE users SET mail = :mail WHERE username = :username LIMIT 1",
            ':mail' => $mail,
            ':username' => $this->user['username']
            ));
            echo 'DONE:-:' . $this->lang['settings_mail_changed'];
        } else {
            echo 'set_inv_mail:-:' . $this->lang['settings_inv_email'];
        }

    }

}