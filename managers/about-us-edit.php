<?php
session_start();
include '../db.php';


if (isset($_POST['details'])) {
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $updateQuery = "UPDATE aboutus SET `details` = '" . $_POST['details'] . "'WHERE `id` = '1'";
            

        if (mysqli_query($db, $updateQuery)) {

        
            ?>
            <script>
              alert("About us update successfully!")
              window.location.href = "about-us.php";

              </script>
                        <?php
        } else {
            echo "Error: " . $updateQuery . "<br>" . mysqli_error($db);
            echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Update.</p>";
        }



        



    }
}



if (isset($_POST['details'])) {
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
            $n = "profile_" . $random . ".png";
            $cd = $n;
            if (move_uploaded_file($_FILES['files']['tmp_name'], "../images/about-us/" . $cd)) {
                $file_name_all .= $cd . ",";
                $filepath = rtrim($file_name_all, ',');
            } else { //echo "Please try again";
            }
        } else { //if file size and file type was incorrect.
            echo $j . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    
}

if ($_FILES['files']['size'] != 0) {

            
    $updateQuery = "UPDATE aboutus SET `location` = '" . $_POST['location'] . "', `details` = '" . $_POST['details'] . "' , `image` = '$filepath' WHERE `id` = '1'";

    if (mysqli_query($db, $updateQuery)) {

    
        ?>
        <script>
          alert("About Us Details update successfully!");
          window.location.href = "about-us.php";

          </script>
                    <?php
    } else {
        echo "Error: " . $updateQuery . "<br>" . mysqli_error($db);
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Update.</p>";
    }



  
} else {
    $updateQuery = "UPDATE aboutus SET `location` = '" . $_POST['location'] . "', `details` = '" . $_POST['details'] . "'  WHERE `id` = '1'";
            

            if (mysqli_query($db, $updateQuery)) {

            
                ?>
                <script>
                  alert("About Us Details update successfully!")
                  window.location.href = "about-us.php";

                  </script>
                            <?php
            } else {
                echo "Error: " . $updateQuery . "<br>" . mysqli_error($db);
                echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Update.</p>";
            }
}


        



    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Edit</title>
    <style type = "text/css">




body {
  background-color: #fff;
}

    	    .floated { background-color: transparent;
               font-size: 1.5em;
               font-family: arial,helvetica,sans-serif;
               padding: .2em;
               margin-left: .8em;
               margin-bottom:.5em;
               float: center;
               text-align: center;
               width: 80%;
            }
            p{ 
            	font-size: 1.5em;
               font-family: arial,helvetica,sans-serif;
               padding: .2em;
               margin-left: .8em;
               margin-bottom: .5em;
               float: center;
               text-align: center;
               width: 80%;
             }
                 img.picture{
                 display: block;
                 margin: 0 auto;
                 }

                 .div{
                 	background-color: transparent;
               font-size: 15px;
               font-family: arial,helvetica,sans-serif;
               padding: .2em;
               margin-left: .8em;
               margin-bottom: .5em;
               float: center;
               text-align: center;
               width: 30%;

                 }
                 textarea {
    width: 100%;
}

img {
    float: left;
}
button{
	font-size: 16px;
    font-weight: bolder;
    text-transform: uppercase;
    width: 150px;
    height: 40px;
    padding: 10px 15px;
    border: 0;
    border-radius: 5px;
	background-color: transparent;
    border: 2px solid #68767F;
    color: #68767F;
	text-decoration:none;
	}
	a.button4:hover{
	border-top-color: #edeae5;
	}
    input{
        width:100%
    }
    lable{
        text-align: left;
    }
    form p{
        text-align: left;

    }
    form p {
    display: inline-block;
    text-align: left;
    width: 100%;
    margin-left: 0px;
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
<div class="div">
        <h1 class="floated">About Edit</h1>
        <form method="post" action="" enctype="multipart/form-data">

<?php

$sql = "SELECT * from aboutUs";

$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {
        ?>
<p>
<label for="location">Location</label>
    </p>
       <div>
        <input type="text" width="500px" value="<?php echo $row1['location'] ?>"  id="location" name="location" placeholder="Location.." required>
       </div> 

       <br>
        <br>
<div>
            <img src = "../images/about-us/<?php echo $row1['image'] ?>" width ="100" height ="100" alt ="about us"> 
        </div>
        <br>
        <br>
        <p>
<label for="photo">Image</label>
    </p>
        <!--<input type="image" id="petphoto" name="photo" placeholder="Add photo of your pet..">-->
      <div>
        <input type="file" name="files" accept="image/*"  />
      </div> 
      <br>
        <br>
	<textarea name="details"
		rows = "20" clos = "200" width="100%" ><?php echo $row1["details"] ?></textarea> 
        <?php
    }
}
?>
</label>
</p>

<button class="button" type="submit">Edit</button>
</form>
</div>
</body>
</html>