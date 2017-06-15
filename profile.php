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
						<li><a href="#">Company</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div id="preloader"></div>
	<div class="container-fluid margin-bottom">
			<a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>
			<section class="cta">
				<div class="cta-content">
					<div class="container">
						<h2 class="text-center"><span class="detailsHeading"> 
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

			<div class="margin-top"></div>
			
			<?php
			$idnum = $_GET['idnum'];
			
			$sql = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE idnum='$idnum'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){
				$delete = mysqli_query($connect, "DELETE FROM students WHERE idnum='$idnum'");
				if($delete){
					echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data successfully deleted.</div>';
				}else{
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data not deleted successfully.</div>';
				}
			}
			?>
			
			<table class="table table-striped table-bordered table-hover">
					<tr>
						<th scope="row" class="info">ID Number</th>
						<td><?php echo $row['idnum']; ?></td>
					</tr>
					<tr>
						<th scope="row" class="info">Name</th>
						<td><?php echo $row['last_name'].", ", $row['first_name']; ?></td>
					</tr>
					<tr>
						<th scope="row" class="info">Course & Year</th>
						<td><?php echo $row['courseyear']; ?></td>
					</tr>
					<tr>
						<th scope="row" class="info">Mobile Number</th>
						<td><?php echo $row['mobile_number']; ?></td>
					</tr>
					<tr>
						<th scope="row" class="info">Email</th>
						<td><?php echo $row['email']; ?></td>
					</tr>
					<tr>
						<th scope="row" class="info">Company Name</th>
						<td><?php echo $row['coname']; ?></td>
					</tr>
					<tr>
						<th scope="row" class="info">Status</th>
						<td><?php echo $row['status']; ?></td>
					</tr>
				</table>
			
			<div class="pull-right">
					<a href="index.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-menu-left space" aria-hidden="true"></span> Go Back</a>
					<a href="edit.php?idnum=<?php echo $row['idnum']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
					<a href="profile.php?aksi=delete&idnum=<?php echo $row['idnum']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete <?php echo $row['first_name'].$row['last_name']; ?> ?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Data</a>
				</div>

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