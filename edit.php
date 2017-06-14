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
			$sql = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE idnum='$idnum'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$idnum		     = $_POST['idnum'];
				$first_name		     = $_POST['first_name'];
				$last_name		     = $_POST['last_name'];
				$courseyear	     = $_POST['courseyear'];
				$date_started	     = $_POST['date_started'];
				$evaluation	     = $_POST['evaluation'];
				$endorsement	     = $_POST['endorsement'];
				$waiver	     = $_POST['waiver'];
				$moa	     = $_POST['moa'];
				$coid	     = $_POST['coid'];
				$status			 = $_POST['status'];
				
				$update = mysqli_query($connect, "UPDATE students SET first_name ='$first_name',last_name='$last_name', courseyear='$courseyear', date_started='$date_started',evaluation='$evaluation',endorsement='$endorsement', waiver ='$waiver', moa='$moa', coid='$coid', status='$status', idnum='$idnum' WHERE idnum='$idnum'") or die(mysqli_error());
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
					<label class="col-sm-3 control-label">First Name</label>
					<div class="col-sm-4">
						<input type="text" name="first_name" value="<?php echo $row ['first_name']; ?>" class="form-control" placeholder="First Name" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Last Name</label>
					<div class="col-sm-4">
						<input type="text" name="last_name" value="<?php echo $row ['last_name']; ?>" class="form-control" placeholder="Last Name" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Course & Year</label>
					<div class="col-sm-2">
						<select name="courseyear" class="form-control">
						<option value="<?php echo $row ['courseyear']; ?>"><?php echo $row ['courseyear']; ?></option>";
						<?php
							if ($row ['courseyear'] == 'BSIT 3') {
								echo "<option value='BSIT 4'>BSIT-4</option>";
								echo "<option value='BSCS 3'>BSCS-3</option>";
								echo "<option value='BSCS 4'>BSCS-4</option>";
							} else if ($row ['courseyear'] == 'BSIT 4') {
								echo "<option value='BSIT 3'>BSIT-3</option>";
								echo "<option value='BSCS 3'>BSCS-3</option>";
								echo "<option value='BSCS 4'>BSCS-4</option>";
							} else if ($row ['courseyear'] == 'BSCS 3') {
								echo "<option value='BSIT 3'>BSIT-3</option>";
								echo "<option value='BSIT 4'>BSIT-4</option>";
								echo "<option value='BSCS 4'>BSCS-4</option>";
							} else if ($row ['courseyear'] == 'BSCS 4') {
								echo "<option value='BSIT 3'>BSIT-3</option>";
								echo "<option value='BSIT 4'>BSIT-4</option>";
								echo "<option value='BSCS 3'>BSCS-3</option>";
							}
						?>
						</select> 
					</div>
                </div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Data Started</label>
					<div class="col-sm-4">
						<input type="text" name="date_started" value="<?php echo $row ['date_started']; ?>" class="input-group date form-control" date="" data-date-format="date_started" placeholder="date_started" required>
					</div>
				</div>


				<div class="form-group">
					<label class="col-sm-3 control-label">Requirement</label>
					<div class="col-sm-4">
						<?php

						echo  "<input type='hidden' name='evaluation' value='no'>";
						echo  "<input type='hidden' name='endorsement' value='no'>";
						echo  "<input type='hidden' name='waiver' value='no'>";
						echo  "<input type='hidden' name='moa' value='no'>";

						if ($row ['evaluation'] == 'yes') {
							echo "<input type='checkbox' name='evaluation' value='yes' checked>OJT 1 Evaluation <br>";
						} 

						if($row ['evaluation'] == 'no') {
							echo "<input type='checkbox' name='evaluation' value='yes'>OJT 1 Evaluation <br>";
						} 

						if ($row ['endorsement'] == 'yes') {
							echo "<input type='checkbox' name='endorsement' value='yes' checked>Endorsement <br>";
						} 

						if($row ['endorsement'] == 'no') {
							echo "<input type='checkbox' name='endorsement' value='yes'>Endorsement <br>";
						} 

						if ($row ['waiver'] == 'yes') {
							echo "<input type='checkbox' name='waiver' value='yes' checked>Waiver <br>";
						} 

						if($row ['waiver'] == 'no') {
							echo "<input type='checkbox' name='waiver' value='yes'>Waiver <br>";
						} 

						if ($row ['moa'] == 'yes') {
							echo "<input type='checkbox' name='moa' value='yes' checked>Memorandum of Agreement <br>";
						} 

						if ($row ['moa'] == 'no') {
							echo "<input type='checkbox' name='moa' value='yes'>Memorandum of Agreement <br>";
						}

						?>

					</div>
				</div>



				<div class="form-group">
					<label class="col-sm-3 control-label">Company Name</label>
					<div class="col-sm-3">
							<select name="coid" class="form-control">
							<option value="<?php echo $row ['coid']; ?>"><?php echo $row ['coname']; ?></option>";
					<?php
						$con = mysqli_query($connect, "SELECT * FROM company ORDER BY coname ASC");
						while ($row2 = mysqli_fetch_assoc($con)) {
							if($row ['coid'] != $row2 ['coid'])
						    echo "<option value='".$row2["coid"]."'>".$row2["coname"]."</option>";
						}
						echo "</select>";
					?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Type of OJT</label>
					<div class="col-sm-2">
						<?php
							if ($row ['typeofojt'] == "In-house") {
								echo "<span class='label label-success'>In-house</span>";
							} else {
								echo "<span class='label label-warning'>Company-based</span>";
							}
						?>
					</div>
                </div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Requirement Status</label>
					<div class="col-sm-2">
						<?php
							if ($row ['evaluation'] == "yes" AND $row ['endorsement'] == "yes" AND $row ['waiver'] == "yes" AND $row ['moa'] == "yes")  {
								echo "<span class='label label-success'>Complete</span>";
								echo  "<input type='hidden' name='status' value='Complete' checked>";
							} else {
								echo "<span class='label label-warning'>Incomplete</span>";
								echo  "<input type='hidden' name='status' value='Incomplete' checked>";
							}
						?>
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
		format: 'mm-dd-yyyy',
	})
	</script>
</body>
</html>