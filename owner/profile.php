<?php
session_start();
include '../db.php';


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
<div class="loginbox">
<img src = "../images/profile/<?php echo $_SESSION['loggedinuserimage']; ?>" width ="100" height ="100" alt ="../images/profile/<?php echo $_SESSION['loggedinuserimage']; ?>"> 
<p><span>First Name</span>: <?php echo $_SESSION['loggedin_first_name']; ?></p>
<p><span>Last Name </span>: <?php echo $_SESSION['loggedin_last_name']; ?></p>
<p><span>Phone Number </span>:<?php echo $_SESSION['loggedinuserphone']; ?></p>
<p><span>Email </span>: <?php echo $_SESSION['loggedinuseremail']; ?></p>
<p><span>Password</span>: *********</p>
<p><span>Gender </span>: <?php echo $_SESSION['loggedinusergender']; ?></p>
<p>
     <a href="edit-profile.php" class="buttonS"> Edit profile</a>
     <a href="profile.php?delete=true" class="buttonS"> Delet</a>
</p>           
</div>
</div>
</div>
</body>
</html>