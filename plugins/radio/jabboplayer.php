<html><head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  
  <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
  
  
  <style type="text/css">
  #controllo{
		height: 32px;
		width:32px;
		margin-bottom:5px;
		border-radius: 200px;
		border-width: 5px;
		border-style: solid;
		display: inline-block;
		position:relative;
		top:20px;
		left:13px;
		line-height: 1;
		text-align: center;
		white-space: nowrap;
		background-color: #0f7dbc;
		border-color: #2a9cde;
		color: #fff!important;
		cursor:pointer;
		font-weight:bold;
		outline:none;
  }
  #controllo:hover{
		background-color: #2a9cde;
		border-color:#53bdf9;
	}
	#controllo:active{
		-webkit-transform: translate(0, 1px);
		-moz-transform: translate(0, 1px);
		-o-transform: translate(0, 1px);
		transform: translate(0, 1px);
		background:#084d74;
		border-color:#1e7b9e;
	}
    input[type='range'] {
		-webkit-appearance: none;
		border-radius: 200px;
		border:#010000 1px solid;
		background: #ccc;
		height: 6px;
		vertical-align: middle;
        width:130px;
	}
	input[type='range']::-moz-range-track {
		-moz-appearance: none;
		border-radius: 200px;
		box-shadow: inset 0 0 5px #333;
		background-color: #999;
		height: 10px;
	}
	input[type='range']::-webkit-slider-thumb {
		-webkit-appearance: none !important;
		border-radius: 200px;
		background: #2a9cde;	
		border: 5px solid #242424;
		height: 16px;
		width: 16px;
	}
	input[type='range']::-moz-range-thumb {
		-moz-appearance: none;
		border-radius: 200px;
		background-color: #FFF;
		box-shadow:inset 0 0 10px rgba(000,000,000,0.5);
		border: 1px solid #999;
		height: 20px;
		width: 20px;
	}
	input[type="range"]:focus {
		outline: none!important;
	}
	#player{
		background-image: url(immagini/jabboplayer.png?=1);
		background-repeat:no-repeat;
		height:100px;
	}
	.richieste {
	position:relative;
	top:13px;
	left:50px;
	-webkit-border-radius: 3;
	-moz-border-radius: 3;
	border-radius: 3px;
	font-family: Arial;
	color: #ffffff;
	background: #006bb3;
	padding: 3px 3px 3px 3px;
	border: solid #000000 1px;
	text-decoration: none;
	}
	.richieste:hover {
	background: #0075bd;
	text-decoration: none;
	}
	#ascoltatori {
	margin-top: 25px;
    right: -153px;
    width: 210px;
    color: #242424;
    position: absolute;
    font-family: titolo;
	}
  </style>
  


<script type="text/javascript">
function Inizializza() {
	$('#titolo').load('titolosong.php');
	$('#ascoltatori').load('ascoltatori.php');
	aggiornainfo();
	$('#song').prop("volume", 1);
    volume.value=100;
}

function CambiaVolume() {
    $('#song').prop("volume", volume.value/100);
	if(volume.value == 0){
	document.getElementById("controllo").value = "►";
	}else{
	document.getElementById("controllo").value = "∎";
	}
}

function CambiaStato() {
	if ( document.getElementById("controllo").value == "∎" ) {
    document.getElementById("controllo").value = "►";
	$('#song').prop("volume", 0);
    volume.value=0;
  }
  else {
    document.getElementById("controllo").value = "∎";
	$('#song').prop("volume", 1);  
    volume.value=100;
  }
}
function aggiornainfo()
{
	setTimeout( function() {
	$('#titolo').fadeOut('slow').load('titolosong.php').fadeIn('slow');
	$('#ascoltatori').fadeOut('slow').load('ascoltatori.php').fadeIn('slow');
	aggiornainfo();
	}, 20000);
}
</script>



</head>
<body onload="Inizializza()">
  <audio id="song" autoplay="true">
  <source src="http://listen.radionomy.com/JabboRadio">
</audio>
<div id="player">
<div id="titolo" style="height:20px;position:relative; top:7px;left:53px;"></div>
<div id="ascoltatori"></div>
   <input id="controllo" type="button" value="∎" onclick="CambiaStato()">
   <input type="range" id="volume" min="0" max="100" step="0.01" value="100" oninput="CambiaVolume()" style="position: relative;left:23px;top:20px;">
   <br><a href="http://fansite.jabboitalia.in/radio.php" target="_bank" class="richieste"><small>Richiedi una canzone</small></a>
  


</body></html>