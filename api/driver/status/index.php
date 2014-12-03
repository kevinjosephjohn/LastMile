<?php

if ( isset( $_POST['type'] ) && $_POST['type'] != '' ) {

  // Get type
  $type = $_POST['type'];
  $servername = "localhost";
  $username = "laundry";
  $password = "awesomegod321";
  $dbname = "laundry";

  $id = $_POST['id'];
  $lat = $_POST["lat"];
  $lng = $_POST["lng"];


 if ( $type == 'update' ) {

    $conn = new mysqli( $servername, $username, $password, $dbname );
    if ( $conn->connect_error ) {
      die( "Connection failed: " . $conn->connect_error );
    }
    $sql = "UPDATE drivers ".
      "SET lat = '$lat',lng = '$lng'".
      "WHERE id = $id" ;
    $result = $conn->query( $sql );
    $conn->close();
    echo "updated";

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