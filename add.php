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
				<a class="navbar-brand hidden-xs hidden-sm" href="">OJT MONITORING</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Students</a></li>
					<li class="active"><a href="add.php">Add Students</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Student &raquo; Add Student</h2>
			<hr />
               
			<?php
			if(isset($_POST['add'])){
				$idnum		     = $_POST['idnum'];
				$last_name		     = $_POST['last_name'];
				$first_name		     = $_POST['first_name'];
				$courseyear	     = $_POST['courseyear'];
				$mobile_number	     = $_POST['mobile_number'];
				$email	     = $_POST['email'];
				$date_started	     = $_POST['date_started'];
				$coid		 = $_POST['coid'];
				$status			 = $_POST['status'];
                
                
                $con = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE idnum='$idnum'");
                if(mysqli_num_rows($con) == 0){
                    $insert = mysqli_query($connect, "INSERT INTO students(idnum, last_name, first_name, courseyear, mobile_number, email, date_started, coid, status)
															VALUES('$idnum','$last_name', '$first_name','$courseyear','$mobile_number','$email','$date_started','$coid' ,'$status')") or die('Error: ' . mysqli_error($connect));
                    if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Student Successfully Added !</div>';
						}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ID no.</div>';
				        }
					
				}
                
			}
			?>

			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">ID no.</label>
					<div class="col-sm-2">
						<input type="number" name="idnum" class="form-control" placeholder="ID number..." required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">First Name</label>
					<div class="col-sm-4">
						<input type="text" name="first_name" class="form-control" placeholder="First name.." required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Last Name</label>
					<div class="col-sm-4">
						<input type="text" name="last_name" class="form-control" placeholder="Last name.." required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Course & Year</label>
					<div class="col-sm-2">
						<select name="courseyear" class="form-control">
                            <option value="BSIT-3">BSIT-3</option>
							<option value="BSIT-4">BSIT-4</option>
							<option value="BSCS-3">BSCS-3</option>
							<option value="BSCS-4">BSCS-4</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Mobile Number</label>
					<div class="col-sm-4">
						<input type="text" name="mobile_number" class="form-control" placeholder="Mobile number.." required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Email</label>
					<div class="col-sm-4">
						<input type="text" name="email" class="form-control" placeholder="Email.." required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Date Started</label>
					<div class="col-sm-4">
						<input type="text" name="date_started" class="input-group date form-control" date="" data-date-format="date_started" placeholder="Date started..." required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Company Name</label>
					<div class="col-sm-3">
							<select name="coid" class="form-control">
					<?php
						$con = mysqli_query($connect, "SELECT * FROM company ORDER BY coname ASC");
						while ($row = mysqli_fetch_assoc($con)) {
						    echo "<option value='".$row["coid"]."'>".$row["coname"]."</option>";
						}
						echo "</select>";
					?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Requirement</label>
					<div class="col-sm-4">
						<input type="checkbox" name="evalution" value="yes">OJT 1 Evaluation <br>
						<input type="checkbox" name="endorsement" value="yes">Endorsement <br>
						<input type="checkbox" name="waiver" value="yes">Waiver <br>
						<input type="checkbox" name="moa" value="yes">Memorandum of Agreement <br>
					</div>
				</div>


				<div class="form-group">
					<label class="col-sm-3 control-label">Status</label>
					<div class="col-sm-2">
						<select name="status" class="form-control">
                            <option value="Incomplete">Incomplete</option>
							<option value="Complete">Complete</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Submit">
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
