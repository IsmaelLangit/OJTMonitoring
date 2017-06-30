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
                                <li class="active"><a href="index.php">List of Students</a></li>
                                <li><a href="add.php">Add Student</a></li>
                                <li><a href="company.php">list of Companies</a></li>
                                <li><a href="addcompany.php">Add Company</a></li>
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
        <div class="container-fluid">

            <div class="col text-center">
                <h1 class="top-title">List of Practicum 2 <span class="title">Students </span></h1>
                <hr>
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
                        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>';
                    }
                }
            }
            ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-11">
                        <form class="form-inline" method="get">
                            <div class="form-group input-group dropdown-toggle">
                                <span class="input-group-btn">  
                                    <input style="width:90px;" type="text" class="form-control black" placeholder="Filter By:" readonly>
                                 </span>
                                <select name="filter" class="btn btn-default form-control touch" onchange="form.submit()">
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

                            <div class="form-group input-group dropdown-toggle">
                                <span class="input-group-btn">  
                                    <input style="width:150px;" type="text" class="form-control black" placeholder="Number of rows:" readonly>
                                 </span>
                                <select name="sort" class="btn btn-default form-control touch" onchange="form.submit()">
                                    <?php $sort = (isset($_GET['sort']) ? strtolower($_GET['sort']) : NULL);  ?>
                                    <option value="all" <?php if($sort == 'all'){ echo 'selected'; } ?>>All</option>
                                    <option value="10" <?php if($sort == '10'){ echo 'selected'; } ?>>10</option>
                                    <option value="20" <?php if($sort == '20'){ echo 'selected'; } ?>>20</option>
                                    <option value="50" <?php if($sort == '50'){ echo 'selected'; } ?>>50</option>
                                    <option value="100" <?php if($sort == '100'){ echo 'selected'; } ?>>100</option>   
                                </select>
                            </div>

                            <form id="Name" action="#">
                                <div class="input-group">
                                    <span class="input-group-btn">  
                                        <input style="width:75px;" type="text" class="form-control black" placeholder="Search" readonly> 
                                    </span>
                                    <input type="text" id="myInput" onkeyup="search()" class="form-control input-xxlarge">
                                </div>
                            </form> 
                        </form>
                    </div>

                    <div class="col-md-1 text-center">
                        <a class="btn btn-success addStudent" href="add.php" role="button"> <span class="glyphicon glyphicon-plus space"></span>Add Student</a>
                    </div>

                </div>
            </div>

            <div class="container-fluid">

            <button class="btn btn-primary btn-md center-block" data-toggle="collapse" data-target="#summary">QUICK SUMMARY</button>

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

                    <a href="index.php?filter=Complete&sort=all">
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

                    <a href="index.php?filter=Incomplete&sort=all">
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

                     <a href="index.php?filter=Private&sort=all">
                        <div class="col-sm-2 well wellHeight blue col-centered text-center">
                        <span class="indexIcon fa fa-building"></span>
                        <hr class="style-four">
                            <?php
                                $con = mysqli_query($connect, "SELECT count(idnum) AS countidnum FROM students JOIN company on students.coid = company.coid where typeofcompany = 'Private'");
                                while ($row = mysqli_fetch_assoc($con)) {
                                    echo '
                                    <p class="text-center colorInfo">Private</p>
                                    <p class = "number text-center">'.$row["countidnum"].'</p>
                                    ';
                                }
                            ?>  
                        </div>
                    </a>


                    <a href="index.php?filter=Government&sort=all">
                        <div class="col-sm-2 well wellHeight violet col-centered text-center">
                        <span class="indexIcon fa fa-institution"></span>
                        <hr class="style-four">
                            <?php
                                $con = mysqli_query($connect, "SELECT count(idnum) AS countidnum FROM students JOIN company on students.coid = company.coid where typeofcompany = 'Government'");
                                while ($row = mysqli_fetch_assoc($con)) {
                                    echo '
                                    <p class="text-center colorInfo">Government</p>
                                    <p class = "number text-center">'.$row["countidnum"].'</p>
                                    ';
                                }
                            ?>  
                        </div>
                    </a>

                    <a href="index.php?filter=No+Company&sort=all">
                        <div class="col-sm-2 well wellHeight orange col-centered text-center">
                        <span class="indexIcon fa fa-warning"></span>
                        <hr class="style-four">
                            <?php
                                $con = mysqli_query($connect, "SELECT count(idnum) AS countidnum FROM students JOIN company on students.coid = company.coid where coname = 'No Company'");
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
                            <table class="table table-fixed table-striped table-hover text-center" id="myTable">

                                <thead>
                                    <tr class="info">
                                        <th id="no" class="text-center touch" title="Sort By Number"><span class="fa fa-sort space"></span>No </th>
                                        <th id="idnum" class="text-center touch" title="Sort By ID Number"><span class="fa fa-sort space"></span>ID Number</th>
                                        <th id="name" class="text-center touch" title="Sort By Name"><span class="fa fa-sort space"></span>Name</th>
                                        <th id="courseandyear" class="text-center touch" title="Sort By Course and Year"><span class="fa fa-sort space"></span> Course & Year</th>
                                        <th id="endorsement" class="text-center touch" title="Sort By Endorsement Status"><span class="fa fa-sort space"></span>Endorsement</th>
                                        <th id="waiver" class="text-center touch" title="Sort By Waiver Status"><span class="fa fa-sort space"></span>Waiver</th>
                                        <th id="moa" class="text-center touch" title="Sort By MOA Status"><span class="fa fa-sort space"></span>MOA</th>
                                        <th id="evaluation" class="text-center touch" title="Sort By Evaluation Status"><span class="fa fa-sort space"></span>Evaluation</th>
                                        <th id="status" class="text-center touch" title="Sort By Requirement Status"><span class="fa fa-sort space"></span>Requirement Status</th>
                                        <th id="companyname" class="text-center touch" title="Sort By Company Name"><span class="fa fa-sort space"></span>Company Name</th>
                                        <th id="type" class="text-center touch" title="Sort By OJT Type"><span class="fa fa-sort space"></span>Type</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <?php

                                $t=mysqli_query($connect,"SELECT * from students JOIN company ON students.coid = company.coid WHERE status='$filter' or typeofcompany='$filter' or typeofcompany ='$filter' or coname ='$filter'");
                                $total=mysqli_num_rows($t);

                                $start=0;

                                if($sort == "all") {
                                    $limit = $total;
                                } else {
                                    $limit=$sort; 
                                }
                                
                                if(isset($_GET['id'])){
                                    $id=$_GET['id'];
                                    $start=($id-1)*$limit;
                                } else {
                                    $id=1;
                                }
                                
                                if($filter == "yes1"){
                                    $filter = "yes";
                                     $t=mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE endorsement='$filter' ORDER BY last_name ASC, first_name ASC");
                                    $total=mysqli_num_rows($t);

                                    if($sort == "all") {
                                        $limit = $total;
                                    }

                                    if($total != 0) {
                                        $page=ceil($total/$limit);
                                    }

                                    $sql = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE endorsement='$filter' ORDER BY last_name ASC, first_name ASC LIMIT $start,$limit");
                                    $filter = "yes1";

                                } else if($filter == "no1"){
                                    $filter = "no";
                                    $t=mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE endorsement='$filter' ORDER BY last_name ASC, first_name ASC");
                                    $total=mysqli_num_rows($t);

                                    if($sort == "all") {
                                        $limit = $total;
                                    }
            
                                    if($total != 0) {
                                        $page=ceil($total/$limit);
                                    }

                                    $sql = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE endorsement='$filter' ORDER BY last_name ASC, first_name ASC LIMIT $start,$limit");
                                    $filter = "no1";

                                } else if($filter == "yes2"){
                                    $filter = "yes";
                                    $t=mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE waiver='$filter' ORDER BY last_name ASC, first_name ASC");
                                    $total=mysqli_num_rows($t);

                                    if($sort == "all") {
                                        $limit = $total;
                                    }
            
                                    if($total != 0) {
                                        $page=ceil($total/$limit);
                                    }
                                    $sql = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE waiver='$filter' ORDER BY last_name ASC, first_name ASC LIMIT $start,$limit");
                                    $filter = "yes2";

                                } else if($filter == "no2"){
                                    $filter = "no";
                                    $t=mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE waiver='$filter' ORDER BY last_name ASC, first_name ASC");
                                    $total=mysqli_num_rows($t);

                                    if($sort == "all") {
                                        $limit = $total;
                                    }
            
                                    if($total != 0) {
                                        $page=ceil($total/$limit);
                                    }
                                    $sql = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE waiver='$filter' ORDER BY last_name ASC, first_name ASC LIMIT $start,$limit");
                                    $filter = "no2";

                                } else if($filter == "yes3"){
                                    $filter = "yes";
                                    $t= mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE moa='$filter' ORDER BY last_name ASC, first_name ASC");
                                    $total=mysqli_num_rows($t);

                                    if($sort == "all") {
                                        $limit = $total;
                                    }
            
                                    if($total != 0) {
                                        $page=ceil($total/$limit);
                                    }
                                    $sql =mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE moa='$filter' ORDER BY last_name ASC, first_name ASC LIMIT $start,$limit");
                                    $filter = "yes3";

                                } else if($filter == "no3"){
                                    $filter = "no";
                                    $t=mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE moa='$filter' ORDER BY last_name ASC, first_name ASC");
                                    $total=mysqli_num_rows($t);

                                    if($sort == "all") {
                                        $limit = $total;
                                    }
            
                                    if($total != 0) {
                                        $page=ceil($total/$limit);
                                    }
                                    $sql =mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE moa='$filter' ORDER BY last_name ASC, first_name ASC LIMIT $start,$limit");
                                    $filter = "no3";

                                } else if($filter == "yes4"){
                                    $filter = "yes";
                                    $t=mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE evaluation ='$filter' ORDER BY last_name ASC, first_name ASC");
                                    $total=mysqli_num_rows($t);

                                    if($sort == "all") {
                                        $limit = $total;
                                    }

                                    if($total != 0) {
                                        $page=ceil($total/$limit);
                                    }
                                    $sql =mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE evaluation ='$filter' ORDER BY last_name ASC, first_name ASC LIMIT $start,$limit");
                                    $filter = "yes4";

                                } else if($filter == "no4"){
                                    $filter = "no";
                                    $t=mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE evaluation='$filter' ORDER BY last_name ASC, first_name ASC");
                                    $total=mysqli_num_rows($t);

                                    if($sort == "all") {
                                        $limit = $total;
                                    }
            
                                    if($total != 0) {
                                        $page=ceil($total/$limit);
                                    }
                                    $sql =mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE evaluation='$filter' ORDER BY last_name ASC, first_name ASC LIMIT $start,$limit");
                                    $filter = "no4";

                                } else if($filter){
                                    $t=mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE status='$filter' or typeofcompany='$filter' or typeofcompany ='$filter' or coname ='$filter' ORDER BY last_name ASC, first_name ASC");
                                    $total=mysqli_num_rows($t);

                                    if($sort == "all") {
                                        $limit = $total;
                                    }
            
                                    if($total != 0) {
                                        $page=ceil($total/$limit);
                                    }
                                    $sql =mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE status='$filter' or typeofcompany='$filter' or typeofcompany ='$filter' or coname ='$filter' ORDER BY last_name ASC, first_name ASC LIMIT $start,$limit");


                                } else {
                                    $t=mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid  ORDER BY last_name ASC, first_name ASC");
                                    $total=mysqli_num_rows($t);

                                    if(!$filter && !$sort || $sort == "all") {
                                        $sort = $total;
                                        $limit = $total;
                                    }

                                    if($total != 0) {
                                         $page=ceil($total/$limit);
                                    }
                                    $sql =mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid  ORDER BY last_name ASC, first_name ASC LIMIT $start,$limit");
                                }

                                ?>
                                   
                                            <?php 
           
                                                if ($page > 1){
                                                    if($id > 1) {
                                                    echo ' <div class="text-center"><ul class="pagination list-group"><li><a href="?filter='.$filter.'&sort='.$sort.'&id='.($id-1).'">Previous</a></li>';
                                                    } else {
                                                        echo '<div class="text-center"><ul class="pagination list-group"><li><a href="?filter='.$filter.'&sort='.$sort.'&id=1">Previous</a></li>';
                                                    }
            
                                                    for($i=1; $i <= $page; $i++){
                                                     echo '<li><a href="?filter='.$filter.'&sort='.$sort.'&id='.$i.'" ';
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
                                                        echo '<li><a href="?filter='.$filter.'&sort='.$sort.'&id='.($id+1).'">Next</a></li></ul></div>';
                                                    } else {
                                                        echo '<li><a href="?filter='.$filter.'&sort='.$sort.'&id='.$page.'">Next</a></li></ul></div>';
                                                    }
                                                }
                                            ?>
                                        
                                <?php 

                                    if(mysqli_num_rows($sql) == 0){
                                        echo '<tr class="nothingToDisplay text-center"><td colspan="14">Nothing to Display</td></tr>';
                                    }else{
                                        if($id == 1) {
                                            $no = 1;
                                        } else {
                                            $no = $sort * ($id-1) + 1;
                                        }

                                        while($row = mysqli_fetch_assoc($sql)){
                                            echo '
                                            <tr>
                                                <td>'.$no.'</td>
                                                <td>'.$row['idnum'].'</td>
                                                <td class="text-left"><a href="profile.php?idnum='.$row['idnum'].'"><span class="glyphicon" aria-hidden="true"></span> '.strip_tags(htmlentities($row['last_name'])).", ".strip_tags(htmlentities($row['first_name'])).'</a></td>
                                                            <td>'.$row['courseyear'].'</td>';
                                    
                                            echo '
                                            <td>
                                                <a class="help" data-html="true" data-toggle="tooltip" 
                                                title=" 
                                                    Date Released: '.$row ['release_endorsement'].' 
                                                    <br> 
                                                    Date Received: '.$row ['receive_endorsement'].' 
                                                    <br> Remarks: '.strip_tags(htmlentities($row ['remark_endorsement'])).' " >
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
                                            <td>
                                                <a class="help" data-html="true" data-toggle="tooltip" 
                                                title=" 
                                                    Date Released: '.$row ['release_waiver'].' 
                                                    <br> 
                                                    Date Received: '.$row ['receive_waiver'].' 
                                                    <br> Remarks: '.strip_tags(htmlentities($row ['remark_waiver'])).' " >
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
                                                <td>
                                                    <a class="help" data-html="true" data-toggle="tooltip" 
                                                        title=" 
                                                            Date Released: '.$row ['release_moa'].' 
                                                            <br> 
                                                            Date Received: '.$row ['receive_moa'].' 
                                                            <br> Remarks: '.strip_tags(htmlentities($row ['remark_moa'])).' " >
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
                                            <td>
                                                <a class="help" data-html="true" data-toggle="tooltip" 
                                                title=" 
                                                    Date Released: '.$row ['release_evaluation'].' 
                                                    <br> 
                                                    Date Received: '.$row ['receive_evaluation'].' 
                                                    <br> Remarks: '.strip_tags(htmlentities($row ['remark_evaluation'])).' " >

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
                                                <td>';
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
                                                <td class="text-left"><a href="profilecompany.php?coid='.$row['coid'].'">'.strip_tags(htmlentities($row['coname'])).'</a></td>
                                                <td class = "text-center">';
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
                                                    <a href="index.php?action=delete&idnum='.$row['idnum'].'" title="Remove Student" onclick="return confirm(\'Are you sure you want to delete '.strip_tags(htmlentities($row['first_name']))." ".strip_tags(htmlentities($row['last_name'])).'?\')" class="btn btn-danger btn-sm">
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
    <script>
        function search() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            td1 = tr[i].getElementsByTagName("td")[9];
            td2 = tr[i].getElementsByTagName("td")[3];
                if (td || td1) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td1.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }       
            }
        }
            
        function sortTable(f,n){
            var rows = $('#myTable tbody  tr').get();

            rows.sort(function(a, b) {

                var A = getVal(a);
                var B = getVal(b);

                if(A < B) {
                    return -1*f;
                }
                if(A > B) {
                    return 1*f;
                }
                return 0;
            });

        function getVal(elm){
            var v = $(elm).children('td').eq(n).text().toUpperCase();
            if($.isNumeric(v)){
                v = parseInt(v,10);
            }
            return v;
        }

        $.each(rows, function(index, row) {
            $('#myTable').children('tbody').append(row);
        });
        }

        var f_no = 1;
        var f_idnum = 1;
        var f_name = 1;
        var f_courseandyear = 1;
        var f_companyname = 1;

        var f_endorsement = 1;
        var f_waiver = 1;
        var f_evaluation = 1;
        var f_moa = 1;
        var f_status = 1;
        var f_type = 1;

        $("#no").click(function(){
            f_no *= -1;
            var n = $(this).prevAll().length;
            sortTable(f_no,n);
        });
        $("#idnum").click(function(){
            f_idnum *= -1;
            var n = $(this).prevAll().length;
            sortTable(f_idnum,n);
        });
        $("#name").click(function(){
            f_name *= -1;
            var n = $(this).prevAll().length;
            sortTable(f_name,n);
        });
        $("#courseandyear").click(function(){
            f_courseandyear *= -1;
            var n = $(this).prevAll().length;
            sortTable(f_courseandyear,n);
        });
        $("#companyname").click(function(){
            f_companyname *= -1;
            var n = $(this).prevAll().length;
            sortTable(f_companyname,n);
        });
        $("#endorsement").click(function(){
            f_endorsement *= -1;
            var n = $(this).prevAll().length;
            sortTable(f_endorsement,n);
        });
        $("#waiver").click(function(){
            f_waiver *= -1;
            var n = $(this).prevAll().length;
            sortTable(f_waiver,n);
        });
        $("#evaluation").click(function(){
            f_evaluation *= -1;
            var n = $(this).prevAll().length;
            sortTable(f_evaluation,n);
        });
        $("#moa").click(function(){
            f_moa *= -1;
            var n = $(this).prevAll().length;
            sortTable(f_moa,n);
        });
        $("#status").click(function(){
            f_status *= -1;
            var n = $(this).prevAll().length;
            sortTable(f_status,n);
        });
        $("#type").click(function(){
            f_type *= -1;
            var n = $(this).prevAll().length;
            sortTable(f_type,n);
        });
    </script>
  </body>
</html>