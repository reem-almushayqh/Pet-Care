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
  
  .vertical-menu {
  width: 200px;
}

.vertical-menu  p {
  background-color: #eee;
  color: black;
  display: block;
  padding: 12px;
  text-decoration: none;
  
}

.vertical-menu a:hover {
  background-color: #ccc;
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
  <h2>Contact US </h2>
<fieldset>


<h3>You can contact us via : </h3>
<div class="vertical-menu">
   
    <p> Phone Number:<br> 0511223344</a></p> 
    <p> OR</p>
    <p><a href="mailto:najdawad@outlook.sa" style="text-decoration:none;">Email The clinic</a> </p>
    
   </div>
  </fieldset>
</div>
</div>
</body>
</html>