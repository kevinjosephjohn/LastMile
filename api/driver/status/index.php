<?php

if ( isset( $_POST['type'] ) && $_POST['type'] != '' ) {

  // Get type
  $type = $_POST['type'];
  $servername = "localhost";
  $username = "laundry";
  $password = "awesomegod321";
  $dbname = "laundry";

  $location=$_POST["location"];
  $id = $_POST['did'];
  $lat = $_POST["lat"];
  $lng = $_POST["lng"];


 if ( $type == 'update' ) {

$routes=json_decode(file_get_contents('https://maps.googleapis.com/maps/api/directions/json?origin='.$location.'&destination='.$location.'&alternatives=true&sensor=false&key=AIzaSyD6qy0v37hnfV300SLcnnzA9oryImoF2E4'))->routes;

$location = $routes[0]->bounds->northeast;

$lat =  $routes[0]->bounds->northeast->lat;
$lng =  $routes[0]->bounds->northeast->lng;


    $conn = new mysqli( $servername, $username, $password, $dbname );
    if ( $conn->connect_error ) {
      die( "Connection failed: " . $conn->connect_error );
    }
    $sql = "UPDATE drivers ".
      "SET lat = '$lat',lng = '$lng'".
      "WHERE id = $id" ;
    $result = $conn->query( $sql );
    $conn->close();
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
}