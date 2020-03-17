<?php

class ContactSupport {
	private $conn;
	function __construct() {
		$this->conn = new mysqli("localhost", "root", "", "db_raizen") or die(mysqli_error($this->conn));
	}

	public function add_contactsupport($name, $email, $subject, $message){

		$query = "INSERT INTO support_contact(name, email, subject, message) VALUES('$name', '$email', '$subject', '$message')";
		$exec = $this->conn->query($query);

		if ($exec) {
			return True;
		}
		return False;
	}

	public function get_contactsupport_list(){

		$query = "SELECT name, email_address, subject, message, created_at FROM contact_support";
		$exec = $this->conn->query($query);
		$data = $exec->fetch_array();

		return $data;
	}

	public function delete_contactsupport($id){

		$query = "DELETE FROM contact_support WHERE id = $id";
		$exec = $this->conn->query($query);

		if ($exec) {
			return True;
		}
		return False;
	}
}

?>