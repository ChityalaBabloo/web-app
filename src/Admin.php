<?php
include('auth.php');
//$user = $_SESSION['user']['profile'];
//echo "i am admin ".$_SESSION['user']['name'];//.$user;
$query = "SELECT * from alert where status='unread'";
$result = mysqli_query($db, $query);
$count = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.1.0/css/all.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/Admin.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../js/main.js"></script>
</head>
<body>
  <!-- Including Header -->
  <?php include('header.php')?>
  <!-- End of Header -->
  <!-- side navbar -->
  <div class="side-navbar" id="mySidenav">
    <div class="sidenav-header">
      <span><strong>Menu</strong></span>
    </div>
    <ul class="list-unstyled">
      <li><a href="#Users-List"><i class="far fa-users"></i>Users List</a></li>
      <li><a href="#Charts"><i class="far fa-chart-bar"></i>Charts</a></li>
      <li><a href="#Notification" role="button" data-toggle="collapse" data-target="#demo"><i class="far fa-bell"></i> Notification</a>
        <ul id="demo" class="collapse">
          <li><a href="#RegisterAlert">Registration Alert<span style="display:inline-block;width:10px"></span><strong class="notify"><?php echo $count ?></strong></span></a></li>
        </ul>
      </li>
      <li><a href="#Edit-Profile"><i class="far fa-user-edit"></i>Edit Profile</a></li>
    </ul>
  </div>
  <div id="Users-List" class="tab-content">
    <h1>Users List
    <input id="myInput" type="text" placeholder="Search.." class="form-control hidden-print " align="right" style="width:20%;float:right">
    </h1>
    <!-- userslist included -->
    <?PHP include('userslist.php') ?>
  </div>
  <div id="Charts" class="tab-content">
    <h1>Charts</h1>
    <!-- Charts included -->
    <?PHP include('charts.php') ?>
  </div>
  <div id="Notification" class="tab-content">
    <h1 class="text-center">Feedback Section</h1>
    <!-- Notification included -->
    <?PHP include('Notification.php') ?>
  </div>
  <div id="RegisterAlert" class="tab-content">
    <h1>Registration Alert</h1>
    <!-- Registration Alert included -->
    <?PHP include('RegisterAlert.php') ?>
  </div>
  <div id="Edit-Profile" class="tab-content">
    <h1>Edit-Profile</h1>
    <!-- Edit-Profile included -->
    <?PHP include('Edit-Profile.php') ?>
  </div>
</body>
</html>