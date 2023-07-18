<?php
session_start();
include '../db.php';


if (isset($_POST['petId'])) {
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $updateQuery = "UPDATE reservations SET `petId` = '" . $_POST['petId'] . "', `service` = '" . $_POST['service'] . "',`date` = '" . $_POST['date'] . "', `time` = '" . $_POST['time'] . "',details ='" . $_POST['details'] . "' WHERE `id` = '" . $_GET['id'] . "'";
            

        if (mysqli_query($db, $updateQuery)) {

        
            ?>
            <script>
              alert("Reservation update successfully!")
              window.location.href = "appointment-request.php";

              </script>
                        <?php
        } else {
            echo "Error: " . $updateQuery . "<br>" . mysqli_error($db);
            echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Update.</p>";
        }


        



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
        <?php

$sql = "SELECT * from reservations  where id='" . $_GET['id'] . "' ";
$query = mysqli_query($db, $sql);

if (mysqli_num_rows($query) > 0) {
    while ($row1 = mysqli_fetch_assoc($query)) {
?>
        <form method="post" action="">
            
            <p><strong>Pet:</strong> <br>
            <select name="petId" required>
<?php
$sql2 = "SELECT * from pets WHERE `userId` = '" . $_SESSION['loggedinuserid'] . "'";

$run_query2 = mysqli_query($db, $sql2);

if (mysqli_num_rows($run_query2) > 0) {
    while ($row2 = mysqli_fetch_assoc($run_query2)) {
?>
<option <?php if($row1['petId']==$row2['id']){
                                    echo "selected";
                                } ?> value="<?php echo $row2['id'] ?>"><?php echo $row2['petName'] ?></option>
<?php
    }
}
                  ?>

</select>
            <p><strong>Service:</strong> <br>
            <select name="service" required>
<?php
$sql2 = "SELECT * from services";

$run_query2 = mysqli_query($db, $sql2);

if (mysqli_num_rows($run_query2) > 0) {
    while ($row2 = mysqli_fetch_assoc($run_query2)) {
?>
<option <?php if($row1['service']==$row2['id']){
                                    echo "selected";
                                } ?> value="<?php echo $row2['id'] ?>"><?php echo $row2['name'] ?></option>
<?php
    }
}
                  ?>

</select>
            </p>

            <p><label><strong>Note:</strong><br>
                <textarea name="details" required rows="4" cols="24"><?php echo $row1['details'] ?></textarea>
            </label></p>

            <p><label><strong>Date:</strong>
                <input name="date" required value="<?php echo $row1['date'] ?>" type="date">
            </label></p>

            <p><label><strong>Time:</strong>
                <input name="time" required value="<?php echo $row1['time'] ?>"  type="time">
            </label></p>
            <p>
                <input type="submit" value="Confirm">
               
            </p>

        </form>
        <?php
    }
}
                ?>
    </div>
    </mian>
    <footer>

    </footer>     
    </body>
</html>