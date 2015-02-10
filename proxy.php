<?php

$key = "" // put your forecast.io key here
define ('HOSTNAME', 'https://api.forecast.io/forecast/' . $key);

// Get the REST call path from the app
$path = $_REQUEST['path'];
$url = HOSTNAME.$path;

// Open the Curl session
$session = curl_init($url);

curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

// Make the call
$response = curl_exec($session);

header("Content-Type: application/json");

echo $response;
curl_close($session);

?>