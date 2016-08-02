<?php
/**
 * Created By LeCs.
 * Date: 28/09/2015 22:21
 * lbase - password.php
 */

$pagina = 4;
$page_name = 'Gestione Password';
require_once('inc/header.php');

if($connect->get_permissions('password_tool', $connect->utente('rank', 'username', $connect->nome)) == 1){
    $msg = 'Cambia password ad un utente.';
    if(isset($_POST['changePass'])){
        $user = $connect->Filter($_POST['name']);
        if($user != ''){
            if($connect->count_val('users','username',$user) == 1){
                if($connect->utente('rank','username',$connect->nome) > $connect->utente('rank','username',$user)){
                    $newpass = $connect->passGen(mt_rand(7,11));
                    $connect->UpdateSingle('users','password',$connect->pass_hash($newpass),'username',$user);
                    $msg = "La nuova password di $user &egrave; $newpass.";
                } else {
                    $msg = 'Non puoi cambiare la password di questo utente.';
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
    <?php if($connect->get_permissions('password_tool', $connect->utente('rank', 'username', $connect->nome)) == 1){?>
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
                            <h2><img src="inc/style/images/usr.png" width="16.5px" height="16.5px">Cambia Password</h2>
                        </div>
                        <div class="content" style="font-size: 20px;">
                            <center>
                                <form method="post">
                                    <input type="text" name="name" placeholder="Username" style="width:70%;">
                                    <div style="height:10px;width:5px;"></div>
                                    <input type="submit" name="changePass" value="Cambia Password">
                                </form></center>
                        </div>
                    </div>
                </td>
            </tr>
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