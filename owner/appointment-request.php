<?php
session_start();
include '../db.php';




if (isset($_GET['AppointmentDell'])) {
	$query = "DELETE FROM `reservations` WHERE `id` = ".$_GET['id']."";
				if ($db->query($query)) {
                  
					?>

<script>
	alert("Reservation Successfully Deleted");

    window.location.href = "appointment-request.php";


</script>

<?php
	
			}
}

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
    <header class="header">
    <div class="brand-box" class="btn btn-white btn-animated">
        <a href="../logout.php" class="btn btn-white btn-animated">Logout</a>
    </div>
    <div class="navbar">
    <nav>
        <ul class="nav__links">
            <li><a href="Account.php">Home</a></li>
            <li> <a  href="OwnerProfile.php">My Profile</a></li>
            <li> <a  href="MyPets.php">My Pets</a> </li>
            <li>  <a  href="appointment.php">My Appointment</a></li>
            <li><a  href="contactUs.php">Contact Us</a>   </li>
     
              
        </ul>
    </nav>
  </div>
    
    <div class="text-box">
        <h1 class="heading-primary">
            <span class="heading-primary-main">Pet care</span>
            <span class="heading-primary-sub">For their health and happiness</span>
        </h1>
        <a href="about-us.php" class="btn btn-white btn-animated">About Us</a>
    </div>
</header>
        <div style="padding: 30vh 0%;"></div>
    <mian>
        <div >
        <a href="add-appointment.php" class="buttonM">New Appointment Request</a><br><br>
        <section>
            <h3>My Requests:</h3>
            <?php
$reservations="";
$i = 0;

$sql = "SELECT * from reservations where  userId = '{$_SESSION['loggedinuserid']}' AND status='1'";

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

$reservations = $reservations.' <h3>Request '. $i  .':</h3>
<table>
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

</table><br>
<boutton><a href="edit-appointment.php?id='. $row1['id']  .'" class="buttonS">Edit</a></boutton>
<boutton><a href="appointment-request.php?AppointmentDell=true&&id='. $row1['id']  .'" class="buttonS">Cancel</a></boutton>
<br><br>
';



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