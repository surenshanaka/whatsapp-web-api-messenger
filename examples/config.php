<?php
require_once '../src/whatsprot.class.php';
$username ='enter here your sender mobile number'; //Mobile Phone prefixed with country code so for india it will be 91xxxxxxxx
$password = 'enter here your encrypted password';

$w = new WhatsProt($username, 0, '', true); //Name your application by replacing “WhatsApp Messaging”
$w->connect();
$w->loginWithPassword($password);
$receiver = $_POST['receiver'];
$message = $_POST['message'];
if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];   
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    $extensions = array("jpeg","jpg","png","gif"); 		
    if(in_array($file_ext,$extensions )=== false){
     $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    if($file_size > 2097152){
    $errors[]='File size must be excately 2 MB';
    }				
    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"demo/".$file_name);        
        echo "Success";
    }else{
        print_r($errors);
    }
}
// $img = $_POST['img'];
// $target = $receiver; //Target Phone,reciever phone
// $message = $message;
$filepath = "demo/".$file_name;
// $pathToVideo = "media/Canon.mp4";
// $w->SendPresenceSubscription($target); //Let us first send presence to user
$w->sendMessage($receiver,$message ); // Send Message
$w->sendMessageImage($receiver, $filepath);
// $w->sendMessageVideo($receiver, $pathToVideo);
$w->pollMessage();
echo 'Message Sent Successfully';

header("Location: send.php?success=1");
?>
