<?php
//
// list-cos-buckets.php
//

require 'variables.php';
require 'vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
//date_default_timezone_set ( 'America/Los_Angeles' );

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
// Loop through each bucket
//
try {
    $result = $s3->listBuckets(array());
    foreach ($result['Buckets'] as $bucket) {
        echo $bucket['Name'];
        echo "<br>";
    }
} catch (S3Exception $e) {
    echo $e->getMessage() . "\n";
}

?>
