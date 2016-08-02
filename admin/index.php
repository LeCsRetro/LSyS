<?php
/**
 * Created By LeCs.
 * Date: 27/08/2015 22:27
 * lbase - index.php
 */
$pagina = 1;
$page_name = 'Statistiche';
require_once('inc/header.php');
$msg = 'Statistiche Hotel';
?>
<div id="page_cont">

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
                    <h2><img src="inc/style/images/usr.png" width="16px" height="16px">Statistiche</h2>
                </div>
                <div class="content" style="font-size: 20px;">
                    <b>Registrati</b><span style="float:right;"><?php echo $connect->count('users');?></span>
                    <hr>
                    <b>Online</b><span style="float:right;"><?php echo $connect->server_status('users_online');?></span>
                    <hr>
                    <b>Stanze</b><span style="float:right;"><?php echo $connect->count('rooms');?></span>
                    <hr>
                    <b>Attive</b><span style="float:right;"><?php echo $connect->server_status('rooms_loaded');?></span>
                    <hr>
                    <b>News Postate</b><span style="float:right;"><?php echo $connect->count('cms_news');?></span>
                </div>
            </div>
        </td>
        <td style="padding: 5px;">
            <div class="box" style="width: 100%;">
                <div class="top_header">
                    <h2><img src="inc/style/images/usr.png" width="16px" height="16px">Utenti Rankati</h2>
                </div>
                <div class="content" style="font-size:18px;overflow-y:auto;height:150px;">
                  <?php $connect->UtentiRankati();?>
                </div>
            </div>
        </td>
        <td style="margin-top: 10px;padding: 5px;">
        </td>
    </tr>
    </tbody>
</table>


<?php require_once('inc/footer.php');?>
</div>
