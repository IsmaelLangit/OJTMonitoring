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
    <link rel="stylesheet" type="text/css" href="css/dragAndDrop.css">
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

    <div class="main-container">

    <section class="section-padding">
    <div class="container">
        <div class="row">
                <div class="col text-center">
                    <h1 class="top-title"><span class="title">Export </span>Data</h1>
                </div>
                <a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>

                <!-- JJ -->
                <div id="page">
                    <div id="workarea">
                        <div id="completed-tasks">
                            <h3>
                                <em class="icon-ok icon-large"></em> Select Data to Export
                            </h3>   
                        </div><!-- #completed-tasks -->
                        <div id="users" class="user-panels">
                            <div id="user-1" class="user-panel">
                                <h4 class="user-name">Data Column</h4>
                                <div class="toolbar">
                                    <a href="#" class="add-task icon icon-plus"></a>
                                </div>
                                <div class="task-list">
                                    <div id="task-1" class="task">
                                        <p>task 1</p>
                                        <div class="actions">
                                            <a href="#" class="icon-caret-right"></a>
                                            <a href="#" class="icon-ok"></a>
                                            <a href="#" class="icon-pencil"></a>
                                            <a href="#" class="icon-trash"></a>
                                        </div>
                                    </div>
                                    <div id="task-2" class="task">
                                        <p>task 2</p>
                                        <div class="actions">
                                            <a href="#" class="icon-caret-right"></a>
                                            <a href="#" class="icon-ok"></a>
                                            <a href="#" class="icon-pencil"></a>
                                            <a href="#" class="icon-trash"></a>
                                        </div>

                                    </div>
                                    <div id="task-3" class="task">
                                        <p>task 3</p>
                                        <div class="actions">
                                            <a href="#" class="icon-caret-right"></a>
                                            <a href="#" class="icon-ok"></a>
                                            <a href="#" class="icon-pencil"></a>
                                            <a href="#" class="icon-trash"></a>
                                        </div>

                                    </div>
                                    <div id="task-4" class="task">
                                        <p>task 4</p>
                                        <div class="actions">
                                            <a href="#" class="icon-caret-right"></a>
                                            <a href="#" class="icon-ok"></a>
                                            <a href="#" class="icon-pencil"></a>
                                            <a href="#" class="icon-trash"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="user-2" class="user-panel">
                                <h4 class="user-name">Rearrange Data</h4>
                                <div class="toolbar">
                                    <a href="#" class="add-task icon icon-plus"></a>
                                </div>
                                <div class="task-list">
                                    <div id="task-5" class="task">
                                        <p>task 5</p>
                                        <div class="actions">
                                            <a href="#" class="icon-caret-right"></a>
                                            <a href="#" class="icon-ok"></a>
                                            <a href="#" class="icon-pencil"></a>
                                            <a href="#" class="icon-trash"></a>
                                        </div>
                                    </div>
                                    <div id="task-6" class="task">
                                        <p>task 6</p>
                                        <div class="actions">
                                            <a href="#" class="icon-caret-right"></a>
                                            <a href="#" class="icon-ok"></a>
                                            <a href="#" class="icon-pencil"></a>
                                            <a href="#" class="icon-trash"></a>
                                        </div>
                                    </div>
                                    <div id="task-7" class="task">
                                        <p>task 7</p>
                                        <div class="actions">
                                            <a href="#" class="icon-caret-right"></a>
                                            <a href="#" class="icon-ok"></a>
                                            <a href="#" class="icon-pencil"></a>
                                            <a href="#" class="icon-trash"></a>
                                        </div>
                                    </div>
                                    <div id="task-8" class="task">
                                        <p>task 8</p>
                                        <div class="actions">
                                            <a href="#" class="icon-caret-right"></a>
                                            <a href="#" class="icon-ok"></a>
                                            <a href="#" class="icon-pencil"></a>
                                            <a href="#" class="icon-trash"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- #users -->
                    </div><!-- #workarea -->
                </div><!-- #page -->
                <!-- SDG -->

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
    <script src="js/dragAndDrop.js"></script>

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