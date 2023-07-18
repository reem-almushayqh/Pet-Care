<?php
session_start();
include '../db.php';
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="pet care appointments">
     
        <style>*{padding: 0; margin: 0; box-sizing: border-box;}
            body{height: 900px;}
            header {
                text-align: center;
                width: 100%;
                height: 90vh;
                background-size: cover;
                background-attachment: fixed;
                position: relative;
                overflow: hidden;
                border-radius: 0 0 85% 85% / 30%;
            }
            header .overlay{
                width: 100%;
                height: 100%;
                padding: 50px;
                color: rgb(2, 2, 2);
                text-shadow: 1px 1px 1px rgb(212, 209, 198);
              background-image: linear-gradient( to right bottom, rgba(159,237,215,0.8), rgba(2,102,112,0.8)),url(pexels-helena-lopes-1904105.jpg);
                
            }
            
            h1 {
                font-family: 'Dancing Script', cursive;
                font-size: 80px;
                margin-bottom: 30px;
            }
            
            h3, p {
                font-family: 'Open Sans';
                margin-bottom: 30px;
                font-size: x-large;
            }
            
            button {
                border: none;
                outline: none;
                padding: 10px 20px;
                border-radius: 50px;
                color: rgb(253, 253, 253);
                background: #fff;
                margin-bottom: 50px;
                box-shadow: 0 3px 20px 0 #0000003b;
            }
            button:hover{
                cursor: pointer;
            }.navbar {
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
   
        <header>
            <div class="overlay">
        <h1>Simply The Best</h1>
        <h3>About US</h3>
       <!---- <p>At Pet Care Center, we provide top-quality veterinary care, urgent pet care, pet boarding, & grooming to pets in our community.
            Our staff treats you like family and each pet like our own. We are honored and proud to be a partner in your pet's healthcare team. 
            As pet owners ourselves, we believe that preventative care with wellness exams are the keys to your pet living a longer, healthier, and happier life.
            As a full-service veterinary office, we offer state-of-the-art testing and diagnostics, routine and advanced surgical procedures, and many other specialties and services to provide your pet with the best possible care. 
            We welcome new patients to our office and look forward to meeting you and your pet.</p>
            <br>-->
            <p style = "width: 50%"><center>
            <?php

$sql = "SELECT * from aboutUs";

$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {
        ?>
	<?php echo $row1["details"] ?>
        <?php
    }
}
?>               </center>
               </p>
            <h4>To visit to our location </h4> 

            <p><a href ="https://goo.gl/maps/BwpKZFYkZpf8jmL76">
                  <img src = "../images/map.png" width= "150" height="130" alt="location">
               </a></p>
            <!--<button><a href="appointmentReview.html"><input type="button" value="Sign Up"></a></button>-->
                </div>
        </header>
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

    </body>
</html>