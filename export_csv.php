<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Company</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/datepicker.css">
    <link rel="icon" href="img/scisLogo.png">
  </head>
  <body>

    <header class="main-header" id="header">
        <div class="bg-color wrapper">
            <!--nav-->
            <nav class="nav navbar-default navbar-fixed-top stroke">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynavbar" aria-expanded="false" aria-controls="navbar">
                            <span class="fa fa-bars"></span>
                        </button>
                            <a href="index.php" class="navbar-brand"><img class="logoNav img-responsive" src="img/NewLogo.png"></a>
                        </div>
                        <div class="collapse navbar-collapse navbar-right borderXwidth" id="mynavbar">
                            <ul class="nav navbar-nav ">
                                <li class="active"><a href="index.php">List of Students</a></li>
                                <li><a href="add.php">Add Student</a></li>
                                <li><a href="company.php">list of Companies</a></li>
                                <li><a href="addcompany.php">Add Company</a></li>
                                <li><a href="export_csv.php">Export</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!--/ nav-->
        </div>
    </header>
    <!--/ header-->

    <section class="section-padding">
        <form class="form-inline" method="post">
			<h4>Tables</h4>
			 <select name="selecttable" class="btn btn-default form-control touch">
		        <?php $selecttable = (isset($_POST['selecttable']) ? strtolower($_POST['selecttable']) : NULL);  ?>
		        <option value="Students" <?php if($selecttable == 'students'){ echo 'selected'; } ?>>Students</option>
		        <option value="Company" <?php if($selecttable == 'company'){ echo 'selected'; } ?>>Company</option>
		        <option value="Students+Company" <?php if($selecttable == 'students+Company'){ echo 'selected'; } ?>>Students + Company</option>
		    </select>

			<h4>Student Information</h4>
			<input type="hidden" name="endorsement" value="no">                                          
		    <input type="checkbox" name="endorsement" value="yes">Endorsement<br> 
		    <input type="hidden" name="waiver" value="no">                                          
		    <input type="checkbox" name="waiver" value="yes">Waiver<br> 
		    <input type="hidden" name="moa" value="no">                                          
		    <input type="checkbox" name="moa" value="yes">Memorandum of Agreement<br> 
		    <input type="hidden" name="evaluation" value="no">                                          
		    <input type="checkbox" name="evaluation" value="yes">Evaluation<br> 

			<h4>Company Information</h4>
			<input type="radio" name="typeofcompany" value="Private" required> Private<br>                                          
			<input type="radio" name="typeofcompany" value="Government" required> Government<br>

			<input type="submit" name="export" class="btn btn-md btn-success" value="Export data">
		</form>
	</section>
	<footer class="footer-distributed footer">
	    <div class="footer-left">
	        <img class="footerLogo img-responsive" src="img/NewLogo.png">
	        <p class="footer-links">
	            <a href="index.php">Students</a>
	            |
	            <a href="company.php">Company</a>
	        </p>
	        <p class="footer-company-name">&copy; Designed by OJT2 2016-2017</p>
	    </div>
	    <div class="footer-center">
	        <div>
	            <i class="glyphicon glyphicon-globe"></i>
	            <p><span>A. Bonifacio Street</span> Baguio City, Philippines 2600</p>
	        </div>
	        <div>
	            <i class="glyphicon glyphicon-earphone"></i>
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
    <!---->
    <!-- end-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/smoothScroll.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/datepicker.js"></script>
    <script src="js/jquery.are-you-sure.js"></script>

    <script>
        $('form').areYouSure();
    </script>
	</body>
</html>

<?php
if(isset($_POST['export'])){
$typeofcompany           = $_POST['typeofcompany'];
$endorsement           = $_POST['endorsement'];
$waiver           = $_POST['waiver'];
$moa           = $_POST['moa'];
$evaluation           = $_POST['evaluation'];
$selecttable           = $_POST['selecttable'];

ob_end_clean();

// filename for export
$csv_filename = 'db_export_'.$selecttable .'_'.date('Y-m-d').'.csv';

$where = 'WHERE 1 ORDER BY 1';

if ($selecttable == "Students") {
	$selecttable = 'idnum, concat(last_name, ", ", first_name) as name, courseyear, mobile_number, email, release_endorsement, receive_endorsement, remark_endorsement, endorsement, release_waiver, receive_waiver, remark_waiver, waiver, release_evaluation, receive_evaluation, remark_evaluation, evaluation, release_moa, receive_moa, remark_moa, moa, status';
	$where = 'WHERE endorsement = "'.$endorsement.'" AND waiver = "'.$waiver.'" AND moa = "'.$moa.'" AND evaluation = "'.$evaluation.'"';
} else if ($selecttable == "Company") { 
	$selecttable = 'coid, coname, courseyear, coaddress, company_head, position,typeofcompany,release_moa,receive_moa,remark_moa,moa,status';
	$where = 'WHERE moa = "'.$moa.'" AND typeofcompany = "'.$typeofcompany.'"';
} else {
	$selecttable = '*';
	$where = 'WHERE endorsement = "'.$endorsement.'" AND waiver = "'.$waiver.'" AND moa = "'.$moa.'" AND evaluation = "'.$evaluation.'" AND typeofcompany = "'.$typeofcompany.'"';
}

// create empty variable to be filled with export data
$csv_export = '';
// query to get data from database
$query = mysqli_query($connect, "SELECT ".$selecttable." FROM students NATURAL JOIN company ".$where);
$field = mysqli_field_count($connect);
// create line with field names
for($i = 0; $i < $field; $i++) {
$csv_export.= mysqli_fetch_field_direct($query, $i)->name.';';
}
// newline (seems to work both on Linux & Windows servers)
$csv_export.= '
';
// loop through database query and fill export variable
while($row = mysqli_fetch_array($query)) {
// create line with field values
for($i = 0; $i < $field; $i++) {
$csv_export.= '"'.$row[mysqli_fetch_field_direct($query, $i)->name].'";';
}
$csv_export.= '
';
}
// Export the data and prompt a csv file for download
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=".$csv_filename."");
echo($csv_export);
}
?>

