<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `tour` WHERE `tour_id` = '$_REQUEST[tour_id]'") or die(mysql_error());
	header("location:tour.php");
?>