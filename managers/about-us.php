<?php
session_start();
include '../db.php';
?>
<!DOCTYPE html>
<html >

<head>
    <meta charset="UTF-8">
    <title>About us</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type = "text/css">


        
    .floated { background-color: transparent;
               font-size: 1.5em;
               font-family: arial,helvetica,sans-serif;
               padding: .2em;
               margin-left: .30em;
               margin-bottom: .5em;
               float: center;
               text-align: center;
               width: 80%;
            }

     img.picture{
      display: block;
      margin: 0 auto; 
     
     }

     
 
  
  
 
}
 section {border: 1px solid skyblue;}
 .content {
  max-width: 500px;
  margin: auto;
  background: #EDEAE5;
  padding: 10px;

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
<div>
        <h1 class="floated">ABOUT US</h1> 

        <br>
        <br>
        <br>
        <p><em><center>PET CARE WEBSITE</center></em></p>
</div> 

<div class="content">
  <fieldset>
  <?php

$sql = "SELECT * from aboutUs";

$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {
        ?>
        <p style = "width: 50%"><center>
       
	<?php echo $row1["details"] ?>
     
        </center>
        </p>
        <h4>To visit to our location </h4> 

<p><a href ="<?php echo $row1["location"] ?>" target="_blank">
   <img src = "../images/about-us/<?php echo $row1["image"] ?>" width= "150" height="130" alt="location">
</a></p>
        <?php
    }
}
?>
 <!--<img src = "P1.jpg"" width= "150" height="130"alt= "Cat picture">  -->           

<button class="button" type="button"><a href="about-us-edit.php">Edit</a></button>
</fieldset>
</div>
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

</body>
</html>