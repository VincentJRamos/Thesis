<!DOCTYPE html>
<?php
	require_once 'validate.php';
	require 'name.php';

	$tour_types = $conn->query("SELECT * FROM tour_type ORDER BY tour_type_name ASC") or die(mysqli_error());

?>
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
				<a class = "navbar-brand" >Raizen Travel and Tours</a>
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
	<br/>
	<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Transaction / Tour / Add Tour</div>
				<br />
				<div class = "col-md-4">	
					<form method = "POST" enctype = "multipart/form-data">
						<div class = "form-group">
							<label>Tour Selected</label>
							<select class = "form-control" required = required name = "tour_type">
								<option value = "">Choose an option</option>
								<?php

									while($row = mysqli_fetch_assoc($tour_types))
									{
										echo "<option value='".$row['id']."'>".$row['tour_type_name']."</option>";
									}
								?>
							</select>
						</div>
						<div class = "form-group">
							<label>No. of days </label>
							<input type = "number" min = "0" max = "999999999" class = "form-control" name = "no_of_days" />
						</div>
						<div class = "form-group">
							<label>Price </label>
							<input type = "number" min = "0" max = "999999999" class = "form-control" name = "price" />
						</div>

						<div class="form-group">
							<label for="package_inclusions">Package Inclusions</label>
							<textarea name="package_inclusions" class="form-control" cols="30" rows="10"></textarea>
						</div>

						<div class="form-group">
							<label for="sites_to_visit">Sites to Visit</label>
							<textarea name="sites_to_visit" class="form-control" cols="30" rows="10"></textarea>
						</div>

						<div class="form-group">
							<label for="remarks">Others</label>
							<textarea name="remarks" class="form-control" cols="30" rows="10"></textarea>
						</div>
						
						<div class = "form-group">
							<label>Photo </label>
							<div id = "preview" style = "width:150px; height :150px; border:1px solid #000;">
								<center id = "lbl">[Photo]</center>
							</div>
							<input type = "file" required = "required" id = "photo" name = "photo" />
						</div>
						<br />
						<div class = "form-group">
							<button name = "add_tour" class = "btn btn-info form-control"><i class = "glyphicon glyphicon-save"></i>Saved</button>
						</div>
					</form>
					<?php require_once 'add_query_tour.php'?>
				</div>
			</div>
		</div>
	</div>
	<?php include ("footer.php"); ?>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$pic = $('<img id = "image" width = "100%" height = "100%"/>');
		$lbl = $('<center id = "lbl">[Photo]</center>');
		$("#photo").change(function(){
			$("#lbl").remove();
			var files = !!this.files ? this.files : [];
			if(!files.length || !window.FileReader){
				$("#image").remove();
				$lbl.appendTo("#preview");
			}
			if(/^image/.test(files[0].type)){
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onloadend = function(){
					$pic.appendTo("#preview");
					$("#image").attr("src", this.result);
				}
			}
		});
	});
</script>
</html>