<?php

$destination=$_GET["destination"];
$origin=$_GET["origin"];

$routes=json_decode(file_get_contents('https://maps.googleapis.com/maps/api/directions/json?origin='.$origin.'&destination='.$destination.'&alternatives=true&sensor=false&key=AIzaSyCKayh83C7NftNZQv1x8NTKSc1sPLBP6uw'))->routes;

$add =explode( ',', $routes[0]->legs[0]->end_address);
$address = "$add[1],$add[2]";
$time =explode(' ', $routes[0]->legs[0]->duration->text);
$min = "$time[0]";

$arr = array('duration' => $routes[0]->legs[0]->duration->text, 'address' => $address);

echo json_encode($arr);
?>