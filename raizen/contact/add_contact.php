<?php
require_once('contact_class.php');
require_once('../client/client_class.php');

$contactSupport = new ContactSupport();
$client = new Client();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	$insert_data = $contactSupport->add_contactsupport($name, $email, $subject, $message);

	$to_email = $client->get_content_email();
	$headers = 'From: Raizen Admin Notification';
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	if ($insert_data) {
		mail($to_email, $subject, $message, $headers);
		echo 'True';

	}

	else {
		echo 'False';
	}
	
}

?>