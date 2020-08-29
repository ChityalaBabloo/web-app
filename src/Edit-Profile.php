<?php
$query = "select * from users where id= $id";
$res = mysqli_query($db, $query);
$val = mysqli_fetch_assoc($res);
//print_r($val);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <script src="../js/Edit-Profile.js"></script>
</head>
<body>
    <div class="col-lg-6">
        <form method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name_update" name="name_update"onblur="fill(this)" value="<?php echo $val['name']?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email_update" name="email_update" onblur="fill(this)" value="<?php echo $val['email']?>">
            </div>
            <div class="form-group">
                <label for="pwd">Password</label>
                <input type="password" class="form-control" id="pwd_update" name="pwd_update" onblur="fill(this)" value="<?php echo $val['pwd']?>">
            </div>
            <div class="form-group">
                <label for="desig">Designation</label>
                <input type="text" class="form-control" id="desig_update" name="desig_update" onblur="fill(this)" value="<?php echo $val['desig']?>">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone_update" name="phone_update" onblur="fill(this)" value="<?php echo $val['phone']?>">
            </div>
            <button type="submit" name="update" class="btn btn-default btn-success">Update</button>
        </form>
    </div>
</body>
</html>
<?php
if(isset($_POST['update']))
{
    $id = $_SESSION['user']['id'];
    $name = $_POST['name_update'];
    $email = $_POST['email_update'];
    $phone = $_POST['phone_update'];
    $desig = $_POST['desig_update'];
    $pwd = $_POST['pwd_update'];
    $reg  = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
    $fail = "Data uploading failed !";

    if(strlen($name)<3)
    {
        echo "<h4 class='text-warning'>$fail<br>Enter name with min 3 characters.</h4>";
        return false;
    }
    if(!preg_match($reg, $email))
    {
        echo "<h4 class='text-warning'>$fail<br>Enter email in proper format.</h4>";
        return false;
    }
    if(strlen($pwd)<8)
    {
        echo "<h4 class='text-warning'>$fail<br>Enter password with min 8 characters.</h4>";
        return false;
    }
    if(strlen($desig)<2)
    {
        echo "<h4 class='text-warning'>$fail<br>Enter Designation with min 2 characters.</h4>";
        return false;
    }
    if(preg_match("/[^0-9]$/", $phone))
    {
        echo "<h4 class='text-warning'>$fail<br>Enter only digits in Phone.</h4>";
        return false;
    }
    if(strlen($phone)!=10)
    {
        echo "<h4 class='text-warning'>$fail<br>Please enter a 10 digit number.</h4>";
        return false;
    }
    else{
    //update to database
    $sql = "UPDATE users SET name='$name', email='$email', pwd='$pwd',phone='$phone', desig='$desig' WHERE id = '$id'";
    $result = mysqli_query($db, $sql);
    if($result){
        echo "<h4 class='text-success'>Data Updated Successfully !</h4>";
        if($_SESSION['user']['role']=='user')
        {
            header('Refresh: 0');
        }
    }
}
}
?>
