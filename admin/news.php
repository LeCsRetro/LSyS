<?php
/**
 * Created By LeCs.
 * Date: 07/10/2015 15:43
 * lbase - news.php
 */

$pagina = 6;
$page_name = 'Gestione News.';
require_once('inc/header.php');

if($connect->get_permissions('edit_news', $connect->utente('rank', 'username', $connect->nome)) == 1) {
    $msg = 'Gestisci le News.';
    if (isset($_POST['deleteNews'])) {
        $id = $connect->Filter($_POST['id']);
        if ($id != '') {
            if ($connect->count_val('cms_news', 'id', $id) == 1) {
                $connect->Delete('cms_news', 'id', $id);
                $msg = 'News eliminata con successo.';
            } else {
                $msg = 'ID non valido.';
            }
        } else {
            $msg = 'Scegli una news da eliminare.';
        }
    } elseif (isset($_POST['editNews'])) {
        $id = $connect->Filter($_POST['id']);
        if ($id != '') {
            if ($connect->count_val('cms_news', 'id', $id) == 1) {
                try {
                    $titolo = $connect->selezione('title', 'cms_news', 'id', $id);
                    $descrizione = $connect->selezione('shortstory', 'cms_news', 'id', $id);
                    $testo = $connect->selezione('longstory', 'cms_news', 'id', $id);
                    $topstory = $connect->selezione('image', 'cms_news', 'id', $id);
                    $editor = $id;
                    $msg = 'Modifica la news.';
                } catch (Exception $e) {
                    $msg = $e;
                    unset($editor);
                }
            } else {
                $msg = 'ID non valido.';
            }
        } else {
            $msg = 'Scegli una news da modificare.';
        }
    } elseif (isset($_POST['updateNews'])) {
        $titolo = $connect->Filter($_POST['title']);
        $descrizione = $connect->Filter($_POST['desc']);
        $topstory = $connect->Filter($_POST['img']);
        $testo = $connect->filternews($_POST['content']);
        $id = $connect->Filter($_POST['id']);
        if ($connect->count_val('cms_news', 'id', $id) == 1) {
            try {
                $update = $connect->connessione->prepare("UPDATE cms_news SET `title` = ?, `shortstory` = ?, `image` = ?, `longstory` = ? WHERE id = ?");
                $update->execute(array($titolo, $descrizione, $topstory, $testo, $id));
                $msg = 'News modificata con successo.';
            } catch (Exception $e) {
                $msg = $e;
            }
        } else {
            $msg = 'ID non valido.';
        }
    }
} else {
    $msg = 'Non hai i permessi necessari per visualizzare questa pagina.';
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
    <?php if($connect->get_permissions('edit_news', $connect->utente('rank', 'username', $connect->nome)) == 1){ ?>
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
                    <?php if(!isset($editor)){ ?>
                    <div class="box" style="width: 100%;">
                        <div class="top_header">
                            <h2><img src="inc/style/images/site.png" width="16.5px" height="16.5px">Modifica/Elimina News</h2>
                        </div>
                        <div class="content" style="font-size: 20px;height: 400px;overflow-y: scroll;">
                            <!-- CONTENUTO -->
                            <table style="width:100%">
                                <tbody>
                            <?php $connect->newsHK();?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php } else { ?>
                        <div class="box" style="width: 100%;">
                            <div class="top_header">
                                <h2><img src="inc/style/images/site.png" width="16.5px" height="16.5px">Editor News</h2>
                            </div>
                            <div class="content" style="font-size: 20px;">
                                <center>
                                    <form method="POST">
                                        <input name="id" type="hidden" value="<?php echo $editor;?>" readonly>
                                        <input type="text" name="title" style="width:75%;" placeholder="Titolo" value="<?php echo $titolo;?>">
                                        <div style="height:10px;width:5px;"></div>
                                        <input type="text" name="desc" style="width:75%;" placeholder="Descrizione" value="<?php echo $descrizione;?>">
                                        <div style="height:10px;width:5px;"></div>
                                        <input type="text" name="img" style="width:75%;" placeholder="Topstory (URL immagine di copertina)" value="<?php echo $topstory;?>">
                                        <div style="height:10px;width:5px;"></div>
                                        <div style="width:75%">
                                            <textarea name="content" placeholder="Testo"><?php echo $testo;?></textarea>
                                        </div>
                                        <div style="height:10px;width:5px;"></div>
                                        <input type="submit" name="updateNews" value="Aggiorna News">
                                    </form>
                                </center>
                            </div>
                        </div>
                    <?php } ?>
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