<?php
	if(ISSET($_POST['add_tour_type'])){
		$tour_type_name = $_POST['tour_type_name'];
		$conn->query("INSERT INTO `tour_type` (tour_type_name) VALUES('$tour_type_name')") or die(mysqli_error());
		header("location:tour_type.php");
	}
?>