<?php
require_once('../client_class.php');

$client = new Client();

$transaction_id = $_POST['transaction_id'];

$mark_as_closed = $client->mark_as_closed($transaction_id);

echo json_encode($mark_as_closed);

?>