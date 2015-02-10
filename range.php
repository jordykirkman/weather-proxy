<?php

// this file iterates through an array of unicode times, fetches them all and echoes them back to the app

$key = "" // put your forecast.io key here
define ('HOSTNAME', 'https://api.forecast.io/forecast/' . $key);

$path = $_REQUEST['path'];
$days = $_REQUEST['days'];

$object = array();

  foreach ($days as $day) {

    // Open the Curl session
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_POST, false);
    curl_setopt($ch, CURLOPT_URL, HOSTNAME . $path . "," . $day);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Make the call
    $request = json_decode(curl_exec($ch));

    $object[] = $request->daily->data[0];

    curl_close($ch);  

  }


header("Content-Type: application/json");
$response = array(
  "daily" => $object
);

echo json_encode($response);

?>