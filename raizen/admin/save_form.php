<?php
	require_once 'connect.php';
	if(ISSET($_POST['add_form'])){
		$tour_no = $_POST['tour_no'];
		$days = $_POST['days'];
		$extra_participant = $_POST['extra_participant'];
		$query = $conn->query("SELECT * FROM `transaction` WHERE `tour_no` = '$tour_no' && `status` = 'Check In'") or die(mysqli_error());
		$row = $query->num_rows;
		$time = date("H:i:s", strtotime("+8 HOURS"));
		if($row > 0){
			echo "<script>alert('tour not available')</script>";
		}else{
			$query2 = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `guest` NATURAL JOIN `tour` WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die(mysqli_error());
			$fetch2 = $query2->fetch_array();
			$total = $fetch2['price'];
			$total2 = 500 * $extra_participant;
			$total3 = $total + $total2;
			$checkout = date("Y-m-d", strtotime($fetch['checkin']."+".$days."DAYS"));
			$conn->query("UPDATE `transaction` SET `tour_no` = '$tour_no', `days` = '$days', `extra_participant` = '$extra_participant', `status` = 'Check In', `checkin_time` = '$time', `checkout` = '$checkout', `bill` = '$total3' WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die(mysqli_error());
			header("location:checkin.php");
		}
	}
?>