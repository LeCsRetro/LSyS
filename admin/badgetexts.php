<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 09/06/2016 14:06
 * LSyS - badgetexts.php
 */

$pagina = 11;
$page_name = 'Gestione Testi Badge.';
require_once('inc/header.php');

if($connect->get_permissions('badge_texts', $connect->utente('rank', 'username', $connect->nome)) == 1) {
    $msg = 'Carica Testi Badge.';
    $textsfilepath = 'C:/inetpub/wwwroot/dcr/external_flash_texts.txt';

    if(isset($_POST['addTexts'])){
        if($_POST['badgeid'] != ''){
            if($_POST['badgename'] != ''){
                if($_POST['badgedesc'] != ''){
                    // ERRORE 1: File non trovato. Controlla che il percorso del file dei texts sia corretto.
                    $fh = fopen($textsfilepath, "a")or die("Si è verificato un errore nell'aggiunta dei testi. Contatta il Webmaster e segnala l'accaduto!<br><br>ERRORE #1");
                    // ERRORE 2: Impossibile inserire i testi. Controlla che il file abbia i permessi necessari per essere modificato.
                    fwrite($fh, "\r\nbadge_name_".$_POST['badgeid']."=".$_POST['badgename']."\r\nbadge_desc_".$_POST['badgeid']."=".$_POST['badgedesc'])or die("Si è verificato un errore nell'aggiunta dei testi. Contatta il Webmaster e segnala l'accaduto!<br><br>ERRORE #2");
                    fclose($fh);

                    $msg = "Testo aggiunto con successo!";
                }else{
                    $msg = "Inserisci una descrizione per il Distintivo";
                }
            }else{
                $msg = "Inserisci un nome per il Distintivo";
            }
        }else{
            $msg = "Inserisci il codice del Distintivo";
        }
    }else{
        $msg = "Carica Testi Distintivi";
    }

} else {
    $msg = 'Non hai i permessi per visualizzare questa pagina.';
}
?>

<div id="page_cont">
    <?php if($connect->get_permissions('badge_texts', $connect->utente('rank', 'username', $connect->nome)) == 1) {?>
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
                            <h2><img src="inc/style/images/site.png" width="16.5px" height="16.5px">Carica Testi Badge</h2>
                        </div>
                        <div class="content" style="font-size: 20px;">
                            <center>
                                <form method="POST">
                                    Codice del Distintivo:<br>
                                    <input type="text" name="badgeid" value="<?php echo $_POST['badgeid']; ?>">
                                    <div style="height:5px;width:5px;"></div>
                                    NOME:<br>
                                    <input type="text" name="badgename" value="<?php echo $_POST['badgename']; ?>">
                                    <div style="height:5px;width:5px;"></div>
                                    DESCRIZIONE:<br>
                                    <input type="text" name="badgedesc" value="<?php echo $_POST['badgedesc']; ?>">
                                    <div style="height:5px;width:5px;"></div>
                                    <input type="submit" name="addTexts" value="Carica">
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
