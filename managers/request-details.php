<?php
session_start();
include '../db.php';



if (isset($_GET['accept'])) {
   

        $updateQuery = "UPDATE reservations SET `status` = '1' WHERE `id` = '" . $_GET['accept'] . "'";
            

        if (mysqli_query($db, $updateQuery)) {

        
            ?>
            <script>
              alert("Appointment update successfully!")
              window.location.href = "request-list.php";

              </script>
                        <?php
        } else {
            echo "Error: " . $updateQuery . "<br>" . mysqli_error($db);
            echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Update.</p>";
        }



        



    
}

if (isset($_GET['deny'])) {
   

        $updateQuery = "UPDATE reservations SET `status` = '0' WHERE `id` = '" . $_GET['deny'] . "'";
            

        if (mysqli_query($db, $updateQuery)) {

        
            ?>
            <script>
              alert("Appointment update successfully!")
              window.location.href = "request-list.php";

              </script>
                        <?php
        } else {
            echo "Error: " . $updateQuery . "<br>" . mysqli_error($db);
            echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Update.</p>";
        }



        



    
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style >


table {
  border-collapse: collapse;
  width: 60;
}
th,td { background-color: #FEF9C7;
text-align: LEFT;
  padding: 20px;
}


tr {
  background-color: white;
}
.btn{
  border: none;
  color: white;
  padding: 15px 10px;
  text-align: center;
  font-size: 12px;
  margin: 20px 2px;
  cursor: pointer;
  background-color: #4CAF50;
}
.content {
  max-width: 500px;
  margin: auto;
  padding: 10px;
}
body {
  background-color: #fff;
}
</style>
			
</head>

<body>
  <script language="javascript" type="text/javascript" src="Mheader.js"></script>
<div class ="content">
<h1> Request details</h1>

<table border= "1">
<?php
$reservations="";
$i = 0;

$sql = "SELECT * from reservations where  id = '{$_GET['id']}' AND status='1'";

$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {
$i++;

      $sql2 = "SELECT * from pets where  id = '{$row1['petId']}'";

$run_query2 = mysqli_query($db, $sql2);

if (mysqli_num_rows($run_query2) > 0) {
    while ($row2 = mysqli_fetch_assoc($run_query2)) {

        

      $sql3 = "SELECT * from services where  id = '{$row1['service']}'";

$run_query3 = mysqli_query($db, $sql3);

if (mysqli_num_rows($run_query3) > 0) {
    while ($row3 = mysqli_fetch_assoc($run_query3)) {
       $sql4 = "SELECT * from users where id='{$row1['userId']}'";

      $run_query4 = mysqli_query($db, $sql4);
      
      if (mysqli_num_rows($run_query4) > 0) {
          while ($row4 = mysqli_fetch_assoc($run_query4)) {
              
              
        
$reservations = $reservations.'
<tr>
<th>Pet Name </th>
<td> <a href="view-pet.php?id='. $row2['id']  .'">'. $row2['petName']  .'</a></button> </td>
<tr>
<th>Service</th>
<td>'. $row3['name']  .' </td>
</tr>
<th>Date</th>
<td>'. $row1['date']  .'</td> 

<tr><th>Time</th> <td>'. $row1['time']  .'</tr><tr>
<tr><th>Note</th><td>'. $row1['details']  .'</td></tr> 
<tr><th>Contact pet Owner</th><td> <button> <a href="mailto:'.$row4['email'].'"><img src = "../images/icon.png"width= "50" height="30" alt="Email icon"></a><strong></strong></a></button></td></tr>
';

}
}

    }
  }

}
}
}
}
echo $reservations;
  ?>

</table>  

<br>
<br>
<a class="btn" href="request-details.php?accept=<?php echo $_GET['id'] ?>">Accept Appointment</a>
<a class="btn" href="request-details.php?deny=<?php echo $_GET['id'] ?>">Deny The Appointment</a>
</div>
</div>
</body> 