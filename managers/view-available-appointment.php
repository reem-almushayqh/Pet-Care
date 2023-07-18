<?php
session_start();
include '../db.php';
?>
<!DOCTYPE html>
<head>
<meta charset = "utf-8">
<title> View2 </title>
<style>
 body {
  background-color: #fff;
}
 
table {
  border-collapse: collapse;
  width: 60;
}
th,td { background-color: #FEF9C7;
text-align: LEFT;
  padding: 20px;
}

.content {
  width: 500px;
  height:500px;
  margin: 0 auto;
  position:relative ;
  top:55;
  left:70;
}

</style>
</head>


<body>
  <script language="javascript" type="text/javascript" src="Mheader.js"></script>
<div class = "content">
<table>
<table border= "1">
<?php

$sql2 = "SELECT * from services_appointment  where id='" . $_GET['id'] . "' ";
$query2 = mysqli_query($db, $sql2);

if (mysqli_num_rows($query2) > 0) {
    while ($row2 = mysqli_fetch_assoc($query2)) {
?>
<tr> <th>Service</th> <td>
<?php
$sql = "SELECT * from services";

$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {
?>
<?php if($row1['id']==$row2['service_id']){
                                  echo $row1['name'];
                                } ?>
<?php
    }
}
?></td> </tr>
                <tr> <th>Date</th> <td><?php echo $row2['date'] ?></td></tr>


                <tr><th>Time</th> <td><?php echo $row2['time'] ?></tr><tr>

         
            
<?php
    }
}
?>

</table>

</div>
</body>

