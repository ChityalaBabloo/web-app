<?php
include('auth.php');
if($_POST['comment']!='')
{
    $comment = $_POST['comment'];
    $comment_by = $_SESSION['user']['email'];
    //set deafult time zone
    date_default_timezone_set('Asia/Kolkata');
    $comment_date =  date("d-m-Y h:i:s a");
    
    // File upload configuration
    $targetDir = "../images/";
    $multipleimages='';
    $allowTypes = array('jpg','png','jpeg');
    
    if(!empty(array_filter($_FILES['image']['name']))){
        foreach($_FILES['image']['name'] as $key=>$val)
        {
            // File upload path
            $fileName = basename($_FILES['image']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
            
                if(move_uploaded_file($_FILES["image"]["tmp_name"][$key], $targetFilePath)){
                    //insert the comment into database
                    $multipleimages .= $fileName.'\n';
                }else{
                    echo "There was an error uploading your file !";
                }
            }else{
                echo '<h1>Please upload image files only !</h1>';
            }
        }
        if(!empty($multipleimages))
        {
            $sql = "INSERT into comments(comment_by, comment, comment_file, comment_status, comment_date) VALUES ('$comment_by', '$comment', '$multipleimages', 'unread', '$comment_date')";
            $result = mysqli_query($db, $sql);
            if($result){
                echo 'comment posted';
            }else{
                echo "Data not inserted, Please try again";
            }  
        }
    }else {
        echo 'Please select a file to upload !';
    }
}
?>
