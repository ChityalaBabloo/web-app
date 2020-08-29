<?php
// connect to the database
$db = mysqli_connect('localhost','root','','testdb');
    if(!$db)
    {
        echo"connection failed";
    }
     $email = $_POST['email'];
     $sql = "SELECT * FROM users WHERE email ='$email'";
     $result = mysqli_query($db, $sql);
     $count = mysqli_num_rows($result);
     if($count!=0)
     {
         echo "Email already exists ! Please Enter another one.";
     }
     else
        echo "This doesn't exists..!!"
 ?>