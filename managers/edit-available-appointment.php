<?php
session_start();
include '../db.php';


if (isset($_POST['name'])) {
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $updateQuery = "UPDATE services_appointment SET `service_id` = '" . $_POST['name'] . "', `date` = '" . $_POST['date'] . "',`time` = '" . $_POST['time'] . "' WHERE `id` = '" . $_GET['id'] . "'";
            

        if (mysqli_query($db, $updateQuery)) {

        
            ?>
            <script>
              alert("Appointment update successfully!")
              window.location.href = "available-appointment.php";

              </script>
                        <?php
        } else {
            echo "Error: " . $updateQuery . "<br>" . mysqli_error($db);
            echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Update.</p>";
        }



        



    }
}



?>
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
</style>
<link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>
  <script language="javascript" type="text/javascript" src="Mheader.js"></script>
<div class="content">

<fieldset>
<?php

$sql2 = "SELECT * from services_appointment  where id='" . $_GET['id'] . "' ";
$query2 = mysqli_query($db, $sql2);

if (mysqli_num_rows($query2) > 0) {
    while ($row2 = mysqli_fetch_assoc($query2)) {
?>
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
<option <?php if($row1['id']==$row2['service_id']){
                                    echo "selected";
                                } ?> value="<?php echo $row1['id'] ?>"><?php echo $row1['name'] ?></option>
<?php
    }
}
?></select>
                  <br>

            <p><label><strong>Date:</strong>
                <input name="date" type="date" required value="<?php echo $row2['date'] ?>">
            </label></p>

            <p><label><strong>Time:</strong>
                <input name="time" type="time"  min="09:00" max="21:00" required value="<?php echo $row2['time'] ?>">
  
            </label></p>
            <p>

<button type="submit">Save</button>
            </p>
            </form>
            
<?php
    }
}
?>
        </fieldset>

  <br>
 </div>
</body>
</html>
