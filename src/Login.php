<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BootStrap CSS CDN, font-awesome cdn and CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--jquery cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="bg-info">
    <h1 class="text-center text-primary">LOGIN</h1><br>
    <form action="LoginProcess.php" method="POST" name="login">
        <div class="col-md-4 col-md-offset-4">
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="pwd" class="form-control"placeholder="Enter Password" required>
            </div>
            <input type="submit" class="btn btn-primary"name="submit" value="Login"> 
        </div>
    </form>
    <div class="col-md-4"></div>
<?php
if(isset($_SESSION['error']))
{
    echo "<h2>".$_SESSION['error']."</h2>";
    unset($_SESSION['error']);//session_destroy();destroys wole session
}
if(isset($_SESSION['success']))
{
    echo "<h2>".$_SESSION['success']."</h2>";
    //unset($_SESSION['success']);
    session_destroy();
}
?>
</body>
</html>