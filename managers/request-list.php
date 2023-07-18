<?php
session_start();
include '../db.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style >


table {
  border-collapse: collapse;
  width: 60%;
}
td { background-color: #FEF9C7;
text-align: LEFT;
  padding: 20px;
} 


tr {
  background-color: white;
}
.content { 
  max-width: 500px;
  margin: auto;
  background: #fff;
  padding: 10px;
}
body {
  background-color: #fff;
}
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
			
</head>

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
<div class ="content">
<h1>Appointment Requests List</h1>
<p> Here are the appointments requests that came from Pet Owners... Click to view the details and make your decision! </p> 

<table>
<table border= "2">
<tr> 
</tr>
<?php
$reservations="";
$i = 0;

$sql = "SELECT * from reservations where status='1'";

$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {
$i++;

   

$reservations = $reservations.' <tr>
<td> <ul><li>'. $row1['date']  .' </li></ul></td>
<td><a href="request-details.php?id='. $row1['id']  .'">
         <img alt="View" src="../images/docview.png"
         width="50" height="50"> </a>
</td> </tr>


';



    }
  }


echo $reservations;
  ?>

</table>        
</div>
</div>
</body> 