<?php
//
// create-cos-bucket.php
//

require 'vendor/autoload.php';
require 'variables.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
//date_default_timezone_set ( 'America/Los_Angeles' );

//
// Receive bucket name from the previous form
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

$s3->createBucket(['Bucket' => $mybucket]);

// Print the bucket name.
print "Created: {$mybucket}".PHP_EOL;

?>
