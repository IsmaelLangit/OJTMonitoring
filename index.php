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
        <link rel="stylesheet" type="text/css" href="css/footer.css">
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
                                <li class="active"><a href="index.php"><span class="fa fa-user space"></span>List of Students</a></li>
                                <li><a href="add.php"><span class="fa fa-plus space"></span>Add Student</a></li>
                                <li><a href="company.php"><span class="fa fa-building space"></span>list of Companies</a></li>
                                <li><a href="addcompany.php"><span class="fa fa-plus space"></span>Add Company</a></li>
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
                <h1 class="top-title">List of Practicum 2 <span class="title">Students </span></h1>
            </div>

            <a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>

            <?php
            if(isset($_GET['action']) == 'delete'){
                $idnum = $_GET['idnum'];
                $con = mysqli_query($connect, "SELECT * FROM students WHERE idnum='$idnum ORDER BY last_name ASC, first_name ASC'");
                if(mysqli_num_rows($con) == 0){
                    echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Welcome Admin!</div>';
                }else{
                    $delete = mysqli_query($connect, "DELETE FROM students WHERE idnum='$idnum '");
                    if($delete){
                        echo '<div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <span class = "fa fa-check-circle"></span> You have successfully <strong> deleted </strong> the student!
                                </div>';
                    }else{
                        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close " data-dismiss="alert" aria-hidden="true">&times;</button></div>';
                    }
                }
            }
            ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                       
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

                    <div class="col-md-3 text-center paddingTopSlight">
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#summary"><span class="fa fa-bar-chart space"></span>QUICK SUMMARY</button>
                        <a href="add.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></a>
                    </div>

                </div>
            </div>

            <div class="container-fluid">
                <div id="summary" class="row row-centered paddingTopSlight panel-collapse collapse">

                    <a href="index.php" >
                        <div class="col-sm-2 yellow wellHeight well col-centered text-center">
                        <span class="indexIcon fa fa-users"></span>
                        <hr class="style-four">
                            <?php
                                $con = mysqli_query($connect, "SELECT count(idnum) AS countidnum FROM students");
                                while ($row = mysqli_fetch_assoc($con)) {
                                    echo '
                                    <p class="colorInfo">Total Students</p>
                                    <p class = "number text-center">'.$row["countidnum"].'</p>
                                    ';
                                }
                            ?>  
                        </div>
                    </a>

                    <a href="index.php?filter=Complete&viewperpage=all">
                        <div class="col-sm-2 well wellHeight green col-centered text-center">
                        <span class="indexIcon fa fa-check"></span>
                        <hr class="style-four">
                            <?php
                                $con = mysqli_query($connect, "SELECT count(idnum) AS countidnum FROM students where status = 'Complete'");
                                while ($row = mysqli_fetch_assoc($con)) {
                                    echo '
                                    <p class="text-center colorInfo">Complete Requirements</p>
                                    <p class = "number text-center">'.$row["countidnum"].'</p>
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
                                $con = mysqli_query($connect, "SELECT count(idnum) AS countidnum FROM students where status = 'Incomplete'");
                                while ($row = mysqli_fetch_assoc($con)) {
                                    echo '
                                    <p class="text-center colorInfo">Incomplete Requirements</p>
                                    <p class = "number text-center">'.$row["countidnum"].'</p>
                                ';
                                }
                            ?>  
                        </div>
                    </a>

                     <a href="index.php?filter=Private&viewperpage=all">
                        <div class="col-sm-2 well wellHeight blue col-centered text-center">
                        <span class="indexIcon fa fa-building"></span>
                        <hr class="style-four">
                            <?php
                                $con = mysqli_query($connect, "SELECT count(idnum) AS countidnum FROM students NATURAL JOIN company where typeofcompany = 'Private'");
                                while ($row = mysqli_fetch_assoc($con)) {
                                    echo '
                                    <p class="text-center colorInfo">Private</p>
                                    <p class = "number text-center">'.$row["countidnum"].'</p>
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
                                $con = mysqli_query($connect, "SELECT count(idnum) AS countidnum FROM students NATURAL JOIN company where typeofcompany = 'Government'");
                                while ($row = mysqli_fetch_assoc($con)) {
                                    echo '
                                    <p class="text-center colorInfo">Government</p>
                                    <p class = "number text-center">'.$row["countidnum"].'</p>
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
                                $con = mysqli_query($connect, "SELECT count(idnum) AS countidnum FROM students NATURAL JOIN company where coname = 'No Company'");
                                while ($row = mysqli_fetch_assoc($con)) {
                                    echo '
                                    <p class="text-center colorInfo">No Company</p>
                                    <p class = "number text-center">'.$row["countidnum"].'</p>
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
                                        <th width="0.5%" class="text-right">
                                            <div class="btn-group-vertical">
                                                <input class="btn arrowSort" type="submit" name="idnum" value="&#9650;">
                                                <input class="btn arrowSort" type="submit" name="idnum" value="&#9660;">
                                            </div>
                                        </th>
                                        <th class="align-middle">ID Number</th>
                                        <th width="0.5%" class="text-right">
                                            <div class="btn-group-vertical">
                                                <input class="btn arrowSort" type="submit" name="last_name" value="&#9650;">
                                                <input class="btn arrowSort" type="submit" name="last_name" value="&#9660;">
                                            </div>
                                        </th>
                                        <th class="align-middle">Name</th>
                                        <th width="0.5%" class="text-right">
                                            <div class="btn-group-vertical">
                                                <input class="btn arrowSort" type="submit" name="courseyear" value="&#9650;">
                                                <input class="btn arrowSort" type="submit" name="courseyear" value="&#9660;">
                                            </div>
                                        </th>
                                        <th>Course & Year</th>
                                        <th width="0.5%" class="text-right">
                                            <div class="btn-group-vertical">
                                                <input class="btn arrowSort" type="submit" name="endorsement" value="&#9650;">
                                                <input class="btn arrowSort" type="submit" name="endorsement" value="&#9660;">
                                            </div>
                                        </th>
                                        <th>Endorsement</th>
                                        <th width="0.5%" class="text-right">
                                            <div class="btn-group-vertical">
                                                <input class="btn arrowSort" type="submit" name="waiver" value="&#9650;">
                                                <input class="btn arrowSort" type="submit" name="waiver" value="&#9660;">
                                            </div>
                                        </th>
                                        <th>Waiver</th>
                                        <th width="0.5%" class="text-right">   
                                            <div class="btn-group-vertical">
                                                <input class="btn arrowSort" type="submit" name="moa" value="&#9650;">
                                                <input class="btn arrowSort" type="submit" name="moa" value="&#9660;">
                                            </div>
                                        </th>
                                        <th>MOA</th>
                                        <th width="0.5%" class="text-right">
                                            <div class="btn-group-vertical">
                                                <input class="btn arrowSort" type="submit" name="evaluation" value="&#9650;">
                                                <input class="btn arrowSort" type="submit" name="evaluation" value="&#9660;">
                                            </div>
                                        </th>
                                        <th>Evaluation</th>
                                        <th width="0.5%" class="text-right">
                                            <div class="btn-group-vertical">
                                                <input class="btn arrowSort" type="submit" name="status" value="&#9650;">
                                                <input class="btn arrowSort" type="submit" name="status" value="&#9660;">
                                            </div>
                                        </th>
                                        <th>Requirement Status</th>
                                        <th width="0.5%" class="text-right">
                                            <div class="btn-group-vertical">
                                                <input class="btn arrowSort" type="submit" name="coname" value="&#9650;">
                                                <input class="btn arrowSort" type="submit" name="coname" value="&#9660;">
                                            </div>
                                        </th>
                                        <th>Company Name</th>
                                        <th width="0.5%" class="text-right">
                                            <div class="btn-group-vertical">
                                                <input class="btn arrowSort" type="submit" name="typeofcompany" value="&#9650;">
                                                <input class="btn arrowSort" type="submit" name="typeofcompany" value="&#9660;">
                                            </div>
                                        </th>
                                        <th>Type</th>
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

                                switch ($idnum) {
                                    case "▲":
                                        $sort = 'idnum';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'idnum DESC';
                                        break;
                                }

                                switch ($last_name) {
                                    case "▲":
                                        $sort = 'last_name, first_name';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'last_name DESC, first_name';
                                        break;
                                }

                                switch ($courseyear) {
                                    case "▲":
                                        $sort = 'courseyear, last_name, first_name';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'courseyear DESC, last_name, first_name';
                                        break;
                                }

                                switch ($endorsement) {
                                    case "▲":
                                        $sort = 'endorsement DESC, last_name, first_name';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'endorsement , last_name, first_name';
                                        break;
                                }

                                switch ($waiver) {
                                    case "▲":
                                        $sort = 'waiver DESC, last_name, first_name';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'waiver, last_name, first_name';
                                        break;
                                }

                                 switch ($moa) {
                                    case "▲":
                                        $sort = 'moa DESC, last_name, first_name';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'moa, last_name, first_name';
                                        break;
                                }

                                switch ($evaluation) {
                                   case "▲":
                                        $sort = 'evaluation DESC, last_name, first_name';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'evaluation, last_name, first_name';
                                        break;
                                }

                                switch ($status) {
                                    case "▲":
                                        $sort = 'status, last_name, first_name';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'status DESC, last_name, first_name';
                                        break;
                                }

                                switch ($coname) {
                                    case "▲":
                                        $sort = 'coname, last_name, first_name';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'coname DESC, last_name, first_name';
                                        break;
                                }

                                switch ($typeofcompany) {
                                    case "▲":
                                        $sort = 'typeofcompany, last_name, first_name';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'typeofcompany DESC, last_name, first_name';
                                        break;
                                }

                                $t=mysqli_query($connect,"SELECT * from students NATURAL JOIN company WHERE (status='$filter' or typeofcompany='$filter' or typeofcompany ='$filter' or coname ='$filter') and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE '%".$search_input."%')");
                                $total=mysqli_num_rows($t);

                                $start=0;
                                $page = 1;

                                if($viewperpage == "all") {
                                    $limit = $total;
                                } else {
                                    $limit=$viewperpage; 
                                }
                                
                                if(isset($_GET['id'])){
                                    $id=$_GET['id'];
                                    $start=($id-1)*$limit;
                                } else {
                                    $id=1;
                                }
                                
                                if($filter == "yes1"){
                                    $filter = "yes";
                                     $t=mysqli_query($connect, "SELECT * from students NATURAL JOIN company WHERE endorsement='$filter' and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE '%".$search_input."%') ORDER BY last_name ASC, first_name ASC");
                                    $total=mysqli_num_rows($t);

                                    if($viewperpage == "all") {
                                        $limit = $total;
                                    }

                                    if($total != 0) {
                                        $page=ceil($total/$limit);
                                    }

                                    $sql = mysqli_query($connect, "SELECT * from students NATURAL JOIN company WHERE endorsement='$filter' and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE '%".$search_input."%') ORDER BY ".$sort);
                                    $filter = "yes1";

                                } else if($filter == "no1"){
                                    $filter = "no";
                                    $t=mysqli_query($connect, "SELECT * from students NATURAL JOIN company WHERE endorsement='$filter' and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE '%".$search_input."%') ORDER BY last_name ASC, first_name ASC");
                                    $total=mysqli_num_rows($t);

                                    if($viewperpage == "all") {
                                        $limit = $total;
                                    }
            
                                    if($total != 0) {
                                        $page=ceil($total/$limit);
                                    }

                                    $sql = mysqli_query($connect, "SELECT * from students NATURAL JOIN company WHERE endorsement='$filter' and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE '%".$search_input."%') ORDER BY ".$sort." LIMIT $start,$limit");
                                    $filter = "no1";

                                } else if($filter == "yes2"){
                                    $filter = "yes";
                                    $t=mysqli_query($connect, "SELECT * from students NATURAL JOIN company WHERE waiver='$filter' and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE '%".$search_input."%') ORDER BY last_name ASC, first_name ASC");
                                    $total=mysqli_num_rows($t);

                                    if($viewperpage == "all") {
                                        $limit = $total;
                                    }
            
                                    if($total != 0) {
                                        $page=ceil($total/$limit);
                                    }
                                    $sql = mysqli_query($connect, "SELECT * from students NATURAL JOIN company WHERE waiver='$filter' and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE '%".$search_input."%') ORDER BY ".$sort." LIMIT $start,$limit");
                                    $filter = "yes2";

                                } else if($filter == "no2"){
                                    $filter = "no";
                                    $t=mysqli_query($connect, "SELECT * from students NATURAL JOIN company WHERE waiver='$filter' and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE '%".$search_input."%') ORDER BY last_name ASC, first_name ASC");
                                    $total=mysqli_num_rows($t);

                                    if($viewperpage == "all") {
                                        $limit = $total;
                                    }
            
                                    if($total != 0) {
                                        $page=ceil($total/$limit);
                                    }
                                    $sql = mysqli_query($connect, "SELECT * from students NATURAL JOIN company WHERE waiver='$filter' and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE '%".$search_input."%') ORDER BY ".$sort." LIMIT $start,$limit");
                                    $filter = "no2";

                                } else if($filter == "yes3"){
                                    $filter = "yes";
                                    $t= mysqli_query($connect, "SELECT * from students NATURAL JOIN company WHERE moa='$filter' and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE '%".$search_input."%') ORDER BY last_name ASC, first_name ASC");
                                    $total=mysqli_num_rows($t);

                                    if($viewperpage == "all") {
                                        $limit = $total;
                                    }
            
                                    if($total != 0) {
                                        $page=ceil($total/$limit);
                                    }
                                    $sql =mysqli_query($connect, "SELECT * from students NATURAL JOIN company WHERE moa='$filter' and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE '%".$search_input."%') ORDER BY ".$sort." LIMIT $start,$limit");
                                    $filter = "yes3";

                                } else if($filter == "no3"){
                                    $filter = "no";
                                    $t=mysqli_query($connect, "SELECT * from students NATURAL JOIN company WHERE moa='$filter' and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE '%".$search_input."%') ORDER BY last_name ASC, first_name ASC");
                                    $total=mysqli_num_rows($t);

                                    if($viewperpage == "all") {
                                        $limit = $total;
                                    }
            
                                    if($total != 0) {
                                        $page=ceil($total/$limit);
                                    }
                                    $sql =mysqli_query($connect, "SELECT * from students NATURAL JOIN company WHERE moa='$filter' and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE '%".$search_input."%') ORDER BY ".$sort." LIMIT $start,$limit");
                                    $filter = "no3";

                                } else if($filter == "yes4"){
                                    $filter = "yes";
                                    $t=mysqli_query($connect, "SELECT * from students NATURAL JOIN company WHERE evaluation ='$filter' and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE '%".$search_input."%') ORDER BY last_name ASC, first_name ASC");
                                    $total=mysqli_num_rows($t);

                                    if($viewperpage == "all") {
                                        $limit = $total;
                                    }

                                    if($total != 0) {
                                        $page=ceil($total/$limit);
                                    }
                                    $sql =mysqli_query($connect, "SELECT * from students NATURAL JOIN company WHERE evaluation ='$filter' and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE '%".$search_input."%') ORDER BY ".$sort." LIMIT $start,$limit");
                                    $filter = "yes4";

                                } else if($filter == "no4"){
                                    $filter = "no";
                                    $t=mysqli_query($connect, "SELECT * from students NATURAL JOIN company WHERE evaluation='$filter' and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE '%".$search_input."%') ORDER BY last_name ASC, first_name ASC");
                                    $total=mysqli_num_rows($t);

                                    if($viewperpage == "all") {
                                        $limit = $total;
                                    }
            
                                    if($total != 0) {
                                        $page=ceil($total/$limit);
                                    }
                                    $sql =mysqli_query($connect, "SELECT * from students NATURAL JOIN company WHERE evaluation='$filter' and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE '%".$search_input."%') ORDER BY ".$sort." LIMIT $start,$limit");
                                    $filter = "no4";

                                } else if($filter){
                                    $t=mysqli_query($connect, "SELECT * from students NATURAL JOIN company WHERE status='$filter' or typeofcompany='$filter' or typeofcompany ='$filter' or coname ='$filter' and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE '%".$search_input."%') ORDER BY last_name ASC, first_name ASC");
                                    $total=mysqli_num_rows($t);

                                    if($viewperpage == "all") {
                                        $limit = $total;
                                    }
            
                                    if($total != 0) {
                                        $page=ceil($total/$limit);
                                    }
                                    $sql =mysqli_query($connect, "SELECT * from students NATURAL JOIN company WHERE status='$filter' or typeofcompany='$filter' or typeofcompany ='$filter' or coname ='$filter' and (CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE '%".$search_input."%') ORDER BY ".$sort." LIMIT $start,$limit");


                                } else {
                                    $t=mysqli_query($connect, "SELECT * from students NATURAL JOIN company WHERE CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE '%".$search_input."%' ORDER BY last_name ASC, first_name ASC");
                                    $total=mysqli_num_rows($t);

                                    if(!$filter && !$viewperpage || $viewperpage == "all") {
                                        $viewperpage = $total;
                                        $limit = $total;
                                    }

                                    if($total != 0) {
                                         $page=ceil($total/$limit);
                                    }
                                    $sql =mysqli_query($connect, "SELECT * from students NATURAL JOIN company WHERE CONCAT_WS('', idnum, last_name, first_name, courseyear, status, coname, typeofcompany) LIKE '%".$search_input."%' ORDER BY ".$sort." LIMIT $start,$limit");
                                }

                                ?>
                                <?php 

                                    if ($page > 1){
                                        if($id > 1) {
                                        echo ' <div class="container-fluid text-center"><ul class="pagination list-group"><li><a href="?filter='.$filter.'&viewperpage='.$viewperpage.'&id='.($id-1).'">Previous</a></li>';
                                        } else {
                                            echo '<div class="container-fluid text-center"><ul class="pagination list-group"><li><a href="?filter='.$filter.'&viewperpage='.$viewperpage.'&id=1">Previous</a></li>';
                                        }

                                        for($i=1; $i <= $page; $i++){
                                         echo '<li><a href="?filter='.$filter.'&viewperpage='.$viewperpage.'&id='.$i.'&search_input='.$search_input.'" ';
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
                                            echo '<li><a href="?filter='.$filter.'&viewperpage='.$viewperpage.'&id='.($id+1).'">Next</a></li></ul></div>';
                                        } else {
                                            echo '<li><a href="?filter='.$filter.'&viewperpage='.$viewperpage.'&id='.$page.'">Next</a></li></ul></div>';
                                        }
                                    }
                                ?> 
                                <?php 

                                    if(mysqli_num_rows($sql) == 0){
                                        echo '<tr class="nothingToDisplay text-center"><td colspan="22"><span class="fa fa-ban space"></span>Nothing to Display</td></tr>';
                                    }else{
                                        if($id == 1) {
                                            $no = 1;
                                        } else {
                                            $no = $viewperpage * ($id-1) + 1;
                                        }

                                        while($row = mysqli_fetch_assoc($sql)){
                                            echo '
                                            <tr>
                                                <td>'.$no.'</td>
                                                <td colspan="2" class="col-md-1">'.$row['idnum'].'</td>
                                                <td colspan="2" class="text-left"><a href="profile.php?idnum='.$row['idnum'].'"><span class="glyphicon" aria-hidden="true"></span> '.strip_tags(htmlentities($row['last_name'])).", ".strip_tags($row['first_name']).'</a></td>
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
                                                    echo '<span type="button" data-toggle="modal" data-target="#'.$row['idnum'].'" class="label label-success btn btn-sm">Complete</span>';
                                                } else if ($row['status'] == 'Incomplete' ){
                                                    echo '<span type="button" data-toggle="modal" data-target="#'.$row['idnum'].'" class="label label-warning btn btn-sm">Incomplete</span>';
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
                                                    <a href="edit.php?idnum='.$row['idnum'].'" title="Edit Data" class="btn btn-success btn-sm">
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
                    <i class="fa fa-building-o"></i>
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

    <script>
        $(".confirm").confirm();
    </script>
  </body>
</html>