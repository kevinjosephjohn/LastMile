<?php

if ( isset( $_POST['type'] ) && $_POST['type'] != '' ) {

  // Get type
  $type = $_POST['type'];
  $servername = "localhost";
  $username = "laundry";
  $password = "awesomegod321";
  $dbname = "laundry";

  $loc=$_POST["location"];
  $add =explode( ',', $loc);
  $location = "$add[0],$add[1]";
  $rot = $add[2];
  $id = $_POST['did'];
  $cid = $_POST['cid'];
  $lat = $_POST["lat"];
  $lng = $_POST["lng"];


 if ( $type == 'update' ) {

$routes=json_decode(file_get_contents('https://maps.googleapis.com/maps/api/directions/json?origin='.$location.'&destination='.$location.'&alternatives=true&sensor=false&key=AIzaSyAMYDowI6uyNXbeMXPvvOdGup5RjhfrSpw'))->routes;

// $location = $routes[0]->bounds->northeast;

$lat =  $routes[0]->bounds->northeast->lat;
$lng =  $routes[0]->bounds->northeast->lng;
$rotation = stripslashes($rot);

    $conn = new mysqli( $servername, $username, $password, $dbname );
    if ( $conn->connect_error ) {
      die( "Connection failed: " . $conn->connect_error );
    }
    $sql = "UPDATE drivers ".
      "SET lat = '$lat',lng = '$lng',rot = '$rot'".
      "WHERE id = $id" ;
    $result = $conn->query( $sql );
    $conn->close();

    $location = array('lat' => $lat,'lng' => $lng,'rot' => $rot );
    echo json_encode($location);

}

else if ( $type == 'accept' ) {

    $conn = new mysqli( $servername, $username, $password, $dbname );
    if ( $conn->connect_error ) {
      die( "Connection failed: " . $conn->connect_error );
    }
    $sql = "UPDATE drivers ".
      "SET idle = '0'".
      "WHERE id = $id" ;
    $result = $conn->query( $sql );
    $conn->close();
    echo "accepted";

}

  else if ( $type == 'online' ) {

    $conn = new mysqli( $servername, $username, $password, $dbname );
    if ( $conn->connect_error ) {
      die( "Connection failed: " . $conn->connect_error );
    }
    $sql = "UPDATE drivers ".
      "SET idle = '1'".
      "WHERE id = $id" ;
    $result = $conn->query( $sql );
    $conn->close();
    echo "online";

}
else if ( $type == 'offline' ) {


    $conn = new mysqli( $servername, $username, $password, $dbname );
    if ( $conn->connect_error ) {
      die( "Connection failed: " . $conn->connect_error );
    }
    $sql = "UPDATE drivers ".
      "SET idle = '2'".
      "WHERE id = $id" ;
    $result = $conn->query( $sql );
    $conn->close();
    echo "offline";

}

else if ( $type = 'cancel') {

 $conn = new mysqli( $servername, $username, $password, $dbname );
    if ( $conn->connect_error ) {
      die( "Connection failed: " . $conn->connect_error );
    }
   
    $sql = "SELECT * FROM users WHERE uid = $cid";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $usergcmid = $row["gcm_regid"];
    }
}
else {
  echo "error";
}
    $conn->close();

 // GCM CANCEL REQUEST TO DRIVER

    $regId = "APA91bH-pwusFMTZHs-e033PZAQJrsxUthfrm1pMWi_i9kpNTXuRJNaXj2Fj0ySJR3pzU_ax9KB-tePD5Z-jBJILQWU2-0aABwYc71uqvuvvSOpDYiZ1oFWMTebnErNXzefvuYsPsIuuwRPeFRJxWtwVIWznIwcpZA";
    $message = "Your trip has been cancelled";
    
    include_once './GCM.php';
    
    $gcm = new GCM();
    $registatoin_ids = array($regId);
    $message = array("price" => $message);
    $result = $gcm->send_notification($registatoin_ids, $message);

}

}