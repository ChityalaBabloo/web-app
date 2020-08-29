<?php
include('auth.php');

if(isset($_POST['email']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desig = $_POST['desig'];

    //update to database
    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone', desig='$desig' WHERE id = '$id'";
    $result = mysqli_query($db, $sql);
    if($result){
        echo 'Data Updated';
        $_SESSION['user']['name'] = $name;
    }else{
        echo 'Data uploading failed !';
    }
}
?>
