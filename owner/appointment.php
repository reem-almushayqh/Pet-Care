<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="pet care appointments">
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
    <mian>
        <div style="padding: 65vh 0%;">
  
            <div class="content">
            
            
           <div class="vertical-menu">
              <a  href="appointment-request.php">Appointment Request</a>
              <a href="upcoming-appointment.php">Upcoming Appointments</a> 
              <a href="previous-appointment.php">Previous Appointments</a>
            </div>
            </div>
            </div>
    </mian>
  
  </div>
  </div>
    <footer>

    </footer> 

    </body>
</html>
