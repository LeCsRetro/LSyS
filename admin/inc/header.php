<?php
/**
 * Created By LeCs.
 * Date: 27/08/2015 22:33
 * lbase - header.php
 */

require_once('./config.php');
include('./base.php');
$connect->controllo(2);
?>
<head>
    <title><?php echo $sitename .' - '. $page_name;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="inc/style/style.css?<?php echo time();?>">
    <link rel='shortcut icon' href='../favicon.ico' type='image/vnd.microsoft.icon' />
    <script src="inc/ajax/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="inc/ajax/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="inc/ajax/script.js"></script>
</head>

<div id="head">
    <div id="pg_name"><?php echo $connect->nome;?> <div id="trif">&dtrif;</div>
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../esci.php">Esci</a></li>
    </ul>
    </div>
    <div id="pg_image" style="background-image:url('https://www.habbo.it/habbo-imaging/avatarimage?figure=<?php echo $connect->utente('look', 'username', $connect->nome);?>&direction=3&head_direction=3&gesture=sml&action=wav&size=l')"></div>
</div>
<div id="nav">
    <div id="logo"></div>




        <li class="menu">

            <ul>
                <div class="title"><a <?php if($pagina != 1){?>href="index.php"<?php } ?> ><img src="inc/style/images/inf.png" width="16px" height="16px">Statistiche</a></div>

            </ul>

        </li>

        <li class="menu">

            <ul>
                <li class="title"><a><img src="inc/style/images/usr.png" width="16px" height="16px">Gestisci Utenti</a></li>

                <li class="sub-menu">
                    <ul>
                        <li><a <?php if($pagina != 2){?>href="rank.php"<?php } else { ?> class="selected" <?php } ?>>Ranka Utente</a></li>
                        <li><a <?php if($pagina != 3){?>href="info.php"<?php } else { ?> class="selected" <?php } ?>>Info Utente</a></li>
                        <li><a <?php if($pagina != 10){?>href="cloni.php"<?php } else {?> class="selected" <?php } ?>>Trova Cloni</a></li>
                        <li><a <?php if($pagina != 12){?>href="bans.php"<?php } else { ?> class="selected" <?php } ?>>Gestisci Ban</a></li>
                        <li><a <?php if($pagina != 4){?>href="password.php"<?php } else { ?> class="selected" <?php } ?>>Cambia Password</a></li>
                    </ul>
                </li>

            </ul>

        </li>


        <li class="menu">

            <ul>
                <li class="title"><a><img src="inc/style/images/site.png" width="16px" height="16px">Gestisci Contenuti</a></li>

                <li class="sub-menu">
                    <ul>
                        <li><a <?php if($pagina != 5){?>href="addnews.php"<?php } else { ?> class="selected" <?php } ?>>Posta News</a></li>
                        <li><a <?php if($pagina != 6){?>href="news.php"<?php } else { ?> class="selected" <?php } ?>>Gestisci News</a></li>
                        <li><a <?php if($pagina != 7){?>href="badge.php"<?php } else { ?> class="selected" <?php } ?>>Carica Badge</a></li>
                        <li><a <?php if($pagina != 11){?>href="badgetexts.php"<?php } else { ?> class="selected" <?php } ?>>Carica Testo Badge</a></li>
                    </ul>
                </li>

            </ul>

        </li>

    <li class="menu">

        <ul>
            <li class="title"><a><img src="inc/style/images/site.png" width="16px" height="16px">Gestisci Sito</a></li>

            <li class="sub-menu">
                <ul>
                    <li><a <?php if($pagina != 13){?>href="manutenzione.php"<?php } else { ?> class="selected" <?php } ?>>Manutenzione</a></li>
                </ul>
            </li>

        </ul>

    </li>




</div>
<div id="container">
    <button id="menu_but"></button>
    <script type="text/javascript">

            $('#menu_but').click(function () {
                if($('#container').css('right') == '0px') {
                    $('#container').animate({"right": "-200px"}, 800);
                } else {
                    $('#container').animate({"right": "0"}, 800);
                }
            });

            $('#pg_name').click(function() {
                if($('#pg_name').hasClass('clicked')){
                    $('#pg_name').find('ul').slideUp(500, function() {
                    $('#pg_name').removeClass('clicked');
                        $('#trif').html('&dtrif;');
                });
                } else {
                    $('#pg_name').addClass('clicked');
                    $('#pg_name').find('ul').slideDown(500);
                    $('#trif').html('&utrif;');
                }
            });

    </script>
