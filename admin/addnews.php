<?php
/**
 * Created By LeCs.
 * Date: 06/10/2015 15:19
 * lbase - addnews.php
 */

$pagina = 5;
$page_name = 'Posta una News.';
require_once('inc/header.php');

if($connect->get_permissions('add_news', $connect->utente('rank', 'username', $connect->nome)) == 1) {
    $msg = 'Scrivi una nuova News.';
    if (isset($_POST['addNews'])) {
        $titolo = $connect->Filter($_POST['title']);
        $descrizione = $connect->Filter($_POST['desc']);
        $topstory = $connect->Filter($_POST['img']);
        $testo = $connect->filternews($_POST['content']);
        $autore = $connect->Filter($_POST['autore']);
        if ($titolo != '' AND $descrizione != '' AND $topstory != '' AND $testo != '' AND $autore != '') {
            try {
                $insert = $connect->connessione->prepare("INSERT INTO cms_news (`title`, `shortstory`, `longstory`, `image`, `pub_date`, `author`) VALUES (?, ?, ?, ?, ?, ?)");
                $insert->execute(array($titolo, $descrizione, $testo, $topstory, time(), $autore));
                $msg = 'News pubblicata con successo.';
            } catch (Exception $e) {
                $msg = $e;
            }
        } else {
            $msg = 'Compila tutti i campi.';
        }
    }
} else {
    $msg = "Non hai i permessi necessari per visualizzare questa pagina.";
}

?>
<script type="text/javascript" src="inc/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        theme: "modern",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar1: "undo redo bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "print preview | forecolor",
        image_advtab: true,
        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ]
    });
</script>
<div id="page_cont">
    <?php if($connect->get_permissions('add_news', $connect->utente('rank', 'username', $connect->nome)) == 1){?>
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
                            <h2><img src="inc/style/images/site.png" width="16.5px" height="16.5px">Posta una News</h2>
                        </div>
                        <div class="content" style="font-size: 20px;">
                            <center>
                                <form method="POST">
                                    <input type="text" name="title" style="width:75%;" placeholder="Titolo">
                                    <div style="height:10px;width:5px;"></div>
                                    <input type="text" name="desc" style="width:75%;" placeholder="Descrizione">
                                    <div style="height:10px;width:5px;"></div>
                                    <input type="text" name="img" style="width:75%;" placeholder="Topstory (URL immagine di copertina)">
                                    <div style="height:10px;width:5px;"></div>
                                    <div style="width:75%">
                                    <textarea name="content" placeholder="Testo"></textarea>
                                    </div>
                                    <div style="height:10px;width:5px;"></div>
                                    <input type="text" name="autore" style="width:75%" placeholder="Autore">
                                    <div style="height:10px;width:5px;"></div>
                                    <input type="submit" name="addNews" value="Posta News">
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