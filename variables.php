<?php

// these are credentials to Steve's Test Account -- I plan to rotate these regularly
//$ENDPOINT = 's3-api.us-geo.objectstorage.softlayer.net';
//$ACCESSKEY = 'VfAY8vRGl6LvV4XjZaM7';
//$SECRETKEY = 'C6lhiZo1U32iHykYrTCa7SDRP9BUtesLzd7RVdBQ';

//Not sure if the environment variables will survive when the app is redeployed and restarted.
//Leaving the old settings commented out in the app until we nail down the expected behaviour.

$myEnvironment = $_ENV;
if (array_key_exists("ibmCosAccessKey", $myEnvironment)) {
	$ACCESSKEY = $myEnvironment['ibmCosAccessKey'];
}
if (array_key_exists("ibmCosSecretKey", $myEnvironment)) {
	$SECRETKEY = $myEnvironment['ibmCosSecretKey'];
}
if (array_key_exists("ibmCosEndpoint", $myEnvironment)) {
	$ENDPOINT = $myEnvironment['ibmCosEndpoint'];
}
?>