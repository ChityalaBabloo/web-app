<?php
$id = $_SESSION['user']['id'];
//connect to db
$db = mysqli_connect('localhost', 'root', '', 'testdb');
$query = "select name from users where id= $id";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
?>
<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="9">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><strong>Dashboard - <?php echo $_SESSION['user']['role']?></strong></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="logout"><i class="fas fa-user"></i> <?php echo $row['name']?></a></li>
            <li><a href="Logout.php" class="logout">Logout <i class="fa fa-sign-out"></i></a></li>
        </ul>
    </div>
</nav>