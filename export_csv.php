<?php
include("connect.php");
ob_start();
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

    <section class="section-padding">
    <div class="container">
        <div class="row">
                <div class="col">
                    <h1 class="top-title"><span class="title">Export </span>Data</h1>
                </div>
                <a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>
                <form class="form-inline" method="post">
                    <h2 class="head-title titleFont">Tables</h2>
        			 <select name="selecttable" class="form-control touch">
        		        <?php $selecttable = (isset($_POST['selecttable']) ? strtolower($_POST['selecttable']) : NULL);  ?>
        		        <option value="Students" <?php if($selecttable == 'students'){ echo 'selected'; } ?>>Students</option>
        		        <option value="Company" <?php if($selecttable == 'company'){ echo 'selected'; } ?>>Company</option>
        		        <option value="Students+Company" <?php if($selecttable == 'students+Company'){ echo 'selected'; } ?>>Students + Company</option>
        		    </select>
        			<h2 class="head-title titleFont">Student Information</h2>
                    <hr class="style-four">
        			<input type="hidden" name="endorsement" value="no">                                          
        		    <input type="checkbox" name="endorsement" value="yes"><span class="space"></span>Endorsement<br> 
        		    <input type="hidden" name="waiver" value="no">                                          
        		    <input type="checkbox" name="waiver" value="yes"><span class="space"></span>Waiver<br> 
        		    <input type="hidden" name="moa" value="no">                                          
        		    <input type="checkbox" name="moa" value="yes"><span class="space"></span>Memorandum of Agreement<br> 
        		    <input type="hidden" name="evaluation" value="no">                                          
        		    <input type="checkbox" name="evaluation" value="yes"><span class="space"></span>Evaluation<br> 
        			<h2 class="head-title titleFont">Company Information</h2>
                    <hr class="style-four">
        			<input type="radio" name="typeofcompany" value="Private" required> Private<br>                                          
        			<input type="radio" name="typeofcompany" value="Government" required> Government<br>
        			<input type="submit" name="export" class="btn btn-md btn-success paddingTopSlight" value="Export data">
        		</form>
            </div>
        </div>
	</section>

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
        ob_end_flush();
    }
?>