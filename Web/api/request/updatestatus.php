<?php

$id = $_POST['id'];

$servername = "localhost";
$username = "laundry";
$password = "awesomegod321";
$dbname = "laundry";
$status = 0;


$uid = $clientid;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "UPDATE drivers ".
       "SET idle = $status ".
       "WHERE id = $id" ;
$result = $conn->query($sql);

$conn->close();

