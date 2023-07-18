<!DOCTYPE html>

<!-- heding elements-->

<html>


  <head>
  
     <meta charset = "utf-8">
	 <title> Pet Care </title>
	  
	  <style type = "text/css">
	  .main-text {
		  width: 90%;
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  transform: translate(-50%,-50%);
		  text-align: center;
	  }

	  button{
		  width: 200px;
		  padding: 15px 0;
		  text-align: center;
		  margin: 20px 10px;
		  border-radius: 25px;
		  font-weight: bold;
		  border: 2px solid #9FEDD7;
		  background: transparent;
		  color: rgb(0, 0, 0);
		  cursor: pointer;
		  position: relative;
		  overflow: hidden;

	  }
	  
	  span{
		  background-color:#9FEDD7 ;
		  height: 100%;
		  width: 0;
		  border-radius: 25px;
		  position: absolute;
		  left: 0;
		  bottom: 0;
		  z-index: -1;
		  transition: 0.5s;
	  }
	  
	  button:hover  span{
		  width: 100%;
	  }
	  button:hover{
		  border: none;
	  }
	  a{
		  text-decoration: none;
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
	font-family: 'Lato', sans-serif;
}

  </style>

   </head>
   
   <body>

	<header class="header">
		
	</header>
   
   <div class="main-text"> 
	<h1 style="color: #fff; font-size: 50px;">PetZone</h1>
    <h2><strong> Welcome  To Our Clinic  </strong></h2>
	<p>With petcare services and guidence  <br>
	we’re here to support your pet’s health in every way we can.</p>
	<br>

	<h2> Are you: </h2>
   <div>
	<a href="MangerLogIn.php">
	<button type="button"><span></span> Clinic Manager</button>
	</a>
	
	<a href="OwnerLogIn.php">
	<button type="button"><span></span>Pet Owner</button>
	</a>
     </div>
   </div>
	
	   </body>



</html>