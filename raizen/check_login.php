<?php

if (!isset($_SESSION['username'])) {
	header('location:client/login.php');
} else {
	header('location:../index.php');
}

?>