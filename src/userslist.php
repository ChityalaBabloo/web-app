<!DOCTYPE html>
<html>
<head>
  <title>Users List</title>
  <link rel="stylesheet" href="../css/userslist.css">
  <script src="../js/userslist.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
  <!-- All registered users list -->
  <table class="table table-responsive table-striped table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Designation</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <?php
    $limit = 10;//results per page
    if (isset($_GET["page"])) { 
      $page  = $_GET["page"];
    }else {
       $page=1; 
    };  
    $start_from = ($page-1)*$limit; 
    
    $query = "Select * from users where role='user' Order BY id ASC LIMIT $start_from, $limit";
    $result = mysqli_query($db, $query);
    //$count = mysqli_num_rows($result);
    while($row =mysqli_fetch_array($result)){ ?> 
      <tbody id="usertable">
        <tr id="<?php echo $row['id'];?>">
          <td data-target="name"><?php echo $row['name'];?></td>
          <td data-target="email"><i class="fal fa-envelope" data-toggle="modal" data-target="#myEmail" data-id="<?php echo $row['id']?>"></i> <?php echo $row['email'];?></td>
          <td data-target="phone"><?php echo $row['phone'];?></td>
          <td data-target="desig"><?php echo $row['desig'];?></td>
          <td><?php echo $row['status'];?></td>
          <td><a href="#" data-role="update" data-id="<?php echo $row['id']?>">Edit </a>|
            <a href="delete.php?id=<?php echo $row['id'];?>"> Delete</a>
          </td>
          <!-- data-id attribute gives us the ability to embed custom data attributes on all html elements-->
          <!-- data-role is used to access this element in jquery-->
        </tr>
      </tbody> 
      <?php 
    } ?>
  </table>
  <!-- ------------------------Modal-Update a particular user ---------------------->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center text-primary">EDIT USER</h4>
        </div>
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" onblur="requiredField(this)">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" onblur="requiredField(this)">
            </div>
            <div class="form-group">
              <label for="desig">Designation</label>
              <input type="text" class="form-control" id="desig" onblur="requiredField(this)">
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" onblur="requiredField(this)">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" id="save" class="btn btn-default btn-success">Update</button>
            <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
            <input type="hidden" id="hidden_user_id">
          </div>
        </form>
      </div>
      
    </div>
  </div>
  <!-- ------------------------Modal---Send Email------------------------>
  <div id="myEmail" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content myEmail">

      </div>
    </div>
  </div>
  <button class="btn btn-default btn-primary hidden-print" onclick="prnt()">Print</button>
  <span class="col-md-offset-5"></span>
  <!-- Pagination -->
  <?php  
    $sql = "SELECT COUNT(id) FROM users where role='user'";  
    $result = mysqli_query($db, $sql); 
    $row = mysqli_fetch_row($result);  
    $total_records = $row[0];  
    $total_pages = ceil($total_records / $limit);
    $pagelink = '<div class="pagination hidden-print">';
    for ($i=1; $i<=$total_pages; $i++) {
      if($i==$page)//actual link
      {
        $pagelink .= '<a class="active"> '. $i .'</a>';
      }
      else{
      $pagelink .= '<a href="Admin.php?page='.$i.'"> '.$i.'</a>';
      }
    }
    echo $pagelink . "</div>";  
  ?>
</body>
</html>