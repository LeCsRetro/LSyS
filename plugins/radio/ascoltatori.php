<style> 
@font-face {
    font-family: titolo;
    src: url(font/titolosong.ttf);
}
</style>
<div style="margin-top:1px; width:210px; color:#242424;font-family: titolo;  "><small><b>
<?php
 $url = 'http://api.radionomy.com/currentaudience.cfm?radiouid=1df38f0b-4b50-4b90-8bd9-5f3940f26b69';
$result = file_get_contents($url) or die ("ERRORE");
echo $result;
?></b></small></div>