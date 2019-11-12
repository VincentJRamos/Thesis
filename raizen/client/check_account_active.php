<?php
session_start();
require_once('client_class.php');

$client = new Client();

$check = $client->check_account_if_active($_SESSION['guestId']);

if ($check == False) {
	header('location:activate_account.php');
}else {
	header('location:../index.php');
}

?>