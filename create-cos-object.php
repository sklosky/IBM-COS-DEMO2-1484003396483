<?php
//
// create-cos-object.php
//

require 'variables.php';
require 'vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
//date_default_timezone_set ( 'America/Los_Angeles' );
$host = 'vpod02-acc01';
//$bucket = 'vault-2';
$bucket = $VAULT;

//
// Receive object name and string text from the previous form
// 
$myobject = $_POST['myobject'];
$mystring = $_POST['mystring'];

//
// Instantiate the client.
//
$s3 = S3Client::factory(array(
    'version' => 'latest',
    'region'  => 'us-west-1',
    'endpoint' => 'http://'.$ENDPOINT,
//  'profile' => 'pool2',
    'credentials' => array(
         'key'    => $ACCESSKEY,
         'secret' => $SECRETKEY
    )
));

$s3->putObject([
    'Bucket' => $bucket,
    'Key'    => $myobject,
    'Body'   => $mystring
]);

// Print the body of the result by indexing into the result object.
print "Created object: {$myobject}".PHP_EOL;

?>
