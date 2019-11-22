<?php
require_once('../client_class.php');

$client = new Client();

$transaction_id = $_POST['transaction_id'];

$transaction_details = $client->get_tour_details($transaction_id);

echo json_encode($transaction_details);

?>