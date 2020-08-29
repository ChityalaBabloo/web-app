<?php
include('auth.php');
$id = $_GET['id'];
$sql = "Select * from users where id = $id";
$res = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($res);
//print_r($row);
?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title text-center text-primary">SEND E-MAIL</h4>
</div>
<form>
  <div class="modal-body">
    <table class="table table-responsive table-striped table-hover">
      <tr>
        <th>Name</th>
        <td><?php echo $row['name']?></td>
      </tr>
      <tr>
        <th>Email</th>
        <td><?php echo $row['email']?></td>
      </tr>
      <tr>
        <th>Password</th>
        <td><?php echo $row['pwd']?></td>
      </tr>
      <tr>
        <th>Gender</th>
        <td><?php echo $row['gender']?></td>
      </tr>
      <tr>
        <th>Phone</th>
        <td><?php echo $row['phone']?></td>
      </tr>
      <tr>
        <th>Designation</th>
        <td><?php echo $row['desig'] ?></td>
      </tr>
      <tr>
        <th>Role</th>
        <td><?php echo $row['role'] ?></td>
      </tr>
    </table>
  </div>
  <div class="modal-footer">
    <button type="submit" onclick="mai()" id="sendmail" class="btn btn-default btn-success" data-id="<?php echo $row['id']?>">Send</button>
    <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
  </div>
</form>
