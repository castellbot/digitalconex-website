<?php
include("../sendmail.php");
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{
	echo "No arguments Provided!";
	return false;
}

$name = $_POST['name'];
$email_address = $_POST['email'];
// $phone = $_POST['phone'];
$message = $_POST['message'];
	
// Create the email and send the message
$to = 'info@digitalconex.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.<br />"."Here are the details:<br />- <strong>Name</strong>: $name <br />- <strong>Email</strong>: $email_address<br />- <strong>Message</strong>: $message";
// $headers = "From: noreply@digitalconex.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
// $headers .= "Reply-To: $email_address";	
$name = "DigitalConex";
// mail($to,$email_subject,$email_body,$headers);
// return true;
$mailsend =   sendmail($to,$email_subject,$email_body,$name);
if($mailsend==1){
	return true;
}
else{
	return false;
}
?>