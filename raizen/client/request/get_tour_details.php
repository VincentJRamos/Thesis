<?php
require_once('../client_class.php');

$client = new Client();

$tour_id = $_POST['tour_id'];

$tour_details = $client->get_tour_details($tour_id);

echo json_encode($tour_details);

?>