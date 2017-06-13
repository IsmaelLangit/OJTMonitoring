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
				<a class="navbar-brand visible-xs-block visible-sm-block" href="">OJT MONITORING</a>
				<a class="navbar-brand hidden-xs hidden-sm" href="">OJT MONITORING</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Students</a></li>
					<li><a href="add.php">Add Students</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Students</h2>
			<hr />

			<?php
			if(isset($_GET['action']) == 'delete'){
				$idnum = $_GET['idnum'];
				$cek = mysqli_query($connect, "SELECT * FROM students WHERE idnum='$idnum'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>!!!</div>';
				}else{
					$delete = mysqli_query($connect, "DELETE FROM students WHERE idnum='$idnum'");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data successfully deleted.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> !! </div>';
					}
				}
			}
			?>

			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="0">Filter Students By:</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="" <?php if($filter == ''){ echo 'selected'; } ?>>Show All</option>
						<option value="Complete" <?php if($filter == 'Complete'){ echo 'selected'; } ?>>Complete</option>
                        <option value="Incomplete" <?php if($filter == 'Incomplete'){ echo 'selected'; } ?>>Incomplete</option>
                        <option value="In-house" <?php if($filter == 'In-house'){ echo 'selected'; } ?>>In-house</option>
                        <option value="Company-based" <?php if($filter == 'Company-based'){ echo 'selected'; } ?>>Company-based</option>
					</select>
				</div>
                <form id="Name" action="#">
                <div class="input-group">
                        <input type="text" id="myInput" onkeyup="filterData()" class="form-control" placeholder="Search Name...">
                        <span class="input-group-btn">  
                            <button class="btn btn-default" type="button" onclick="resetName()" value="reset">Reset</button>
                        </span>
                    </div>
                </form>
			</form>
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover" id="myTable">
				<tr>
                    <th>No</th>
					<th>ID no.</th>
					<th>Name</th>
                    <th>Course & Year</th>
                    <th>Date Started</th>
					<th>Company</th>
					<th>OJT Type</th>
					<th>Requirement Status</th>
                    <th>Tools</th>
				</tr>
				<?php
				if($filter){
					$sql = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE status='$filter' or typeofojt='$filter' ORDER BY idnum ASC");
				}else{
					$sql = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid  ORDER BY idnum ASC");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">Nothing to Display</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$row['idnum'].'</td>
							<td><a href="profile.php?idnum='.$row['idnum'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$row['name'].'</a></td>
                            <td>'.$row['courseyear'].'</td>
                            <td>'.$row['date_started'].'</td>
							<td>'.$row['coname'].'</td>
							<td>';
							if($row['typeofojt'] == 'In-house'){
								echo '<span class="label label-success">In-house</span>';
							}
                            else if ($row['typeofojt'] == 'Company-based' ){
								echo '<span class="label label-warning">Company-based</span>';
							}
						echo '
							</td>
							<td>';
							if($row['status'] == 'Complete'){
								echo '<span class="label label-success">Complete</span>';
							}
                            else if ($row['status'] == 'Incomplete' ){
								echo '<span class="label label-warning">Incomplete</span>';
							}
						echo '
							</td>
							<td>

								<a href="edit.php?idnum='.$row['idnum'].'" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="index.php?action=delete&idnum='.$row['idnum'].'" title="" onclick="return confirm(\'Are you sure you want to delete '.$row['name'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
						$no++;
					}
				}
				?>
			</table>
			</div>
             <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        </h1>
                    </div>
                </div>
		</div>
	</div><center>
	<p>&copy; OJT '17</p
		</center>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
        <script>
            function filterData() {
                var input, filter, table, tr, td, i;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");

                for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }       
                }
            }
            
             function resetName(){
                document.getElementById("Name").reset;
            }
        </script>
</body>
</html>
