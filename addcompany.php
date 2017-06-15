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
	      <a class="navbar-brand" href="#"><img class="logoNav img-responsive" src="img/Picture1.png"></a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li><a href="#">Home</a></li>
	        <li><a href="index.php">Students</a></li>
	        <li class="active"><a href="add.php">Add Students</a></li> 
	        <li><a href="#">Company</a></li> 
	      </ul>
	    </div>
	  </div>
	</nav>

	<div class="container-fluid">

		<section class="cta">
	        <div class="cta-content">
	            <div class="container">
	                <h2 class="text-center">ADD A COMPANY</h2>
	            </div>
	        </div>
	        <div class="overlay"></div>
		</section>
               
			<?php
			if(isset($_POST['add'])){
				$coname		     = $_POST['coname'];
				$coaddress		     = $_POST['coaddress'];
				$company_head	     = $_POST['company_head'];
				$position	     = $_POST['position'];
				$typeofojt	     = $_POST['typeofojt'];
               
                $con = mysqli_query($connect, "SELECT * from company WHERE coid='$coid'");
                if(mysqli_num_rows($con) == 0){
                    $insert = mysqli_query($connect, "INSERT INTO company(coname, coaddress, company_head, position, typeofojt)
															VALUES('$coname','$coaddress', '$company_head','$position','$typeofojt')") or die('Error: ' . mysqli_error($connect));
                    if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Student Successfully Added !</div>';
						}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ID no.</div>';
				        }
					
				}
                
			}
			?>

			<div class="col-md-7">
			<form class="form-horizontal margin-top margin-bottom" action="" method="post">

					<div class="form-group">
						<label class="col-sm-4 control-label">Company Name</label>
						<div class="col-sm-8">
							<input type="text" name="coname" class="form-control" placeholder="Company name..." required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label">Address</label>
						<div class="col-sm-8">
							<input type="text" name="address" class="form-control" placeholder="Address.." required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label">Company Head</label>
						<div class="col-sm-8">
							<input type="text" name="company_head" class="form-control" placeholder="Company head.." required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label">Position</label>
						<div class="col-sm-8">
							<input type="text" name="position" class="form-control" placeholder="Position.." required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label">Type</label>
						<div class="col-sm-8">
							<select name="courseyear" class="form-control">
	                            <option value="Company-based">Company-based</option>
								<option value="In-house">In-house</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label">&nbsp;</label>
						<div class="col-sm-8">
							<input type="submit" name="add" class="btn btn-sm btn-success" value="Submit">
							<a href="index.php" class="btn btn-sm btn-danger">Cancel</a>
						</div>
					</div>
				</form>	
		</div> <!--END OF COL-MD-7-->

		<div class="col-md-5">
			<img class="img-responsive center-block" src="img/add-person.png">
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
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})
	</script>
</body>
</html>
