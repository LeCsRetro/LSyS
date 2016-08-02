<?php

/**
 * Created By LeCs.
 * Date: 15/08/2015 17:00
 * lbase - sessione.php
 */
class sessione extends core{

public $nome;

    public function controllo($pagina){
        session_start();
        if($pagina == 1){
            if(isset($_SESSION['lecs_sess_uname'])){
                if($_SESSION['lecs_sess_secure_ip'] == $this->ip_ses) {
                    $this->nome = $this->Filter($this->utente('username', 'username', $_SESSION['lecs_sess_uname']));
                } else {
                    session_destroy();
                    header("location:/esci.php");
                    exit;
                }
            } else {

            }
        } elseif($pagina == 2){
            if(isset($_SESSION['lecs_sess_uname'])){
                if($_SESSION['lecs_sess_secure_ip'] == $this->ip_ses) {
                    $this->nome = $this->utente('username', 'username', $_SESSION['lecs_sess_uname']);
                    if ($this->utente('rank', 'username', $this->nome) >= 2) {

                    } else {
                        header("location:/index.php");
                        exit;
                    }
                } else {
                    session_destroy();
                    header("location:/esci.php");
                    exit;
                }
            } else {
                header("location:/index.php");
                exit;
            }
        }
    }

    public function logout(){
        session_start();
        session_destroy();
        header("location:index.php");
        exit;
    }

}