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
background-color:#000;

}

body:before{
position:fixed;
top:0;
width:100%;
height:100%;
background-image:url('../images/bg1.jpg');
background-size:cover;
background-repeat:repeat;
content:" ";
display:block;
-webkit-filter: blur(7px);
-moz-filter: blur(7px);
-o-filter: blur(7px);
-ms-filter: blur(7px);
filter: blur(7px);
z-index:-1;
}

::-webkit-input-placeholder { /* Chrome/Opera/Safari */
color: #F1EBEB;
}
::-moz-placeholder { /* Firefox 19+ */
color: #F1EBEB;
}
:-ms-input-placeholder { /* IE 10+ */
color: #F1EBEB;
}
:-moz-placeholder { /* Firefox 18- */
color: #F1EBEB;
}

.page_cont{
width:70%;
margin-left:15%;
margin-top:10%;
margin-right:15%;
height:75%;

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
color:#989898;
}
td {
//vertical-align: top;
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
background: rgb(11, 99, 149);
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
background-color: #2ADE7A;
border-color: #53F967;
border-radius: 5px;
border-width: 2px;
border-style:solid;
padding: 1%;
outline:0;
}

.register_but{
background-color: #DE4B2A !important;
border-color: #F98153 !important;
}
.register_but:hover{
background-color: #DE3B2A !important;
border-color: #F96A53 !important;
}
.register_but:active{
background-color:#742108 !important;
border-color:#9E2A1E !important;
box-shadow:0 1px 0 1px rgba(0,0,0,.3) !important;
-webkit-transform:translate(0,2px) !important;
-ms-transform:translate(0,2px) !important;
transform:translate(0,2px) !important;
}

/* Blue button:hover */
button:hover, input[type=button]:hover, input[type=submit]:hover, a.button:hover, .ui-button.ui-state-hover:not(.ui-spinner-button) {
background-color: #2ADE93;
border-color: #53F9A5;
}

/* Blue button:clicked */
button:hover:active, input[type=button]:hover:active, input[type=submit]:hover:active, a.button:hover:active, .ui-button.ui-state-hover.ui-state-active:not(.ui-spinner-button) {
background-color:#087442;border-color:#1E9E4B;box-shadow:0 1px 0 1px rgba(0,0,0,.3);-webkit-transform:translate(0,2px);-ms-transform:translate(0,2px);transform:translate(0,2px)
}



input[type=text], input[type=password], input[type=date], input[type=datetime], input[type=time], textarea:not(.editor) {
padding: 1%;
min-width:30%;
color:#fff;
font-weight:bold;
box-shadow: inset 0 1px 1px rgba(0,0,0,0.22);
background-color: rgba(255, 255, 255,0.2);
-webkit-transition: all 0.1s ease-in-out;
-moz-transition: all 0.1s ease-in-out;
-o-transition: all 0.1s ease-in-out;
-ms-transition: all 0.1s ease-in-out;
transition: all 0.1s ease-in-out;
}
.top_input{
border-radius:5px 5px 0 0;
border:solid #1CE061;
border-width:2px 2px 0 2px;
}
.bottom_input{
border-radius:0 0 5px 5px;
border:solid #1CE061;
border-width:2px;
}
.middle_input{
border:solid #1CE061;
border-width:2px 2px 0 2px;
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
background: #118439;
color: #fff;
text-shadow: none;
}
#online_count{
color:#fff;
padding:5px;
width:30%;
margin-left:34%;
text-align:right;
word-wrap:break-word !important;

}
#logo{
width: 30%;
margin-left: 35%;
min-height:45px;
background-image:url('../images/logo.png');
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
background-color: #A93C3C;
border: solid #772727;
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