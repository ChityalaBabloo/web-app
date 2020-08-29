<?php
session_start();

// connect to the database.makes database connection on every page
$db = mysqli_connect('localhost', 'root', '', 'testdb');

//checking $_SESSION['auth'] = session_id() is set
if(!isset($_SESSION['auth']))//if session id did not set, redirect to login 
{
    header('location: Login.php');
}
//Note:place this file on every page after login to check session id is set or not
?>
