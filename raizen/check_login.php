<?php

if (!isset($_SESSION['is_logged_in'])) {
	header('location:client/login.php');
}

?>