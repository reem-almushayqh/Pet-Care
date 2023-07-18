<?php
session_start();
include "db.php";
?>
<?php


//sign in
if (isset($_POST['inputEmailAddress'])) {
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = mysqli_real_escape_string($db, $_POST['inputEmailAddress']);
        $password = mysqli_real_escape_string($db, $_POST['inputPassword']);
        
      $sql = "SELECT * FROM users WHERE status='Active' AND email = '$email' AND password = '$password'";
        
        $result = mysqli_query($db, $sql);
       
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            
                $userrole =  $row['role'];
                $_SESSION['loggedin_first_name']= $row['first_name'];
                $_SESSION['loggedin_last_name']= $row['last_name'];
                $_SESSION['loggedinusername']= $row['first_name']." ".$row['last_name'];
                $_SESSION['loggedinuseremail'] = $email;
                $_SESSION['loggedinuserphone'] = $row['phone'];
                $_SESSION['loggedinusergender'] = $row['gender'];
                $_SESSION['loggedinuserimage'] = $row['image'];
                
                $_SESSION['loggedinuserid'] = $row['id'];
                $_SESSION['loggedinuserrole'] = $userrole;
               if($userrole=='1'){
                 ?>
 <script>
    alert("You are not allowed login as a manager")
    </script>
                 <?php
                  
                }elseif($userrole=='0'){
                    header("location: owner/account.php");
                }
                //unset($_SESSION['error_accour']);
            }else{
              ?>
  <script>
    alert("Email or Password incorrect")
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
	 <title> Pet Owner login </title>
   <style type = "text/css">

  .loginbox {
    width: 320px;
    height:450px;
    background: #EDEAE5;
    color: black;
    top: 50%;
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
		  margin: 20px 30px;
		  border-radius: 25px;
		  font-weight: bold;
		  border: 2px solid #9FEDD7;
		  background: #9FEDD7;
		  color: rgb(0, 0, 0);
		  cursor: pointer;
		  position: relative;
		  overflow: hidden;
  }
   .loginbox a{
     text-decoration: none;
     font-size: 15px;
     line-height: 20px;
     margin: 20px 10px;
     color: rgb(121, 121, 121);
   }

   .loginbox a:hover 
   {
     color: #80d3bc;
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
 button {
  width: 200px;
		  padding: 15px 0;
		  text-align: center;
		  margin: 20px 30px;
		  border-radius: 25px;
		  font-weight: bold;
		  border: 2px solid #9FEDD7;
		  background: #9FEDD7;
		  color: rgb(0, 0, 0);
		  cursor: pointer;
		  position: relative;
		  overflow: hidden;
 }
   
   

   </style>
 
   </head>
   
   <body>
    <header class="header">
		
    </header>

   <div class="loginbox">
     <img src="images/user.png" class="avatar">

     <h1><strong> Login </strong></h1>
     <br>
	
     <form method="post">
     <P>E-mail Address:</P>
  <input type="text" name="inputEmailAddress" placeholder=" Enter E-mail">
    <P>Password:</P>
  <input type="password" name="inputPassword" placeholder="Enter password">
  <br>
  <button>Login</button>
    <!--<input type= "submit" name="" value ="Login">-->

    <a href = "Resetpass.php">Forgot password?</a> <br>
  
   <a href = "register.php">Not registered yet? Register now!</a></p>
  </form> 

   </div>
	   </body>



</html>