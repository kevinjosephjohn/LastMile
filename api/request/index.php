
<?php
if ( isset( $_POST['type'] ) && $_POST['type'] != '' ) {
  // Get type
  $type = $_POST['type'];
  $servername = "localhost";
  $username = "laundry";
  $password = "awesomegod321";
  $dbname = "laundry";
  $id = $_POST['id'];
  $sourceLat = $_POST["lat"];
  $sourceLon = $_POST["lng"];
  $clientid = $_POST["uid"];
 if ( $type == 'accept' ) {
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
else if ( $type == 'request' ) {
$conn = mysql_connect("localhost", "laundry", "awesomegod321") or die(mysql_error());
mysql_select_db("laundry") or die(mysql_error());
// PHP/MySQL code
$sourceLat = $_POST["lat"];
$sourceLon = $_POST["lng"];
$clientid = $_POST["uid"];
//$sourceLat = "13.09942";
//$sourceLon = "80.194206";
$servername = "localhost";
$username = "laundry";
$password = "awesomegod321";
$dbname = "laundry";
$uid = $clientid;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "UPDATE users ".
       "SET lat = $sourceLat,lng= $sourceLon ".
       "WHERE uid = $uid" ;
$result = $conn->query($sql);
$conn->close();
$radiusKm  = 3;
// calculate geographical proximity
function mathGeoProximity( $latitude, $longitude, $radius, $miles = false )
{
    $radius = $miles ? $radius : ($radius * 0.621371192);
    $lng_min = $longitude - $radius / abs(cos(deg2rad($latitude)) * 69);
    $lng_max = $longitude + $radius / abs(cos(deg2rad($latitude)) * 69);
    $lat_min = $latitude - ($radius / 69);
    $lat_max = $latitude + ($radius / 69);
    return array(
        'latitudeMin'  => $lat_min,
        'latitudeMax'  => $lat_max,
        'longitudeMin' => $lng_min,
        'longitudeMax' => $lng_max
    );
}
// calculate geographical distance between 2 points
function mathGeoDistance( $lat1, $lng1, $lat2, $lng2, $miles = false )
{
    $pi80 = M_PI / 180;
    $lat1 *= $pi80;
    $lng1 *= $pi80;
    $lat2 *= $pi80;
    $lng2 *= $pi80;
    $r = 6372.797; // mean radius of Earth in km
    $dlat = $lat2 - $lat1;
    $dlng = $lng2 - $lng1;
    $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $km = $r * $c;
    return ($miles ? ($km * 0.621371192) : $km);
}
$proximity = mathGeoProximity($sourceLat, $sourceLon, $radiusKm);
$result    = mysql_query("
    SELECT * 
    FROM   drivers
    WHERE  idle=1 AND (lat BETWEEN " . number_format($proximity['latitudeMin'], 12, '.', '') . "
            AND " . number_format($proximity['latitudeMax'], 12, '.', '') . ")
      AND (lng BETWEEN " . number_format($proximity['longitudeMin'], 12, '.', '') . "
            AND " . number_format($proximity['longitudeMax'], 12, '.', '') . ")
");
// fetch all record and check wether they are really within the radius
$recordsWithinRadius = array();
while ($record = mysql_fetch_assoc($result)) {
  $distance = mathGeoDistance($sourceLat, $sourceLon, $record['lat'], $record['lng']);
    if ($distance <= $radiusKm) {
      $recordsWithinRadius[] = $record;
    }
}
function getAddress($sourceLat,$sourceLon)
{
$routes=json_decode(file_get_contents("https://maps.googleapis.com/maps/api/directions/json?origin=12.6336,80.088613&destination=".$sourceLat.",".$sourceLon."&key=AIzaSyCKayh83C7NftNZQv1x8NTKSc1sPLBP6uw"))->routes;
$add =explode( ',', $routes[0]->legs[0]->end_address);
$address = "$add[1],$add[2]";
$time =explode(' ', $routes[0]->legs[0]->duration->text);
$min = "$time[0]";
$arr = array('duration' => $routes[0]->legs[0]->duration->text, 'address' => $address);
$address = json_encode($arr);
return $address;
}
//add duration to record
if($recordsWithinRadius != null)
 {
foreach($recordsWithinRadius as &$r){
  $json=json_decode(file_get_contents('http://128.199.134.210/api/durationapi.php?destination='.$sourceLat.",".$sourceLon."&origin=".$r['lat'].",".$r['lng']));
  $duration=$json->duration;
  $duration=split(' ',$duration);
  
  $r['duration']=$duration[0];
  $r['address']=$json->address;
  
}
//sort
$shortest=$recordsWithinRadius[0]['duration']; 
$car=0; 
for($i=0;$i<count($recordsWithinRadius);$i++){
  $cur=$recordsWithinRadius[$i]['duration'];
  if($cur!=''){
  if($cur<$shortest){
    $shortest=$cur;
    $car=$i;
  }
}
}
$recordsWithinRadius[$car]['duration']=$recordsWithinRadius[$car]['duration']." min";
  $nearcar = $recordsWithinRadius[$car];

  $driverid = $nearcar["id"];
  $drivername = $nearcar["firstname"];
  $phone = $nearcar["phone"];
  $carname = $nearcar["carname"];
  $carno = $nearcar["carno"];
  $driverlat = $nearcar["lat"];
  $driverlng = $nearcar["lng"];
  $driverduration = $nearcar["duration"];
  $drivergcmid = $nearcar["gcm_regid"];




  $selected = array("id" => $driverid,"duration" => $driverduration,"drivename" => $drivername,"phone" => $phone,"carname" => $carname,"carno" => $carno,"phone" => $phone,"lat" => $driverlat,"lng" => $driverlng,"gcm_regid" => $drivergcmid);


  $near = json_encode( $selected );
  $etajson = json_decode($near);

  $final = array('driver' =>  $etajson);
  $finaljson = json_encode($final);
  $a1=json_decode($finaljson);
  $gcmid = $a1->driver->gcm_regid;
  $carid = $a1->driver->id;
  $time = $a1->driver->duration;
  function getuserdetails($clientid,$time){
$servername = "localhost";
$username = "laundry";
$password = "awesomegod321";
$dbname = "laundry";
$uid = $clientid;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM users WHERE uid=$uid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
       $new =  array("name" => $row["firstname"],"phone" => $row["phone"],"lat" => $row["lat"], "lng"=>$row["lng"],"eta"=>$time);
       return json_encode($new);
   }
} else {
 echo $uid;
}
}
$zx = getuserdetails($clientid,$time);
 // SEND GCM TO DRIVER
    $regId = $gcmid;
    $message = $zx;
    
    include_once './GCM.php';
    
    $gcm = new GCM();
    $registatoin_ids = array($regId);
    $message = array("price" => $message);
    $result = $gcm->send_notification($registatoin_ids, $message);
  function caridcheck($carid){
$servername = "localhost";
$username = "laundry";
$password = "awesomegod321";
$dbname = "laundry";
$status = 0;
$id = $carid;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT idle FROM drivers WHERE id=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $carstatus =  $row["idle"];
        return $carstatus;
    }
} else {
  
}
$conn->close();
}
  function getgcm($clientid){
$servername = "localhost";
$username = "laundry";
$password = "awesomegod321";
$dbname = "laundry";
$uid = $clientid;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT gcm_regid FROM users WHERE uid=$uid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $new =  $row["gcm_regid"];
        return $new;
    }
} else {
  echo $uid;
}
$conn->close();
}
$clientgcm=getgcm($clientid);
}
a:
$st=caridcheck($carid);
if($st==0)
{
      $regId = $clientgcm;
    $message = "You have a ride";

    include_once './GCM.php';
    
    $gcm = new GCM();

    $registatoin_ids = array($regId);
    $message = array("price" => $message);

    $result = $gcm->send_notification($registatoin_ids, $message);
    echo $finaljson;
}
else
{
  goto a;
}
  
}
}