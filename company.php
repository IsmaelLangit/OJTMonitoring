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
	        <li><a href="index.php">Students</a></li>
	        <li><a href="add.php">Add Students</a></li> 
	        <li class="active"><a href="company.php">Company</a></li> 
	        <li><a href="addcompany.php">Add Company</a></li> 
	      </ul>
	    </div>
	  </div>
	</nav>

	<div class="container-fluid">
		<section class="cta">
	        <div class="cta-content">
	            <div class="container">
	                <h2 class="text-center">COMPANY LIST</h2>
	            </div>
	        </div>
	        <div class="overlay"></div>
		</section>	

		<div class="col-md-12 margin-top margin-bottom">

			<?php
			if(isset($_GET['action']) == 'delete'){
				$coid = $_GET['coid'];
				$coname = $_GET['coname'];
				$con = mysqli_query($connect, "SELECT * FROM company WHERE coid='$coid OR coname='$coname ORDER BY coname ASC'");
				if(mysqli_num_rows($con) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Welcome Admin!</div>';
				}else{
					$delete = mysqli_query($connect, "DELETE FROM company WHERE coid='$coid '");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data successfully deleted.</div>';
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
                        <option value="Company-based" <?php if($filter == 'Company-based'){ echo 'selected'; } ?>>Company-based</option>
                        <option value="In-house" <?php if($filter == 'In-house'){ echo 'selected'; } ?>>In-house</option>
                        <option value="Goverment" <?php if($filter == 'Goverment'){ echo 'selected'; } ?>>Goverment</option>
                        <option value="Private" <?php if($filter == 'Private'){ echo 'selected'; } ?>>Private</option>
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
				<tr class="info">
	                    <th>No</th>
						<th>Company Name</th>
						<th>Address</th>
						<th>Type</th>
						<th>Company Head</th>
						<th>Position</th>
	                    <th>Tools</th>
					</tr>
				<?php
				if($filter){
					$sql = mysqli_query($connect, "SELECT * from company WHERE typeofojt='$filter' or typeofcompany = '$filter' ORDER BY coname ASC");
				}else{
					$sql = mysqli_query($connect, "SELECT * from company ORDER BY coname ASC");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr class="nothingToDisplay text-center"><td colspan="8">Nothing to Display</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td><a href="profilecompany.php?coid='.$row['coid'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$row['coname'].'</a></td>
                            <td>'.$row['coaddress'].'</td>';
                        echo '
							<td>';
							if($row['typeofojt'] == 'In-house' && $row['typeofcompany'] == 'Private'){
								echo '<span class="label label-danger">Private</span> <br>';
								echo '<span class="label label-info">In-house</span>';
							} else if($row['typeofojt'] == 'In-house' && $row['typeofcompany'] == 'Government'){
								echo '<span class="label label-success">Government</span> <br>';
								echo '<span class="label label-info">In-house</span>';
							} else if ($row['typeofojt'] == 'Company-based' && $row['typeofcompany'] == 'Private'){
								echo '<span class="label label-danger">Private</span> <br>';
								echo '<span class="label label-primary">Company-based</span>';
							} else if ($row['typeofojt'] == 'Company-based' && $row['typeofcompany'] == 'Government'){
								echo '<span class="label label-success">Government</span> <br>';
								echo '<span class="label label-primary">Company-based</span>';
							}
			 			echo '
						<td>'.$row['company_head'].'</td>
						<td>'.$row['position'].'</td>
						';
						echo '
							<td>
								<a href="editcompany.php?coid='.$row['coid'].'" title="Edit Data" class="btn btn-success btn-sm">
									<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
								</a>
								<a href="company.php?action=delete&coid='.$row['coid'].'" title="Remove Company" onclick="return confirm(\'Are you sure you want to delete '.$row['coname'].'?\')" class="btn btn-danger btn-sm">
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
        <script>
            function filterData() {
                var input, filter, table, tr, td, i;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");

                for (i = 0; i < tr.length; i++) {
                td1 = tr[i].getElementsByTagName("td")[0];
                td2 = tr[i].getElementsByTagName("td")[1];
                td3 = tr[i].getElementsByTagName("td")[2];
                    if (td1 && td2 && td3) {
                        if (td2.innerHTML.toUpperCase().indexOf(filter) > -1) {
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
