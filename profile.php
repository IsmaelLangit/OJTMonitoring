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
			<h2>Student &raquo; Information</h2>
			<hr />
			
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
			
			<table class="table table-striped table-condensed">
				<tr>
					<th width="20%">ID no.</th>
					<td><?php echo $row['idnum']; ?></td>
				</tr>
				<tr>
					<th>Name</th>
					<td><?php echo $row['first_name'].", ".$row['last_name']; ?></td>
				</tr>
                <tr>
					<th>Course & Year</th>
					<td><?php echo $row['courseyear']; ?></td>
				</tr>
				<tr>
					<th>Mobile Number</th>
					<td><?php echo $row['mobile_number']; ?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?php echo $row['email']; ?></td>
				</tr>
				<tr>
					<th>Date Started</th>
					<td><?php echo $row['date_started']; ?></td>
				</tr>
				<tr>
					<th>Company Name</th>
					<td><?php echo $row['coname']; ?></td>
				</tr>

				<tr>
					<th>Status</th>
					<td><?php echo $row['status']; ?></td>
				</tr>
			</table>
			
			<a href="index.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Students</a>
			<a href="edit.php?idnum=<?php echo $row['idnum']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="profile.php?aksi=delete&idnum=<?php echo $row['idnum']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete <?php echo $row['first_name'].$row['last_name']; ?> ?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Data</a>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>