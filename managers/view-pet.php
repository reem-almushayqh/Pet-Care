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
<script language="javascript" type="text/javascript" src="Mheader.js"></script>
<div>
  
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