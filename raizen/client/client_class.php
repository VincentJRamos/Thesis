<?php

// create ng class pra sa client pra mas madali ma maintain ung mga needed functions per module
class Client {
	private $conn;
	function __construct() {
		$this->conn = new mysqli("localhost", "root", "", "db_raizen") or die(mysqli_error());
	}

	public function login_account($username, $password) {
		
		// mas okay my cleaning pa dto ng data pero di ko na mggwa sorry
		$query = "SELECT * FROM guest WHERE username = '$username' and password = '$password'";
		$exec = $this->conn->query($query);
		$data = $exec->fetch_array();

		// store to a variable if there is a returned row
		$row = $exec->num_rows;

		$is_activated = $data['is_activated'];

		session_start();
		$_SESSION['fullName'] = $data['firstname'] . " " . $data['middlename'] . " " . $data['lastname'];
		$_SESSION['guestId'] = $data['guest_id'];
		$_SESSION['username'] = $data['username'];
		$_SESSION['email'] = $data['email'];

		// check if account is activated first
		// if account is not activated redirect to activate_account page
		if ($is_activated == 0 && $row > 0) 
		{
			$activation_code = $this->user_get_activation_code($data['guest_id']);
			// send email to the guest
			$this->send_activation_code($data['email'], $activation_code);

			header('location:activate_account.php');
		} 
		else if ($row != 0) 
		{
			session_start();
			$_SESSION['is_logged_in'] = True;
			return True;
		}
		return False;
	}

	// FUNCTION THAT GETS SPECIFIC DATA OF GUEST USER

	public function user_get_email($guest_id) {
		$query = "SELECT * FROM guest WHERE guest_id = '$guest_id'";
		$exec = $this->conn->query($query);
		$data = $exec->fetch_array();

		return $data['email'];
	}

	public function user_get_activation_code($guest_id) {
		$query = "SELECT * FROM activation_code WHERE guest_id = '$guest_id'";
		$exec = $this->conn->query($query);
		$data = $exec->fetch_array();

		return $data['activation_code'];
	}

	//  END FUNCTION THAT GETS SPECIFIC DATA OF GUEST USER

	// pwede gawing associative array ung parameter dto pero pra mas magets ung code ginawa ko n lang
	// multiple parameters
	public function register($username, $password, $firstname, $middlename, $lastname, $address, $contactno, $email) {
		// mas okay my cleaning ng data dto
		$exist_username = False;
		
		$query = "SELECT * FROM guest WHERE username = '$username'";
		$exec = $this->conn->query($query);
		if ($exec) {
			$row = $exec->num_rows;
			if ($row != 0) {
				$exist_username = True;
			}
		}

		$exist_email = False;

		$query = "SELECT * FROM guest WHERE email = '$email'";
		$exec = $this->conn->query($query);
		if ($exec) {
			$row = $exec->num_rows;
			if ($row != 0) {
				$exist_email = True;
			}
		}

		// generate activation code
		$activation_code = mt_rand(100000, 999999);

		

		if ($exist_username == False && $exist_email == False) {

			$mysql = "INSERT INTO guest(username, password, firstname, middlename, lastname, address, contactno, email)
				  VALUES('$username', '$password', '$firstname', '$middlename', '$lastname', '$address', '$contactno', '$email')";
			$this->conn->query($mysql);
			$last_id = $this->conn->insert_id;

			// select query to get the data of the guest who registered
			$query = "SELECT * FROM guest WHERE guest_id = '$last_id'";
			$exec = $this->conn->query($query);
			$data = $exec->fetch_array();

			$create_activation_sql = "INSERT INTO activation_code(guest_id, activation_code) VALUES('$last_id', '$activation_code')";
			$exec_activation = $this->conn->query($create_activation_sql);
			
			// store sesssion details
			session_start();
			$_SESSION['fullName'] = $data['firstname'] . " " . $data['middlename'] . " " . $data['lastname'];
			$_SESSION['guestId'] = $data['guest_id'];
			$_SESSION['username'] = $data['username'];
			//$_SESSION['email'] = $data['email'];

			// send email to the guest
			$this->send_activation_code($email, $activation_code);

			return $data;
		}
		else if ($exist_username == True) {
			return 'exist_username';
		}
		else if ($exist_email == True) {
			return 'exist_email';
		}
	}

	// function that checks the account if activated or not
	public function check_account_if_active($guest_id) {

		$query = "SELECT id, is_activated FROM guest WHERE guest_id = '$guest_id'";
		$exec = $this->conn->query($query);
		$data = $exec->fetch_array();

		if ($data['is_activated'] == 0) {
			return False;
		}
		else{
			return True;
		}

	}

	public function activate_account($guest_id, $activation_code) {

		$query = "SELECT * FROM activation_code WHERE activation_code = '$activation_code' AND guest_id = '$guest_id' AND is_active = 1 LIMIT 1";
		$exec = $this->conn->query($query);
		$data = $exec->fetch_array();

		$mysql = "UPDATE guest SET is_activated = 1 WHERE guest_id = '$guest_id$'";
		$exec = $this->conn->query($mysql);

		session_start();
		
		if ($exec && isset($_SESSION['oldUrl']))
		{
			header("location:". $_SESSION['oldUrl']);
		}
		if ($exec && $data['id']) 
		{
			$_SESSION['is_logged_in'] = True;
			header('location: ../index.php');
		} 
		else 
		{
			return False;
		}
	}

	public function send_activation_code($to_email, $activation_code) {

		$subject = 'Account activation';
		$message = 'This is from Raizen Travel and Tours. Your activation code is ' + $activation_code + '.';
		$headers = 'From: Raizen Travel and Tours';
		mail($to_email, $subject, $message, $headers);

	}

	public function get_book_list($guest_id) {

		$query = "SELECT * FROM transaction as trans
				  INNER JOIN tour as tr
				  ON trans.tour_id = tr.tour_id
				  WHERE trans.guest_id = '$guest_id'";
		$exec = $this->conn->query($query);

		return $exec;
	}

	public function get_transaction_details($transaction_id) {

		$query = "SELECT * FROM transaction as trans
				  INNER JOIN tour as tr
				  ON trans.tour_id = tr.tour_id
				  WHERE trans.transaction_id = '$transaction_id'";
		$exec = $this->conn->query($query);
		$data = $exec->fetch_array();

		return $data;
	}

	public function check_if_can_book($guest_id) {

		// select the tour price and payment of each row
		$query = "SELECT trans.transaction_id, tour.price, trans.payment FROM transaction as trans
				  INNER JOIN tour
				  ON trans.tour_id = tour.tour_id
				  WHERE guest_id = '$guest_id'";
		$exec = $this->conn->query($query);
		
		// this increments if his bookings payment is not greater than half of the total price
		$book_counter = 0;

		while($row = mysqli_fetch_assoc($exec))
		{
			// get the half price of total price
			$half_price = $row['price'] / 2;

			#echo $half_price.'<br/>';

			// checks if the downpayment is less than half the price
			if ($row['payment'] < $half_price) {
				#echo 'True';
				$book_counter += 1;
			}
		}

		#echo $book_counter;

		if ($book_counter >= 3)
		{
			return False;
		}
		else
		{
			return True;
		}
		
	}

}


?>