<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 23/01/2016 09:30
 * LSyS - index.php
 */

header("Content-type: text/css");
?>
body{
margin:0;
font-family: 'Ubuntu Condensed', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif !important;
//font-family: Verdana, Arial, Helvetica, sans-serif !important;
background-color:#134B77;
background-image:url('../images/index_bg.png');
background-repeat:no-repeat;
background-position:bottom right;
//word-wrap:break-word !important;
}
.page_cont{
width:70%;margin-left:15%;margin-right:15%;height:75%;margin-top:5%;margin-bottom:5%;
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
background: rgb(11, 99, 149);
//box-shadow: inset 0 1px 0 #fff,
//0 1px 2px rgba(0,0,0,0.02);
border-radius: 5px 5px 0 0;
color:#fff;
text-shadow: rgb(0, 0, 0) 0px 1px;
text-transform:uppercase;
}

.box .top_header h2 {
padding: 10px;
width:80%;
border-bottom: 1px solid #c0c8d0;
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
#online_count{
background-color:#fff;
border:1px solid #000;
border-radius:5px;
padding:5px;
width:50%;
text-align:center;
word-wrap:break-word !important;
float:right;
}
#logo{
width:113%;
min-height:45px;
background-image:url('../images/logo.gif');
background-repeat:no-repeat;
}
#errors{
width:100%;
height:30px;
position:absolute;
top:0;
left:0;
display:none;
color:#fff;
text-align:center;
line-height:30px;
background-color:#FF3939;
border: solid #B12323;
border-width: 0 0 3px 0;
}
#compilation_error{
width:100%;
position:absolute;
top:0;
left:0;
visibility:hidden;
}
#connect_error{
width:100%;
position:absolute;
top:0;
left:0;
visibility:hidden;
}
#login_us_notreg{
width:100%;
position:absolute;
top:0;
left:0;
visibility:hidden;
}
#login_pass_error{
width:100%;
position:absolute;
top:0;
left:0;
visibility:hidden;
}
#login_us_banned{
width:100%;
position:absolute;
top:0;
left:0;
visibility:hidden;
}
#register_us_tkn{
width:100%;
position:absolute;
top:0;
left:0;
visibility:hidden;
}
#register_us_char{
width:100%;
position:absolute;
top:0;
left:0;
visibility:hidden;
}
#register_pw_ts{
width:100%;
position:absolute;
top:0;
left:0;
visibility:hidden;
}
#register_pw_dm{
width:100%;
position:absolute;
top:0;
left:0;
visibility:hidden;
}
#register_inv_mail{
width:100%;
position:absolute;
top:0;
left:0;
visibility:hidden;
}
#register_clone{
width:100%;
position:absolute;
top:0;
left:0;
visibility:hidden;
}
.box .content.register_bg{
background-image:url('../images/registerbg.png');
}
.box .content.login_bg{
background-image:url('../images/loginbg.png');
background-repeat: no-repeat;
background-position: bottom right;
}