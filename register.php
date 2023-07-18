<?php
session_start();
include "db.php";
?>
<?php

if (isset($_POST['email'])) {

    

  $email = mysqli_real_escape_string($db, $_POST['email']);
  $pwd = mysqli_real_escape_string($db, $_POST['pwd']);
  $Pnum = mysqli_real_escape_string($db, $_POST['Pnum']);
  $Fname = mysqli_real_escape_string($db, $_POST['Fname']);
  $Lname = mysqli_real_escape_string($db, $_POST['Lname']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $user_data = "SELECT * FROM users WHERE email = '".$email."'";
  $u_data = mysqli_query($db, $user_data);
  $count_user = mysqli_num_rows($u_data);
  if ($count_user == 1) {
    ?>
      <script>
        alert("User Already exists")
        window.location.href = "OwnerLogIn.php";
  
        </script>
                  <?php
     die;
  }
   $sql = "INSERT INTO users (first_name,last_name,email,password,phone,gender)
              VALUES ('{$Fname}','{$Lname}','{$email}','{$pwd}','{$Pnum}','{$gender}')";
  if (mysqli_query($db, $sql)) {
      ?>
      <script>
        alert("Signup successfully!")
        window.location.href = "OwnerLogIn.php";
  
        </script>
                  <?php
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($db);
      echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert.</p>";
  }
  }

?>
	
<!DOCTYPE html>

<!-- heding elements-->

<html>


  <head>
  
     <meta charset = "utf-8">
	 <title> Register </title>
   <style type = "text/css">

    .loginbox {
      width: 370px;
      height:650px;
      background: #EDEAE5;
      color: black;
      top: 55%;
      left: 50%;
      position: absolute;
      transform: translate(-50%,-50%);
      box-sizing: border-box;
      border-radius: 10%;
      padding: 70px 30px;
    }
    .avatar {
    width: 100px;
    height: 100px;
    position: absolute;
    top: -50px;
    left: calc(50% - 50px);
  }
  h1{
    margin: 0%;
    padding: 0 0 20;
    text-align: center;
    font-size: 30px;
  }
  .loginbox p{
    margin: 0;
    padding: 0;
    font-weight: bold;
  }
  .loginbox input{
    width: 100%;
    margin-bottom: 20px;
  }
  .loginbox input[type="text"], input[type="password"]
  {
  border: none;
  border-bottom: 1px solid #fff;
  background: transparent;
  outline: none;
  height: 40px;
  }
  .loginbox input[type="submit"] {
    width: 200px;
		  padding: 15px 0;
		  text-align: center;
		  margin: 20px 55px;
		  border-radius: 25px;
		  font-weight: bold;
		  border: 2px solid #9FEDD7;
		  background: #9FEDD7;
		  color: rgb(0, 0, 0);
		  cursor: pointer;
		  position: relative;
		  overflow: hidden;
  }
  .header {
	height: 100vh;
	background-image: 
	linear-gradient(to right bottom, 
	rgb(159,237,215, 0.8),
	rgb(2,102,112,0.8)),
    url(images/pexels-helena-lopes-1904105.jpg);
    background-size: cover;
	background-position: top;
	position: absolute;
	top: 0;
    left: 0;
    right: 0;
	overflow: hidden;
	z-index: -1;
	clip-path: polygon(0 0, 100% 0, 100% 60vh, 0 50%);
	
}

      </style>
 
   </head>
   
   <body>
    
    <header class="header">
		
    </header>

    <div class="loginbox">
      <img src="images/user.png" class="avatar">
   
      <h1><strong> Register </strong></h1>
     <br>

	<form method="post" action="">
	
    <P>E-mail Address:</P>
  <input type="text" name="email" placeholder=" Enter E-mail" id="inputEmailAddress" required>
    <P>Password:</P>
  <input type="password" name="pwd" placeholder="Enter password" id="inputPassword" required>

  <P>Phone Number:</P>
  <input type="text" name="Pnum" placeholder=" Enter phone number" id="inputPhoneNumber" required>
    <P>First Name:</P>
  <input type="text" name="Fname" placeholder="Enter first name" id="inputFirstName" required>

  <P>Last Name:</P>
  <input type="text" name="Lname" placeholder="Enter last name" id="inputLastName" required>
  
  
   <label> Gender:
   <select name="gender" required>
   <option>Male</option>
   <option>Female</option>
   </select>
   </label> <br>
   <input type= "submit" value ="Register">

  
</form>

    
    </div>
	
	   </body>



</html>