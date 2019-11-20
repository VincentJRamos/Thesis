<!DOCTYPE html>
<?php
	require_once 'validate.php';
	require 'name.php';
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
	<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Transaction / Gallery / Change gallery</div>
				<br />
				<div class = "col-md-4">
					<?php
						$query = $conn->query("SELECT * FROM `gallery` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
						$fetch = $query->fetch_array();

					?>
					<form method = "POST" enctype = "multipart/form-data" action="edit_query_gallery.php">

						<div class = "form-group">
							<label>Photo Name </label>
							<input type="hidden" value = "<?php echo $fetch['id']?>" name = "id">
							<input type = "text" value = "<?php echo $fetch['photoname']?>" class = "form-control" name = "photoname"/>
						</div>

						<div class = "form-group">
							<label>Image </label>
							<div id = "preview" style = "width:150px; height :150px; border:1px solid #000;">
								<img src = "../images/<?php echo $fetch['photo']?>" id = "lbl" width = "100%" height = "100%"/>
							</div>
							<input type = "file" id = "photo" name = "photo" />
						</div>
						<br />

						<div class = "form-group">
							<button name = "edit_gallery" class = "btn btn-warning form-control"><i class = "glyphicon glyphicon-edit"></i> Save Changes</button>
						</div>

					</form>
					<?php require_once 'edit_query_gallery.php'?>
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