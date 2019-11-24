<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `tour_closed_dates` WHERE `id` = '$_REQUEST[id]'") or die(mysql_error());
	header("location:tour_closed_dates.php");
?>