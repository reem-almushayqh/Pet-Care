<?php
session_start();
include '../db.php';


if (isset($_POST['rating1'])) {

    

$rating1 = mysqli_real_escape_string($db, $_POST['rating1']);
$rating2 = mysqli_real_escape_string($db, $_POST['rating2']);
$rating3 = mysqli_real_escape_string($db, $_POST['rating3']);
$review = mysqli_real_escape_string($db, $_POST['review']);

 $sql = "INSERT INTO reviews (userId,reservationId,rating1,rating2,rating3,review)
            VALUES ('{$_SESSION['loggedinuserid']}','{$_GET['id']}','{$rating1}','{$rating2}','{$rating3}','{$review}')";
if (mysqli_query($db, $sql)) {
    ?>
    <script>
      alert("Review Add successfully!")
      window.location.href = "previous-appointment.php";

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
        <h3>Review Appointment:</h3>
        <form method="post" action="#">
            <p><strong>Please state your level of satisfaction with the appointment booking process :</strong><br>
                <label>Satisfied
                    <input name="rating1" type="radio" value="10">
                </label>

                <label>Neutral
                    <input name="rating1" type="radio" value="5">
                </label>

                <label>Not Satisfied
                    <input name="rating1" type="radio" value="1">
                </label>

            </p>
            <p><strong>Do you feel that our opening hours are a perfect fit for your treatment :</strong><br>
                <label>Satisfied
                    <input name="rating2" type="radio" value="10">
                </label>

                <label>Neutral
                    <input name="rating2" type="radio" value="5">
                </label>

                <label>Not Satisfied
                    <input name="rating2" type="radio" value="1">
                </label>

            </p>
            <p><strong>How long should you wait (after your appointment time) to see your doctor :</strong><br>
                <label>less than 15minutes
                    <input name="rating3" type="radio" value="10">
                </label>

                <label>30 minutes
                    <input name="rating3" type="radio" value="5">
                </label>

                <label>more than  one hour
                    <input name="rating3" type="radio" value="1">
                </label>

            </p>
            

            <p><label><strong>Note:</strong><br>
                <textarea name="review" rows="4" cols="24">Your note help us to improve our service</textarea>
            </label></p>

          
            <p>
                <input type="submit" value="Send">
            </p>
            

        </form>
</div>
    </mian>
    <footer>

    </footer>
    </body>
    </html>