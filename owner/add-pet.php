<?php
session_start();
include '../db.php';


if (isset($_POST['petName'])) {

         //print_r($_FILES['files']['size']);
//print_r($_FILES['files']['size']);
if (isset($_FILES['files']) && $_FILES['files']['size'] != 0) {
    

    $j = 0; //Variable for indexing uploaded image

    $file_name_all = "";

        $validextensions = array("jpeg", "jpg", "png"); //Extensions which are allowed
        $ext = explode('.', basename($_FILES['files']['name'])); //explode file name from dot(.)
        $file_extension = end($ext); //store extensions in the variable
        $basename = basename($_FILES['files']['name']);

        $j = $j + 1; //increment the number of uploaded images according to the files in array

        if (($_FILES["files"]["size"] < (1024 * 1024)) //Approx. 100kb files can be uploaded.
            && in_array($file_extension, $validextensions)
        ) {
            $random = rand(10000, 1000000);
            $n = "pet_" . $random . ".png";
            $cd = $n;
            if (move_uploaded_file($_FILES['files']['tmp_name'], "../images/pet/" . $cd)) {
                $file_name_all .= $cd . ",";
                $filepath = rtrim($file_name_all, ',');
            } else { //echo "Please try again";
            }
        } else { //if file size and file type was incorrect.
            echo $j . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    
}

$petName = mysqli_real_escape_string($db, $_POST['petName']);
$dateOfBirth = mysqli_real_escape_string($db, $_POST['dateOfBirth']);
$breed = mysqli_real_escape_string($db, $_POST['breed']);
$gender = mysqli_real_escape_string($db, $_POST['gender']);
$spayed = mysqli_real_escape_string($db, $_POST['spayed']);
$vaccinationList = mysqli_real_escape_string($db, $_POST['vaccinationList']);
$medicalHistory = mysqli_real_escape_string($db, $_POST['medicalHistory']);
$sql = "INSERT INTO pets (userId,petName,dateOfBirth,image,breed,gender,spayed,vaccinationList,medicalHistory)
            VALUES ('{$_SESSION['loggedinuserid']}','{$petName}','{$dateOfBirth}','{$filepath}','{$breed}','{$gender}','{$spayed}','{$vaccinationList}','{$medicalHistory}')";
if (mysqli_query($db, $sql)) {
    ?>
    <script>
    alert("Add Pet successfully!")
    window.location.href = "pet-list.php";
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
<meta charsetn = "utf-8">

<link rel="stylesheet" type="text/css" href="style.css">
<style>
.button {
  border: none;
  color: white;
  padding: 10px 10px;
  text-align: center;
  font-size: 10px;
  margin: 4px 2px;
  cursor: pointer;
  background-color: #4CAF50;
}
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
    
    <div class="text-box">
        <h1 class="heading-primary">
            <span class="heading-primary-main">Pet care</span>
            <span class="heading-primary-sub">For their health and happiness</span>
        </h1>
        <a href="about-us.php" class="btn btn-white btn-animated">About Us</a>
    </div>
</header>
  
  
<div style="padding: 65vh 0%;">  
<div class="content" >
  <h1>Add New Pet</h1>
  <fieldset>
  <form method="post" action="" enctype="multipart/form-data">
      <!--<form action="/action_page.php">-->
        <label for="petname">Pet Name</label>
       <!--<div class="underLine">-->
       <p> <input type="text" id="petname" name="petName" placeholder="Pet name is.." required> </p>
    
        <label for="datebirth">Date Of Birth</label>
       <p>
        <input type="date" id="datebirth" name="dateOfBirth" placeholder="Date Of Birth the pet.." required>
       </p> 

        <label for="gender">Gender</label>
        <p> 
            <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
        </p>
        <label for="breed">Breed</label>
       <p>
        <input type="text" id="breed" name="breed" placeholder="Breed.." required>
       </p> 
        
       <label for="photo">Add Photo of pet</label>
        <!--<input type="image" id="petphoto" name="photo" placeholder="Add photo of your pet..">-->
      <p>
        <input type="file" name="files" accept="image/*" required />
      </p> 
      
      <label for="status">Status</label>
        <p> 
            <select id="status" name="spayed" required>
                <option value="spayed">Spayed</option>
                <option value="neutered">Neutered</option>
              </select>
        </p>

       
        <div class="third">
                        <p class="vacc"><label>Vaccination List:<br>
                            <textarea required name="vaccinationList" rows="4" cols="23"></textarea>
                        </label></p>
                        <p class="history"><label>Medical History:<br>
                            <textarea required name="medicalHistory" rows="4" cols="23"></textarea>
                        </label></p>
                    </div>
    
    <input type= "submit" name="Add" value ="Add">

<!--<input type="submit"> <a href="MyPets.html">Add</a></input>

<button class="buttonS" type="button"><a href="MyPets.html">Add</a></button>
      <p><input type="submit" value="Add" ><a href="MyPets.html">Menu Home</a> ></p>-->
    <!--</div>  -->
    </form>
  </fieldset>
</div>
    
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
  </div>
  </body>
  <!--https://stackoverflow.com/questions/12142536/how-to-make-input-type-file-should-accept-only-pdf-and-xls-->
  <!-- https://www.w3schools.com/howto/howto_css_vertical_menu.asp-->
  </html>
    