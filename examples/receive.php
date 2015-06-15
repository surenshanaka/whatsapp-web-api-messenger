<?php
error_reporting(0);
// This file is part of a tutorial on the blog of Philipp C. Heckel, July 2013
// http://blog.philippheckel.com/2013/07/07/send-whatsapp-messages-via-php-script-using-whatsapi/

require_once '../src/whatsprot.class.php';
// require_once('whatsapp_whatsapi_config.php');

$userPhone        = 'enter here your mobile number'; 
// $userIdentity     = '012345678901234';
// $userName         = 'Your Name'; 
$password         = 'enter here your password'; 
$debug            = false;


 
$w = new WhatsProt($userPhone, $debug);
$w->Connect();
$w->LoginWithPassword($password);
 
while (true) {
    $w->pollMessage();
    $msgs = $w->GetMessages();
    // print_r($msgs);
    foreach($msgs as $message)
	{
	    $from = $message->getAttribute("from");
	    $id = $message->getAttribute("id");
	    $notify = $message->getAttribute("notify");
	    echo "Sender:-".$notify."<br>";
	    echo "Tel:-".$from."<br>";
	    if($message->getChild("body"))
	    {
	        $messagebody = $message->getChild("body")->getData();
	        echo "Message:-".$messagebody;
	    }
	    
	}
}

?>
