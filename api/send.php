<?php 
header('content-type: application/json; charset=utf-8');

if (isset($_GET["firstname"])) {
	$firstname = strip_tags($_GET['firstname']);
	$email = strip_tags($_GET['email']);
	$enquiry = strip_tags($_GET['enquiry']);
	$message = strip_tags($_GET['message']);
	$header = "From: ". $firstname . " <" . $email . ">rn"; 

	$ip = $_SERVER['REMOTE_ADDR']; 
	$httpref = $_SERVER['HTTP_REFERER']; 
	$httpagent = $_SERVER['HTTP_USER_AGENT']; 
	$today = date("F j, Y, g:i a");    
	
	$recipient = 'feedback@vindisere.co.uk';
	$subject = 'Contact Form';
	$mailbody = "
First Name: $firstname 
Email: $email  
Enquiry: $enquiry
Message: $message

IP: $ip
Browser info: $httpagent
Referral: $httpref
Sent: $today
";
	$result = 'success';

	if (mail($recipient, $subject, $mailbody, $header)) {
		echo json_encode($result);
	}
}
?>