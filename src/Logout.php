<?php
session_start();
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'testdb');

//setting status to inactive on log out
$id = $_SESSION['user']['id'];
$sql = "UPDATE users SET status='inactive' WHERE id = $id";
mysqli_query($db, $sql);

session_destroy();
//unset($_SESSION['auth']);//$_SESSION = array(),destroy can also be used
header('location: Login.php?echo=Successfully logged out');
?>