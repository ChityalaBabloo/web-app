<?php
include('auth.php');
if($_POST['comment']!='')
{
    $comment = $_POST['comment'];
    $comment_by = $_SESSION['user']['email'];
    //set deafult time zone
    date_default_timezone_set('Asia/Kolkata');
    $comment_date =  date("d-m-Y h:i:s a");
    //insert the comment into database
    $sql = "INSERT into comments(comment_by, comment, comment_status, comment_date) VALUES ('$comment_by', '$comment', 'unread', '$comment_date')";
    $result = mysqli_query($db, $sql);
    if($result)
    {
    echo 'comment posted';
    }
}
?>
