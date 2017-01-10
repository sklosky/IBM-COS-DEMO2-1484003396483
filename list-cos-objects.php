<?php
//
// list_cos_objects
//

require 'vendor/autoload.php';
require 'variables.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
//date_default_timezone_set ( 'America/Los_Angeles' );

//
// Receive the bucket name from the get bucket name form
// 
$mybucket = $_POST['mybucket'];

//
// Instantiate the client.
//
$s3 = S3Client::factory(array(
    'version' => 'latest',
    'region'  => '',
    'endpoint' => 'http://'.$ENDPOINT,
    'credentials' => array(
         'key'    => $ACCESSKEY,
         'secret' => $SECRETKEY
    )
));

//
// Use the plain API (returns ONLY up to 1000 of your objects).
//
        try {
        $result2 = $s3->listObjects(array('Bucket' => $mybucket));
        } catch (S3Exception $e) {
        echo "\n";
        continue ;
        } 
        

        foreach ($result2['Contents'] as $object) {
           echo "<tb>";
           echo "---> ".$object['Key'] . "\n";
           echo "<br>";
           }

?>
