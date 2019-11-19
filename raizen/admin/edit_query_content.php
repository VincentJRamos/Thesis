<?php
	if(ISSET($_POST['edit_content'])){
		$title = $_POST['title'];
		$content = $_POST['content'];

		$conn->query("UPDATE `content` SET `title` = '$title', `content` = '$content' WHERE `title` = '$title'") or die(mysqli_error());
		header("location:content.php");
	}
?>