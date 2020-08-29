function fill(input) {
    var name_update  = document.getElementById("name_update");
    var desig_update = document.getElementById("desig_update");
    var phone_update = document.getElementById("phone_update");
    var email_update = document.getElementById("email_update");
    var pwd_update   = document.getElementById("pwd_update");
    var reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    
    if(name_update.value.length<3)
    {
        //red border
        name_update.style.borderColor = "red";   
    }
    else if(phone_update.value.length!=10) 
    {
        phone_update.style.borderColor = "red";
    } 
    else if(isNaN(phone_update.value)) 
    {
        phone_update.style.borderColor = "red";
    }
    else if(desig_update.value.length<2) 
    {
        desig_update.style.borderColor = "red";
    }
    else if (input.type == "email") 
    {
        console.log("this is an email_update type");
        if (reg.test(email_update.value)) {//if in proper format
            
            email_update.style.borderColor = "#2ecc71";
        } else {
            //red border
            email_update.style.borderColor = "red";
        }
    }
    else if(pwd_update.value.length<8)
    {
        pwd_update.style.borderColor="red";
    }
    else
    {
        //green border
        input.style.borderColor = "#2ecc71";
    }
}
