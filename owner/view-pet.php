<?php
session_start();
include '../db.php';

if (isset($_GET['delete'])) {
	$query = "DELETE FROM `pets` WHERE `id` = ".$_GET['delete']."";
				if ($db->query($query)) {
                  
					?>

<script>
	alert("Pet Successfully Deleted");

    window.location.href = "pet-list.php";


</script>

<?php
	
			}
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charsetn = "utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
      <style>
        .content {
          max-width: 500px;
          margin: auto;
          background: white;
          padding: 10px;
        }
        
        </style>
  </head>
  
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
            <li> <a  href="view-pet.php">My Pets</a> </li>
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
<div style="padding: 65vh 0%;">
  
<div class="content">
    <fieldset>
    <?php

$sql = "SELECT * from pets  where id='" . $_GET['id'] . "' ";
$query = mysqli_query($db, $sql);

if (mysqli_num_rows($query) > 0) {
    while ($row1 = mysqli_fetch_assoc($query)) {
?>
    <img src="../images/pet/<?php echo $row1['image'] ?>" width ="100" height ="100" alt ="photo for the cat mila"> 
        
        
    <p><span>Name </span>: <?php echo $row1['petName'] ?></p>


    <p><span>Date Of Birth</span>: <?php echo $row1['dateOfBirth'] ?></p>

   <p><span>Gender</span>: <?php echo $row1['gender'] ?></p>

  <p><span>Breed</span>: <?php echo $row1['breed'] ?></p>

    <p><span>Pet's Status</span>: <?php echo $row1['spayed'] ?></p>

  <p><span>Vaccinations List (optional)</span>: <?php echo $row1['vaccinationList'] ?></p>

<p><span> Medical History (optional)</span>: <?php echo $row1['medicalHistory'] ?></p>
<p>
  <a href="edit-pet.php?id=<?php echo $row1['id'] ?>" class="buttonS"> Edit profile</a>
  <a href="view-pet.php?delete=<?php echo $row1['id'] ?>" class="buttonS"> Delet</a>
  </p>
  <?php
    }
}
                ?>
</fieldset>
</div>
    <!--
    <div class="loginbox">
       
            <img src = "cat_images.jpg" width ="100" height ="100" alt ="photo for the cat mila"> 
        
        
              <p><span>Name </span>: Mila</p>
       
       
              <p><span>Date Of Birth</span>: 1/2/2021</p>
        
             <p><span>Gender</span>: Female</p>
       
            <p><span>Breed</span>: Feli cat</p>
        
              <p><span>Pet's Status</span>: Spayed</p>
        
            <p><span>Vaccinations List (optional)</span>: empty</p>
        
        <p><span> Medical History (optional)</span>: empty</p>
      
      
       
        <p>
            <button type="button"> <a href="EditPetProfile.html"> Edit profile</a></button>
            <button type="button"><a href="#">Delet profile</a></button>
        </p>           
      </div>-->
</div>
    </body>
</html>