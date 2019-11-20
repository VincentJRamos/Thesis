<?php
	require_once 'connect.php';
	if(ISSET($_POST['edit_tour_type'])){
		$tour_type_name = $_POST['tour_type_name'];
		$conn->query("UPDATE `tour_type` SET `tour_type_name` = '$tour_type_name' WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
		header("location:tour_type.php");
	}
?>