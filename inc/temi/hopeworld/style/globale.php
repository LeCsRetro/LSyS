<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 26/01/2016 17:47
 * LSyS - globale.php
 */


header("Content-type: text/css");
?>
body{
margin:0;
font-family: 'Ubuntu Condensed', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif !important;
background-color:#134B77;
overflow-x:hidden;
}

@import url(http://fonts.googleapis.com/css?family=Open+Sans);
#cssmenu,
#cssmenu ul,
#cssmenu ul li,
#cssmenu ul li a,
#cssmenu #menu-button {
  margin: 0;
  padding: 0;
  border: 0;
  list-style: none;
  line-height: 1;
  display: block;
  position: relative;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
#cssmenu:after,
#cssmenu > ul:after {
  content: ".";
  display: block;
  clear: both;
  visibility: hidden;
  line-height: 0;
  height: 0;
}
#cssmenu #menu-button {
  display: none;
}
#cssmenu {
  width: auto;
  font-family: 'Open Sans', sans-serif;
  line-height: 1;
  background: #ffffff;
}
#menu-line {
  position: absolute;
  top: 0;
  left: 0;
  height: 3px;
  background: #009ae1;
  -webkit-transition: all 0.25s ease-out;
  -moz-transition: all 0.25s ease-out;
  -ms-transition: all 0.25s ease-out;
  -o-transition: all 0.25s ease-out;
  transition: all 0.25s ease-out;
}
#cssmenu > ul > li {
  float: left;
}
#cssmenu.align-center > ul {
  font-size: 0;
  text-align: center;
}
#cssmenu.align-center > ul > li {
  display: inline-block;
  float: none;
}
#cssmenu.align-center ul ul {
  text-align: left;
}
#cssmenu.align-right > ul > li {
  float: right;
}
#cssmenu.align-right ul ul {
  text-align: right;
}
#cssmenu > ul > li > a {
  padding: 20px;
  font-size: 12px;
  text-decoration: none;
  text-transform: uppercase;
  color: #000000;
  -webkit-transition: color .2s ease;
  -moz-transition: color .2s ease;
  -ms-transition: color .2s ease;
  -o-transition: color .2s ease;
  transition: color .2s ease;
}
#cssmenu > ul > li:hover > a,
#cssmenu > ul > li.active > a {
  color: #009ae1;
}
#cssmenu > ul > li.has-sub > a {
  padding-right: 25px;
}
#cssmenu > ul > li.has-sub > a::after {
  position: absolute;
  top: 21px;
  right: 10px;
  width: 4px;
  height: 4px;
  border-bottom: 1px solid #000000;
  border-right: 1px solid #000000;
  content: "";
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
  -webkit-transition: border-color 0.2s ease;
  -moz-transition: border-color 0.2s ease;
  -ms-transition: border-color 0.2s ease;
  -o-transition: border-color 0.2s ease;
  transition: border-color 0.2s ease;
}
#cssmenu > ul > li.has-sub:hover > a::after {
  border-color: #009ae1;
}
#cssmenu ul ul {
  position: absolute;
  left: -9999px;
  z-index: 99;
}
#cssmenu li:hover > ul {
  left: auto;
}
#cssmenu.align-right li:hover > ul {
  right: 0;
}
#cssmenu ul ul ul {
  margin-left: 100%;
  top: 0;
}
#cssmenu.align-right ul ul ul {
  margin-left: 0;
  margin-right: 100%;
}
#cssmenu ul ul li {
  height: 0;
  -webkit-transition: height .2s ease;
  -moz-transition: height .2s ease;
  -ms-transition: height .2s ease;
  -o-transition: height .2s ease;
  transition: height .2s ease;
}
#cssmenu ul li:hover > ul > li {
  height: 32px;
}
#cssmenu ul ul li a {
  padding: 10px 20px;
  width: 160px;
  font-size: 12px;
  background: #333333;
  background: #ffffff;
  text-decoration: none;
  color: #dddddd;
  color: #009ae1;
  -webkit-transition: color .2s ease;
  -moz-transition: color .2s ease;
  -ms-transition: color .2s ease;
  -o-transition: color .2s ease;
  transition: color .2s ease;
}
#cssmenu ul ul li:hover > a,
#cssmenu ul ul li a:hover {
  color: #dddddd;
  background: #333333;
}
#cssmenu ul ul li.has-sub > a::after {
  position: absolute;
  top: 13px;
  right: 10px;
  width: 4px;
  height: 4px;
  border-bottom: 1px solid #dddddd;
  border-right: 1px solid #dddddd;
  content: "";
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  transform: rotate(-45deg);
  -webkit-transition: border-color 0.2s ease;
  -moz-transition: border-color 0.2s ease;
  -ms-transition: border-color 0.2s ease;
  -o-transition: border-color 0.2s ease;
  transition: border-color 0.2s ease;
}
#cssmenu.align-right ul ul li.has-sub > a::after {
  right: auto;
  left: 10px;
  border-bottom: 0;
  border-right: 0;
  border-top: 1px solid #dddddd;
  border-left: 1px solid #dddddd;
}
#cssmenu ul ul li.has-sub:hover > a::after {
  border-color: #ffffff;
}
@media all and (max-width: 768px), only screen and (-webkit-min-device-pixel-ratio: 2) and (max-width: 1024px), only screen and (min--moz-device-pixel-ratio: 2) and (max-width: 1024px), only screen and (-o-min-device-pixel-ratio: 2/1) and (max-width: 1024px), only screen and (min-device-pixel-ratio: 2) and (max-width: 1024px), only screen and (min-resolution: 192dpi) and (max-width: 1024px), only screen and (min-resolution: 2dppx) and (max-width: 1024px) {
    #cssmenu {
    width: 100%;
}
  #cssmenu ul {
    width: 100%;
    display: none;
  }
  #cssmenu.align-center > ul,
  #cssmenu.align-right ul ul {
    text-align: left;
  }
  #cssmenu ul li,
  #cssmenu ul ul li,
  #cssmenu ul li:hover > ul > li {
    width: 100%;
    height: auto;
    border-top: 1px solid rgba(120, 120, 120, 0.15);
  }
  #cssmenu ul li a,
  #cssmenu ul ul li a {
    width: 100%;
  }
  #cssmenu > ul > li,
  #cssmenu.align-center > ul > li,
  #cssmenu.align-right > ul > li {
    float: none;
    display: block;
  }
  #cssmenu ul ul li a {
    padding: 20px 20px 20px 30px;
    font-size: 12px;
    color: #000000;
    background: none;
  }
  #cssmenu ul ul li:hover > a,
  #cssmenu ul ul li a:hover {
    color: #dddddd;
  }
  #cssmenu ul ul ul li a {
    padding-left: 40px;
  }
  #cssmenu ul ul,
  #cssmenu ul ul ul {
    position: relative;
    left: 0;
    right: auto;
    width: 100%;
    margin: 0;
  }
  #cssmenu > ul > li.has-sub > a::after,
  #cssmenu ul ul li.has-sub > a::after {
    display: none;
  }
  #menu-line {
    display: none;
  }
  #cssmenu #menu-button {
    display: block;
    padding: 20px;
    color: #000000;
    cursor: pointer;
    font-size: 12px;
    text-transform: uppercase;
  }
  #cssmenu #menu-button::after {
    content: '';
    position: absolute;
    top: 20px;
    right: 20px;
    display: block;
    width: 15px;
    height: 2px;
    background: #000000;
  }
  #cssmenu #menu-button::before {
    content: '';
    position: absolute;
    top: 25px;
    right: 20px;
    display: block;
    width: 15px;
    height: 3px;
    border-top: 2px solid #000000;
    border-bottom: 2px solid #000000;
  }
  #cssmenu .submenu-button {
    position: absolute;
    z-index: 10;
    right: 0;
    top: 0;
    display: block;
    border-left: 1px solid rgba(120, 120, 120, 0.15);
    height: 52px;
    width: 52px;
    cursor: pointer;
  }
  #cssmenu .submenu-button::after {
    content: '';
    position: absolute;
    top: 21px;
    left: 26px;
    display: block;
    width: 1px;
    height: 11px;
    background: #000000;
    z-index: 99;
  }
  #cssmenu .submenu-button::before {
    content: '';
    position: absolute;
    left: 21px;
    top: 26px;
    display: block;
    width: 11px;
    height: 1px;
    background: #000000;
    z-index: 99;
  }
  #cssmenu .submenu-button.submenu-opened:after {
    display: none;
  }
}



#header{
width:100%;
height:100px;
background-image:url('../images/index_bg.png');
background-repeat:no-repeat;
background-position:center -370px;
background-color:rgb(0, 102, 153);
}
.page_cont{
width:70% !important;margin-left:15% !important;margin-right:15% !important;margin-top:2% !important;margin-bottom:2% !important;
}
h2, h3 {
font-size: 1.2em;
padding: 1.25em 0;
}
h1, h2, h3 {
margin-top: 0;
margin-bottom: 0;
}
table {
border-collapse: collapse !important;
border-spacing: 0 !important;
color:#222;
}
td {
vertical-align: top;
}
.box {
display: inline-block;
border-radius: 2px;
//border: 1px solid #b9b9b9;
box-shadow: 0 1px 0px rgba(0,0,0,0.11);
}

.box:before, .box:after {
content: "";
display: table;
}

.box:after {
clear: both;
}

.box .top_header {
position: relative;
//background: linear-gradient(#FFFFFF,#EFECEC);
background: rgb(14, 57, 85);
//box-shadow: inset 0 1px 0 #fff,
//0 1px 2px rgba(0,0,0,0.02);
border-radius: 5px 5px 0 0;
color:#fff;
text-shadow: rgb(0, 0, 0) 0px 1px;
text-transform:uppercase;
}

.box .top_header h2 {
padding: 10px;
border-bottom: 1px solid #0E3955;
background-repeat: no-repeat;
background-position: 8px 50%;
}
.box .top_header h2 img{
margin-right:5px;
}

.box .top_header .icon {
display: inline-block;
float: left;

height: 16px;
width: 16px;
font-size: 16px;
line-height: 16px;

cursor: default;

margin-right: 10px;
margin-left: 2px;

text-align: center;
}

.box .content {
padding: 10px;
background: rgb(11, 99, 149);
border-radius: 0 0 5px 5px;
}

.box .content:before, .box .content:after {
content: "";
display: table;
}

.box .content:after {
clear: both;
}

.spacer {
padding: 10px;
}

button, input[type=button], input[type=submit], a.button, .ui-button.ui-state-default:not(.ui-spinner-button) {
margin:5px;
color:#fff;
cursor:pointer;
font-size:1em;
text-transform:uppercase;
line-height:1;
box-shadow: rgba(0, 0, 0, 0.298039) 0px 3px 0px 1px;
background:rgb(15, 125, 188);
border-color: rgb(42, 156, 222);
border-radius: 5px;
border-width: 2px;
border-style:solid;
padding: 2%;
outline:0;
}

/* Blue button:hover */
button:hover, input[type=button]:hover, input[type=submit]:hover, a.button:hover, .ui-button.ui-state-hover:not(.ui-spinner-button) {
background-color:#2a9cde;border-color:#53bdf9
}

/* Blue button:clicked */
button:hover:active, input[type=button]:hover:active, input[type=submit]:hover:active, a.button:hover:active, .ui-button.ui-state-hover.ui-state-active:not(.ui-spinner-button) {
background-color:#084d74;border-color:#1e7b9e;box-shadow:0 1px 0 1px rgba(0,0,0,.3);-webkit-transform:translate(0,2px);-ms-transform:translate(0,2px);transform:translate(0,2px)
}



input[type=text], input[type=password], input[type=date], input[type=datetime], input[type=time], textarea:not(.editor) {
padding: 5px;
margin:5px;
box-shadow: inset 0 1px 1px rgba(0,0,0,0.22);
border-radius: 5px;
border: 3px solid;
border-color: rgb(39, 93, 142);
background-color: rgb(204, 216, 223);
-webkit-transition: all 0.1s ease-in-out;
-moz-transition: all 0.1s ease-in-out;
-o-transition: all 0.1s ease-in-out;
-ms-transition: all 0.1s ease-in-out;
transition: all 0.1s ease-in-out;
}
input, textarea {
outline: none;
}
button, input {
line-height: normal;
}
button, input, select, textarea {
font-size: 100%;
margin: 0;
vertical-align: baseline;
}
body, button, input, select, textarea {
font-family: sans-serif;
color: #222;
}
::selection {
background: #264061;
color: #fff;
text-shadow: none;
}
#logo{
width:50%;
min-height:45px;
background-image:url('../images/logo.gif');
background-repeat:no-repeat;
position: absolute;
top: 50px;
left: 30px;
}
#footer{
margin-top:20px;
}
iframe{
border:0;
ouline:0;
}
.float_left{
float:left;
}
.float_right{
float:right;
}
#us_cont{
width:4em;
background-color:rgb(14, 57, 85);
border-radius:5px;
height:7em;
background-repeat:no-repeat;
background-position:center;
}
.info_box{
margin-bottom: 5px;
border-radius: 5px;
border: 1px solid #2A9CDE;
color: #fff;
background-color: #0E3955;
padding: 5px;
}
.credits_box{
background-image:url('../images/credits_icon.gif');
background-repeat:no-repeat;
background-position:3px;
padding:5px 5px 5px 30px;
margin-top: 5px;
border-radius: 5px;
border: 1px solid #2A9CDE;
color: #fff;
background-color: #0E3955;
}
.emes_box{
background-image:url('../images/emes_icon.png');
background-repeat:no-repeat;
background-position:3px;
padding:5px 5px 5px 30px;
margin-top: 5px;
border-radius: 5px;
border: 1px solid #2A9CDE;
color: #fff;
background-color: #0E3955;
}
a{
color:#fff;
text-decoration:none;
}
a:hover{
text-decoration:underline;
}
a.no_decoration:hover{
text-decoration:none;
}
.list_dark{
padding: 3px;
border-bottom: 2px solid #0e3955;
word-wrap:break-word;
color:#fff;
}
.list_light{
padding: 3px;
border-bottom: 2px solid #2A9CDE;
word-wrap:break-word;
color:#fff;
}
#news_image{
background-size:cover;
background-repeat:no-repeat;
background-position:center;
width:100%;
height:4em;
}
#user_image{
border-radius:50%;
border: 1px solid #474748;
border-radius: 50%;
width: 60px;
height: 60px;
background-repeat:no-repeat;
background-position: -41px -60px;
}
.news_info{
color:#F3ECEC;
word-wrap:break-word;
padding: 3px;
border-bottom: 2px solid #2A9CDE;
font-size:13px;
text-align:right;
}
.news_text{
font-size:15px;
color:#fff;
padding:3px;
margin-top:3px;
word-wrap:break-word;
}
