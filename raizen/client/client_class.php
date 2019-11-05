<?php

// create ng class pra sa client pra mas madali ma maintain ung mga needed functions per module
class Client {
	private $conn;
	function __construct() {
		$this->conn = new mysqli("localhost", "root", "", "db_raizen") or die(mysqli_error());
	}

	public function login_account($username, $password) {
		// mas okay my cleaning pa dto ng data pero di ko na mggwa sorry
		$mysql = "SELECT * FROM guest WHERE username = '$username' and password = '$password'";
		$query = $this->conn->query($mysql);
		if ($query) {
			$row = $query->num_rows;
			if ($row != 0) {
				session_start();
				$data = $query->fetch_array();
				$_SESSION['fullName'] = $data['firstname'] . " " . $data['middlename'] . " " . $data['lastname'];
				$_SESSION['guestId'] = $data['guest_id'];
				$_SESSION['username'] = $data['username'];
				return True;
			}
		}
		return False;
	}

	// pwede gawing associative array ung parameter dto pero pra mas magets ung code ginawa ko n lang
	// multiple parameters
	public function register($username, $password, $firstname, $middlename, $lastname, $address, $contactno) {
		// mas okay my cleaning ng data dto

		$exist_username = False;
		$select_user = "SELECT * FROM guest WHERE username = '$username'";
		$user = $this->conn->query($select_user);
		if ($user) {
			$row = $user->num_rows;
			if ($row != 0) {
				$exist_username = True;
			}
		}

		$mysql = "INSERT INTO guest(username, password, firstname, middlename, lastname, address, contactno)
				  VALUES('$username', '$password', '$firstname', '$middlename', '$lastname', '$address', '$contactno')";

		if ($this->conn->query($mysql) === True && $exist_username == False) {
			$last_id = $this->conn->insert_id;
			$mysql = "SELECT * FROM guest WHERE guest_id = '$last_id'";
			$query = $this->conn->query($mysql);
			
			session_start();
			$data = $query->fetch_array();
			$_SESSION['fullName'] = $data['firstname'] . " " . $data['middlename'] . " " . $data['lastname'];
			$_SESSION['guestId'] = $data['guest_id'];
			$_SESSION['username'] = $data['username'];
			return True;
		}
		return False;
	}

}


?>