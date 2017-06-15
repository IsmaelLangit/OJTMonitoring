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
	<link rel="icon" href="img/scisLogo.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/footer-distributed-with-address-and-phones.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
	
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
	        <li><a href="index.php">Students</a></li>
	        <li><a href="add.php">Add Students</a></li> 
	        <li><a href="company.php">Company</a></li> 
	        <li><a href="addcompany.php">Add Company</a></li> 
	      </ul>
	    </div>
	  </div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Company &raquo; Information</h2>
			<hr />
			
			<?php
			$coid = $_GET['coid'];
			
			$sql = mysqli_query($connect, "SELECT * from company WHERE coid='$coid'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: company.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){
				$delete = mysqli_query($connect, "DELETE FROM company WHERE coid='$coid'");
				if($delete){
					echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data successfully deleted.</div>';
				}else{
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data not deleted successfully.</div>';
				}
			}
			?>
			
			<table class="table table-striped table-condensed">
                <tr>
					<th>Company Name</th>
					<td><?php echo $row['coname']; ?></td>
				</tr>
				<tr>
					<th>Address</th>
					<td><?php echo $row['coaddress']; ?></td>
				</tr>
				<tr>
					<th>Type</th>
					<td><?php echo $row['typeofojt']; ?></td>
				</tr>
				<tr>
					<th>Company Head</th>
					<td><?php echo $row['company_head']; ?></td>
				</tr>
				<tr>
					<th>Position</th>
					<td><?php echo $row['position']; ?></td>
				</tr>
			</table>
			
			<a href="company.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Companies</a>
			<a href="editcompany.php?coid=<?php echo $row['coid']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="profilecompany.php?aksi=delete&coid=<?php echo $row['coid']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete <?php echo $row['coname']; ?> ?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Data</a>
		</div>
	</div>

	<footer class="footer-distributed footer">
		<div class="footer-left">
			<img class="footerLogo img-responsive" src="img/Picture1.png">
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
</body>
</html>