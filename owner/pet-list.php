<?php
session_start();
include '../db.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charsetn = "utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
<style>
  .vertical-menu {
    width: 50%;
    position: relative;
    left: calc(26%);
  text-align: center;
  display:inline-block;
  }
  
  .vertical-menu a {
  
    background-color: #FEF9c7;
    color: black;
    display: block;
    padding: 20px;
    text-decoration: none;
  }
  
  .vertical-menu a:hover {
    background-color: #FCE181;
  }
  .content {
    max-width: 500px;
    margin: auto;
    background: white;
    padding: 10px;
  }
  
  a.button {
	display:inline-block;
	padding:0.3em 1.2em;
	margin:0 0.1em 0.1em 0;
	border:0.16em solid rgba(255,255,255,0);
	border-radius:2em;
	background-color: #80d3bc ;
	box-sizing: border-box;
	text-decoration:none;
	font-family:'Roboto',sans-serif;
	font-weight:300;
	color:#030303;
	text-shadow: 0 0.04em 0.04em rgba(0,0,0,0.35);
	text-align:center;
	transition: all 0.2s;	
	position: relative;

	left: calc(45% - 50px);
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
  <h2>My Pets</h2>
  <div class="vertical-menu"> 
  <?php
$pets="";
$i = 0;

$sql = "SELECT * from pets where  userId = '{$_SESSION['loggedinuserid']}'";

$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {

        $i++;



?>
<a href="view-pet.php?id=<?php echo $row1['id'] ?>">Pet#<?php echo $i ?></a>
<?php

    }
  }
echo $pets;
  ?>
      
  </div>
       <p> <a class="button" href="add-pet.php">Add New Pet</a></p>
        <!--<button type="button"><a href="AddNewPet.html">Add New Pet</a> </button>
        <button type="button"><a href="Account.html">Home Menu</a></button>-->
  </div>
  </div>
</body>
</html>