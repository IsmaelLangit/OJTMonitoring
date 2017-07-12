<?php
    include("connect.php");
    ob_start();
    if(isset($_POST['export'])){
    $typeofcompany = $_POST['typeofcompany'];
    $endorsement = $_POST['endorsement'];
    $waiver = $_POST['waiver'];
    $moa = $_POST['moa'];
    $evaluation = $_POST['evaluation'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $selecttable = $_POST['selecttable'];
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
        $where_moa = '(moa = "yes" or moa = "no" or moa = "")';
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

    if($course == "All" || $year == "All") {
        $where_course = 'courseyear LIKE "BS%"';
        $where_year = 'courseyear LIKE "BS%"';
    }

    if($course != "All") {
        $where_course = 'courseyear LIKE "'.$course.'%"';
    }

    if($year != "All") {
        $where_year = 'courseyear LIKE "%'.$year.'"';
    }

    $from = "students LEFT JOIN company on students.coid = company.coid";
    $where = $where_endorsement.' AND '.$where_waiver.' AND '.$where_moa.' AND '.$where_evaluation.' AND '.$where_typeofcompany.' AND '.$where_course.' AND '.$where_year." ORDER BY coname, last_name, first_name";
    $select_column = "";

    if ($selecttable == "Company"  || $selecttable == "Students+Company") {
        if ($selecttable == "Company") {$from = "company";$where = 'coname != "No Company" AND '.$where_moa.' AND '.$where_typeofcompany.' ORDER BY coname';}
        if($col_coname == "yes") {$select_column = $select_column.", coname AS 'Company Name'";} 
        if($col_coaddress == "yes") {$select_column = $select_column.", coaddress AS Address";} 
        if($col_company_head == "yes") {$select_column = $select_column.", company_head AS 'Company Head'";} 
        if($col_position == "yes") {$select_column = $select_column.", Position";} 
        if($col_contact_person == "yes") {$select_column = $select_column.", contact_person AS 'Contact Person'";} 
        if($col_cp_position == "yes") {$select_column = $select_column.", cp_position AS Position";} 
        if($col_typeofcompany == "yes") {$select_column = $select_column.", typeofcompany AS 'Company Type'";} 

        if ($selecttable == "Students+Company") {
            if($col_idnum == "yes") { $select_column = $select_column.", idnum AS 'ID No.'";} 
            if($col_name == "yes") { $select_column = $select_column.", concat(last_name, ', ', first_name) AS Name";} 
            if($col_courseyear == "yes") { $select_column = $select_column.", courseyear AS 'Course - Year'";} 
            if($col_mobile_number == "yes") { $select_column = $select_column.", mobile_number as 'Mobile No.'";} 
            if($col_email == "yes") {  $select_column = $select_column.", Email";} 
            if($col_status == "yes") { $select_column = $select_column.", Status";} 
            if($col_release_endorsement == "yes") { $select_column = $select_column.", release_endorsement AS Released";} 
            if($col_receive_endorsement == "yes") { $select_column = $select_column.", receive_endorsement AS Received";}
            if($col_remark_endorsement == "yes") { $select_column = $select_column.", remark_endorsement AS Remarks";}
            if($col_endorsement == "yes") { $select_column = $select_column.", endorsement AS Endorsement";}
            if($col_release_waiver == "yes") { $select_column = $select_column.", release_waiver AS Released";} 
            if($col_receive_waiver == "yes") { $select_column = $select_column.", receive_waiver AS Received"; } 
            if($col_remark_waiver == "yes") { $select_column = $select_column.", remark_waiver AS Remarks";} 
            if($col_waiver == "yes") { $select_column = $select_column.", waiver AS Waiver";} 
            if($col_release_evaluation == "yes") {$select_column = $select_column.", release_evaluation AS Released";} 
            if($col_receive_evaluation == "yes") {$select_column = $select_column.", receive_evaluation AS Received";} 
            if($col_remark_evaluation == "yes") {$select_column = $select_column.", remark_evaluation AS Remarks";} 
            if($col_evaluation == "yes") {$select_column = $select_column.", Evaluation";} 
        }

        if($col_release_moa == "yes") { $select_column = $select_column.", release_moa AS Released";}
        if($col_receive_moa == "yes") {$select_column = $select_column.", receive_moa AS Received";} 
        if($col_remark_moa == "yes") {$select_column = $select_column.", remark_moa AS Remarks";} 
        if($col_moa == "yes") {$select_column = $select_column.", MOA";}
    }

    $select_column = ltrim($select_column, ',');
    // filename for export
    $csv_filename = 'db_export_'.$selecttable .'_'.date('Y-m-d').'.csv';
    // create empty variable to be filled with export data
    $csv_export = '';
    // query to get data from database
    $query = mysqli_query($connect, "SELECT ".$select_column." FROM ".$from." WHERE ".$where);
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

  <div class="main-container">
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
                                <li><a href="advisers.php"><span class="fa fa-address-book space"></span>list of Advisers</a></li>
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
    <section class="section-padding paddingExport">
    <div class="container-fluid">
        <div class="row">
                <div class="col text-center">
                    <h1 class="top-title"><span class="title">Export </span>Data</h1>
                </div>
                <a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>

                <form id="export" method="post" action="">
                    <input type = "hidden" name ="col_idnum" value = "">
                    <input type = "hidden" name ="col_name" value = "">
                    <input type = "hidden" name ="col_courseyear" value = "">
                    <input type = "hidden" name ="col_mobile_number" value = "">
                    <input type = "hidden" name ="col_email" value = "">
                    <input type = "hidden" name ="col_status" value = "">
                    <input type = "hidden" name ="col_release_endorsement" value = "">
                    <input type = "hidden" name ="col_receive_endorsement" value = "">
                    <input type = "hidden" name ="col_remark_endorsement" value = "">
                    <input type = "hidden" name ="col_endorsement" value = "">
                    <input type = "hidden" name ="col_release_waiver" value = "">
                    <input type = "hidden" name ="col_receive_waiver" value = "">
                    <input type = "hidden" name ="col_remark_waiver" value = "">
                    <input type = "hidden" name ="col_release_evaluation" value = "">
                    <input type = "hidden" name ="col_receive_evaluation" value = "">
                    <input type = "hidden" name ="col_remark_evaluation" value = "">
                    <input type = "hidden" name ="col_evaluation" value = "">
                    <input type = "hidden" name ="col_coname" value = "">
                    <input type = "hidden" name ="col_coaddress" value = "">
                    <input type = "hidden" name ="col_company_head" value = "">
                    <input type = "hidden" name ="col_position" value = "">
                    <input type = "hidden" name ="col_contact_person" value = "">
                    <input type = "hidden" name ="col_cp_position" value = "">
                    <input type = "hidden" name ="col_typeofcompany" value = "">
                    <input type = "hidden" name ="col_release_moa" value = "">
                    <input type = "hidden" name ="col_receive_moa" value = "">
                    <input type = "hidden" name ="col_remark_moa" value = "">
                    <input type = "hidden" name ="col_moa" value = "">

                    <div class="row">

                        <div class="col-md-5">

                        <div class="form-group form-inline ">
                            <label class="exportTitle head-title titleFont paddingTopSlight space titleExport">Select Table to Export</label>
                            <select name="selecttable" class="btn btn-default input-small touch disableHighlight removeButton" id="tableSelect">
                                <?php $selecttable = (isset($_POST['selecttable']) ? strtolower($_POST['selecttable']) : NULL);  ?>
                                <option value="Students+Company" <?php if($selecttable == 'students+Company'){ echo 'selected'; } ?>>Company & Students</option>
                                <option value="Company" <?php if($selecttable == 'company'){ echo 'selected'; } ?>>Company</option> 
                            </select>
                        </div>
                        <hr class="style-four">

                                <div class="col-md-6" id="companyColumn">
                                <h4 class="exportColor"> Company Column </h4>
                                    <div class="form-group" style="height: 300px; overflow:auto;">
                                        <table class="table table-responsive table-hover table-condensed">
                                            <tr>
                                                <td><input type = "checkbox" name = "col_coname" value = "yes" checked></td>
                                                <td>Company Name</td>
                                            </tr>
                                            <tr>
                                                <td> <input type = "checkbox" name = "col_coaddress" value = "yes" checked></td>
                                                <td>Address </td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name = "col_company_head" value = "yes"></td>
                                                <td>Company Head</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name = "col_position" value = "yes"></td>
                                                <td>Position of Company Head</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name = "col_contact_person" value = "yes" checked></td>
                                                <td>Contact Person</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name = "col_cp_position" value = "yes" checked></td>
                                                <td>Position of Contact Person</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name = "col_typeofcompany" value = "yes"></td>
                                                <td>Type of Company</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="info">Memorandum of Agreement</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name = "col_moa" value = "yes" checked></td>
                                                <td>Status</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name = "col_release_moa" value = "yes"></td>
                                                <td>Date Released</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name = "col_receive_moa" value = "yes"></td>
                                                <td>Date Received</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name = "col_remark_moa" value = "yes"></td>
                                                <td>Remarks</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-md-6" id="studentColumn">
                                <h4 class="exportColor"> Student Column </h4>
                                    <div class="form-group" style="height: 300px; overflow:auto;">
                                        <table class="table table-responsive table-hover table-condensed">
                                            <tr>
                                                <td width="50"><input type = "checkbox" name = "col_idnum" value = "yes" checked></td>
                                                <td colspan="2">ID Number</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name = "col_name" value = "yes" checked></td>
                                                <td colspan="2">Name</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name ="col_courseyear" value = "yes" checked></td>
                                                <td colspan="2">Course and Year</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name ="col_mobile_number" value = "yes" checked></td>
                                                <td colspan="2">Mobile Number</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name ="col_email" value = "yes" checked></td>
                                                <td colspan="2">Email</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name ="col_status" value = "yes" checked></td>
                                                <td colspan="2">Overall Status</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="info">Endorsement</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name ="col_endorsement" value = "yes" checked></td>
                                                <td>Status</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name ="col_release_endorsement" value = "yes"></td>
                                                <td>Date Released</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name ="col_receive_endorsement" value = "yes"></td>
                                                <td>Date Received</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name ="col_remark_endorsement" value = "yes"></td>
                                                <td>Remarks</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="info">Waiver</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name ="col_waiver" value = "yes" checked></td>
                                                <td>Status</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name ="col_release_waiver" value = "yes"></td>
                                                <td>Date Released</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name ="col_receive_waiver" value = "yes"></td>
                                                <td>Date Received</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name ="col_remark_waiver" value = "yes"></td>
                                                <td>Remarks</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="info">Evaluation</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name ="col_evaluation" value = "yes" checked></td>
                                                <td>Status</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name ="col_release_evaluation" value = "yes"></td>
                                                <td>Date Released</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name ="col_receive_evaluation" value = "yes"></td>
                                                <td>Date Received</td>
                                            </tr>
                                            <tr>
                                                <td><input type = "checkbox" name ="col_remark_evaluation" value = "yes"></td>
                                                <td>Remarks</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                        </div>

                        <div class="col-md-7">

                            <label class="exportTitle head-title titleFont paddingTopSlight titleExport">Student and Company Information</label>
                            <hr class="style-four">

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                            <h4 class="exportColor"> Endorsement </h4>
                                            <input type="radio" name="endorsement" value="All" required checked> All<br>    
                                            <input type="radio" name="endorsement" value="yes" required> Submitted<br>
                                            <input type="radio" name="endorsement" value="no" required> Not Submitted<br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                            <h4 class="exportColor"> Waiver </h4>                                  
                                            <input type="radio" name="waiver" value="All" required checked> All<br>    
                                            <input type="radio" name="waiver" value="yes" required> Submitted<br>
                                            <input type="radio" name="waiver" value="no" required> Not Submitted<br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                            <h4 class="exportColor"> Evaluation </h4>                     
                                            <input type="radio" name="evaluation" value="All" required checked> All<br>    
                                            <input type="radio" name="evaluation" value="yes" required> Submitted<br>
                                            <input type="radio" name="evaluation" value="no" required> Not Submitted<br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                            <h4 class="exportColor"> Memorandum of Agreement </h4>  
                                            <input type="radio" name="moa" value="All" required checked> All<br>    
                                            <input type="radio" name="moa" value="yes" required> Submitted<br>
                                            <input type="radio" name="moa" value="no" required> Not Submitted<br> 
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                            <h4 class="exportColor"> Course </h4>
                                            <input type="radio" name="course" value="All" required checked> All<br>    
                                            <input type="radio" name="course" value="BSCS" required> BSCS<br>
                                            <input type="radio" name="course" value="BSIT" required> BSIT<br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                            <h4 class="exportColor"> Year Level </h4>
                                            <input type="radio" name="year" value="All" required checked> All<br>    
                                            <input type="radio" name="year" value="3" required> 3rd year<br>
                                            <input type="radio" name="year" value="4" required> 4th year<br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                            <h4 class="exportColor"> Company Type </h4>  
                                            <input type="radio" name="typeofcompany" value="All" required checked> All<br>    
                                            <input type="radio" name="typeofcompany" value="Private" required> Private<br>
                                            <input type="radio" name="typeofcompany" value="Government" required> Government<br>
                                    </div>
                                </div>
                            </div>
                        </div><!--End of col-md-8-->
                    </div>

                    <div class="form-group text-center paddingTopSlight">
                        <button type="submit" name="export" class="btn btn-md btn-success paddingTopSlight disableHighlight" value="Export data"><span class="fa fa-download space"></span> Export Data</button>
                    </div>

                </form>

        </div>
    </div>
    </section>
    <!----> 
    <!---->
    <footer class="footer">
        <div class="row text-center">
            <img class="footerLogo" src="img/newLogo.png">
            <p class="credits">Designed and Developed by OJT2 2016-2017</p>
        </div>
    </footer>
    <!---->
    </div>
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
        $("#tableSelect").change(function(){
            if($('select[name=selecttable] option:selected').val() == "Company" ) {
            $("#companyColumn").slideDown("fast");
                $("#studentColumn").slideUp("fast");
            } 
            else {
                $("#tabText").slideUp("fast");
                if($('select[name=selecttable] option:selected').val() == "Students+Company" ) {    
                    $("#studentColumn").slideDown("fast");
                } else {
                $("#companyColumn").slideUp("fast");
                }
            } 
        });
    </script>
  </body>
</html>