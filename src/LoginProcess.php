<?php

session_start();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'testdb');

//if login is clicked
if (isset($_POST['email'])) {

    $email = $_POST['email'];
    $pwd   =  $_POST['pwd'];

    //match with db
    $query = "select * from users where email='$email' AND pwd='$pwd'";
    $result = mysqli_query($db, $query);//$query checks database testdb($db is connection) and store result in $result
    $count = mysqli_num_rows($result);//no of rows found in database

    if($count == 1) { //user found

        //create session id for found user
        $session_id = session_id();
        $_SESSION['auth'] = $session_id;//storing created session id in session variable
        /*Logged in user will get this session id.On every page of user,check this session id
         is set else redirect him to login page.Simply it means that a user cann't access his files
         without login.Restricting user from accessing pages without login */

        $logged_in_user = mysqli_fetch_assoc($result);

        //As user is logged-in, setting his status to active by getting user id
        $id = $logged_in_user['id'];
        $sql = "UPDATE users SET status='active' WHERE id = $id";
        mysqli_query($db, $sql);

        $_SESSION['user'] = $logged_in_user; //array that contains entire looged-in user details
        $_SESSION['success'] = "You are logged in";
        unset($_SESSION['success']);

        //check if user is admin or user and redirect to specific page
        if($logged_in_user['role'] == 'admin') {
            header('location: Admin.php');
        }else {
            header('location: User.php');
        }
    }else {
        $_SESSION['error'] = "Email or password entered was incorrect !";
        header('location: Login.php');
    }
}
?>