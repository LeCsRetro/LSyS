<style> 
@font-face {
    font-family: titolo;
    src: url(font/titolosong.ttf);
}
</style>
<div style="margin-top:-3px; width:210px; color:#242424;font-family: titolo;  "><marquee scrolldelay="130"><small><b>
<?php
/*$result =  file_get_contents ('http://mixstreamflashplayer.net/mixStreamPlayer/V1.3.php?s=78.129.163.73:6321/;');
$filt_result = strip_tags(str_ireplace("nowPlaying=", "", $result));
 echo $filt_result;*/
 $url = 'http://api.radionomy.com/currentsong.cfm?radiouid=1df38f0b-4b50-4b90-8bd9-5f3940f26b69&apikey=e212094b-5d0c-48bf-af73-5dae3a3a87ae&callmeback=yes&type=xml&cover=yes&previous=yes';
$result = file_get_contents($url) or die ("ERRORE");
$parser = xml_parser_create();
xml_parse_into_struct($parser, $result, $values);
xml_parser_free($parser);

echo htmlentities($values[14]['value'].' - '.$values[12]['value']);
?></b></small></marquee></div>
