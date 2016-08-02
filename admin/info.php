<?php
/**
 * Created By LeCs.
 * Date: 28/09/2015 13:37
 * lbase - info.php
 */

$pagina = 3;
$page_name = 'Info Utente';
$mail = '';
$reg_date = '';
$last_date = '';
$rank = '';
require_once('inc/header.php');

if($connect->get_permissions('user_info', $connect->utente('rank', 'username', $connect->nome)) == 1){
    $msg = 'Ottieni info utente.';
if(isset($_POST['getInfo'])){
    $user = $connect->Filter($_POST['name']);
    if($user != ''){
        if($connect->count_val('users','username',$user) == 1){
            if($connect->utente('rank','username',$connect->nome) >= $connect->utente('rank','username',$user)){
                $done = 1;
                $mail = $connect->utente('mail','username',$user);
                $reg_date = $connect->getDate($connect->utente('account_created','username',$user));
                $last_date = $connect->getDate($connect->utente('last_online','username',$user));
                $rank = $connect->selezione('name','ranks','id',$connect->utente('rank','username',$user));
                $msg = 'Informazioni trovate.';
            } else {
                $msg = 'Non puoi vedere le info di questo utente.';
            }
        } else {
            $msg = 'Utente inesistente.';
        }
    } else {
        $msg = 'Compila tutti i campi.';
    }
}
} else {
    $msg = 'Non hai i permessi per visualizzare questa pagina.';
}
?>

<div id="page_cont">
    <?php if($connect->get_permissions('user_info', $connect->utente('rank', 'username', $connect->nome)) == 1){?>
        <table style="width:92%;margin-left:4%;margin-right:4%;">
            <tbody>
            <tr>
                <td colspan="2">
                    <div style="font-weight:bold;font-size:16px;background: rgba(116, 208, 195, 0.3);width:100%;padding: 5px 0;color: #007DD8;border-radius:5px;text-align:center;border: 1px solid #007DD8;">
                        <img src="inc/style/images/inf.png" width="16.5px" height="16.5px" style="float:left;margin-left:10px;margin-right:-10px;"><?php echo $msg;?>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;">
                    <div class="box" style="width: 100%;">
                        <div class="top_header">
                            <h2><img src="inc/style/images/usr.png" width="16.5px" height="16.5px">Info Utente</h2>
                        </div>
                        <div class="content" style="font-size: 20px;">
                            <center>
                                <form method="post">
                                    <input type="text" name="name" placeholder="Username" style="width:70%;">
                                    <div style="height:10px;width:5px;"></div>
                                    <input type="submit" name="getInfo" value="Ottieni Info">
                                </form></center>
                        </div>
                    </div>
                </td>
            </tr>
            <?php if(isset($done)){?>
                <tr>
                    <td style="padding:5px">
                        <div class="box" style="width: 100%;">
                            <div class="top_header">
                                <h2><img src="inc/style/images/usr.png" width="16.5px" height="16.5px">Info <?php echo $user;?></h2>
                            </div>
                            <div class="content" style="font-size:18px;overflow-y:auto;">

                                    <b>Email:</b>
                                    <span style="float:right"><?php echo $mail;?></span>
                                    <hr>
                                    <b>Rank:</b>
                                    <span style="float:right"><?php echo $rank;?></span>
                                    <hr>
                                    <b>Data di registrazione:</b>
                                    <span style="float:right"><?php echo $reg_date;?></span>
                                    <hr>
                                    <b>Ultimo Accesso:</b>
                                    <span style="float:right"><?php echo $last_date;?></span>


                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>


    <?php } else { ?>
        <table style="width:92%;margin-left:4%;margin-right:4%;">
            <tbody>
            <tr>
                <td colspan="2">
                    <div style="font-weight:bold;font-size:16px;background: rgba(116, 208, 195, 0.3);width:100%;padding: 5px 0;color: #007DD8;border-radius:5px;text-align:center;border: 1px solid #007DD8;">
                        <img src="inc/style/images/inf.png" width="16.5px" height="16.5px" style="float:left;margin-left:10px;margin-right:-10px;"><?php echo $msg;?>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    <?php } ?>

    <?php require_once('inc/footer.php');?>
</div>
