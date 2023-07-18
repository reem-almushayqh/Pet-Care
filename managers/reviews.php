<?php
session_start();
include '../db.php';
?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Review</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type = "text/css">




    	    .floated { background-color: #FEF181;
               font-size: 1.5em;
               font-family: arial,helvetica,sans-serif;
               padding: .2em;
               margin-left: .8em;
               margin-bottom: .5em;
               float: center;
               text-align: center;
               width: 80%;
            }
            p{ 
            	font-size: 1.5em;
               font-family: arial,helvetica,sans-serif;
               padding: .2em;
               margin-left: .8em;
               margin-bottom: .5em;
               float: center;
               text-align: center;
               width: 80%;
             }
                 img.picture{
                 display: block;
                 margin: 0 auto;
                 }

                .div{
                 	background-color: transparent;
               font-size: 15px;
               font-family: arial,helvetica,sans-serif;
               padding: .2em;
               margin-left: .8em;
               margin-bottom: .5em;
               float: center;
               text-align: center;
               width: 30%;

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
<!--<p> <label>What do you like about our services?<br><br><br>
	<textarea name = "Pet owner review"
		rows = "15" clos = "36">Enter your review here
	</textarea> 
</label>
</p>!-->


<p> 
	Some of our customer's reviews
</p>

<?php
$reviews="";
$i = 0;

$sql = "SELECT * from reviews";

$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {


      $sql2 = "SELECT * from users where  id = '{$row1['userId']}'";

$run_query2 = mysqli_query($db, $sql2);

if (mysqli_num_rows($run_query2) > 0) {
    while ($row2 = mysqli_fetch_assoc($run_query2)) {

        
        $rating=$row1['rating1']+$row1['rating2']+$row1['rating3'];
        $rating=$rating/3;

$reviews = $reviews.'<div  class="div"style="border: 2px solid black;" >
'.$row1['created_at'].' — Rated '.round($rating,1).' out of 10 by '. $row2['first_name']  ." ".$row2['last_name'] .'<br> 
'. $row1['review']  .'
</div>
<br>

';



    }
  }

}
}
echo $reviews;
  ?>

</body>
</html>