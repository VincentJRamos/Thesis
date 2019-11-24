<?php
	if(ISSET($_POST['add_tour_closed_dates'])){
		$tour = $_POST['tour'];
		$block_date = $_POST['block_date'];
		$remarks = $_POST['remarks'];

		$block_date = date("Y-m-d", strtotime($block_date));

		$conn->query("INSERT INTO `tour_closed_dates` (tour_id, closed_date_remarks, block_date) VALUES ('$tour', '$remarks', '$block_date')") or die(mysqli_error());

		header("location:tour_closed_dates.php");
	}
?>