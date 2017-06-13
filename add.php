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
				$name		     = $_POST['name'];
				$courseyear	     = $_POST['courseyear'];
				$sample1	     = $_POST['sample1'];
				$sample2		 = $_POST['sample2'];
				$status			 = $_POST['status'];
                
                
                $con = mysqli_query($connect, "SELECT * FROM students WHERE idnum='$idnum'");
                if(mysqli_num_rows($con) == 0){
                    $insert = mysqli_query($connect, "INSERT INTO students(idnum, name, courseyear, sample1, sample2, status)
															VALUES('$idnum','$name','$courseyear','$sample1','$sample2','$status')") or die('Error: ' . mysqli_error($connect));
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
						<input type="text" name="idnum" class="form-control" placeholder="ID no." required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Name</label>
					<div class="col-sm-4">
						<input type="text" name="name" class="form-control" placeholder="Name" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Course & Year</label>
					<div class="col-sm-4">
						<input type="text" name="courseyear" class="form-control" placeholder="Course & Year" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">sample1</label>
					<div class="col-sm-4">
						<input type="text" name="sample1" class="input-group date form-control" date="" data-date-format="sample1" placeholder="sample1" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">sample2</label>
					<div class="col-sm-3">
						<input type="text" name="sample2" class="form-control" placeholder="sample2" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Status</label>
					<div class="col-sm-2">
						<select name="status" class="form-control">
							<option value=""> ----- </option>
                            <option value="Incomplete">Incomplete</option>
							<option value="Partial">Partial</option>
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
