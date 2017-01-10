<?php
//
// upload-cos-object.php
//

require 'variables.php';
require 'vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
//date_default_timezone_set ( 'America/Los_Angeles' );

//
// Get the filename from the previous form
//
$myuploadfile = $_POST['myfile'];
$key = $myuploadfile;

$bucket = $_POST['mybucket'];

//
// Instantiate the client.
//
$s3 = S3Client::factory(array(
    'version' => 'latest',
    'region'  => '',
    'endpoint' => 'http://'.$ENDPOINT,
//  'profile' => 'pool2',
    'credentials' => array(
         'key'    => $ACCESSKEY,
         'secret' => $SECRETKEY
    )
));

$result =$s3->putObject(array(
    'Bucket' => $bucket,
    'Key'    => $key,
    'SourceFile' => $myuploadfile
));

// Print the .
print "File uploaded: {$myuploadfile}".PHP_EOL;
?>