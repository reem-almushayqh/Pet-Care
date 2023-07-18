<?php
session_start();
include '../db.php';


if (isset($_POST['firstName'])) {
   
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
            if (move_uploaded_file($_FILES['files']['tmp_name'], "../images/profile/" . $cd)) {
                $file_name_all .= $cd . ",";
                $filepath = rtrim($file_name_all, ',');
            } else { //echo "Please try again";
            }
        } else { //if file size and file type was incorrect.
            echo $j . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    
}

if ($_FILES['files']['size'] != 0) {

    $updateQuery = "UPDATE users SET `first_name` = '" . $_POST['firstName'] . "', `last_name` = '" . $_POST['lastName'] . "' , `image` = '$filepath',`email` = '" . $_POST['email'] . "', `phone` = '" . $_POST['phone'] . "',gender ='" . $_POST['gender'] . "' WHERE `id` = '" . $_SESSION['loggedinuserid'] . "'";
            

    if (mysqli_query($db, $updateQuery)) {

        $_SESSION['loggedin_first_name']= $_POST['firstName'];
        $_SESSION['loggedin_last_name']= $_POST['lastName'];
        $_SESSION['loggedinusername']= $_POST['firstName']." ".$_POST['lastName'];
        $_SESSION['loggedinuseremail'] = $_POST['email'];
        $_SESSION['loggedinuserphone'] = $_POST['phone'];
        $_SESSION['loggedinusergender'] = $_POST['gender'];
        $_SESSION['loggedinuserimage'] = $filepath;
    
        ?>
        <script>
          alert("User update successfully!")
          </script>
                    <?php
    } else {
        echo "Error: " . $updateQuery . "<br>" . mysqli_error($db);
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Update.</p>";
    }



  
} else {
    $updateQuery = "UPDATE users SET `first_name` = '" . $_POST['firstName'] . "', `last_name` = '" . $_POST['lastName'] . "' ,`email` = '" . $_POST['email'] . "', `phone` = '" . $_POST['phone'] . "',gender ='" . $_POST['gender'] . "' WHERE `id` = '" . $_SESSION['loggedinuserid'] . "'";
            

            if (mysqli_query($db, $updateQuery)) {

                $_SESSION['loggedin_first_name']= $_POST['firstName'];
                $_SESSION['loggedin_last_name']= $_POST['lastName'];
                $_SESSION['loggedinusername']= $_POST['firstName']." ".$_POST['lastName'];
                $_SESSION['loggedinuseremail'] = $_POST['email'];
                $_SESSION['loggedinuserphone'] = $_POST['phone'];
                $_SESSION['loggedinusergender'] = $_POST['gender'];
            
                ?>
                <script>
                  alert("User update successfully!")
                  </script>
                            <?php
            } else {
                echo "Error: " . $updateQuery . "<br>" . mysqli_error($db);
                echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Update.</p>";
            }
}


        



    }
}

if (isset($_GET['delete'])) {
	$query = "DELETE FROM `users` WHERE `id` = ".$_SESSION['loggedinuserid']."";
				if ($db->query($query)) {
                    session_destroy();
					?>

<script>
	alert("User Successfully Deleted");

	window.location.href = "../index.php";

</script>

<?php
	
//header("location: cart.php");			
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
    <div style="padding: 65vh 0%;">
    <div class="content">

    <h2>Profile</h2>
    <fieldset>
    <form method="post" action="" enctype="multipart/form-data">

    <p>
        <img src = "../images/profile/<?php echo $_SESSION['loggedinuserimage']; ?>" width ="80" height ="80" alt ="profile icon"> 
    </p>
    <p>
        <input type="file" name="files" accept="image/*" />
    </p>
<p>
    <label>First Name</label>
    <input name="firstName" type="text" id="input-FirstName"   value="<?php echo $_SESSION['loggedin_first_name']; ?>" required> 
</p>
<p>
    <label>LastName</label>
    <input name="lastName" type="text" id="input-LastName"   value="<?php echo $_SESSION['loggedin_last_name']; ?>" required> 
</p><p>
    <label>Phone Number</label>
    <input name="phone" type="text" id="input-Phone Number"   value="<?php echo $_SESSION['loggedinuserphone']; ?>" required> 
</p><p>
    <label>Email Address</label>
    <input name="email" type="text" id="input-Email"   value="<?php echo $_SESSION['loggedinuseremail']; ?>" required> 
</p>
<label for="gender">Gender</label>
         
            <select id="gender" name="gender" required>
            <option <?php if($_SESSION['loggedinusergender']=="Male"){
                                    echo "selected";
                                } ?> value="male">Male</option>
                                <option  <?php if($_SESSION['loggedinusergender']=="Female"){
                                    echo "selected";
                                } ?> value="Female">Female</option>
              </select>
    
 <p>
    <input type= "submit" name="save" value ="Save">   
</p>
</form>
</fieldset>
    </div> 
    </div>
</body>

<!--https://www.bootdey.com/snippets/view/user-profile-bio-graph-and-total-sales-->
<!--https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details -->
</html>