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
					<li><a href="company.php">Companies</a></li>
					<li><a href="add.php">Add new Company</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Students &raquo; Edit Data</h2>
			<hr />
			
			<?php
			$coid = $_GET['coid'];
			$sql = mysqli_query($connect, "SELECT * from company WHERE coid='$coid'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: company.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$coname		     = $_POST['coname'];
				$coaddress		     = $_POST['coaddress'];
				$company_head	     = $_POST['company_head'];
				$position	     = $_POST['position'];
				$typeofojt	     = $_POST['typeofojt'];
				
				$update = mysqli_query($connect, "UPDATE company SET coname ='$coname',coaddress='$coaddress', company_head='$company_head', position='$position',typeofojt='$typeofojt' WHERE coid='$coid'") or die(mysqli_error());
				if($update){
					header("Location: editcompany.php?coid=".$coid."&message=success");
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
					<label class="col-sm-3 control-label">Company Name</label>
					<div class="col-sm-4">
						<input type="text" name="coname" value="<?php echo $row ['coname']; ?>" class="form-control" placeholder="Company Name" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Address</label>
					<div class="col-sm-4">
						<input type="text" name="coaddress" value="<?php echo $row ['coaddress']; ?>" class="form-control" placeholder="Company address" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Type</label>
					<div class="col-sm-2">
						<select name="typeofojt" class="form-control">
						<option value="<?php echo $row ['typeofojt']; ?>"><?php echo $row ['typeofojt']; ?></option>";
						<?php
							if ($row ['typeofojt'] == 'In-house') {
								echo "<option value='Company-based'>Company-based</option>";
							} else if ($row ['typeofojt'] == 'Company-based') {
								echo "<option value='In-house'>In-house</option>";
							}
						?>
						</select> 
					</div>
                </div>

                <div class="form-group">
					<label class="col-sm-3 control-label">Company Head</label>
					<div class="col-sm-4">
						<input type="text" name="company_head" value="<?php echo $row ['company_head']; ?>" class="form-control" placeholder="Company head" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Position</label>
					<div class="col-sm-4">
						<input type="text" name="position" value="<?php echo $row ['position']; ?>" class="form-control" placeholder="Position" required>
					</div>
				</div

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