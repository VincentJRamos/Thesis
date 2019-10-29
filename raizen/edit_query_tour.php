<?php
	require_once 'connect.php';
	if(ISSET($_POST['edit_tour'])){
		$tour_type = $_POST['tour_type'];
		$price = $_POST['price'];
		$photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
		$photo_name = addslashes($_FILES['photo']['name']);
		$photo_size = getimagesize($_FILES['photo']['tmp_name']);
		move_uploaded_file($_FILES['photo']['tmp_name'],"../photo/" . $_FILES['photo']['name']);
		$conn->query("UPDATE `tour` SET `tour_type` = '$tour_type', `price` = '$price', `photo` = '$photo_name' WHERE `tour_id` = '$_REQUEST[tour_id]'") or die(mysqli_error());
		header("location:tour.php");
	}
?>