<?php

	require_once 'admin/connect.php';
	if(ISSET($_POST['add_guest'])){
		// $firstname = $_POST['firstname'];
		// $middlename = $_POST['middlename'];
		// $lastname = $_POST['lastname'];
		// $address = $_POST['address'];
		// $contactno = $_POST['contactno'];
		$checkin = $_POST['date'];
		// $conn->query("INSERT INTO `guest` (firstname, middlename, lastname, address, contactno) VALUES('$firstname', '$middlename', '$lastname', '$address', '$contactno')") or die(mysqli_error());
		$guestId = $_SESSION['guestId'];

		$query = $conn->query("SELECT * FROM `guest` WHERE guest_id = '$guestId'") or die(mysqli_error());
		$fetch = $query->fetch_array();
		$query2 = $conn->query("SELECT * FROM `transaction` WHERE `checkin` = '$checkin' && `tour_id` = '$_REQUEST[tour_id]' && `status` = 'Pending'") or die(mysqli_error());
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
							$conn->query("INSERT INTO `transaction`(guest_id, tour_id, status, checkin) VALUES('$guest_id', '$tour_id', 'Pending', '$checkin')") or die(mysqli_error());
							header("location:reply_reserve.php");
						}else{
							echo "<script>alert('Error Javascript Exception!')</script>";
						}
				}	
			}	
	}	
?>