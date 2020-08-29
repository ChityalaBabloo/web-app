function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "src/gethint.php?q="+str, true);
        xmlhttp.send();
    }
}
function validation() {
    var name = document.form.name.value;
    var email = document.form.email.value;
    var pwd = document.form.pwd.value;
    var cpwd = document.form.cpwd.value;
    var profile = document.form.profile.value;
    var gender = document.form.gender.value;
    var phone = document.form.phone.value;
    var desig = document.form.desig.value;
    var role = document.form.role.value;


    if( name == "" ){
        alert("Please Enter name");
        return false;
    }
    if(name.length < 3) {
        document.getElementById('name').innerHTML = " Name should contain min 3 characters";
        return false;
    }

    if(!isNaN(name)){
        document.getElementById('name').innerHTML = "  please enter character";
        return false;
    }


    if( email == "" ){
        document.getElementById('email').innerHTML = "  Enter email id ";
        return false;
    }


    if(email.indexOf('@') <= 0 && email.indexOf('.') <=0 ) {

        //email.indexOf("@") != -1 && email.indexOf(".") != -1 which means if not present
        document.getElementById('email').innerHTML = "  Enter the email id in proper format @ ";
        return false;
    }

        

    if((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.')){

        document.getElementById('email').innerHTML = " Enter email id in proper format ";
        return false;
    }
    
    
    if( pwd == "" ){
        document.getElementById('pwd').innerHTML = "  Enter the password ";
        return false;
    }

    if(pwd.length<8) {
        document.getElementById('pwd').innerHTML = " minimum 8 characters";
        return false;
    }

    if( pwd!=cpwd){
        document.getElementById('cpwd').innerHTML = " password not matching";
        return false;
    }



    if( cpwd == "" ){
        document.getElementById('cpwd').innerHTML = "  Enter the confirm paasword ";
        return false;
    }

    if( phone == "" ){
        document.getElementById('phone').innerHTML = "  Enter the mobile number ";
        return false;
    }

    if(phone.length!=10){
        document.getElementById('phone').innerHTML = "  Mobile number should be 10 digits ";
        return false;
    }
    if(isNaN(phone)){
        document.getElementById('phone').innerHTML = "  Mobile number should conatins only digits ";
        return false;
    }
}
//mail already exists function
function checkMail() {
    var email = $('.email').val();
    $.ajax({
        type:'post',
        url:'src/checkMail.php',// put your real file name 
        data:{email: email},
        success:function(msg){
                alert(msg); // your message will come here.     
        }
     });
}
