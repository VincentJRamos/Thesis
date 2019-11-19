<?php
	require_once 'connect.php';
	if(ISSET($_POST['edit_gallery'])){
		$photoname = $_POST['photoname'];
		$photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));

		$photo_name = addslashes($_FILES['photo']['name']);
		$photo_size = getimagesize($_FILES['photo']['tmp_name']);
		move_uploaded_file($_FILES['photo']['tmp_name'],"../images/" . $_FILES['photo']['name']);
		$conn->query("UPDATE `gallery` SET `photo` = '$photo_name' WHERE `photoname` = '$_REQUEST[photoname]'") or die(mysqli_error());
		
		header("location:gallery.php");
	}
?>