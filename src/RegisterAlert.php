<?php
$query = "select * from alert where status='unread'";
$res = mysqli_query($db, $query);
$i=1;
while($val = mysqli_fetch_assoc($res))
{
    echo "<p><b>".$i.". </b> A new User with email <b>".$val['email']." </b> had Registered";
    $i++;

    //setting alert to read
    $sql = "UPDATE alert SET status='read'";
    mysqli_query($db, $sql);
}
?>