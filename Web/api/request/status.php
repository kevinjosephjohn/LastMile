<?php

if ( isset( $_POST['type'] ) && $_POST['type'] != '' ) {
	// Get type
	$type = $_POST['type'];
	$servername = "localhost";
	$username = "laundry";
	$password = "awesomegod321";
	$dbname = "laundry";
	$id = $_POST['id'];

	if ( $type == 'accept' ) {


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

	else if ( $type == 'cancel' ) {

		$conn = new mysqli( $servername, $username, $password, $dbname );
		if ( $conn->connect_error ) {
			die( "Connection failed: " . $conn->connect_error );
		}
		$sql = "UPDATE drivers ".
			"SET idle = '1'".
			"WHERE id = $id" ;
		$result = $conn->query( $sql );
		$conn->close();
		echo "cancelled";

}
else if ( $type == 'ignore' ) {


		$conn = new mysqli( $servername, $username, $password, $dbname );
		if ( $conn->connect_error ) {
			die( "Connection failed: " . $conn->connect_error );
		}
		$sql = "UPDATE drivers ".
			"SET idle = '2'".
			"WHERE id = $id" ;
		$result = $conn->query( $sql );
		$conn->close();
		echo "ignored";

}
 else {
	echo "hello";
}
}
?>
