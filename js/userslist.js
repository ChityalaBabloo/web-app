$(document).ready(function(){
    $(document).on('click','a[data-role=update]',function(){
        //alert($(this).data('id'));

        //saving user information in variables
        var id = $(this).data('id');
        var name  = $('#'+id).children('td[data-target=name]').text();
        var email = $('#'+id).children('td[data-target=email]').text();
        var phone = $('#'+id).children('td[data-target=phone]').text();
        var desig = $('#'+id).children('td[data-target=desig]').text();
        
        //Now append this values to input fields
        $('#name').val(name);
        $('#email').val(email);
        $('#phone').val(phone);
        $('#desig').val(desig);
        $('#hidden_user_id').val(id);
        $('#myModal').modal('toggle');
    });
    //create event to get data from fields and update in database
    $('#save').click(function(){
        var id = $('#hidden_user_id').val();
        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();  
        var desig = $('#desig').val();
        var reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        
        if(name.length<3 || phone.length!=10 || isNaN(phone) || desig.length<2 || !(reg.test(email))){
            alert("Please Re-Enter Red boxes");
        }else{
        $.ajax({
            url     : 'update.php',
            method  : 'post',
            data    : {name: name, email: email, phone: phone, desig: desig,id: id},
            success : function(response){
                //now update user record in table //console.log(response);
                $('#'+id).children('td[data-target=name]').text(name);
                $('#'+id).children('td[data-target=email]').text(email);
                $('#'+id).children('td[data-target=phone]').text(phone);
                $('#'+id).children('td[data-target=desig]').text(desig);
                $('#myModal').modal('toggle');
            }
        });}
    });
    //click on email icon
    $('.fa-envelope').click(function(){
        var id = $(this).data('id');
        $.ajax({
            url:'email.php?id='+id,
            cache:false,
            success:function(result){
                $('.myEmail').html(result);
            }
        });
    })
    //search
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#usertable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
//onblur function
function requiredField(input) {
    var name = document.getElementById("name");
    var desig = document.getElementById("desig");
    var phone = document.getElementById("phone");
    var email = document.getElementById("email");
    var reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if(name.value.length<3)
    {
        //red border
        name.style.borderColor = "red";

    }
    else if(phone.value.length!=10) 
    {
        phone.style.borderColor = "red";
    } 
    else if(isNaN(phone.value)) 
    {
        phone.style.borderColor = "red";
    }
    else if(desig.value.length<2) 
    {
        desig.style.borderColor = "red";
    }
    else if (input.type == "email") 
    {
        console.log("this is an email type");
        if (reg.test(email.value)) {//if in proper format
            
            email.style.borderColor = "lightgreen";
        } else {
            //red border
            email.style.borderColor = "red";
        }
    }
    else
    {
        //green border
        input.style.borderColor = "#2ecc71";
    }
}
function prnt()
{
    var print = confirm("To Print Table....Press OK");
    if(print == true){ 
        window.print();
    }
}
function mai()
{
    var a = confirm("Are You Sure...Then Press OK");
    if(a==true){
        var id = document.getElementById('sendmail').getAttribute('data-id');
        $.ajax({
            url:'SendMail.php?id='+id,
            cache:false,
            success:function(result){
                document.write(result);
                setTimeout("location.href = 'Admin.php'",5000);
            }
        });
    }
}