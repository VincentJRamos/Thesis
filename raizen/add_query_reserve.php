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

		$checkin = date("Y-m-d", strtotime($checkin));

		// instantiate the class and call the function to check if user is allowed to book
		// else display instructions on how he can pay.
		
		$client = new Client();
		$allowed_to_book = $client->check_if_can_book($guestId);

		// get the dates blocked from database for specific tour
		$query = $conn->query("SELECT block_date FROM tour_closed_dates WHERE tour_id = '$_REQUEST[tour_id]'") or die(mysql_error());

		while($fetch_date = $query->fetch_array())
		{
			$block_date = $fetch_date['block_date'];
			echo $block_date;
			echo $checkin;
		}

		if ($block_date == $checkin)
		{
			echo "<script>alert('You have entered a closed date. Please choose another date.')</script>";
		}

		else if ($allowed_to_book)
		{
			$query = $conn->query("SELECT * FROM `guest` WHERE guest_id = '$guestId'") or die(mysqli_error());
			$fetch = $query->fetch_array();
			// $query2 = $conn->query("SELECT * FROM `transaction` WHERE `checkin` = '$checkin' && `tour_id` = '$_REQUEST[tour_id]' && `status` = 'Pending'") or die(mysqli_error());
			
			// added by ace
			$query_tour = $conn->query("SELECT * FROM `tour` WHERE `tour_id` = '$_REQUEST[tour_id]'") or die(mysqli_error());
			$tour_data = $query_tour->fetch_array();
			$tour_price = $tour_data['price'];
			$total_bill = $tour_price * $no_of_participants;
			// end added

			//$row = $query2->num_rows;
			if($checkin < date("Y-m-d", strtotime('+8 HOURS'))){	
					echo "<script>alert('Must be present date')</script>";
				}else{

					// cinomment ko lang ung condition na pag na book na bawal na ulit book
					// kapag same tour same date

					// if($row > 0){
					// 	echo "<div class = 'col-md-4'>
					// 				<label style = 'color:#ff0000;'>Not Available Date</label><br />";
					// 			$q_date = $conn->query("SELECT * FROM `transaction` WHERE `status` = 'Pending'") or die(mysqli_error());
					// 			while($f_date = $q_date->fetch_array()){
					// 				echo "<ul>
					// 						<li>	
					// 							<label class = 'alert-danger'>".date("M d, Y", strtotime($f_date['checkin']."+8HOURS"))."</label>	
					// 						</li>
					// 					</ul>";
					// 			}
					// 		"</div>";
					// }else{	


					if($guest_id = $fetch['guest_id']){
						$tour_id = $_REQUEST['tour_id'];
						$conn->query("INSERT INTO `transaction`(guest_id, tour_id, extra_participant, status, checkin, bill, payment) VALUES('$guest_id', '$tour_id', '$no_of_participants','Pending', '$checkin', '$total_bill', 0)") or die(mysqli_error());
						$last_transaction_id = $conn->insert_id;

						$book_data = $client->get_transaction_details($last_transaction_id);

						$tour_name = $book_data['tour_type_name'];
						$days = $book_data['no_of_days'];
						$extra_participant = $book_data['extra_participant'];

						$remarks = 'Tour: '. $tour_name . ' | Days: '. $days . ' | Extra participant: ' . $extra_participant;

						// send an email to admin for email notification
						$to_email = $client->get_content_email();
						$link = 'http://'.$_SERVER['SERVER_NAME'] . '/Thesis/raizen/admin/reserve.php';
						$subject = 'Reservation Notification';
						$message = 'There was a reservation made from the System. Click here to view more information: ' . $link;
						$headers = 'From: Raizen Admin Notification';
						$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

						mail($to_email, $subject, $message, $headers);

						// redirect to successful book with GET parameters for the invoice no., total and remarks.
						header("location:reply_reserve.php?invoice_no=".$last_transaction_id.'&amount='.$total_bill.'&remarks='.$remarks);


					}else{
						echo "<script>alert('Error Javascript Exception!')</script>";
					}
					//}	
				}
		}
		else
		{
			header('location:payment_instruction.php');
		}
	}	
?>