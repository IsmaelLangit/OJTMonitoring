<?php
    include("connect.php");
    ob_start();
    if(isset($_POST['export'])){
    $typeofcompany           = $_POST['typeofcompany'];
    $endorsement           = $_POST['endorsement'];
    $waiver           = $_POST['waiver'];
    $moa           = $_POST['moa'];
    $evaluation           = $_POST['evaluation'];
    $courseyear           = $_POST['courseyear'];
    $selecttable           = $_POST['selecttable'];
    // filename for export
    $csv_filename = 'db_export_'.$selecttable .'_'.date('Y-m-d').'.csv';

     if($endorsement == "All") {
        $where_endorsement = '(endorsement = "yes" or endorsement = "no")';
    } else {
        $where_endorsement = ' endorsement = "'.$endorsement.'" ';
    }

    if($waiver == "All") {
       $where_waiver = '(waiver = "yes" or waiver = "no")';
    }else {
        $where_waiver = ' waiver = "'.$waiver.'" ';
    }

    if($moa == "All") {
        $where_moa = '(moa = "yes" or moa = "no")';
    }else {
        $where_moa = ' moa = "'.$moa.'" ';
    }

    if($evaluation == "All") {
       $where_evaluation = '(evaluation = "yes" or evaluation = "no")';
    }else {
        $where_evaluation = ' evaluation = "'.$evaluation.'" ';
    }

    if($typeofcompany == "All") {
       $where_typeofcompany = '(typeofcompany = "Private" or evaluation = "Government")';
    }else {
        $where_typeofcompany = ' typeofcompany = "'.$typeofcompany.'" ';
    }

    if($courseyear == "All") {
       $where_courseyear = 'courseyear LIKE "BS%"';
    }else {
        $where_courseyear = 'courseyear LIKE "'.$courseyear.'%"';
    }



    if ($selecttable == "Students") {
        $selecttable = 'idnum, concat(last_name, ", ", first_name) as name, courseyear, mobile_number, email, release_endorsement, receive_endorsement, remark_endorsement, endorsement, release_waiver, receive_waiver, remark_waiver, waiver, release_evaluation, receive_evaluation, remark_evaluation, evaluation, release_moa, receive_moa, remark_moa, moa, status, coname, typeofcompany';
        $where = 'WHERE '.$where_endorsement.' AND '.$where_waiver.' AND '.$where_moa.' AND '.$where_evaluation.' AND '.$where_typeofcompany.' AND '.$where_courseyear." ORDER BY last_name, first_name";     
    } else if ($selecttable == "Company") { 
        $selecttable = 'count(students.coid) as "countstudent",coid, coname, coaddress, company_head, position, typeofcompany';
        $where = 'WHERE coname != "No Company AND '.$where_moa.' AND '.$where_typeofcompany." ORDER BY coname";
    } else {
        $selecttable = '*';
        $where = 'WHERE '.$where_endorsement.' AND '.$where_waiver.' AND '.$where_moa.' AND '.$where_evaluation.' AND '.$where_typeofcompany.' AND '.$where_courseyear." ORDER BY coname, last_name, first_name";
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
                                <li class="active"><a href="export_csv.php"><span class="fa fa-download space"></span>Export</a></li>
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

                <form method="post">

                    <div class="row">
                        <div class="form-group text-center">
                            <h2 class="head-title titleFont">Tables</h2>

                            <div class="col-md-2 text-center">
                                <select name="selecttable" class="form-control touch">
                                    <?php $selecttable = (isset($_POST['selecttable']) ? strtolower($_POST['selecttable']) : NULL);  ?>
                                    <option value="Students" <?php if($selecttable == 'students'){ echo 'selected'; } ?>>Students</option>
                                    <option value="Company" <?php if($selecttable == 'company'){ echo 'selected'; } ?>>Company</option>
                                    <option value="Students+Company" <?php if($selecttable == 'students+Company'){ echo 'selected'; } ?>>Students + Company</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    

                    <div class="row">

                        <h2 class="head-title titleFont text-center">Student Information</h2>
                        <hr class="style-four">

                        <div class="form-group">
                            <div class="col-md-3">
                                <h4> COURSE </h4>
                                <input type="radio" name="courseyear" value="All" required checked> All<br>    
                                <input type="radio" name="courseyear" value="BSCS" required> BSCS<br>
                                <input type="radio" name="courseyear" value="BSIT" required> BSIT<br>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <h4> ENDORSEMENT </h4>
                                <input type="radio" name="endorsement" value="All" required checked> All<br>    
                                <input type="radio" name="endorsement" value="yes" required> Submitted<br>
                                <input type="radio" name="endorsement" value="no" required> Not Submitted<br>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <h4> WAIVER </h4>                                  
                                <input type="radio" name="waiver" value="All" required checked> All<br>    
                                <input type="radio" name="waiver" value="yes" required> Submitted<br>
                                <input type="radio" name="waiver" value="no" required> Not Submitted<br>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <h4> EVALUATION </h4>                                     
                                <input type="radio" name="evaluation" value="All" required checked> All<br>    
                                <input type="radio" name="evaluation" value="yes" required> Submitted<br>
                                <input type="radio" name="evaluation" value="no" required> Not Submitted<br>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <h2 class="head-title titleFont text-center paddingTopSlight">Company Information</h2>
                        <hr class="style-four">

                        <div class="form-group">
                            <div class="col-md-6">
                                <h4> COMPANY TYPE </h4>  
                                <input type="radio" name="typeofcompany" value="All" required checked> All<br>    
                                <input type="radio" name="typeofcompany" value="Private" required> Private<br>
                                <input type="radio" name="typeofcompany" value="Government" required> Government<br>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <h4> MEMORANDUM OF AGREEMENT </h4>  
                                <input type="radio" name="moa" value="All" required checked> All<br>    
                                <input type="radio" name="moa" value="yes" required> Submitted<br>
                                <input type="radio" name="moa" value="no" required> Not Submitted<br> 
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center paddingTopSlight">
                        <button type="submit" name="export" class="btn btn-md btn-success paddingTopSlight" value="Export data"><span class="fa fa-download space"></span> Export Data</button>
                    </div>

                </form>

        </div>
    </div>
    </section>
    <!---->
    <!---->
    <footer class="footer-distributed footer">
            <div class="footer-left">
                <img class="footerLogo img-responsive" src="img/scisLogo.png">
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
    
    <script>
    $('.date').datepicker({
        format: 'MM dd yyyy',
    })
    </script>
    
  </body>
</html>