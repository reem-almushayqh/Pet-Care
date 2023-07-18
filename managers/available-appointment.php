<?php
session_start();
include '../db.php';




if (isset($_GET['delete'])) {
	$query = "DELETE FROM `services_appointment` WHERE `id` = ".$_GET['delete']."";
				if ($db->query($query)) {
                  
					?>

<script>
	alert("Appointment Successfully Deleted");

    


</script>

<?php
	
			}
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>First page</title>
<style>


table {
  border-collapse: collapse;
  width: 100%;
}

td { background-color: #FEF9C7;
text-align: LEFT;
  padding: 10px;
}

th{ background-color: #FEF181;}

tr {
  background-color: white;
}
body {
  background-color: #EDEAE5;
}

.content {
  max-width: 500px;
  margin: auto;
  background: #EDEAE5;
  padding: 3px; 
top:55%;
left:50%;  
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
<div class = "content">


<h3> Here is the avalible appointments... Click to View, Edit, Delet </h3> 
<button class="button" type="button"><a href="add-available-appointment.php">Add New</a></button>

<table border= "1">
<tr><th colspan="6"> <strong> Available appointments</strong> </th></tr>
<tr><th>Service </th>
<th>Date</th>
<th>Time</th>
<th colspan="3"> Manage the appointment</th><tr>
<?php
$sql = "SELECT * from services_appointment";

$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {
?>

<tr>
                <td>
                <?php
$sql2 = "SELECT * from services where id='{$row1['service_id']}'";

$run_query2 = mysqli_query($db, $sql2);

if (mysqli_num_rows($run_query2) > 0) {
    while ($row2 = mysqli_fetch_assoc($run_query2)) {
?>
<?php echo $row2['name'] ?>
<?php
    }
}
                  ?>    
               </td>
                <td><?php echo $row1['date'] ?></td>
                <td><?php echo $row1['time'] ?></td>
                <td><a href= "view-available-appointment.php?id=<?php echo $row1['id'] ?>"><img alt="View" src="../images/docview.png" width="30" height="30"></img></a></td>
                <td><a href="edit-available-appointment.php?id=<?php echo $row1['id'] ?>"><img src="../images/editpic.jpg" alt="edit" width="30" height="30"></a></td>
                <td><a href="available-appointment.php?delete=<?php echo $row1['id'] ?>"><img src="../images/delet.png" alt="delete" width="30" 
            height="30"></a></td>      <div class ="pic">  
             </div>
              </tr>
<?php
    }
}
                  ?>										
 
</table>

</div>
</div>
</div>
</body>
</html>
