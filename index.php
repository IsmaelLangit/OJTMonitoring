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
	<div class="container-fluid">

	<a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>

	
		<section class="cta">
				<div class="cta-content">
					<div class="container">
						<h2 class="text-center">PRACTICUM 2 <span class="detailsHeading">STUDENTS</span></h2>
					</div>
				</div>
				<div class="overlay"></div>
			</section>

		<div class="col-md-12 margin-top">

			<?php
			if(isset($_GET['action']) == 'delete'){
				$idnum = $_GET['idnum'];
				$cek = mysqli_query($connect, "SELECT * FROM students WHERE idnum='$idnum ORDER BY last_name ASC, first_name ASC'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Welcome Admin!</div>';
				}else{
					$delete = mysqli_query($connect, "DELETE FROM students WHERE idnum='$idnum '");
					if($delete){
						echo '<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> You have successfully <strong> deleted </strong> the student!
								</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>';
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
                            <button class="btn btn-primary" type="button" onclick="resetName()" value="reset">Reset</button>
                        </span>
                    </div>
                </form>
			</form>
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover" id="myTable">
				<tr class="info">
	                    <th>No</th>
						<th>ID Number</th>
						<th>Name</th>
	                    <th>Course & Year</th>
	                    <th>Email</th>
	                    <th>Mobile No.</th>
	                    <th>Endorsement</th>
	                    <th>Waiver</th>
	                    <th>MOA</th>
	                    <th>Evaluation</th>
						<th>Company Name</th>
						<th>OJT Type</th>
						<th>Requirement Status</th>
	                    <th>Tools</th>
					</tr>
				<?php
				if($filter){
					$sql = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE status='$filter' or typeofojt='$filter' ORDER BY last_name ASC, first_name ASC");
				}else{
					$sql = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid  ORDER BY last_name ASC, first_name ASC");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr class="nothingToDisplay text-center"><td colspan="8">Nothing to Display</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$row['idnum'].'</td>
							<td><a href="profile.php?idnum='.$row['idnum'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$row['last_name'].", ".$row['first_name'].'</a></td>
                            <td>'.$row['courseyear'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['mobile_number'].'</td>';

							if($row['endorsement'] == 'yes'){
								echo '<td><span class="glyphicon glyphicon-ok fontGlyphiconOk"></span></td>';
							}
                            else if ($row['endorsement'] == 'no' ){
								echo '<td><span class="glyphicon glyphicon-remove fontGlyphiconNo"></span></td>';
							}


							if($row['waiver'] == 'yes'){
								echo '<td><span class="glyphicon glyphicon-ok fontGlyphiconOk"></span></td>';
							}
                            else if ($row['waiver'] == 'no' ){
								echo '<td><span class="glyphicon glyphicon-remove fontGlyphiconNo"></span></td>';
							}

							if($row['moa'] == 'yes'){
								echo '<td><span class="glyphicon glyphicon-ok fontGlyphiconOk"></span></td>';
							}
                            else if ($row['moa'] == 'no' ){
								echo '<td><span class="glyphicon glyphicon-remove fontGlyphiconNo"></span></td>';
							}

							if($row['evaluation'] == 'yes'){
								echo '<td><span class="glyphicon glyphicon-ok fontGlyphiconOk"></span></td>';
							}
                            else if ($row['evaluation'] == 'no' ){
								echo '<td><span class="glyphicon glyphicon-remove fontGlyphiconNo"></span></td>';
							}

						echo '
							<td>'.$row['coname'].'</td>
							<td>';
							if($row['typeofojt'] == 'In-house'){
								echo '<span class="label label-info">In-house</span>';
							}
                            else if ($row['typeofojt'] == 'Company-based' ){
								echo '<span class="label label-primary">Company-based</span>';
							}

						echo '
							</td>
							<td>';
							if($row['status'] == 'Complete'){
								echo '<span class="label label-success">Complete</span>';
							} else if ($row['status'] == 'Incomplete' ){
								echo '<span class="label label-warning">Incomplete</span>';
							}
						echo '
							</td>
							<td>
								<a href="edit.php?idnum='.$row['idnum'].'" title="Edit Data" class="btn btn-success btn-sm">
									<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
								</a>
								<a href="index.php?action=delete&idnum='.$row['idnum'].'" title="Remove Student" onclick="return confirm(\'Are you sure you want to delete '.$row['first_name']." ".$row['last_name'].'?\')" class="btn btn-danger btn-sm">
									<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
								</a>
							</td>
						</tr>
						';
						$no++;
					}
				}
				?>
			</table>
				</div>
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
		<script src="js/smoothScroll.js"></script>
		<script src="js/preloader.js"></script>
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
