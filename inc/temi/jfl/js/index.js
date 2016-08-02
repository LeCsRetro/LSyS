/**
 * Created By LeCs.
 * Date: 23/01/2016 10:03
 * LSyS
 */

function showError(id){
    if(id.indexOf('login_us_banned:-:') != -1){
        var text = document.getElementById('login_us_banned').innerHTML;
        document.getElementById('login_us_banned').innerHTML = text + id.split(':-:')[1];
        $('#errors').slideDown('slow');
        document.getElementById('login_us_banned').style.visibility = 'visible';
        document.getElementById('username').style.borderColor = '#ae1a50';
        setTimeout(function () {
            $('#errors').slideUp('fast');
            document.getElementById('login_us_banned').style.visibility = 'hidden';
        }, 3000);
    } else if(id.indexOf('login_us_notreg') != -1){
        $('#errors').slideDown('slow');
        document.getElementById(id).style.visibility = 'visible';
        document.getElementById('username').style.borderColor = '#ae1a50';
        setTimeout(function () {
            $('#errors').slideUp('fast');
            document.getElementById(id).style.visibility = 'hidden';
        }, 3000);
    } else if(id.indexOf('login_pass_error') != -1){
        $('#errors').slideDown('slow');
        document.getElementById(id).style.visibility = 'visible';
        document.getElementById('password').style.borderColor = '#ae1a50';
        setTimeout(function () {
            $('#errors').slideUp('fast');
            document.getElementById(id).style.visibility = 'hidden';
        }, 3000);
    } else if(id.indexOf('register_us_tkn') != -1 || id.indexOf('register_us_char') != -1){
        $('#errors').slideDown('slow');
        document.getElementById(id).style.visibility = 'visible';
        document.getElementById('reg_username').style.borderColor = '#ae1a50';
        setTimeout(function () {
            $('#errors').slideUp('fast');
            document.getElementById(id).style.visibility = 'hidden';
        }, 3000);
    } else if(id.indexOf('register_pw_ts') != -1){
        $('#errors').slideDown('slow');
        document.getElementById(id).style.visibility = 'visible';
        document.getElementById('reg_password').style.borderColor = '#ae1a50';
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
}

function do_login(){
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    if(username == '' || password == ''){
        if(username == '') {
            document.getElementById('username').style.borderColor = '#ae1a50';
        }
        if(password == '') {
            document.getElementById('password').style.borderColor = '#ae1a50';
        }
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
}

function doRegister(){
    var username = document.getElementById('reg_username').value;
    var password = document.getElementById('reg_password').value;
    var password1 = document.getElementById('reg_password1').value;
    var email = document.getElementById('reg_mail').value;
    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
    if(username == '' || password == '' || password1 == '' || email == ''){
        if(username == ''){
            document.getElementById('reg_username').style.borderColor = '#ae1a50';
        }
        if(password == ''){
            document.getElementById('reg_password').style.borderColor = '#ae1a50';
        }
        if(password1 == ''){
            document.getElementById('reg_password1').style.borderColor = '#ae1a50';
        }
        if(email == ''){
            document.getElementById('reg_mail').style.borderColor = '#ae1a50';
        }
        showError('compilation_error');
    }else if(password != password1){
        showError('register_pw_dm');
        document.getElementById('reg_password').style.borderColor = '#ae1a50';
        document.getElementById('reg_password1').style.borderColor = '#ae1a50';
    }else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
        showError('register_inv_mail');
        document.getElementById('reg_mail').style.borderColor = '#ae1a50';
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
}

function showLogin(){
    $('#register').fadeOut('slow');
    $('#logo').fadeOut('slow');
    $('#online_count').fadeOut('slow');
    $('#footer').fadeOut('slow');
    setTimeout(function(){
        $('#login').fadeIn('slow');
        $('#logo').fadeIn('slow');
        $('#online_count').fadeIn('slow');
        $('#footer').fadeIn('slow');
    },800);
}

function showRegister(){
    $('#login').fadeOut('slow');
    $('#logo').fadeOut('slow');
    $('#online_count').fadeOut('slow');
    $('#footer').fadeOut('slow');
    setTimeout(function(){
        $('#register').fadeIn('slow');
        $('#logo').fadeIn('slow');
        $('#online_count').fadeIn('slow');
        $('#footer').fadeIn('slow');
    },800);
}
