<?php
    include('auth.php');
    $id = $_GET['id'];
    //print_r($id);
    $sql = "Select * from users where id = $id";
    $res = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($res);
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/autoload.php';
    
    $mail = new PHPMailer(true);      // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 2;                               // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'Enter valid gmail id';             // SMTP username
    $mail->Password = 'Password';                         // SMTP password.Make sure this account allows less secure apps in gmail settings
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

   
    $mail->setFrom($_SESSION['user']['email'],$_SESSION['user']['name']);
    $mail->addAddress($row['email'], $row['name']);       // Add a recipient

    //headers
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'User Details';
    $body = null;
    $body .="<table style='border-collapse:collapse'>";
    foreach($row as $key=>$value) { 
        $body.= "<tr>";
            if($key != 'id' && $key !='profile' && $key != 'status')
            {
                if($key == 'pwd')
                {
                    $body.="<th style='border:1px solid #ddd;text-align:left;padding:8px'>Password</th>";
                }
                else if($key == 'desig')
                {
                    $body.="<th style='border:1px solid #ddd;text-align:left;padding:8px'>Designation</th>";
                }
                else{
                    $body.="<th style='border:1px solid #ddd;text-align:left;padding:8px'>".ucfirst($key)."</th>";
                }
                $body.="<td style='border:1px solid #ddd;text-align:left;padding:8px'>".$value."</td>";
            }
        $body.="</tr>";
    }
    $body.="</table>";
    $mail->Body = $body;
    $mail->send();
    echo '<h1>Email has been sent</h1>';
    echo "<br>Redirects to previous page in 5 seconds";
} catch (Exception $e) {
    echo 'Email could not be sent. Mailer Error: ', $mail->ErrorInfo;
    echo '<h1>set valid gmail id  and password in SendMail.php</h1>';
    echo "<br>Redirects to previous page in 5 seconds";
}
?>
