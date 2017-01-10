<?php
//
// list_cos_objects
//

require 'vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
//date_default_timezone_set ( 'America/Los_Angeles' );

$host = 's3-api.us-geo.objectstorage.softlayer.net';
$accesskey = 'zLTY2mbQlxtSVKEwNHpC';
$secretkey = 'OXD1eo4lumy55184x6RiAUhFrSbEFykRPgAYpKfw';

//
// Receive the bucket name from the get bucket name form
// 
$mybucket = $_POST['mybucket'];  // Recieve Subtenant from the main_login form

//
// Instantiate the client.
//
$s3 = S3Client::factory(array(
    'version' => 'latest',
    'region'  => '',
    'endpoint' => 'http://'.$host,
//    'profile' => 'pool2',
    'credentials' => array(
         'key'    => $accesskey,
         'secret' => $secretkey
    )
));

//
// Use the plain API (returns ONLY up to 1000 of your objects).
//
try {
    $result = $s3->listObjects(array('Bucket' => $mybucket));

    echo $mybucket;
    echo "<br>";
    foreach ($result['Contents'] as $object) {
        echo "===> ";
        echo $object['Key'];
        echo "<br>";
    }
} catch (S3Exception $e) {
    echo "Bucket not found\n";
//    echo $e->getMessage() . "\n";
}

?>
