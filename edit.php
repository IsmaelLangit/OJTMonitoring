<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OJT MONITORING</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
	
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand visible-xs-block visible-sm-block" href="">OJT MONITORING</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Students</a></li>
					<li><a href="add.php">Add Students</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Students &raquo; Edit Data</h2>
			<hr />
			
			<?php
			$idnum = $_GET['idnum'];
			$sql = mysqli_query($connect, "SELECT * FROM students WHERE idnum='$idnum'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$idnum		     = $_POST['idnum'];
				$name		     = $_POST['name'];
				$courseyear	     = $_POST['courseyear'];
				$sample1	     = $_POST['sample1'];
				$sample2	     = $_POST['sample2'];
				$status			 = $_POST['status'];
				
				$update = mysqli_query($connect, "UPDATE students SET name='$name', courseyear='$courseyear', sample1='$sample1', sample2='$sample2', status='$status' WHERE idnum='$idnum'") or die(mysqli_error());
				if($update){
					header("Location: edit.php?idnum=".$idnum."&message=success");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data could not be saved, please try again.</div>';
				}
			}
			
			if(isset($_GET['message']) == 'success'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Successfully Saved.</div>';
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">ID no.</label>
					<div class="col-sm-2">
						<input type="text" name="idnum" value="<?php echo $row ['idnum']; ?>" class="form-control" placeholder="ID no." required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Name</label>
					<div class="col-sm-4">
						<input type="text" name="name" value="<?php echo $row ['name']; ?>" class="form-control" placeholder="Name" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Course & Year</label>
					<div class="col-sm-4">
						<input type="text" name="courseyear" value="<?php echo $row ['courseyear']; ?>" class="form-control" placeholder="Course & year" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">sample1</label>
					<div class="col-sm-4">
						<input type="text" name="sample1" value="<?php echo $row ['sample1']; ?>" class="input-group date form-control" date="" data-date-format="sample1" placeholder="sample1" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">sample2</label>
					<div class="col-sm-3">
						<input type="text" name="sample2" value="<?php echo $row ['sample2']; ?>" class="form-control" placeholder="sample2" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Status</label>
					<div class="col-sm-2">
						<select name="status" class="form-control">
							<option value="">- Choose status -</option>
                            <option value="Incomplete">Incomplete</option>
							<option value="Partial">Partial</option>
							<option value="Complete">Complete</option>
						</select> 
					</div>
                    <div class="col-sm-3">
                    <b>Current Status :</b> <span class="label label-info"><?php echo $row['status']; ?></span>
				    </div>
                </div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Submit">
						<a href="index.php" class="btn btn-sm btn-danger">Cancel</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})
	</script>
</body>
</html>