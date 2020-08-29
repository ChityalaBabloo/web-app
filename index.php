<!--To run in browser press CTRL+SHIFT+B -->
<?php include('src/indexProcess.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BootStrap CSS CDN, font-awesome cdn and CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <!--jquery cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/myscript.js"></script>
</head>
<body>
    <div class="content">
        <h1>SignUp Form</h1>
        <div class="main-content">
            <div class="form"> 
                <form action="index.php" method="POST" onsubmit="return validation()" name="form" enctype="multipart/form-data">
                    <input class="text name" type="text" name="name"  placeholder="Name" autocomplete="off" onkeyup="showHint(this.value)">
                    <span id="name" class="info"> </span><p>Suggestions: <span id="txtHint"></span></p>
                    <input class="text email" type="email" name="email" placeholder="Email" autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" onblur="checkMail()">
                    <span id="email" class=" info"> </span>
                    <input class="text" type="password" name="pwd" placeholder="Password">
                    <span id="pwd" class=" info"> </span>
                    <input class="text" type="password" name="cpwd" placeholder="Confirm Password">
                    <span id="cpwd" class=" info"> </span>
                    <div class="profile">
                        <label class="col-md-5 col-xs-6">Select profile image :</label>   
                        <input class="col-md-7 col-xs-6" type="file" name="profile">
                    </div>
                    <select class="text" name="gender" id="gender" autocomplete="off">
                        <option value="" hidden>Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <input class="text" type="text" name="phone" placeholder="Phone Number" autocomplete="off"> 
                    <span id="phone" class=" info"> </span>
                    <input class="text" type="text" name="desig" placeholder="Designation" autocomplete="off">
                    <select class="text" name="role" id="role" autocomplete="off">
                        <option value="" hidden>Role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                    <input type="submit" value="SIGNUP" name="register">
                </form>
                <p>Have an Account already? click here to<a href="src/Login.php"> Login</a></p>
            </div>
        </div>
    </div>   
</body>
</html>