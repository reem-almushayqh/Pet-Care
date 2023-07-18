<?php
session_start();
include '../db.php';
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
    <title>Service</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>

     img.picture 
     {
      display: block;
      margin: 0 auto;
     }
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
            .button{
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

.content {
  max-width: 500px;
  margin: auto;
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

  <div>
        
<table border = "1">
	<caption>List of our services</caption>

	<thead>
		<tr>
			<th rowspan = "2">Picture</th>
			<th>The service</th>
			<th>Description</th>
			<th>Price</th>
			
	</tr>

<tbody>
	
<?php
$pets="";
$i = 0;

$sql = "SELECT * from services ";

$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {

        $i++;

?>

<tr>
		<td>				
			<img src = "../images/srvices/<?php echo $row1['image'] ?>" width = "205" 
				height = "167" alt = "picture of a service"></td>
		<td> <?php echo $row1['name'] ?></td>
		<td><?php echo $row1['details'] ?></td>
		<td><?php echo $row1['price'] ?></td>

		</tr>
<?php



    }
  }
echo $pets;
  ?>
	

	</tbody>

<button class="button" type="button"><a href="add-service.php">Add service</a></button>

</body>
</html>