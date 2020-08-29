<?php
include('auth.php');
$res ='';
if(isset($_POST['export_excel']))
{
  $res .= '<table class="table" bordered="10">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>Profile</th>
        <th>Designation</th>
        <th>role</th>
      </tr>
    </thead>';
    $query = "Select * from users";
    $result = mysqli_query($db, $query);
    //$count = mysqli_num_rows($result);
    while($row =mysqli_fetch_array($result))
    { 
      $res .= '<tbody>
        <tr>
          <td>'.$row['id'].'</td>
          <td>'.$row['name'].'</td>
          <td>'.$row['email'].'</td>
          <td>'.$row['pwd'].'</td>
          <td>'.$row['gender'].'</td>
          <td>'.$row['phone'].'</td>
          <td>'.$row['profile'].'</td>
          <td>'.$row['desig'].'</td>
          <td>'.$row['role'].'</td>
        </tr>
      </tbody>';
    } 
  $res .= '</table>';
  header("Content-Type: apllication/xls");
  header("Content-Disposition: attachment; filename=Users_Excel.xls");
  echo $res;
}
if(isset($_POST['import_excel']))
{
  $file = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];

  $fileExt = explode('.',$file);
  $fileExtension = strtolower(end($fileExt));
  //print_r($fileExtension);
  
  //file type u want to allow should be in array
  $allowedType = array('csv');
  //checks if $fileExtension value exists in array.i.e.,extension type is present in array
  if(in_array($fileExtension, $allowedType))
  {
    $i=0;
    $j=0;
    $k=0;
    $handle = fopen($fileTmpName, 'r');//read-mode
    while(($fileread = fgetcsv($handle,1000,',')) !== false) {//It means reading of file will stop when there is no content
      $name   = $fileread[0];
      $email  = $fileread[1];
      $pwd    = $fileread[2];
      $gender = $fileread[3];
      $phone  = $fileread[4];
      $desig  = $fileread[5];
      $role   = $fileread[6];
      $status = "inactive";
      $i++;
      //checking users with specific email
      $query = "SELECT * FROM users WHERE email = '$email'";
      $result = mysqli_query($db, $query);
      $count = mysqli_num_rows($result);
      if($count!=0) { $k++;
          //users with mail exits.so Not inserting into db
          echo "<h4 class='text-warning'>User with $email alreay exists.</h4>";
      }
      else {
        //save user to database
        $sql = "INSERT INTO users (name, email, pwd, gender, phone, desig, role, status)
        VALUES('$name', '$email', '$pwd', '$gender', '$phone', '$desig', '$role', '$status')";
        $result = mysqli_query($db, $sql);$j++;

        //NOTIFICATION
        if($result){
          $sql = "INSERT into alert(email,status)VALUES('$email', 'unread')";
          $res = mysqli_query($db, $sql);
        }
        /*if($result) {
          echo "<h4 class='text-success'>Records imported Succesfully !</h4>";
        }*/
      }
    }
    echo ($i==$j ?'All Records Imported Successfully !':($i==$k ?'So No record 
    inserted into database':'Remaining records Inserted Successfully !'));
    header( "refresh:10;Admin.php" );
    echo "<br>Redirects to previous page in 10 seconds";
  }else {
    echo "<h4 class='text-primary'>Please choose a CSV file</h4>";
    header( "refresh:5;Admin.php" );
    echo "<br>Redirects to previous page in 5 seconds";
  }
}
?>
