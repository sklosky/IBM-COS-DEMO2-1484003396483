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
// Get the bucket name
//
$bucket = $_POST['mybucket'];

//
// Get the filename from the previous form
//
$fileName = $_FILES['myfile']['name'];
$fileTempName = $_FILES['myfile']['tmp_name'];

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

$result =$s3->putObject(array(
				'Bucket'       => $bucket,
				'Key'          => $fileName,
				'SourceFile'   => $fileTempName
));

// Print the .
print "File uploaded: {$myuploadfile}".PHP_EOL;
echo "<BR>";
echo "Bucket = " . $bucket;
?>