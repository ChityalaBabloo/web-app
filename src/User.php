<?php
include('auth.php');
//echo "i am user".$_SESSION['user']['profile'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet"href="https://pro.fontawesome.com/releases/v5.1.0/css/all.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/Admin.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../js/main.js"></script>
</head>
<body>
  <!--Header-->
  <?php include('header.php')?>
  <!-- End of Header -->
  <!-- side navbar -->
  <div class="side-navbar" id="mySidenav">
    <div class="sidenav-header">
      <span><strong>Menu</strong></span>
    </div>
    <ul class="list-unstyled">
      <li><a href="#Notification"><i class="far fa-bell"></i> Notification</a></li>
      <li><a href="#Edit-Profile"><i class="far fa-user-edit"></i>Edit Profile</a></li>
    </ul>
  </div>
  <div id="Notification" class="tab-content">
    <h2>Feedback Section</h2>
    <!-- Notification included -->
    <?PHP include('Notification.php') ?>
  </div>
  <div id="Edit-Profile" class="tab-content">
    <h1>Edit-Profile</h1>
    <!-- userslist included -->
    <?PHP include('Edit-Profile.php') ?>
  </div>
</body>