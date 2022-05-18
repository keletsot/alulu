<?php
if(!session_id()) {
    session_start();
}

require_once('Facebook/autoload.php');

use FacebookAds\Object\Lead;

$challenge = isset($_REQUEST['hub_challenge']) ? $_REQUEST['hub_challenge'] : "";

$verify_token = isset($_REQUEST['hub_verify_token']) ? $_REQUEST['hub_verify_token'] : "";

if ($verify_token == 'VERIFY_TOKEN') {
    
    echo $challenge;
    //var_dump($challenge);
}

$input = json_decode(file_get_contents('php://input'), true);
error_log(print_r($input, true)); // Output payload into php error logs for additional reference

// Write payload contents into a text file for reference
$file = fopen("testleads.txt","w") or die("Unable to open file!!!");
echo fwrite($file, json_encode($input));
fclose($file);
?>
  