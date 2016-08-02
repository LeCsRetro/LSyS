<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 06/06/2016 14:36
 * LSyS - cloni.php
 */
$pagina = 10;
$page_name = "Trova Cloni";
require_once('inc/header.php');

if($connect->get_permissions('clones_tool', $connect->utente('rank', 'username', $connect->nome)) == 1) {
    $msg = 'Trova Cloni';
    if(isset($_POST['clone_search'])) {
        if($_POST['username'] != '') {
            $username = $connect->Filter($_POST['username']);
            if($connect->count_val('users', 'username', $username) == 1) {
                $ricerca = true;
            } else {
                $ricerca = false;
                $msg = 'Utente inesistente.';
            }
        } else {
            $ricerca = false;
            $msg = 'Inserisci un username.';
        }
    } else {
        $ricerca = false;
    }
} else {
    $msg = 'Non hai i permessi per visualizzare questa pagina.';
}
?>
<div id="page_cont">
    <?php if($connect->get_permissions('clones_tool', $connect->utente('rank', 'username', $connect->nome)) == 1){?>
    <table style="width:92%;margin-left:4%;margin-right:4%;">
        <tbody>
        <tr>
            <td colspan="2">
                <div style="font-weight:bold;font-size:16px;background: rgba(116, 208, 195, 0.3);width:100%;padding: 5px 0;color: #007DD8;border-radius:5px;text-align:center;border: 1px solid #007DD8;">
                    <img src="inc/style/images/inf.png" width="16.5px" height="16.5px" style="float:left;margin-left:10px;margin-right:-10px;"><?php echo $msg;?>
                </div>
            </td>
        </tr>
        <?php if($ricerca){?>
        <tr>
            <td style="padding: 5px;">
                <div class="box" style="width: 100%;">
                    <div class="top_header">
                        <h2><img src="inc/style/images/usr.png" width="16px" height="16px">Cloni per <?php echo $username; ?></h2>
                    </div>
                    <div class="content" style="font-size: 20px;">
                        <div class="content" style="font-size: 20px;height: 250px;overflow-y: scroll;">
                            <table style="width:100%;">
                                <?php echo $connect->getClones($username);?>
                            </table>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <?php } else {?>
            <tr>
                <td style="padding: 5px;">
                    <div class="box" style="width: 100%;">
                        <div class="top_header">
                            <h2><img src="inc/style/images/usr.png" width="16.5px" height="16.5px">Trova Cloni</h2>
                        </div>
                        <div class="content" style="font-size: 20px;">
                            <center>
                                <form method="post">
                                    <input type="text" name="username" placeholder="Username" style="width:70%;">
                                    <div style="height:10px;width:5px;"></div>
                                    <input type="submit" name="clone_search" value="Trova Cloni">
                                </form></center>
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
