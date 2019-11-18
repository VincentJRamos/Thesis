<?php
session_start();
require_once('../client/client_class.php');

$client = new Client();

$guest_id = $_SESSION['guestId'];

$allowed_to_book = $client->check_if_can_book($guest_id);

if ($allowed_to_book) {
	echo 'GHAHAHA';
}
?>