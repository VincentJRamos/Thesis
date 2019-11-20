<?php
	if(ISSET($_POST['add_tour'])){
		$tour_type = $_POST['tour_type'];
		$price = $_POST['price'];
		$no_of_days = $_POST['no_of_days'];
		$photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
		$photo_name = addslashes($_FILES['photo']['name']);
		$photo_size = getimagesize($_FILES['photo']['tmp_name']);
		move_uploaded_file($_FILES['photo']['tmp_name'],"../photo/" . $_FILES['photo']['name']);
		$conn->query("INSERT INTO `tour` (tour_type, no_of_days, price, photo) VALUES('$tour_type', '$no_of_days','$price', '$photo_name')") or die(mysqli_error());
		header("location:tour.php");
	}
?>