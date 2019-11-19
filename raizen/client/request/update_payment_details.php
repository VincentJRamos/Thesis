<?php
require_once('../client_class.php');

$client = new Client();

$transaction_id = $_POST['transaction_id'];
$payment_input = $_POST['payment_input'];
$status_input = $_POST['status_input'];
$bool_send_mail = $_POST['bool_send_mail'];

$update_payment = $client->update_transaction_payment($transaction_id, $payment_input, $status_input, $bool_send_mail);

echo json_encode($update_payment);

?>