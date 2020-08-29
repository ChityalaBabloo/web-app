<?php
    include('auth.php');
    
    $query = "SELECT * from comments Order BY id DESC";
    $result = mysqli_query($db, $query);
    $out = null;
    while($row = mysqli_fetch_array($result))
    {   
        //removing additnal new lines and spaces
        $row['comment_file'] = preg_replace("#[\s]+#", " ", $row['comment_file']);
        $files = explode(" ", $row['comment_file']);
        //print_r($files);
        if($row['comment_status']=='unread'){
        $out .='
        <div class="comment-container" style="width:90%">
            <h5><strong>'.$row['comment_by'].'</strong> Posted on '.$row['comment_date'].'</h5>
            <div class="comment unread">
                <p>'.$row['comment'].'</p>
                <div class="images">';
                foreach($files as $value)
                {
                    if($value!=null){
                        $out .= '<img src="../images/'.$value.'" class="img-responsive">';
                    }
                }
                $out .='</div>
            </div>
            <h5>Comment seen is still unseen by others</h5>
        </div><br>';
        }else{  
            $out .='
            <div class="comment-container" style="width:90%;">
                <h5><strong>'.$row['comment_by'].'</strong> Posted on '.$row['comment_date'].'</h5>
                <div class="comment read">
                <p>'.$row['comment'].'</p>
                <div class="images">';
                foreach($files as $value)
                {
                    if($value!=null){
                        $out .= '<img src="../images/'.$value.'" class="img-responsive">';
                    }
                }
                $out .='</div>
            </div>
            <h5>Comment seen is by others</h5>
            </div><br>';
        }
        if($row['comment_by']!=$_SESSION['user']['email'] && $row['comment_status']=='unread')
        {
            $sql = "UPDATE comments set comment_status = 'read' where comment_status='unread' ";
            mysqli_query($db, $sql); 
        }
    }    
    echo $out;
?>
