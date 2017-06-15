<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SCIS OJT Monitoring</title>
		<!-- Styles -->
		<link rel="icon" href="img/scisLogo.png">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="stylesheet" type="text/css" href="css/footer-distributed-with-address-and-phones.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
					</button>
					<a class="navbar-brand" href="index.php"><img class="logoNav img-responsive" src="img/Picture1.png"></a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php">Students</a></li>
						<li><a href="add.php">Add Students</a></li>
						<li><a href="company.php">Company</a></li>
						<li><a href="addcompany.php">Add Company</a></li>
					</ul>
				</div>
			</div>
		</nav>

	<a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>

	<div class="container-fluid">
			<section class="cta">
				<div class="cta-content">
					<div class="container">
						<h2 class="text-center">EDIT <span class="detailsHeading"> 
						<?php 
						$idnum = $_GET['idnum'];
						$sql = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE idnum='$idnum'");
						$row = mysqli_fetch_assoc($sql);
						echo $row ['last_name']."'s";
						?> 
						</span> DETAILS </h2>
					</div>
				</div>
				<div class="overlay"></div>
			</section>
			<div class=" container-fluid margin-top">
	
			
			
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
				$evaluation	     = $_POST['evaluation'];
				$endorsement	     = $_POST['endorsement'];
				$waiver	     = $_POST['waiver'];
				$moa	     = $_POST['moa'];
				$coid	     = $_POST['coid'];
				$status			 = $_POST['status'];

				if ($endorsement == "yes" && $waiver == "yes" && $moa == "yes")  {
					$status = "Complete";
				} else {
					$status = "Incomplete";
				}
				
				$update = mysqli_query($connect, "UPDATE students SET first_name ='$first_name',last_name='$last_name', courseyear='$courseyear',evaluation='$evaluation',endorsement='$endorsement', waiver ='$waiver', moa='$moa', coid='$coid', status='$status', idnum='$idnum' WHERE idnum='$idnum'") or die(mysqli_error());
				if($update){
					header("Location: edit.php?idnum=".$idnum."&message=success");
				}else{
					echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data could not be saved, please try again.</div>';
				}
			}
			
			if(isset($_GET['message']) == 'success'){
				echo '<div class="alert alert-success" role="alert">
								  <strong> Success!</strong> You have successfully updated the information on this student.  <a href="index.php" class="alert-link">Go back to list of students.</a>.
								</div>';
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">ID Number</label>
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
					<label class="col-sm-3 control-label">Email</label>
					<div class="col-sm-4">
						<input type="email" name="email" value="<?php echo $row ['email']; ?>" class="form-control" placeholder="Email" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Mobile No.</label>
					<div class="col-sm-4">
						<input type="number" name="mobile_number" value="<?php echo $row ['mobile_number']; ?>" class="form-control" placeholder="Mobile Number" required>
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


						if ($row ['endorsement'] == 'yes') {
							echo "<input type='checkbox' name='endorsement' value='yes' checked><span class='space'></span>Endorsement <br>";
						} 

						if($row ['endorsement'] == 'no') {
							echo "<input type='checkbox' name='endorsement' value='yes'><span class='space'></span>Endorsement <br>";
						} 

						if ($row ['waiver'] == 'yes') {
							echo "<input type='checkbox' name='waiver' value='yes' checked><span class='space'></span>Waiver <br>";
						} 

						if($row ['waiver'] == 'no') {
							echo "<input type='checkbox' name='waiver' value='yes'><span class='space'></span>Waiver <br>";
						} 

						if ($row ['moa'] == 'yes') {
							echo "<input type='checkbox' name='moa' value='yes' checked><span class='space'></span>Memorandum of Agreement <br>";
						} 

						if ($row ['moa'] == 'no') {
							echo "<input type='checkbox' name='moa' value='yes'><span class='space'></span>Memorandum of Agreement <br>";
						}

						if ($row ['evaluation'] == 'yes') {
							echo "<input type='checkbox' name='evaluation' value='yes' checked><span class='space'></span>Evaluation <br>";
						} 

						if($row ['evaluation'] == 'no') {
							echo "<input type='checkbox' name='evaluation' value='yes'><span class='space'></span>Evaluation <br>";
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
								echo "<span class='label label-info'>In-house</span>";
							} else {
								echo "<span class='label label-primary'>Company-based</span>";
							}
						?>
					</div>
                </div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Requirement Status</label>
					<div class="col-sm-2">
						<?php
							if ($row ['endorsement'] == "yes" && $row ['waiver'] == "yes" && $row ['moa'] == "yes")  {
								echo "<span class='label label-success'>Complete</span>";
								echo  "<input type='hidden' name='status' value='Complete'>";
							} else {
								echo "<span class='label label-warning'>Incomplete</span>";
								echo  "<input type='hidden' name='status' value='Incomplete'>";
							}
						?>
					</div>
                </div>

				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-success" value="Save">
							<a href="index.php" class="btn btn-sm btn-danger">Cancel</a>
					</div>
				</div>
			</form>
		</div>
	</div>
 
	<footer class="footer-distributed">
			<div class="footer-left">
				<img class="footerLogo" src="img/Picture1.png">
				<p class="footer-links">
					<a href="#">Home</a>
					|
					<a href="#">Students</a>
					|
					<a href="#">Company</a>
				</p>
				<p class="footer-company-name">OJT 2 Monitoring &copy; 2017</p>
			</div>
			<div class="footer-center">
				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>A. Bonifacio Street</span> Baguio City, Philippines 2600</p>
				</div>
				<div>
					<i class="fa fa-phone"></i>
					<p>(063) 74 444 8246 to 48</p>
				</div>
			</div>
			<div class="footer-right">
				<p class="footer-company-about">
					<span>Vision of SLU</span>
					"We envision Saint Louis University as an excellent missionary and transformative educational institution zealous in developing human resources imbued with the Christian Spirit and who are creative, competent and socially involved."
				</p>
			</div>
		</footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/smoothScroll.js"></script>
		<script src="js/preloader.js"></script>
</body>
</html>