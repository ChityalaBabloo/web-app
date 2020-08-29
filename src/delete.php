<?php
 include('auth.php');

 $id = $_GET['id'];
 
 //copying details of specific user from users table to deleted_users table
 $sql = "Insert into deleted_users select * from users where id = $id ";
 print_r(mysqli_query($db, $sql));

 //delete the user with id
 $query = "Delete from users where id = $id ";
 mysqli_query($db, $query);

 //delete the user and go back to display page
 header('location: Admin.php');
?>