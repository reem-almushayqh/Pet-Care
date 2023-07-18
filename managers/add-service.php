<?php
session_start();
include '../db.php';


if (isset($_POST['name'])) {

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
            if (move_uploaded_file($_FILES['files']['tmp_name'], "../images/srvices/" . $cd)) {
                $file_name_all .= $cd . ",";
                $filepath = rtrim($file_name_all, ',');
            } else { //echo "Please try again";
            }
        } else { //if file size and file type was incorrect.
            echo $j . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    
}

$name = mysqli_real_escape_string($db, $_POST['name']);
$details = mysqli_real_escape_string($db, $_POST['details']);
$price = mysqli_real_escape_string($db, $_POST['price']);
$sql = "INSERT INTO services (name,details,price,image)
            VALUES ('{$name}','{$details}','{$price}','{$filepath}')";
if (mysqli_query($db, $sql)) {
    ?>
    <script>
    alert("Add Service successfully!")
    window.location.href = "our-service.php";
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
    <title>Add service</title>
    
    <style type = "text/css">

 


            .floated { background-color: transparent;
               font-size: 1.5em;
               font-family: arial,helvetica,sans-serif;
               padding: .2em;
               float: center;
               text-align: center;
               width: 80%;}

                img.picture
    
                 {display: block;
                 margin: 0 auto;}

 .button {
  background-color: #555555;

  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    position: absolute;
  left: 450px;
  top: 500px;
  text-decoration-color: white;


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

        <h1 class="floated">ADD SERVICE</h1>
<fieldset>
<form method="post" action="" enctype="multipart/form-data">
            <p><label title="new service name"><strong>Service name:</strong>
                <input name="name" type="text" size="20"  required>
            </label></p>


            <p><label><strong>Description:</strong><br>
                <textarea name="details" rows="4" cols="24" required></textarea>
            </label></p>

 <p><label title="new service name"><strong>Price:</strong>
                <input name="price" type="text" size="20" required>
            </label></p>

 

<h4>Upload Picture:</h4>
<div class="container">
  <div class="form-group" x-data="{ fileName: '' }">
    <div class="input-group shadow">
      <span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
      <input type="file" x-ref="file" required  name="files" class="d-none">
     
      <button class="browse btn btn-primary px-4" type="submit" ><i class="fas fa-image"></i> ADD</button>
    </div>
  </div>



        </fieldset>

        </form><br>
      </div>
</body>
</html>