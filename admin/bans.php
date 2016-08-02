<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 09/06/2016 14:34
 * LSyS - bans.php
 */

$pagina = 12;
$page_name = 'Gestione Bans';
require_once('inc/header.php');

if($connect->get_permissions('bans_tool', $connect->utente('rank', 'username', $connect->nome)) == 1){
    $msg = 'Gestisci i Ban.';
    if(isset($_POST['addBan'])) {
        if ($_POST['username'] != '' && $_POST['reason'] != '' && $_POST['time'] != '') {
            if ($_POST['time'] == '1' || $_POST['time'] == '2' || $_POST['time'] == '3' || $_POST['time'] == '4' || $_POST['time'] == '5') {

                if ($_POST['time'] == '1') {
                    $time = "86400";
                } elseif ($_POST['time'] == '2') {
                    $time = "604800";
                } elseif ($_POST['time'] == '3') {
                    $time = "2629743";
                } elseif ($_POST['time'] == '4') {
                    $time = "31556926";
                } elseif ($_POST['time'] == '5') {
                    $time = "788923149";
                }
                $username = $connect->Filter($_POST['username']);
                $reason = $connect->Filter($_POST['reason']);
                $time = time() + $time;
                    if ($connect->count_val('users','username',$username) == 1) {
                    if ($connect->utente('rank','username',$connect->nome) > $connect->utente('rank','username',$username)) {
                        if ($connect->count_val('bans','value',$username) > 0) {
                            $msg = $username . " risulta gi&agrave; bannato!<br>Se vuoi estendere la durata del suo ban, sbannalo e riprova!";
                        } else {
                            $add_ban = $connect->connessione->prepare("INSERT INTO bans (`bantype`,`value`,`reason`,`added_by`,`added_date`,`expire`) VALUES ('user',?,?,?,?,?)");
                            $add_ban->execute(array($username, $reason, $connect->nome, date("d-m-Y H:i:s"), $time));
                            $msg = $username . " &egrave; stato bannato con successo!";
                        }
                    } else {
                        $msg = "Non puoi bannare un utente con un rank maggiore o uguale al tuo!";
                    }
                } else {
                    $msg = "L'utente {$username} non esiste!";
                }
            } else {
                $msg = "Scegli una durata valida!";
            }
        } else {
            $msg = "Compila tutti i campi.";
        }
    } elseif($_GET['do'] == 'sban'){
        $id = $connect->Filter($_GET['key']);
        if($connect->count_val('bans','id',$id) > 0){
            $del_ban = $connect->connessione->prepare("DELETE FROM bans WHERE id = ?");
            $del_ban->execute(array($id));
            $msg = "Utente sbannato con successo!";
        }else{
            $msg = "Il Ban con ID {$id} non esiste!";
        }
    }
} else {
    $msg = 'Non hai i permessi per visualizzare questa pagina.';
}
?>

<div id="page_cont">
    <?php if($connect->get_permissions('bans_tool', $connect->utente('rank', 'username', $connect->nome)) == 1){?>
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
                            <h2><img src="inc/style/images/usr.png" width="16.5px" height="16.5px">Banna Utente</h2>
                        </div>
                        <div class="content" style="font-size: 20px;">
                            <center>
                                <form method="post">
                                    <input type="text" name="username" placeholder="Username dell'Utente da bannare" style="width:70%;">
                                    <div style="height:5px;width:5px;"></div>
                                    <input type="text" name="reason" placeholder="Motivo del Ban" style="width:70%;">
                                    <div style="height:5px;width:5px;"></div>
                                    <select name="time">
                                        <option value="-">Scegli una Durata</option>
                                        <option value="1">Un giorno</option>
                                        <option value="2">Una settimana</option>
                                        <option value="3">Un mese</option>
                                        <option value="4">Un anno</option>
                                        <option value="5">Permanentemente</option>
                                    </select>
                                    <div style="height:10px;width:10px;"></div>
                                    <input type="submit" name="addBan" value="Banna l'Utente">
                                </form></center>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;">
                    <div class="box" style="width: 100%;">
                        <div class="top_header">
                            <h2><img src="inc/style/images/usr.png" width="16.5px" height="16.5px">Utenti Bannati</h2>
                        </div>
                        <div class="content" style="font-size: 20px;height: 500px;overflow-y: scroll;">
                            <table style="width:100%;">
                                <?php $connect->getBans();?>
                            </table>
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
