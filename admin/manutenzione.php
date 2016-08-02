<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 07/07/2016 00:25
 * LSyS - manutenzione.php
 */

$pagina = 13;
$page_name = 'Gestione Manutenzione';
require_once('inc/header.php');

if($connect->get_permissions('maintenance_tool', $connect->utente('rank', 'username', $connect->nome)) == 1){
    $msg = 'Gestisci Manutenzione.';
    if(isset($_POST['changeMaintenance'])){
        $manutenzione = $connect->Filter($_POST['maint_value']);
        $connect->UpdateSingle('cms_settings','value', $manutenzione,'variable','site_closed');
    }
} else {
    $msg = 'Non hai i permessi per visualizzare questa pagina.';
}
?>

<div id="page_cont">
    <?php if($connect->get_permissions('maintenance_tool', $connect->utente('rank', 'username', $connect->nome)) == 1){?>
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
                            <h2><img src="inc/style/images/site.png" width="16.5px" height="16.5px">Gestisci Manutenzione</h2>
                        </div>
                        <div class="content" style="font-size: 20px;">
                            <center>
                                <form method="post">
                                    <select id="maintenance_value" name="maint_value">
                                        <option value="0" selected>
                                            Disattiva
                                        </option>
                                        <option value="1">
                                            Attiva
                                        </option>
                                    </select>
                                    <div style="height:10px;width:5px;"></div>
                                    <input type="submit" name="changeMaintenance" value="Aggiorna Manutenzione">
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

