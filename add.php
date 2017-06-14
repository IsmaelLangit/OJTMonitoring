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
	                <h2 class="text-center">ADD A PRACTICUM 2 STUDENT</h2>
	            </div>
	        </div>
	        <div class="overlay"></div>
		</section>
               
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

			<div class="col-md-7">
			<form class="form-horizontal margin-top margin-bottom" action="" method="post">

					<div class="form-group">
						<label class="col-sm-4 control-label">ID Number</label>
						<div class="col-sm-8">
							<input type="number" name="idnum" class="form-control" placeholder="ID number..." required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label">Name</label>
						<div class="col-sm-8">
							<input type="text" name="name" class="form-control" placeholder="Name.." required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label">Course & Year</label>
						<div class="col-sm-8">
							<select name="courseyear" class="form-control">
	                            <option value="BSIT-3">BSIT-3</option>
								<option value="BSIT-4">BSIT-4</option>
								<option value="BSCS-3">BSCS-3</option>
								<option value="BSCS-4">BSCS-4</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label">Date Started</label>
						<div class="col-sm-8">
							<input type="text" name="date_started" class="input-group date form-control" date="" data-date-format="date_started" placeholder="Date started..." required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label">Company</label>
						<div class="col-sm-8">
							<input type="text" name="company_name" class="form-control" placeholder="Company name..." required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label">OJT type</label>
						<div class="col-sm-8">
							<select name="typeofojt" class="form-control">
	                            <option value="In-house">In-house</option>
								<option value="Company-based">Company-based</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label">Status</label>
						<div class="col-sm-8">
							<select name="status" class="form-control">
	                            <option value="Incomplete">Incomplete</option>
								<option value="Complete">Complete</option>
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
