/**
 * Created By LeCs.
 * Date: 30/01/2016 16:32
 * LSyS
 */

function showError(id){
    val = id.split(':-:');
    if(val[0] == 'set_pass_error'){
        document.getElementById('oldpassword').style.borderColor = '#ae1a50';
    } else if(val[0] == 'set_pass_dm'){
        document.getElementById('password').style.borderColor = '#ae1a50';
        document.getElementById('password1').style.borderColor = '#ae1a50';
    } else if(val[0] == 'set_inv_mail'){
        document.getElementById('email').style.borderColor = '#ae1a50';
    }
    alert(val[1]);
}

function change_password(){
    var oldpassword = document.getElementById('oldpassword').value;
    var password = document.getElementById('password').value;
    var password1 = document.getElementById('password1').value;
    if(oldpassword == '' || password == '' || password1 == ''){
        if(oldpassword == '') {
            document.getElementById('oldpassword').style.borderColor = '#ae1a50';
        }
        if(password == '') {
            document.getElementById('password').style.borderColor = '#ae1a50';
        }
        if(password1 == '') {
            document.getElementById('password1').style.borderColor = '#ae1a50';
        }
    }else{
        if(window.XMLHttpRequest){
            xmlReqLogin = new XMLHttpRequest();
        }else{
            xmlReqLogin = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlReqLogin.open("POST", 'inc/temi/hopeworld/ajax/impostazioni/password.php', true);
        xmlReqLogin.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
        xmlReqLogin.onreadystatechange = function(){
            if(xmlReqLogin.readyState == 4 && xmlReqLogin.status == 200){
                var response = xmlReqLogin.responseText;
                if(response.split(':-:')[0] != 'DONE'){
                    showError(response);
                }else{
                    alert(response.split(':-:')[1]);
                    window.location.href = 'esci.php';
                }
            }
        };
        xmlReqLogin.send('oldpassword='+oldpassword+'&password='+password+'&password1='+password1);
    }
}

function change_email(){
    var email = document.getElementById('email').value;
    if(email == ''){
        document.getElementById('email').style.borderColor = '#ae1a50';
    }else{
        if(window.XMLHttpRequest){
            xmlReqLogin = new XMLHttpRequest();
        }else{
            xmlReqLogin = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlReqLogin.open("POST", 'inc/temi/hopeworld/ajax/impostazioni/email.php', true);
        xmlReqLogin.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
        xmlReqLogin.onreadystatechange = function(){
            if(xmlReqLogin.readyState == 4 && xmlReqLogin.status == 200){
                var response = xmlReqLogin.responseText;
                if(response.split(':-:')[0] != 'DONE'){
                    showError(response);
                }else{
                    alert(response.split(':-:')[1]);
                    window.location.href = 'me.php';
                }
            }
        };
        xmlReqLogin.send('email='+email);
    }
}