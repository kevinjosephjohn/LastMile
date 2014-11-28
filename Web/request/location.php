<?php
$servername = "localhost";
$username = "laundry";
$password = "awesomegod321";
$dbname = "laundry";
$status = 0;

$id = $_POST['did'];
$lat = $_POST["lat"];
$lng = $_POST["lng"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$sql = "UPDATE stores SET idle='0' WHERE id=".$id.;
$sql = "UPDATE drivers ".
       "SET lat=$lat,lng=$lng ".
       "WHERE id = $id" ;
if ($conn->query($sql) === TRUE) {
    echo "Updated to".$lat.$lng;
} else {
    echo "Error booking the car " . $conn->error;
}

$conn->close();
?>