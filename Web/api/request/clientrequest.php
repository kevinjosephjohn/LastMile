<?php

$conn = mysql_connect("localhost", "laundry", "awesomegod321") or die(mysql_error());
mysql_select_db("laundry") or die(mysql_error());

// PHP/MySQL code
$sourceLat = $_POST["lat"];
$sourceLon = $_POST["lng"];
$flag =0;

//$sourceLat = "13.09942";
//$sourceLon = "80.194206";

$radiusKm  = 3;

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










// GETTING DRIVER GCMID AND CAR ID

  $recordsWithinRadius[$car]['duration']=$recordsWithinRadius[$car]['duration']." min";
  $near = json_encode( $recordsWithinRadius[$car] );
  $etajson = json_decode($near);
  $final = array('driver' =>  $etajson);
  $finaljson = json_encode($final);
  
  $a1=json_decode($finaljson);
  $gcmid = $a1->driver->gcm_regid;
  $carid = $a1->driver->id;

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


$sql = "UPDATE drivers ".
       "SET idle = $status ".
       "WHERE id = $id" ;
if ($conn->query($sql) === TRUE) {
} else {
   $conn->error;
}

$conn->close();

}

else
{
  $url = getAddress($sourceLat,$sourceLon);
  $ajson=json_decode($url);
  $nocar = array();
  $arr = array('cars' => $nocar,'eta' => "NO CARS", 'address' => $ajson->address);
  
  echo json_encode($arr);

}
  
    $regId = $gcmid;
    $message = "Do you want to accept?";
    include_once './GCM.php';
    $gcm = new GCM();
    $registatoin_ids = array($regId);
    $message = array("price" => $message);
    $result = $gcm->send_notification($registatoin_ids, $message);

    //echo $finaljson;





exit();


?>