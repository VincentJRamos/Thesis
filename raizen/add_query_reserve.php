<?php

	require_once 'admin/connect.php';
	require_once 'client/client_class.php';

	if(ISSET($_POST['add_guest'])){

		// remove existing post details dahil meron n tayo user accounts

		// $firstname = $_POST['firstname'];
		// $middlename = $_POST['middlename'];
		// $lastname = $_POST['lastname'];
		// $address = $_POST['address'];
		// $contactno = $_POST['contactno'];

		// end remove existing

		$checkin = $_POST['date'];
		$no_of_participants = $_POST['no_of_participants'];
		$guestId = $_SESSION['guestId'];

		// instantiate the class and call the function to check if user is allowed to book
		// else display instructions on how he can pay.
		
		$client = new Client();
		$allowed_to_book = $client->check_if_can_book($guestId);

		if ($allowed_to_book)
		{
			$query = $conn->query("SELECT * FROM `guest` WHERE guest_id = '$guestId'") or die(mysqli_error());
			$fetch = $query->fetch_array();
			$query2 = $conn->query("SELECT * FROM `transaction` WHERE `checkin` = '$checkin' && `tour_id` = '$_REQUEST[tour_id]' && `status` = 'Pending'") or die(mysqli_error());
			
			// added by ace
			$query_tour = $conn->query("SELECT * FROM `tour` WHERE `tour_id` = '$_REQUEST[tour_id]'") or die(mysqli_error());
			$tour_data = $query_tour->fetch_array();
			$tour_price = $tour_data['price'];
			$total_bill = $tour_price * $no_of_participants;
			// end added

			$row = $query2->num_rows;
			if($checkin < date("Y-m-d", strtotime('+8 HOURS'))){	
					echo "<script>alert('Must be present date')</script>";
				}else{
					if($row > 0){
						echo "<div class = 'col-md-4'>
									<label style = 'color:#ff0000;'>Not Available Date</label><br />";
								$q_date = $conn->query("SELECT * FROM `transaction` WHERE `status` = 'Pending'") or die(mysqli_error());
								while($f_date = $q_date->fetch_array()){
									echo "<ul>
											<li>	
												<label class = 'alert-danger'>".date("M d, Y", strtotime($f_date['checkin']."+8HOURS"))."</label>	
											</li>
										</ul>";
								}
							"</div>";
					}else{	
							if($guest_id = $fetch['guest_id']){
								$tour_id = $_REQUEST['tour_id'];
								$conn->query("INSERT INTO `transaction`(guest_id, tour_id, extra_participant, status, checkin, bill, payment) VALUES('$guest_id', '$tour_id', '$no_of_participants','Pending', '$checkin', '$total_bill', 0)") or die(mysqli_error());
								//$last_transaction_id = $conn->insert_id;

								// send an email to admin for email notification
								$to_email = 'michaelababao200@gmail.com';
								$link = 'http://'.$_SERVER['SERVER_NAME'] . '/Thesis/raizen/admin/reserve.php';
								$subject = 'Reservation Notification';
								$message = 'There was a reservation made from the System. Click here to view more information: ' . $link;
								$headers = 'From: Raizen Admin Notification';
								$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

								mail($to_email, $subject, $message, $headers);

								// redirect to successful book
								header("location:reply_reserve.php");

							}else{
								echo "<script>alert('Error Javascript Exception!')</script>";
							}
					}	
				}
		}
		else
		{
			header('location:payment_instruction.php');
		}
	}	
?>