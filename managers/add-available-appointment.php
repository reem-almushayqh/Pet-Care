<?php
session_start();
include '../db.php';


if (isset($_POST['name'])) {

   

$name = mysqli_real_escape_string($db, $_POST['name']);
$date = mysqli_real_escape_string($db, $_POST['date']);
$time = mysqli_real_escape_string($db, $_POST['time']);
$sql = "INSERT INTO services_appointment (service_id,date,time)
            VALUES ('{$name}','{$date}','{$time}')";
if (mysqli_query($db, $sql)) {
    ?>
    <script>
    alert("Add Appointment successfully!")
    window.location.href = "available-appointment.php";
    </script>
              <?php
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
    echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert.</p>";
}
}?>
<!DOCTYPE html>
<head>
<meta charset = "utf-8">
<title> edit2 </title>

<style>

button {
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
  background: #fff;
  padding: 10px;
}body {
  background-color: #fff;
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
<link rel="stylesheet" type="text/css" href="style.css">
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
<div class="content">

<fieldset>
<form method="post" action="">
        <h3>Appointment</h3>
            <p><strong>Service:</strong> <br>
<select name ="name" required>
<?php
$sql = "SELECT * from services";

$run_query = mysqli_query($db, $sql);

if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {
?>
<option value="<?php echo $row1['id'] ?>"><?php echo $row1['name'] ?></option>
<?php
    }
}
?></select>
                  <br>

            <p><label><strong>Date:</strong>
                <input name="date" type="date" required>
            </label></p>

            <p><label><strong>Time:</strong>
                <input name="time" type="time"  min="09:00" max="21:00" required>
  
            </label></p>
            <p>

<button type="submit">Save</button>
            </p>
            </form>
        </fieldset>

  <br>
 </div>
</body>
</html>
