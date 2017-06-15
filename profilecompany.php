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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>