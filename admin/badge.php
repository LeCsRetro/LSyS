<?php
/**
 * Created By LeCs.
 * Date: 11/09/2015 23:36
 * lbase - badge.php
 */

$pagina = 7;
$page_name = 'Gestione Badge.';
require_once('inc/header.php');

if($connect->get_permissions('badge_upload', $connect->utente('rank', 'username', $connect->nome)) == 1) {
    $msg = 'Carica un Badge.';
//istruzioni

} else {
    $msg = 'Non hai i permessi per visualizzare questa pagina.';
}
?>

<div id="page_cont">
    <?php if($connect->get_permissions('badge_upload', $connect->utente('rank', 'username', $connect->nome)) == 1) {?>
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
                            <h2><img src="inc/style/images/site.png" width="16.5px" height="16.5px">Carica Badge</h2>
                        </div>
                        <div class="content" style="font-size: 20px;">
                            <center>
                                <form enctype="multipart/form-data" action="../inc/style/images/badges/upload.php" method="POST">
                                    <input type="file" name="file1">
                                    <br>
                                    <input type="submit" value="Carica">
                                </form>
                            </center>
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