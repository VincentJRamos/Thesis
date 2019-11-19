<?php
session_start();
require_once('../client/client_class.php');

$client = new Client();

$transaction_id = 3;
$payment_input = 500;
$status_input = 'Confirmed';

$update_payment = $client->update_transaction_payment($transaction_id, $payment_input, $status_input);

echo json_encode($update_payment);
?>