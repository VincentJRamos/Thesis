<?php
	require_once 'validate.php';
	require 'name.php';

	$tours = $conn->query("SELECT * FROM tour LEFT JOIN tour_type ON tour.tour_type = tour_type.id ORDER BY tour_id ASC") or die(mysqli_error());

?>

<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Raizen Travel and Tours</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
	</head>
<body>
	<nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
		<div  class = "container-fluid">
			<div class = "navbar-header">
				<a class = "navbar-brand" >Raizen Travel and Tours - Edit closed dates</a>
			</div>
			<ul class = "nav navbar-nav pull-right ">
				<li class = "dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class = "glyphicon glyphicon-user"></i> <?php echo $name;?></a>
					<ul class="dropdown-menu">
						<li><a href="logout.php"><i class = "glyphicon glyphicon-off"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
    <?php include ("header.php"); ?>
	<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Transaction / Tour / Edit closed dates</div>
				<br />
				<div class = "col-md-4">
					<?php
						$query = $conn->query("SELECT * FROM tour_closed_dates as tcd LEFT JOIN tour ON tcd.tour_id = tour.tour_id WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
						$fetch = $query->fetch_array();
					?>
					<form method = "POST" enctype = "multipart/form-data" autocomplete="off">
						<div class = "form-group">
							<label>Tour Selected</label>
							<select class = "form-control" required = required name = "tour">
								<option value = "">Choose an tour package</option>
								<?php
									while($row = mysqli_fetch_assoc($tours))
									{
										if ($row['id'] == $fetch['tour_type'])
										{
											echo "<option value='".$row['tour_id']."' selected>".$row['tour_type_name']."</option>";
										}
										else
										{
											echo "<option value='".$row['tour_id']."'>".$row['tour_type_name']."</option>";
										}
									}
								?>
							</select>
						</div>
						
						<div class="form-group">
							<label for="start_date">Date to close</label>
							<input type="text" name="block_date" value="<?php echo $fetch['block_date']; ?>" class="form-control datepicker">
						</div>

						<div class="form-group">
							<label for="remarks">Remarks</label>
							<input type="text" name="remarks" value="<?php echo $fetch['closed_date_remarks']; ?>" class="form-control">
						</div>

						<br />
						<div class = "form-group">
							<button name = "edit_tour_closed_dates" class = "btn btn-info form-control"><i class = "glyphicon glyphicon-save"></i>Saved</button>
						</div>
					</form>
					<?php require_once 'edit_query_tour_closed_dates.php'?>
				</div>
			</div>
		</div>
	</div>
	<br />
	<br />
	<?php include ("footer.php"); ?>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  $( function() {
    $( ".datepicker" ).datepicker();
  } );
</script>

</html>