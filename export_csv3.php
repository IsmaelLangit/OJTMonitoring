<?php
    include("connect.php");
    ob_start();
    if(isset($_POST['export'])){
    $typeofcompany           = $_POST['typeofcompany'];
    $endorsement           = $_POST['endorsement'];
    $waiver           = $_POST['waiver'];
    $moa           = $_POST['moa'];
    $evaluation           = $_POST['evaluation'];
    $course           = $_POST['course'];
    $year           = $_POST['year'];
    $selecttable           = $_POST['selecttable'];
    $col_idnum= $_POST['col_idnum'];
    $col_name= $_POST['col_name'];
    $col_courseyear= $_POST['col_courseyear'];
    $col_mobile_number= $_POST['col_mobile_number'];
    $col_email= $_POST['col_email'];
    $col_status= $_POST['col_status'];
    $col_release_endorsement= $_POST['col_release_endorsement'];
    $col_receive_endorsement= $_POST['col_receive_endorsement'];
    $col_remark_endorsement= $_POST['col_remark_endorsement'];
    $col_endorsement= $_POST['col_endorsement'];
    $col_release_waiver= $_POST['col_release_waiver'];
    $col_receive_waiver= $_POST['col_receive_waiver'];
    $col_remark_waiver= $_POST['col_remark_waiver'];
    $col_waiver= $_POST['col_waiver'];
    $col_release_evaluation= $_POST['col_release_evaluation'];
    $col_receive_evaluation= $_POST['col_receive_evaluation'];
    $col_remark_evaluation= $_POST['col_remark_evaluation'];
    $col_evaluation= $_POST['col_evaluation'];   
    $col_coname= $_POST['col_coname'];
    $col_coaddress= $_POST['col_coaddress'];
    $col_company_head= $_POST['col_company_head'];
    $col_position= $_POST['col_position'];
    $col_contact_person= $_POST['col_contact_person'];
    $col_cp_position= $_POST['col_cp_position'];
    $col_typeofcompany= $_POST['col_typeofcompany'];
    $col_release_moa= $_POST['col_release_moa'];
    $col_receive_moa= $_POST['col_receive_moa'];
    $col_remark_moa= $_POST['col_remark_moa'];
    $col_moa= $_POST['col_moa'];

    if($col_idnum == "yes") { $selectable1 = "id_num AS 'ID No.'";} 
    if($col_name == "yes") { $selectable2 = "concat(last_name, ', ', first_name) AS Name";} 
    if($col_courseyear == "yes") { $selectable3 = "courseyear AS 'Course - Year'";} 
    if($col_mobile_number == "yes") {$selectable4 = "mobile_number AS 'Mobile No.'";} 
    if($col_email == "yes") { $selectable5 = "Email";} 
    if($col_status == "yes") { $selectable6 = "Status";} 
    if($col_release_endorsement == "yes") { $selectable7 = "release_endorsement AS Released'";} 
    if($col_receive_endorsement == "yes") { $selectable8 = "receive_endorsement AS Received";}
    if($col_remark_endorsement == "yes") { $selectable9 = "remark_endorsement AS Remarks";}
    if($col_endorsement == "yes") { $selectable10 = "endorsement AS Endorsement";}
    if($col_release_waiver == "yes") { $selectable11 = "release_waiver AS Released";} 
    if($col_receive_waiver == "yes") { $selectable12 = "receive_waiver AS Received"; } 
    if($col_remark_waiver == "yes") { $selectable13 = "remark_waiver AS Remarks";} 
    if($col_waiver == "yes") { $selectable14 = "waiver AS Waiver";} 
    if($col_release_evaluation == "yes") {$selectable15 = "release_evaluation AS Released";} 
    if($col_receive_evaluation == "yes") {$selectable16 = "receive_evaluation AS Received";} 
    if($col_remark_evaluation == "yes") {$selectable17 = "remark_evaluation AS Remarks";} 
    if($col_evaluation == "yes") {$selectable18 = "evaluation AS Evaluation";} 
    if($col_coname == "yes") {$selectable19 = "coname AS 'Company Name'";} 
    if($col_coaddress == "yes") {$selectable20 = "coaddress AS Address";} 
    if($col_company_head == "yes") {$selectable21 = "company_head AS 'Company Head'";} 
    if($col_position == "yes") {$selectable22 = "position AS Position";} 
    if($col_contact_person == "yes") {$selectable23 = "contact_person AS 'Contact Person'";} 
    if($col_cp_position == "yes") {$selectable24 = "cp_position AS Position";} 
    if($col_typeofcompany == "yes") {$selectable25 = "typeofcompany AS 'Company Type'";} 
    if($col_release_moa == "yes") {$selectable26 = "release_moa AS Released";}
    if($col_receive_moa == "yes") {$selectable27 = "receive_moa AS Received";} 
    if($col_remark_moa == "yes") {$selectable28 = "remark_moa AS Remarks";} 
    if($col_moa == "yes") {$selectable29 = "MOA";}

    $selecttable = "";

    for($i = 1 ; $i < 30 ; $i++) {
        if($selectable.$i) {

        }
    }

    // filename for export
    $csv_filename = 'db_export_'.$selecttable .'_'.date('Y-m-d').'.csv';

     if($endorsement == "All") {
        $where_endorsement = '(endorsement = "yes" or endorsement = "no" or endorsement = "")';
    } else {
        $where_endorsement = ' endorsement = "'.$endorsement.'" ';
    }

    if($waiver == "All") {
       $where_waiver = '(waiver = "yes" or waiver = "no" or waiver = "")';
    }else {
        $where_waiver = ' waiver = "'.$waiver.'" ';
    }

    if($moa == "All") {
        $where_moa = '(moa = "yes" or moa = "no") or moa = ""';
    }else {
        $where_moa = ' moa = "'.$moa.'" ';
    }

    if($evaluation == "All") {
       $where_evaluation = '(evaluation = "yes" or evaluation = "no" or evaluation = "")';
    }else {
        $where_evaluation = ' evaluation = "'.$evaluation.'" ';
    }

    if($typeofcompany == "All") {
       $where_typeofcompany = '(typeofcompany = "Private" or typeofcompany = "Government" or typeofcompany = "")';
    }else {
        $where_typeofcompany = ' typeofcompany = "'.$typeofcompany.'" ';
    }

    if($course == "All") {
       $where_course = 'courseyear LIKE "BS%"';
    }else {
        $where_course = 'courseyear LIKE "'.$courseyear.'%"';
    }

    if($year == "All") {
       $where_year = 'courseyear LIKE "BS%"';
    }else {
        $where_year = 'courseyear LIKE "%'.$year.'"';
    }

    if ($selecttable == "Students") {
        $selecttable = 'idnum, concat(last_name, ", ", first_name) as name, courseyear, mobile_number, email, release_endorsement, receive_endorsement, remark_endorsement, endorsement, release_waiver, receive_waiver, remark_waiver, waiver, release_evaluation, receive_evaluation, remark_evaluation, evaluation, release_moa, receive_moa, remark_moa, moa, status, coname, typeofcompany';
        $where = 'WHERE '.$where_endorsement.' AND '.$where_waiver.' AND '.$where_moa.' AND '.$where_evaluation.' AND '.$where_typeofcompany.' AND '.$where_course.' AND '.$where_year." ORDER BY last_name, first_name";     
    } else if ($selecttable == "Company") { 
        $selecttable = 'count(students.coid) as "countstudent",coid, coname, coaddress, company_head, position, typeofcompany';
        $where = 'WHERE coname != "No Company AND '.$where_moa.' AND '.$where_typeofcompany." ORDER BY coname";
    } else {
        $selecttable = '*';
        $where = 'WHERE '.$where_endorsement.' AND '.$where_waiver.' AND '.$where_moa.' AND '.$where_evaluation.' AND '.$where_typeofcompany.' AND '.$where_course.' AND '.$where_year." ORDER BY coname, last_name, first_name";
    }
    // create empty variable to be filled with export data
    $csv_export = '';
    // query to get data from database
    $query = mysqli_query($connect, "SELECT ".$selecttable." FROM students LEFT JOIN company on students.coid = company.coid ".$where);
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
    ob_end_clean();
    // Export the data and prompt a csv file for download
    header("Content-type: text/x-csv");
    header("Content-Disposition: attachment; filename=".$csv_filename."");
    echo($csv_export);
    exit();
}
?>

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

  <style type="text/css">
        tbody { display: block; width: 100%; height: 550px; overflow: auto;}
        tr {height: 20px; font-size: 15px; line-height: 5px;}
        td{ height: 10px };
  </style>

      <header class="main-header" id="header">
        <div class="bg-color wrapper">
            <!--nav-->
            <nav class="nav navbar-default navbar-fixed-top stroke">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynavbar" aria-expanded="false" aria-controls="navbar">
                            <span id="bars" class="fa fa-bars"></span>
                        </button>
                            <a href="index.php" class="navbar-brand"><img class="logoNav img-responsive" src="img/NewLogo.png"></a>
                        </div>
                        <div class="collapse navbar-collapse navbar-right borderXwidth" id="mynavbar">
                            <ul class="nav navbar-nav ">
                                <li><a href="index.php"><span class="fa fa-user space"></span>List of Students</a></li>
                                <li><a href="add.php"><span class="fa fa-plus space"></span>Add Student</a></li>
                                <li><a href="company.php"><span class="fa fa-building space"></span>list of Companies</a></li>
                                <li><a href="addcompany.php"><span class="fa fa-plus space"></span>Add Company</a></li>
                                <li class="active"><a href="export_csv.php"><span class="fa fa-download space"></span>Export Data</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!--/ nav-->
        </div>
    </header>
  <body>
    <section class="section-padding">
    <div class="container">
        <div class="row">
                <div class="col text-center">
                    <h1 class="top-title"><span class="title">Export </span>Data</h1>
                </div>
                <a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>

                <form id="form" method="post" action="">

                    <div class="row tablecontainer">

                        <div class="col-md-6">

                        <h2 class="head-title titleFont">Table Columns</h2>
                        <hr class="style-four">

                            <div class="form-group">

                                <table class="table table-hover table-responsive">
                                    <tbody id="export">
                                        <tr>
                                            <td colspan="3" class="info"><h4>STUDENT COLUMN</h4></td>
                                        </tr>
                                        <tr>
                                            <td width="60"></td>
                                            <th width="10"><input class="space" type = "checkbox" name = "col_idnum" value = "yes" checked></th>
                                            <td width="400">ID Number</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type = "checkbox" name = "col_name" value = "yes" checked></td>
                                            <td>Name</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type = "checkbox" name ="col_courseyear" value = "yes" checked></td>
                                            <td>Course and Year</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type = "checkbox" name ="col_mobile_number" value = "yes" checked></td>
                                            <td>Mobile Number</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type = "checkbox" name ="col_email" value = "yes" checked></td>
                                            <td>Email</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="info"><h4>REQUIREMENT COLUMN</h4></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type = "checkbox" name ="col_status" value = "yes"></td>
                                            <td>Overall Status</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="danger" colspan="2">Endorsement</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type = "checkbox" name ="col_release_endorsement" value = "yes"></td>
                                            <td>Date Released</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type = "checkbox" name ="col_receive_endorsement" value = "yes"></td>
                                            <td>Date Received</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type = "checkbox" name ="col_remark_endorsement" value = "yes"></td>
                                            <td>Remarks</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type = "checkbox" name ="col_endorsement" value = "yes" checked></td>
                                            <td>Status</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="danger" colspan="2">Waiver</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type = "checkbox" name ="col_release_waiver" value = "yes"></td>
                                            <td>Date Released</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type = "checkbox" name ="col_receive_waiver" value = "yes"></td>
                                            <td>Date Received</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type = "checkbox" name ="col_remark_waiver" value = "yes"></td>
                                            <td>Remarks</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type = "checkbox" name ="col_waiver" value = "yes" checked></td>
                                            <td>Status</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="danger" colspan="2">Evaluation</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type = "checkbox" name ="col_release_evaluation" value = "yes"></td>
                                            <td>Date Released</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type = "checkbox" name ="col_receive_evaluation" value = "yes"></td>
                                            <td>Date Received</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type = "checkbox" name ="col_remark_evaluation" value = "yes"></td>
                                            <td>Remarks</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type = "checkbox" name ="col_evaluation" value = "yes" checked></td>
                                            <td>Status</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="info"><h4>COMPANY COLUMN</h4></td>
                                        </tr>
                                            <tr>
                                                <td></td>
                                                <td class="danger" colspan="2">Company Information</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type = "checkbox" name "col_coname" value = "yes" checked></td>
                                                <td>Company Name</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type = "checkbox" name "col_coaddress" value = "yes" checked></td>
                                                <td>Company Address</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type = "checkbox" name "col_company_head" value = "yes"></td>
                                                <td>Company Head</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type = "checkbox" name "col_position" value = "yes"></td>
                                                <td>Company Head Position</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type = "checkbox" name "col_contact_person" value = "yes" checked></td>
                                                <td>Contact Person</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type = "checkbox" name "col_cp_position" value = "yes" checked></td>
                                                <td>Contact Person Position</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type = "checkbox" name "col_typeofcompany" value = "yes"></td>
                                                <td>Type of Company</td>
                                            </tr> 
                                            <tr>
                                                <td></td>
                                                <td class="danger" colspan="2">Memorandum of Agreement</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type = "checkbox" name "col_release_moa" value = "yes"></td>
                                                <td>Date Released </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type = "checkbox" name "col_receive_moa" value = "yes"></td>
                                                <td>Date Received </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type = "checkbox" name "col_remark_moa" value = "yes"></td>
                                                <td>Remarks</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type = "checkbox" name "col_moa" value = "yes"></td>
                                                <td>Status</td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-6">

                        <h2 class="head-title titleFont">Table Information</h2>
                        <hr class="style-four">

                            <div class="form-group">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td colspan="3" class="info"><h4>STUDENT INFORMATION</h4></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="danger" colspan="2">Course</td>
                                        </tr>
                                        <tr>
                                            <td width="60"></td>
                                            <td width="10"><input type="radio" name="course" value="All" required checked></td>
                                            <td width="400">All</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="radio" name="course" value="BSCS" required></td>
                                            <td>BS Computer Science</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="radio" name="course" value="BSIT" required></td>
                                            <td>BS Information Technology</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="danger" colspan="2">Year Level</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="radio" name="year" value="All" required checked></td>
                                            <td>All</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="radio" name="year" value="BSCS" required></td>
                                            <td>Third Year</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="radio" name="year" value="BSIT" required></td>
                                            <td>Fourth Year</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="danger" colspan="2">Endorsement</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="radio" name="endorsement" value="All" required checked></td>
                                            <td>All</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="radio" name="endorsement" value="yes" required></td>
                                            <td>Submitted</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="radio" name="endorsement" value="no" required></td>
                                            <td>Not Submitted</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="danger" colspan="2">Waiver</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="radio" name="waiver" value="All" required checked></td>
                                            <td>All</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="radio" name="waiver" value="yes" required></td>
                                            <td>Submitted</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="radio" name="waiver" value="no" required></td>
                                            <td>Not Submitted</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="danger" colspan="2">Evaluation</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="radio" name="evaluation" value="All" required checked></td>
                                            <td>All</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="radio" name="evaluation" value="yes" required></td>
                                            <td>Submitted</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="radio" name="evaluation" value="no" required></td>
                                            <td>Not Submitted</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="info"><h4>COMPANY INFORMATION</h4></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="danger" colspan="2">Company Type</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="radio" name="typeofcompany" value="All" required checked></td>
                                            <td>All</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="radio" name="typeofcompany" value="Private" required></td>
                                            <td>Private</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="radio" name="typeofcompany" value="Government" required></td>
                                            <td>Government</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="danger" colspan="2">Memorandum of Agreement</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="radio" name="moa" value="All" required checked></td>
                                            <td>All</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="radio" name="moa" value="yes" required></td>
                                            <td>Submitted</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="radio" name="moa" value="no" required></td>
                                            <td>Not Submitted</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div> <!--End of form-group-->
                        </div>
                </div>

                        <div class="row">
                            <div class="form-group text-center paddingTopSlight">
                                <button type="submit" name="export" class="btn btn-md btn-success paddingTopSlight" value="Export data"><span class="fa fa-download space"></span> Export Data</button>
                            </div>
                        </div>
                </form>

        </div>
    </div>
    </section>
    <!---->
    <!---->

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
    <script>
    $('.date').datepicker({
        format: 'MM dd yyyy',
    })
    </script>
  </body>
</html>