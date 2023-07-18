<?php
session_start();
include '../db.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="pet care appointments">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<style>
.navbar {
  position: absolute;
  top: 8px;
  right: 16px;
  color: rgb(255, 255, 255);
  z-index: 10;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  padding: 30px 10%;
}
.nav__links {
  list-style: none;
  display: flex;
  
}

.nav__links li {
  padding: 0px 20px;
  text-decoration: none;
}

a {
  text-decoration: none;
  color: #46443f;
}
</style>
    <body>
    <script language="javascript" type="text/javascript" src="Mheader.js"></script>
    <div class="navbar">
    <nav>
        <ul class="nav__links">
            <li><a href="homepage.php">Home</a></li>
            <li><a href="available-appointment.php">Available Appointments</a></li>
            <li><a href="request-list.php"> Appointments Request list</a></li>
            <li> <a href="previous-appointment.php">Previous Appointments</a></li>
            <li> <a href="upcoming-appointment.php"> Upcoming Appointments</a> </li>
            <li> <a href="our-service.php">Our Services</a> </li>
              
        </ul>
    </nav>
  </div>
    <mian>
        <div>
        <section>
            <h3>Previous Appointments:</h3>

            <?php

$reservations="";
$i = 0;

$sql = "SELECT * from reservations where  status='1'";

$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {

$i++;
      $sql2 = "SELECT * from pets where  id = '{$row1['petId']}'";

$run_query2 = mysqli_query($db, $sql2);

$date_now = date("Y-m-d");
      
     
if ($date_now > $row1['date']) {
        // echo 'greater than';
   
if (mysqli_num_rows($run_query2) > 0) {
    while ($row2 = mysqli_fetch_assoc($run_query2)) {

        
      $sql3 = "SELECT * from services where  id = '{$row1['service']}'";

$run_query3 = mysqli_query($db, $sql3);

if (mysqli_num_rows($run_query3) > 0) {
    while ($row3 = mysqli_fetch_assoc($run_query3)) {


$reservations = $reservations.'<table border="5">
<thead>
    <th>Appointment '. $i  .':</th>
</thead>
<tbody>
    <tr>
        <td>Pet name:</td>
        <td>'. $row2['petName']  .'</td>
    </tr>
    <tr>
        <td>Service:</td>
        <td>'. $row3['name']  .'</td>
    </tr>
    <tr>
        <td>Note:</td>
        <td>'. $row1['details']  .'</td>
    </tr>
    <tr>
        <td>Date:</td>
        <td>'. $row1['date']  .'</td>
    </tr>
    <tr>
        <td>Time:</td>
        <td>'. $row1['time']  .'</td>
    </tr>
</tbody>                

</table> 
<br><br>';
}
}


    }
  }
}

}
}
echo $reservations;
  ?>
  
           


        </section>
        </div>
    </mian>
    <footer>

    </footer>     
    </body>
</html>