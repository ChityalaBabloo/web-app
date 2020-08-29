<?php

session_start();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'testdb');

//if SignUp is clicked
if (isset($_POST['register'])) {
    
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $pwd = mysqli_real_escape_string($db, $_POST['pwd']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $desig = mysqli_real_escape_string($db, $_POST['desig']);
    $role = mysqli_real_escape_string($db, $_POST['role']);
    $file = $_FILES['profile'];
    $status = "inactive";//default status for user
    
    //type of information you want to get from file.
    $fileName = $_FILES['profile']['name'];
    $fileTmpName = $_FILES['profile']['tmp_name'];
    $fileSize = $_FILES['profile']['size'];
    $fileError = $_FILES['profile']['error'];
    $fileType = $_FILES['profile']['type'];
    
    //type of file u want to allow for image
    $fileExt = explode('.',$fileName);//name of file separates before . after
    $fileActualExt = strtolower(end($fileExt));//because extension could be capital also.so conveted 
    
    //file type u want to allow should be in array
    $allowed = array('jpg', 'jpeg', 'png');
    
    //checks if $fileActualExt value exists in array.i.e.,extension type is present in array
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 100000) { 
                //creating new name for uploaded file with uniqid 
                //$fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileNameNew = strtok($email,"@").".".$fileActualExt;

                //beacuse when it is moved to folder.if other do upload file with same name it overrides
                $fileDestination = 'images/'.$fileNameNew;
                
                move_uploaded_file($fileTmpName, $fileDestination);//moving file from tmp folder to destination
                
                //save user to database
                $query = "INSERT INTO users (name, email, pwd, profile, gender, phone, desig, role, status)
                VALUES('$name', '$email', '$pwd', '$fileNameNew', '$gender', '$phone', '$desig', '$role', '$status')";
                $result = mysqli_query($db, $query);
                
                //NOTIFICATION
                if($result){
                $sql = "INSERT into alert(email,status)VALUES('$email', 'unread')";
                $res = mysqli_query($db, $sql);
                }
                if ($res) {
                    $_SESSION['success'] = "Data inserted sucessfully";
                    //registration alert
                    header('location: src/Login.php?uploaded');
                } else {
                    echo "Data not inserted, Please try again";
                }  
            } else {
                echo "File is too big to upload !";
            }
        } else {
            echo "There was an error uploading your file !";
        }
    } else {
        echo '<h1>Please upload image files only !</h1>';
    }
}     
?>