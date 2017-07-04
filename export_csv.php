<?php
include("connect.php");
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/reveal-if-active.css">
</head>
<body>
<form method = "post" action="">
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

