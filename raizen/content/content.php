<?php

class Content {
	private $conn;
	function __construct() {
		$this->conn = new mysqli("localhost", "root", "", "db_raizen") or die(mysqli_error());
	}

	public function get_content($title) {
		$query = "SELECT * FROM content WHERE title = '$title'";
		$exec = $this->conn->query($query);

		$data = $exec->fetch_array();

		// $data = ('title' => 'title here',
		// 		'id' => 1,
		// 		'content' => 'content here',)

		$content = $data['content'];

		return $content;

	}

	public function get_content_list() {
		$query = "SELECT * FROM content";
		$exec = $this->conn->query($query);
		$data = $exec->fetch_array();
		//while($fetch = $exec->fetch_array())
		// foreach($d => $data) {
		// 	$title = $d[]
		// }

		return $data;
	}

	public function get_photo($photo) {
		$query = "SELECT * FROM gallery WHERE photoname = '$photo'";
		$exec = $this->conn->query($query);

		$data = $exec->fetch_array();

		// $data = ('title' => 'title here',
		// 		'id' => 1,
		// 		'content' => 'content here',)

		$photo = $data['photo'];

		return $photo;

	}

	public function get_photo_list() {
		$query = "SELECT * FROM gallery";
		$exec = $this->conn->query($query);

		return $exec;
	}

}

?>