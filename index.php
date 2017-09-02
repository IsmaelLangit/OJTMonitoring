<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SCIS OJT Monitoring</title>
        <link rel="icon" href="img/scisLogo.png">

        <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/hover.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        <link rel="stylesheet" type="text/css" href="css/preloader.css">

    </head>
  <body>

  <div class="main-container">

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
                        <div class="collapse navbar-collapse navbar-right" id="mynavbar">
                            <ul class="nav navbar-nav">

                                <li class="dropdown active">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Students <span class="caret"></span></a>
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="index.php"><span class="fa fa-user space blue"></span>View Students</a></li>
                                    <li><a href="add.php"><span class="fa fa-user-plus space green"></span>Add Student</a></li>
                                  </ul>
                                </li>

                                <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Company <span class="caret"></span></a>
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="company.php"><span class="fa fa-building blue space"></span>View Companies</a></li>
                                    <li><a href="addcompany.php"><span class="fa fa-plus green space"></span>Add Company</a></li>
                                  </ul>
                                </li>

                                <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Advisers <span class="caret"></span></a>
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="adviser.php"><span class="fa fa-vcard blue space"></span>View Advisers</a></li>
                                    <li><a href="changeadviser.php"><span class="fa fa-user-plus green space"></span>Change Advisoree</a></li>
                                  </ul>
                                </li>

                                <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <span class="caret"></span></a>
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="#"><span class="fa fa-upload green space"></span>Import Data</a></li>
                                    <li><a href="export_csv.php"><span class="fa fa-download orange space"></span>Export Data to CSV</a></li>
                                    <li><a href="reset.php"><span class="fa fa-repeat red space"></span>Master Reset</a></li>
                                  </ul>
                                </li>

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
         <form class="form-inline" method="get">
        <div class="container-fluid">

            <div class="col text-center">
                <h1 class="top-title">List of Practicum 2 <span class="title">Students</span></h1>
            </div>

            <a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>

            <?php
            if(isset($_GET['action']) == 'delete'){
                $idnum = $_GET['idnum'];

                $delete_query = $pdo->prepare("DELETE FROM students WHERE idnum= ?") or die(mysql_error());
                $delete_query->bindValue(1, "$idnum", PDO::PARAM_STR);
                $delete_query->execute();
                $delete = $delete_query->rowCount();

                if($delete){
                    echo '  <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <span class = "fa fa-check-circle"></span> You have successfully <strong> deleted </strong> the student!
                            </div>';
                }else{
                    echo '  <div class="alert alert-danger alert-dismissable"><button type="button" class="close " data-dismiss="alert" aria-hidden="true">&times;</button> Already deleted.
                    </div>';
                }
            }
            ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 paddingBottomSlight">
                       
                            <div class="input-group dropdown-toggle">
                                <span class="input-group-addon" id="basic-addon1"><span class="fa fa-filter space"></span>Filter By:</span>
                                <select name="filter" class="form-control touch" onchange="form.submit()">
                                    <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
                                    <option value="0" <?php if($filter == '0'){ echo 'selected'; } ?>>None</option>
                                    <option value="Complete" <?php if($filter == 'complete'){ echo 'selected'; } ?>>Complete</option>
                                    <option value="Incomplete" <?php if($filter == 'incomplete'){ echo 'selected'; } ?>>Incomplete</option>
                                    <option value="Government" <?php if($filter == 'government'){ echo 'selected'; } ?>>Government</option>
                                    <option value="Private" <?php if($filter == 'private'){ echo 'selected'; } ?>>Private</option>
                                    <option value="No Company" <?php if($filter == 'no company'){ echo 'selected'; } ?>>No Company</option>

                                    <option value="yes1" <?php if($filter == 'yes1'){ echo 'selected'; } ?>><strong>With</strong> Endorsement</option>
                                    <option value="yes2" <?php if($filter == 'yes2'){ echo 'selected'; } ?>>With Waiver</option>
                                    <option value="yes3" <?php if($filter == 'yes3'){ echo 'selected'; } ?>>With MOA</option>
                                    <option value="yes4" <?php if($filter == 'yes4'){ echo 'selected'; } ?>>With Evaluation</option>
                                    <option value="no1" <?php if($filter == 'no1'){ echo 'selected'; } ?>>Without Endorsement</option>
                                    <option value="no2" <?php if($filter == 'no2'){ echo 'selected'; } ?>>Without Waiver</option>
                                    <option value="no3" <?php if($filter == 'no3'){ echo 'selected'; } ?>>Without MOA</option>
                                    <option value="no4" <?php if($filter == 'no4'){ echo 'selected'; } ?>>Without Evaluation</option>
                                </select>
                            </div>

                            <div class="input-group dropdown-toggle">
                                <span class="input-group-addon" id="basic-addon1"><span class="fa fa-list-ol space"></span>Number of Rows:</span>
                                <select name="viewperpage" class="form-control touch" onchange="form.submit()">
                                    <?php $viewperpage = (isset($_GET['viewperpage']) ? strtolower($_GET['viewperpage']) : NULL);  ?>
                                    <option value="all" <?php if($viewperpage == 'all'){ echo 'selected'; } ?>>All</option>
                                    <option value="10" <?php if($viewperpage == '10'){ echo 'selected'; } ?>>10</option>
                                    <option value="20" <?php if($viewperpage == '20'){ echo 'selected'; } ?>>20</option>
                                    <option value="50" <?php if($viewperpage == '50'){ echo 'selected'; } ?>>50</option>
                                    <option value="100" <?php if($viewperpage == '100'){ echo 'selected'; } ?>>100</option>   
                                </select>
                            </div>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <?php
                                    $search_input = (isset($_GET['search_input']) ? strtolower($_GET['search_input']) : NULL);
                                    ?>
                                    <input placeholder = "Search" onchange="form.submit()" name = "search_input" type="text" class="form-control input-xxlarge" value = "<?php echo $search_input ?>">
                                    <button class="form-control"><span class="fa fa-search space"></span>Search</button>
                                </span>
                            </div>
                    </div>

                    <div class="col-md-2 text-center">
                    <button type="button" class="btn btn-primary disableHighlight" data-toggle="collapse" data-target="#summary"><span class="fa fa-bar-chart space"></span>QUICK SUMMARY</button>
                    </div>

                </div>
            </div>

            <?php
                $count_students = $pdo->prepare("SELECT count(idnum) AS countidnum FROM students") or die(mysql_error());
            ?>

            <div class="container-fluid">
                <div id="summary" class="row row-centered paddingTopSlight panel-collapse collapse">

                    <a href="index.php" >
                        <div class="col-sm-2 yellow wellHeight well col-centered text-center">
                        <span class="indexIcon fa fa-users"></span>
                        <hr class="style-four">
                            <?php
                                $count_students->execute();
                                while ($total_students = $count_students->fetch(PDO::FETCH_ASSOC)) {
                                    echo '
                                    <p class="colorInfo">Total Students</p>
                                    <p class = "number text-center">'.$total_students["countidnum"].'</p>
                                    ';
                                }
                            ?>  
                        </div>
                    </a>

                    <?php
                        $count_students = $pdo->prepare("SELECT count(idnum) AS countidnum FROM students where status = ?") or die(mysql_error());
                    ?>

                    <a href="index.php?filter=Complete&viewperpage=all">
                        <div class="col-sm-2 well wellHeight green col-centered text-center">
                        <span class="indexIcon fa fa-check"></span>
                        <hr class="style-four">
                            <?php
                                $count_students->bindValue(1, "Complete", PDO::PARAM_STR);
                                $count_students->execute();
                                while ($total_students = $count_students->fetch(PDO::FETCH_ASSOC)) {
                                    echo '
                                    <p class="text-center colorInfo">Complete Requirements</p>
                                    <p class = "number text-center">'.$total_students["countidnum"].'</p>
                                ';
                                }
                            ?>  
                        </div>
                    </a>

                    <a href="index.php?filter=Incomplete&viewperpage=all">
                        <div class="col-sm-2 well wellHeight red col-centered text-center">
                        <span class="indexIcon fa fa-remove"></span>
                        <hr class="style-four">
                            <?php
                                $count_students->bindValue(1, "Incomplete", PDO::PARAM_STR);
                                $count_students->execute();
                                while ($total_students = $count_students->fetch(PDO::FETCH_ASSOC)) {
                                    echo '
                                    <p class="text-center colorInfo">Incomplete Requirements</p>
                                    <p class = "number text-center">'.$total_students["countidnum"].'</p>
                                ';
                                }
                            ?>  
                        </div>
                    </a>

                    <?php
                        $count_students = $pdo->prepare("SELECT count(idnum) AS countidnum FROM students NATURAL JOIN company where typeofcompany = ?") or die(mysql_error());
                    ?>

                     <a href="index.php?filter=Private&viewperpage=all">
                        <div class="col-sm-2 well wellHeight blue col-centered text-center">
                        <span class="indexIcon fa fa-building"></span>
                        <hr class="style-four">
                            <?php
                                $count_students->bindValue(1, "Private", PDO::PARAM_STR);
                                $count_students->execute();
                                while ($total_students = $count_students->fetch(PDO::FETCH_ASSOC)) {
                                    echo '
                                    <p class="text-center colorInfo">Private</p>
                                    <p class = "number text-center">'.$total_students["countidnum"].'</p>
                                    ';
                                }
                            ?>  
                        </div>
                    </a>


                    <a href="index.php?filter=Government&viewperpage=all">
                        <div class="col-sm-2 well wellHeight violet col-centered text-center">
                        <span class="indexIcon fa fa-institution"></span>
                        <hr class="style-four">
                            <?php
                                $count_students->bindValue(1, "Government", PDO::PARAM_STR);
                                $count_students->execute();
                                while ($total_students = $count_students->fetch(PDO::FETCH_ASSOC)) {
                                    echo '
                                    <p class="text-center colorInfo">Government</p>
                                    <p class = "number text-center">'.$total_students["countidnum"].'</p>
                                    ';
                                }
                            ?>  
                        </div>
                    </a>

                    <a href="index.php?filter=No+Company&viewperpage=all">
                        <div class="col-sm-2 well wellHeight orange col-centered text-center">
                        <span class="indexIcon fa fa-warning"></span>
                        <hr class="style-four">
                            <?php
                                $count_students = $pdo->prepare("SELECT count(idnum) AS countidnum FROM students NATURAL JOIN company where coname = ?") or die(mysql_error());
                                $count_students->bindValue(1, "No Company", PDO::PARAM_STR);
                                $count_students->execute();
                                while ($total_students = $count_students->fetch(PDO::FETCH_ASSOC)) {
                                    echo '
                                    <p class="text-center colorInfo">No Company</p>
                                    <p class = "number text-center">'.$total_students["countidnum"].'</p>
                                    ';
                                }
                            ?>  
                        </div>
                    </a>

                </div>
            </div>

                <div class="paddingTopSlight">
                        <div class="table-responsive">
                            <table class="table table-fixed table-hover text-center" id="myTable">

                                <thead>
                                    <tr class="info">
                                        <th>No</th>
                                        <th class="align-middle text-right">ID Number</th>
                                        <th width="0.5%" class="text-left">
                                            <div class="btn-group-vertical">
                                                <input title="Sort by Ascending" class="btn arrowSort" type="submit" name="idnum" value="&#9650;">
                                                <input title="Sort by Descending" class="btn arrowSort" type="submit" name="idnum" value="&#9660;">
                                            </div>
                                        </th>
                                        <th width="7%" class="align-middle text-right">Name</th>
                                        <th width="0.5%" class="text-left">
                                            <div class="btn-group-vertical">
                                                <input title="Sort by Ascending" class="btn arrowSort" type="submit" name="last_name" value="&#9650;">
                                                <input title="Sort by Descending" class="btn arrowSort" type="submit" name="last_name" value="&#9660;">
                                            </div>
                                        </th>
                                        <th width="8%" class="align-middle text-right">Course & Year</th>
                                        <th width="0.5%" class="text-left">
                                            <div class="btn-group-vertical">
                                                <input title="Sort by BSCS" class="btn arrowSort" type="submit" name="courseyear" value="&#9650;">
                                                <input title="Sort by BSIT" class="btn arrowSort" type="submit" name="courseyear" value="&#9660;">
                                            </div>
                                        </th>
                                        <th class="text-right">Endorsement</th>
                                        <th width="0.5%" class="text-left">
                                            <div class="btn-group-vertical">
                                                <input title="Sort by with Endorsement" class="btn arrowSort" type="submit" name="endorsement" value="&#9650;">
                                                <input title="Sort by without Endorsement" class="btn arrowSort" type="submit" name="endorsement" value="&#9660;">
                                            </div>
                                        </th>
                                        <th class="text-right">Waiver</th>
                                        <th width="0.5%" class="text-left">
                                            <div class="btn-group-vertical">
                                                <input title="Sort by with Waiver" class="btn arrowSort" type="submit" name="waiver" value="&#9650;">
                                                <input title="Sort by without Waiver" class="btn arrowSort" type="submit" name="waiver" value="&#9660;">
                                            </div>
                                        </th>
                                        <th class="text-right">MOA</th>
                                        <th width="0.5%" class="text-left">   
                                            <div class="btn-group-vertical">
                                                <input title="Sort by with MOA" class="btn arrowSort" type="submit" name="moa" value="&#9650;">
                                                <input title="Sort by without MOA" class="btn arrowSort" type="submit" name="moa" value="&#9660;">
                                            </div>
                                        </th>
                                        <th class="text-right">Evaluation</th>
                                        <th width="0.5%" class="text-left">
                                            <div class="btn-group-vertical">
                                                <input title="Sort by with Evaluation" class="btn arrowSort" type="submit" name="evaluation" value="&#9650;">
                                                <input title="Sort by without Evaluation" class="btn arrowSort" type="submit" name="evaluation" value="&#9660;">
                                            </div>
                                        </th>
                                        <th class="text-right">Requirement Status</th>
                                        <th width="0.5%" class="text-left">
                                            <div class="btn-group-vertical">
                                                <input title="Sort by Complete Requirements" class="btn arrowSort" type="submit" name="status" value="&#9650;">
                                                <input title="Sort by Incomplete Requirements" class="btn arrowSort" type="submit" name="status" value="&#9660;">
                                            </div>
                                        </th>
                                        <th width="10%" class="text-right">Company Name</th>
                                        <th width="0.5%" class="text-left">
                                            <div class="btn-group-vertical">
                                                <input title="Sort by Ascending" class="btn arrowSort" type="submit" name="coname" value="&#9650;">
                                                <input title="Sort by Descending" class="btn arrowSort" type="submit" name="coname" value="&#9660;">
                                            </div>
                                        </th>
                                        <th class="text-right">Type</th>
                                        <th width="0.5%" class="text-left">
                                            <div class="btn-group-vertical">
                                                <input title="Sort by Government" class="btn arrowSort" type="submit" name="typeofcompany" value="&#9650;">
                                                <input title="Sort by Private" class="btn arrowSort" type="submit" name="typeofcompany" value="&#9660;">
                                            </div>
                                        </th>
                                        
                                        <th class="col-sm-1 text-center">Action</th>
                                    </tr>
                                </thead>

                                <?php
                                $search_input = (isset($_GET['search_input']) ? strtolower($_GET['search_input']) : NULL);
                                $idnum = (isset($_GET['idnum']) ? strtolower($_GET['idnum']) : NULL);
                                $last_name = (isset($_GET['last_name']) ? strtolower($_GET['last_name']) : NULL);
                                $courseyear = (isset($_GET['courseyear']) ? strtolower($_GET['courseyear']) : NULL);
                                $endorsement = (isset($_GET['endorsement']) ? strtolower($_GET['endorsement']) : NULL);
                                $waiver = (isset($_GET['waiver']) ? strtolower($_GET['waiver']) : NULL);
                                $moa = (isset($_GET['moa']) ? strtolower($_GET['moa']) : NULL);
                                $evaluation = (isset($_GET['evaluation']) ? strtolower($_GET['evaluation']) : NULL);
                                $status = (isset($_GET['status']) ? strtolower($_GET['status']) : NULL);
                                $coname = (isset($_GET['coname']) ? strtolower($_GET['coname']) : NULL);
                                $typeofcompany = (isset($_GET['typeofcompany']) ? strtolower($_GET['typeofcompany']) : NULL);
                                $sort = 'last_name, first_name';
                                $sortvar = "&last_name=";
                                $sortval = $last_name;

                                switch ($idnum) {
                                    case "▲":
                                        $sort = 'idnum';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'idnum DESC';
                                        break;
                                }
                                if($idnum) {
                                    $sortvar = "&idnum=";
                                    $sortval = $idnum;
                                }
                                switch ($last_name) {
                                    case "▲":
                                        $sort = 'last_name, first_name';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'last_name DESC, first_name';
                                        break;
                                }
                                if($last_name) {
                                    $sortvar = "&last_name=";
                                    $sortval = $last_name;
                                }
                                switch ($courseyear) {
                                    case "▲":
                                        $sort = 'courseyear, last_name, first_name';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'courseyear DESC, last_name, first_name';
                                        break;
                                }
                                if($courseyear) {
                                    $sortvar = "&courseyear=";
                                    $sortval = $courseyear;
                                }
                                switch ($endorsement) {
                                    case "▲":
                                        $sort = 'endorsement DESC, last_name, first_name';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'endorsement , last_name, first_name';
                                        break;
                                }
                                if($endorsement) {
                                    $sortvar = "&endorsement=";
                                    $sortval = $endorsement;
                                }
                                switch ($waiver) {
                                    case "▲":
                                        $sort = 'waiver DESC, last_name, first_name';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'waiver, last_name, first_name';
                                        break;
                                }
                                if($waiver) {
                                    $sortvar = "&waiver=";
                                    $sortval = $waiver;
                                }
                                 switch ($moa) {
                                    case "▲":
                                        $sort = 'moa DESC, last_name, first_name';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'moa, last_name, first_name';
                                        break;
                                }
                                if($moa) {
                                    $sortvar = "&moa=";
                                    $sortval = $moa;
                                }
                                switch ($evaluation) {
                                   case "▲":
                                        $sort = 'evaluation DESC, last_name, first_name';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'evaluation, last_name, first_name';
                                        break;
                                }
                                if($evaluation) {
                                    $sortvar = "&evaluation=";
                                    $sortval = $evaluation;
                                }
                                switch ($status) {
                                    case "▲":
                                        $sort = 'status, last_name, first_name';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'status DESC, last_name, first_name';
                                        break;
                                }
                                if($status) {
                                    $sortvar = "&status=";
                                    $sortval = $status;
                                }
                                switch ($coname) {
                                    case "▲":
                                        $sort = 'coname, last_name, first_name';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'coname DESC, last_name, first_name';
                                        break;
                                }
                                if($coname) {
                                    $sortvar = "&coname=";
                                    $sortval = $coname;
                                }
                                switch ($typeofcompany) {
                                    case "▲":
                                        $sort = 'typeofcompany, last_name, first_name';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'typeofcompany DESC, last_name, first_name';
                                        break;
                                }
                                if($typeofcompany) {
                                    $sortvar = "&typeofcompany=";
                                    $sortval = $typeofcompany;
                                }
                                $sql_total = $pdo->prepare("SELECT * from students NATURAL JOIN company WHERE (status=? or typeofcompany=? or typeofcompany =? or coname =?) and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE ?)") or die(mysql_error());
                                $sql_total->bindValue(1, "$filter", PDO::PARAM_STR);
                                $sql_total->bindValue(2, "$filter", PDO::PARAM_STR);
                                $sql_total->bindValue(3, "$filter", PDO::PARAM_STR);
                                $sql_total->bindValue(4, "$filter", PDO::PARAM_STR);
                                $sql_total->bindValue(5, "%$search_input%", PDO::PARAM_STR);
                                $sql_total->execute();
                                $total = $sql_total->rowCount();

                                $start=0;
                                $page = 1;

                                if($viewperpage == "all") { $limit = $total; } 
                                else { $limit=$viewperpage; }
                                
                                if(isset($_GET['id'])){
                                    $id=$_GET['id'];
                                    $start=($id-1)*$limit;
                                } else {
                                    $id=1;
                                }
                         
                                if($filter == "yes1" || $filter == "no1"){
                                    $query = $pdo->prepare("SELECT * from students NATURAL JOIN company WHERE endorsement= ? and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE ?)") or die(mysql_error());
                                    $query2 = $pdo->prepare("SELECT * from students NATURAL JOIN company WHERE endorsement= ? and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE ?) ORDER BY $sort LIMIT ? , ?") or die(mysql_error());

                                } else if($filter == "yes2" || $filter == "no2"){
                                    $query = $pdo->prepare("SELECT * from students NATURAL JOIN company WHERE waiver= ? and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE ?)") or die(mysql_error());
                                    $query2 = $pdo->prepare("SELECT * from students NATURAL JOIN company WHERE waiver= ? and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE ?) ORDER BY $sort LIMIT ? , ?") or die(mysql_error());
                                } else if($filter == "yes3" || $filter == "no3"){
                                    $query = $pdo->prepare("SELECT * from students NATURAL JOIN company WHERE moa= ? and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE ?)") or die(mysql_error());
                                     $query2 = $pdo->prepare("SELECT * from students NATURAL JOIN company WHERE moa= ? and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE ?) ORDER BY $sort LIMIT ? , ?") or die(mysql_error());
                                } else if($filter == "yes4" || $filter == "no4"){
                                    $query = $pdo->prepare("SELECT * from students NATURAL JOIN company WHERE evaluation= ? and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE ?)") or die(mysql_error());
                                    $query2 = $pdo->prepare("SELECT * from students NATURAL JOIN company WHERE evaluation= ? and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE ?) ORDER BY $sort LIMIT ? , ?") or die(mysql_error());
                                } 

                                if($filter == "yes1" || $filter == "yes2" || $filter == "yes3" || $filter == "yes4" || $filter == "no1" || $filter == "no2" || $filter == "no3" || $filter == "no4") {
                                    if($filter == "yes1" || $filter == "yes2" || $filter == "yes3" || $filter == "yes4") { $filter2 = "yes"; } 
                                    else { $filter2 = "no"; }

                                    $query->bindValue(1, "$filter2", PDO::PARAM_STR);
                                    $query->bindValue(2, "%$search_input%", PDO::PARAM_STR);
                                    $query->execute();
                                    $total = $query->rowCount();

                                    if($viewperpage == "all") { $limit = $total;}
                                    if($total != 0) { $page=ceil($total/$limit);}

                                    $query2->bindValue(1, "$filter2", PDO::PARAM_STR);
                                    $query2->bindValue(2, "%$search_input%", PDO::PARAM_STR);
                                    $query2->bindValue(3, (int) "$start", PDO::PARAM_INT);
                                    $query2->bindValue(4, (int) "$limit", PDO::PARAM_INT);

                                    $query2->execute();
                                 }
                                else if($filter){
                                    $query = $pdo->prepare("SELECT * from students NATURAL JOIN company WHERE status=? or typeofcompany=? or typeofcompany =? or coname =? and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE ?) ") or die(mysql_error());

                                    $query->bindValue(1, "$filter", PDO::PARAM_STR);
                                    $query->bindValue(2, "$filter", PDO::PARAM_STR);
                                    $query->bindValue(3, "$filter", PDO::PARAM_STR);
                                    $query->bindValue(4, "$filter", PDO::PARAM_STR);
                                    $query->bindValue(5, "%$search_input%", PDO::PARAM_STR);
                                    $query->execute();
                                    $total = $query->rowCount();

                                    if($viewperpage == "all") { $limit = $total; }
                                    if($total != 0) { $page=ceil($total/$limit);}

                                    $query2 = $pdo->prepare("SELECT * from students NATURAL JOIN company WHERE status=? or typeofcompany=? or typeofcompany =? or coname =? and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE ?) ORDER BY $sort LIMIT ?, ?") or die(mysql_error());

                                    $query2->bindValue(1, "$filter", PDO::PARAM_STR);
                                    $query2->bindValue(2, "$filter", PDO::PARAM_STR);
                                    $query2->bindValue(3, "$filter", PDO::PARAM_STR);
                                    $query2->bindValue(4, "$filter", PDO::PARAM_STR);
                                    $query2->bindValue(5, "%$search_input%", PDO::PARAM_STR);
                                    $query2->bindValue(6, (int) "$start", PDO::PARAM_INT);
                                    $query2->bindValue(7, (int) "$limit", PDO::PARAM_INT);
                                    $query2->execute();
                                    $sql = $query->fetch(PDO::FETCH_ASSOC);

                                } else {
                                    $query = $pdo->prepare("SELECT * from students NATURAL JOIN company WHERE CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE ?") or die(mysql_error());

                                    $query->bindValue(1, "%$search_input%", PDO::PARAM_STR);
                                    $query->execute();
                                    $total = $query->rowCount();

                                    if(!$filter && !$viewperpage || $viewperpage == "all") {
                                        $viewperpage = $total;
                                        $limit = $total;
                                    }
                                    if($total != 0) {
                                         $page=ceil($total/$limit);
                                    }

                                    $query2 = $pdo->prepare("SELECT * from students NATURAL JOIN company WHERE CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE ? ORDER BY $sort LIMIT ?,? ") or die(mysql_error());

                                    $query2->bindValue(1, "%$search_input%", PDO::PARAM_STR);
                                    $query2->bindValue(2,(int) "$start", PDO::PARAM_INT);
                                    $query2->bindValue(3,(int) "$limit", PDO::PARAM_INT);
                                    $query2->execute();
                                }
                              
                                    
                            if ($page > 1){
                                if($id > 1) {
                                echo '<div class="text-center"><ul class="pagination"><li><a href="?filter='.$filter.'&viewperpage='.$viewperpage.'&search_input='.$search_input.$sortvar.$sortval.'&id='.($id-1).'">Previous</a></li>';
                                } else {
                                    echo '<div class="text-center"><ul class="pagination"><li><a href="?filter='.$filter.'&viewperpage='.$viewperpage.'&search_input='.$search_input.$sortvar.$sortval.'&id=1">Previous</a></li>';
                                }
                                for($i=1; $i <= $page; $i++){
                                 echo '<li><a href="?filter='.$filter.'&viewperpage='.$viewperpage.'&search_input='.$search_input.$sortvar.$sortval.'&id='.$i.'" ';
                                    if($id == $i) {
                                        echo 'class="list-group-item active">'.$i.'</a></li>';
                                    } else {
                                        echo '>'.$i.'</a></li>';
                                    }
                                }
                                if (!$id) {
                                    $id = 1;
                                }
                                if($id!=$page) {
                                    echo '<li><a href="?filter='.$filter.'&viewperpage='.$viewperpage.'&search_input='.$search_input.$sortvar.$sortval.'&id='.($id+1).'">Next</a></li></ul></div>';
                                } else {
                                    echo '<li><a href="?filter='.$filter.'&viewperpage='.$viewperpage.'&search_input='.$search_input.$sortvar.$sortval.'&id='.$page.'">Next</a></li></ul></div>';
                                }
                            }

                                    if($total == 0){
                                        echo '<tr class="nothingToDisplay text-center"><td colspan="22">NOTHING TO DISPLAY <a href="index.php"> <span class="fa fa-arrow-circle-left"></span> Go Back</a></td></tr>';
                                    }else{
                                        if($id == 1) {
                                            $no = 1;
                                        } else {
                                            $no = $viewperpage * ($id-1) + 1;
                                        }
                                        while($row = $query2->fetch(PDO::FETCH_ASSOC)){
                                            echo '
                                            <tr>
                                                <td>'.$no.'</td>
                                                <td colspan="2" class="col-md-1">'.$row['idnum'].'</td>
                                                <td colspan="2" class="text-left"><a title="View Profile" href="profile.php?idnum='.$row['idnum'].'"><span class="glyphicon" aria-hidden="true"></span> '.strip_tags(htmlentities($row['last_name'])).", ".strip_tags($row['first_name']).'</a></td>
                                                <td colspan="2">'.$row['courseyear'].'</td>';
                                    
                                            echo '
                                            <td colspan="2">
                                                <a class="help" data-html="true" data-toggle="tooltip" 
                                                title=" 
                                                    Date Released: '.$row ['release_endorsement'].' 
                                                    <br> 
                                                    Date Received: '.$row ['receive_endorsement'].' 
                                                    <br> Remarks: '.strip_tags($row ['remark_endorsement']).' " >
                                            ';
                                            if($row['endorsement'] == 'yes'){
                                                echo ' 
                                                    <span class="glyphicon glyphicon-ok fontGlyphiconOk"></span>
                                                    </a>
                                                 </td>';
                                            }
                                            else if ($row['endorsement'] == 'no' ){
                                                echo '  
                                                    <span class="glyphicon glyphicon-remove fontGlyphiconNo"></span>
                                                        </a>
                                                    </td>';
                                            }
                                    
                             
                                            echo '
                                            <td colspan="2">
                                                <a class="help" data-html="true" data-toggle="tooltip" 
                                                title=" 
                                                    Date Released: '.$row ['release_waiver'].' 
                                                    <br> 
                                                    Date Received: '.$row ['receive_waiver'].' 
                                                    <br> Remarks: '.strip_tags($row ['remark_waiver']).' " >
                                            ';
                                            if($row['waiver'] == 'yes'){
                                                echo '  
                                                    <span class="glyphicon glyphicon-ok fontGlyphiconOk"></span>
                                                    </a>
                                                 </td>';
                                            }
                                            else if ($row['waiver'] == 'no' ){
                                                echo '  
                                                    <span class="glyphicon glyphicon-remove fontGlyphiconNo"></span>
                                                        </a>
                                                    </td>';
                                            }
                                 
                                            echo '
                                                <td colspan="2">
                                                    <a class="help" data-html="true" data-toggle="tooltip" 
                                                        title=" 
                                                            Date Released: '.$row ['release_moa'].' 
                                                            <br> 
                                                            Date Received: '.$row ['receive_moa'].' 
                                                            <br> Remarks: '.strip_tags($row ['remark_moa']).' " >
                                                ';
                                            if($row['moa'] == 'yes'){
                                                echo '  
                                                        <span class="glyphicon glyphicon-ok fontGlyphiconOk"></span>
                                                    </a>
                                                </td>';
                                            }
                                            else if ($row['moa'] == 'no' ){
                                                    echo '  
                                                        <span class="glyphicon glyphicon-remove fontGlyphiconNo"></span>
                                                        </a>
                                                    </td>';
                                            }
                                            echo '
                                            <td colspan="2">
                                                <a class="help" data-html="true" data-toggle="tooltip" 
                                                title=" 
                                                    Date Released: '.$row ['release_evaluation'].' 
                                                    <br> 
                                                    Date Received: '.$row ['receive_evaluation'].' 
                                                    <br> Remarks: '.strip_tags($row ['remark_evaluation']).' " >
                                            ';
                                                if($row['evaluation'] == 'yes'){
                                                    echo '  
                                                            <span class="glyphicon glyphicon-ok fontGlyphiconOk"></span>
                                                        </a>
                                                    </td>';
                                                }
                                                            else if ($row['evaluation'] == 'no' ){
                                                    echo '  
                                                            <span class="glyphicon glyphicon-remove fontGlyphiconNo"></span>
                                                        </a>
                                                    </td>';
                                                }
                 
                                    
                                            echo '
                                                <td colspan="2">';
                                                if($row['status'] == 'Complete'){
                                                    echo '<span type="button" data-toggle="modal" data-target="#'.$row['idnum'].'" class="label label-success btn btn-sm removeButton ">Complete</span>';
                                                } else if ($row['status'] == 'Incomplete' ){
                                                    echo '<span type="button" data-toggle="modal" data-target="#'.$row['idnum'].'" class="label label-warning btn btn-sm removeButton ">Incomplete</span>';
                                                }
                                            echo '
                                                 <div id='.$row['idnum'].' class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">'.strip_tags(htmlentities($row['last_name'])).', '.strip_tags(htmlentities($row['first_name'])).'</h4>
                                                            </div>
                                                        <div class="modal-body">';
                                            if ($row ['status'] == "Complete") {
                                                echo '<h2 class="titleRequirements">Requirement Status: </h2> '.'<span class="label label-success" style = "font-size: 1.2em;">'.$row ['status'].'</span><br>';
                                            } else if ($row ['status'] == "Incomplete") {
                                                echo '<h2 class="titleRequirements">Requirement Status: </h2> '.'<span class="label label-warning" style = "font-size: 1.2em;">'.$row ['status'].'</span><br>';
                                            }
                                            echo '                            
                                                    <br>
                                                    <h2 class="titleRequirements">Letter of Endorsement</h2>
                                                    <p>Date Released: <span class="dateRequirement">'.$row ['release_endorsement'].'</span></p>
                                                    <p>Date Received: <span class="dateRequirement">'.$row ['receive_endorsement'].'</span></p>
                                                    <p>Remarks: <span class="dateRequirement">'.strip_tags(htmlentities($row ['remark_endorsement'])).'</span></p>
                                                    <br>
                                                    <h2 class="titleRequirements">OJT Waiver</h2>
                                                    <p>Date Released: <span class="dateRequirement">'.$row ['release_waiver'].'</span></p>
                                                    <p>Date Received: <span class="dateRequirement">'.$row ['receive_waiver'].'</span></p>
                                                    <p>Remarks: <span class="dateRequirement">'.strip_tags(htmlentities($row ['remark_waiver'])).'</span></p>
                                                    <br>
                                                    <h2 class="titleRequirements">Memorandum of Agreement</h2>
                                                    <p>Date Released: <span class="dateRequirement">'.$row ['release_moa'].'</span></p>
                                                    <p>Date Received: <span class="dateRequirement">'.$row ['receive_moa'].'</span></p>
                                                    <p>Remarks: <span class="dateRequirement">'.strip_tags(htmlentities($row ['remark_moa'])).'</span></p>
                                                    <br>
                                                    <h2 class="titleRequirements">Evaluation</h2>
                                                    <p>Date Released: <span class="dateRequirement">'.$row ['release_evaluation'].'</span></p>
                                                    <p>Date Received: <span class="dateRequirement">'.$row ['receive_evaluation'].'</span></p>
                                                    <p>Remarks: <span class="dateRequirement">'.strip_tags(htmlentities($row ['remark_evaluation'])).'</span></p>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            ';
                                            echo '
                                                <td colspan="2" class="text-left"><a href="profilecompany.php?coid='.$row['coid'].'">'.strip_tags(htmlentities($row['coname'])).'</a></td>
                                                <td colspan="2" class = "text-center">';
                                                if ($row['typeofcompany'] == 'Private'){
                                                    echo '<span class="label label-primary">Private</span> <br>';
                                                } else if ($row['typeofcompany'] == 'Government'){
                                                    echo '<span class="label label-info">Government</span> <br>';
                                                }
                                            echo '
                                                </td>
                                                <td>
                                                    <a href="edit.php?idnum='.$row['idnum'].'" title="Edit Data" class="btn btn-primary btn-sm">
                                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                    </a>
                                                    <a href="index.php?action=delete&idnum='.$row['idnum'].'" title="Remove Student" class="confirm btn btn-danger btn-sm" 
                                                            data-text="Are you sure you want to delete '.strip_tags(htmlentities($row['last_name'])).", ".strip_tags(htmlentities($row['first_name'])).
                                                            '" data-confirm-button="Yes"
                                                            data-cancel-button="No"
                                                            data-confirm-button-class= "btn-success"
                                                            data-cancel-button-class= "btn-danger"
                                                            data-title="Delete Student">
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
                </div><!--End of col-md-12-->
            </div> <!--End of Container Fluid-->
            </form>
    </section>
    <!---->
    <!---->
    <footer class="footer">
        <div class="row text-center">
            <img class="footerLogo" src="img/newLogo.png">
            <p class="credits">Designed and Developed by OJT2 2016-2017</p>
        </div>
    </footer>
    </div> <!--End of main-container-->
    <!---->
    <!--contact ends-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/smoothScroll.js"></script>
    <script src="js/tooltip.js"></script>
    <script src="js/jquery.confirm.js"></script>
    <script src="js/bootstrap-notify.js"></script>
    <script src="js/alertFade.js"></script>
    <script src="js/preloader.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/dropdown.js"></script>

    <script>
        $(".confirm").confirm();
    </script>
    
  </body>
</html>