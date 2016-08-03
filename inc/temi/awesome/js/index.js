/**
 * Created By LeCs.
 * Date: 31/07/2016 17:30
 * #LFG
 * LSyS
 */

var main = function(){
    $('.text-input').focus(function(){
        $(this).addClass('selected');
    });
    $('.text-input').blur(function(){
       $(this).removeClass('selected');
    });
    $('.login-input').keyup(function(){
        if(event.which == 13){
            doLogin();
        }
    });
    $('.register-input').keyup(function(){
        if(event.which == 13){
            doRegister();
        }
    });
    $('.login-btn').click(function(){
        doLogin();
    });
    $('.register-btn').click(function(){
        doRegister();
    });
};

var doLogin = function(){
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    if(username == '' || password == ''){
        showError("compilation_error");
    }else{
        if(window.XMLHttpRequest){
            xmlReqLogin = new XMLHttpRequest();
        }else{
            xmlReqLogin = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlReqLogin.open("POST", 'inc/temi/jfl/ajax/index/login.php', true);
        xmlReqLogin.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
        xmlReqLogin.onreadystatechange = function(){
            if(xmlReqLogin.readyState == 4 && xmlReqLogin.status == 200){
                var response = xmlReqLogin.responseText;
                if(response != 'DONE'){
                    showError(response);
                }else{
                    window.location.href = 'me.php';
                }
            }
        };
        xmlReqLogin.send('username='+username+'&password='+password);
    }
};

var doRegister = function(){
    var username = document.getElementById('reg_username').value;
    var password = document.getElementById('reg_password').value;
    var password1 = document.getElementById('reg_password1').value;
    var email = document.getElementById('reg_mail').value;
    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
    if(username == '' || password == '' || password1 == '' || email == ''){
        showError('compilation_error');
    }else if(password != password1){
        showError('register_pw_dm');
    }else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
        showError('register_inv_mail');
    }else{
        if(window.XMLHttpRequest){
            xmlReqRegister = new XMLHttpRequest();
        }else{
            xmlReqRegister = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlReqRegister.open("POST", 'inc/temi/jfl/ajax/index/registrazione.php', true);
        xmlReqRegister.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
        xmlReqRegister.onreadystatechange = function(){
            if(xmlReqRegister.readyState == 4 && xmlReqRegister.status == 200){
                var response = xmlReqRegister.responseText;
                if(response != 'DONE'){
                    showError(response);
                }else{
                    window.location.href = 'me.php';
                }
            }
        };
        xmlReqRegister.send('username='+username+'&password='+password+'&mail='+email);
    }
};

var showError = function(id){
    if(id.indexOf('login_us_banned:-:') != -1){
        var text = document.getElementById('login_us_banned').innerHTML;
        document.getElementById('login_us_banned').innerHTML = text + id.split(':-:')[1];
        $('#errors').slideDown('slow');
        document.getElementById('login_us_banned').style.visibility = 'visible';
        setTimeout(function () {
            $('#errors').slideUp('fast');
            document.getElementById('login_us_banned').style.visibility = 'hidden';
        }, 3000);
    } else if(id.indexOf('login_us_notreg') != -1){
        $('#errors').slideDown('slow');
        document.getElementById(id).style.visibility = 'visible';
        setTimeout(function () {
            $('#errors').slideUp('fast');
            document.getElementById(id).style.visibility = 'hidden';
        }, 3000);
    } else if(id.indexOf('login_pass_error') != -1){
        $('#errors').slideDown('slow');
        document.getElementById(id).style.visibility = 'visible';
        setTimeout(function () {
            $('#errors').slideUp('fast');
            document.getElementById(id).style.visibility = 'hidden';
        }, 3000);
    } else if(id.indexOf('register_us_tkn') != -1 || id.indexOf('register_us_char') != -1){
        $('#errors').slideDown('slow');
        document.getElementById(id).style.visibility = 'visible';
        setTimeout(function () {
            $('#errors').slideUp('fast');
            document.getElementById(id).style.visibility = 'hidden';
        }, 3000);
    } else if(id.indexOf('register_pw_ts') != -1){
        $('#errors').slideDown('slow');
        document.getElementById(id).style.visibility = 'visible';
        setTimeout(function () {
            $('#errors').slideUp('fast');
            document.getElementById(id).style.visibility = 'hidden';
        }, 3000);
    } else {
        $('#errors').slideDown('slow');
        document.getElementById(id).style.visibility = 'visible';
        setTimeout(function () {
            $('#errors').slideUp('fast');
            document.getElementById(id).style.visibility = 'hidden';
        }, 3000);
    }
};

$(document).ready(main);