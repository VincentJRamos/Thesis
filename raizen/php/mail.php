<?php



$name = '';
$email = '';
$msg = '';
$subject = "Message from Raizen"; 

if($_POST) {

	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$msg = trim($_POST['message']);  
	$ip = $_SERVER['REMOTE_ADDR'];

  
	
	$to = "raizen@gmail.com";


	$message = "You have received email from: ".$name.", ".$email.".<br />";
	$message .= "Message: <br />".$msg."<br /><br />";
	$message .= "IP: ".$ip."<br />";
	$headers = "From: $email \n";
	$headers .= "Reply-To: $email \n";
	$headers .= "MIME-Version: 1.0 \n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1 \n";

	
	if(mail($to, $subject,$message, $headers)){
		echo "ok";
	}
	
	else{ 
		echo "ok";
	}
  
}

?>