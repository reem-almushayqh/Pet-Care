<?php
session_start();
include "db.php";
?>
<?php


//sign in
if (isset($_POST['inputEmailAddress'])) {
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = mysqli_real_escape_string($db, $_POST['inputEmailAddress']);
        
      $sql = "SELECT * FROM users WHERE status='Active' AND email = '$email'";
        
        $result = mysqli_query($db, $sql);
       
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            
               
             
                header("location: update-password.php?id=".$row['id']);
                //unset($_SESSION['error_accour']);
            }else{
              ?>
  <script>
    alert("Email incorrect")
    </script>
              <?php
            }
        }
    } 

?>
<!DOCTYPE html>

<!-- heding elements-->

<html>


  <head>
  
     <meta charset = "utf-8">
	 <title> Reset Password </title>
   <style type = "text/css">

    .box {
      width: 500px;
      height:350px;
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
  h2{
    margin: 0%;
    padding: 0 0 20;
    text-align: center;
    font-size: 20px;
  }
  .box input[type="text"], input[type="password"]
  {
  border: none;
  border-bottom: 1px solid rgb(12, 10, 10);
  background: transparent;
  outline-style: none;
  height: 40px;
  margin: 20px 40px;
  }
  .box input[type="submit"] {
    width: 200px;
		  padding: 15px 0;
		  text-align: center;
		  margin: 20px 120px;
		  border-radius: 25px;
		  font-weight: bold;
		  border: 2px solid #9FEDD7;
		  background: #9FEDD7;
		  color: rgb(0, 0, 0);
		  cursor: pointer;
		  position: relative;
		  
  }
  .header {
	height: 100vh;
	background-image: 
	linear-gradient(to right bottom, 
	rgb(159,237,215, 0.8),
	rgb(2,102,112,0.8)),
    url(pexels-helena-lopes-1904105.jpg);
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
   
    <div class="box">
      <img src="images/forgot-password.png" class="avatar">

    <h2> please enter the email address you'd like your password reset information sent to:</h2>
	

	<form method="post">
    <input type="text" name="inputEmailAddress" placeholder=" Enter E-mail">
  

 <br>

  <input type= "submit" value =" Request password reset link">

  </form>

    </div>
	
	   </body>



</html>