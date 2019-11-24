<?php
	require_once 'connect.php';
	if(ISSET($_POST['edit_tour_closed_dates'])){
		$tour = $_POST['tour'];
		$block_date = $_POST['block_date'];
		$remarks = $_POST['remarks'];

		$block_date = date("Y-m-d", strtotime($block_date));

		$conn->query("UPDATE `tour_closed_dates` SET `tour_id` = '$tour', `block_date`='$block_date', `closed_date_remarks` = '$remarks' WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());

		header("location:tour_closed_dates.php");

	}
?>