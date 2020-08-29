<?php
//connect to database
$db = mysqli_connect('localhost', 'root', '', 'testdb');

//$count- no.of users
$query  = "select * from users";
$result = mysqli_query($db, $query);
$count  = mysqli_num_rows($result);//

//$count1- no.of users with status as active
$query1  = "select * from users where status='active'";
$result1 = mysqli_query($db, $query1);
$count1  = mysqli_num_rows($result1);
?>
<!DOCTYPE html>
<html lang="en-US">
<body>
  <p><b>Note :</b> Total Users count = Active user count + Inactive user count</p>
  <div id="piechart"></div>
  <!-- Trigger the modal with a button -->

<form action="excel.php" method="post" enctype="multipart/form-data">
<input type="file" class="col-md-3" name="file" for="import_excel">
<div class="col-md-9 col-xs-10">
    <button type="submit" class="btn btn-primary col-md-2" name="import_excel">Import From Excel</button>
    <button type="submit" class="btn btn-primary col-md-2 col-md-offset-1" name="export_excel">Export to Excel</button>
    <button type="button" class="btn btn-primary col-md-2 col-md-offset-1" data-toggle="modal" data-target="#deleted">Deleted Users List</button>
</div>
</form>

  <!-- Modal -->
  <div id="deleted" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title text-primary text-center">Deleted Users</h3>
        </div>
        <div class="modal-body">
          <table class="table table-responsive table-striped table-hover" id="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Designation</th>
                <th>Status</th>
              </tr>
            </thead>
            <?php
            $query = "Select * from deleted_users";
            $result = mysqli_query($db, $query);
            //$count = mysqli_num_rows($result);
            while($row =mysqli_fetch_array($result)){ ?> 
              <tbody>
                <tr id="<?php echo $row['id'];?>">
                  <td data-target="name"><?php echo $row['name'];?></td>
                  <td data-target="email"><a href=""<i class="fal fa-envelope"></i></a> <?php echo $row['email'];?></td>
                  <td data-target="phone"><?php echo $row['phone'];?></td>
                  <td data-target="desig"><?php echo $row['desig'];?></td>
                  <td><?php echo $row['status'];?></td>
                </tr>
              </tbody> 
              <?php 
            } ?>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script>
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    
    // Draw the chart and set the chart values
    function drawChart()
    {
      var data = google.visualization.arrayToDataTable([
      ['usertype ', 'count'],
      ['Total Users count',<?php echo $count?>],
      ['Inactive user count',<?php echo $count-$count1?>],
      ['Active user count',<?php echo $count1 ?>],
      ]);
      
      // Optional; add a title and set the width and height of the chart
      var options = {'title':'', 'width':550, 'height':400, is3D: true};
      
      // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
  </script>
</body>
</html>
  