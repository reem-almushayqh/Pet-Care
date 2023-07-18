<?php
session_start();
include '../db.php';


if (isset($_POST['petId'])) {

   

$petId = mysqli_real_escape_string($db, $_POST['petId']);
$service = mysqli_real_escape_string($db, $_POST['service']);
$date = mysqli_real_escape_string($db, $_POST['date']);
$time = mysqli_real_escape_string($db, $_POST['time']);
$details = mysqli_real_escape_string($db, $_POST['details']);
$sql = "INSERT INTO reservations (petId,userId,service,date,time,details,status)
            VALUES ('{$petId}','{$_SESSION['loggedinuserid']}','{$service}','{$date}','{$time}','{$details}','1')";
if (mysqli_query($db, $sql)) {
  ?>
  <script>
    alert("Appointment add successfully!");
    window.location.href = "appointment-request.php";
    </script>
              <?php
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
    echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert.</p>";
}
}?>
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
            <li><a href="account.php">Home</a></li>
            <li> <a  href="profile.php">My Profile</a></li>
            <li> <a  href="pet-list.php">My Pets</a> </li>
            <li>  <a  href="appointment.php">My Appointment</a></li>
            <li><a  href="contact-us.php">Contact Us</a>   </li>
     
              
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
    <mian>
        <div style="padding: 70vh 0%;">
        <h3>Request new appointment:</h3>
        <form method="post" action="">
            
            <p><strong>Pet:</strong> <br>
            <select name="petId" required>
<?php
$sql = "SELECT * from pets WHERE `userId` = '" . $_SESSION['loggedinuserid'] . "'";

$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {
?>
<option value="<?php echo $row1['id'] ?>"><?php echo $row1['petName'] ?></option>
<?php
    }
}
                  ?>

</select>
            <p><strong>Service:</strong> <br>
            <select name="service" required>
<?php
$sql = "SELECT * from services";

$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {
?>
<option value="<?php echo $row1['id'] ?>"><?php echo $row1['name'] ?></option>
<?php
    }
}
                  ?>

</select>
            </p>

            <p><label><strong>Note:</strong><br>
                <textarea name="details" rows="4" cols="24">Any thing we should know about?</textarea>
            </label></p>

            <p><label><strong>Date:</strong>
                <input name="date" type="date">
            </label></p>

            <p><label><strong>Time:</strong>
                <input name="time" type="time">
            </label></p>
            <p>
                <input type="submit" value="Confirm">
               
            </p>

        </form>

    </div>
    </mian>


    <footer>

    </footer> 
        
    </body>
</html>