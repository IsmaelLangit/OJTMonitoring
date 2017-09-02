<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Student</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="icon" href="img/scisLogo.png">
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
                        <div class="collapse navbar-collapse navbar-right borderXwidth" id="mynavbar">
                            <ul class="nav navbar-nav ">
                                <li class="dropdown">
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
                                    <li><a href="editvisit.php"><span class="fa fa-pencil-square-o orange space"></span>Edit Visitation</a></li>
                                  </ul>
                                </li>

                                <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <span class="caret"></span></a>
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="import_csv.php"><span class="fa fa-upload green space"></span>Import Data</a></li>
                                    <li><a href="export_csv.php"><span class="fa fa-download orange space"></span>Export Data to CSV</a></li>
                                    <li><a href="reset.php"><span class="fa fa-repeat red space"></span>Master Reset</a></li>
                                  </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--/ header-->
    
    <section class="section-padding">
        <div class="container-fluid">

            <div class="col text-center">
                <h1 class="top-title">Edit 
                    <span class="title">
                        <?php 
                            $idnum = $_GET['idnum'];
                            $sql = mysqli_query($connect, "SELECT * from advisers NATURAL JOIN students NATURAL JOIN company WHERE idnum='$idnum'");
                            $row = mysqli_fetch_assoc($sql);
                            echo htmlentities($row ['last_name'])."'s";
                        ?> 
                    </span> 
                Details</h1>
                
            </div>

            <a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>
            <?php
            $idnum = $_GET['idnum'];
            $sql = mysqli_query($connect, "SELECT * from advisers NATURAL JOIN students NATURAL JOIN company WHERE idnum='$idnum'");
            if(mysqli_num_rows($sql) == 0){
                header("Location: index.php");
            }else{
                $row = mysqli_fetch_assoc($sql);
            }
            if(isset($_POST['save'])){
                $idnum                  = $_POST['idnum'];
                $last_name              = mysqli_real_escape_string($connect,$_POST['last_name']);
                $first_name             = mysqli_real_escape_string($connect,$_POST['first_name']);
                $courseyear             = $_POST['courseyear'];
                $mobile_number          = $_POST['mobile_number'];
                $email                  = mysqli_real_escape_string($connect,$_POST['email']);

                $vis_ad_id              = $_POST['vis_ad_id'];
                $vis_date               = $_POST['vis_date'];
                $vis_status             = $_POST['vis_status'];
                $remark_visit           = mysqli_real_escape_string($connect,$_POST['remark_visit']);

                $endorsement            = $_POST['endorsement'];
                $release_endorsement    = $_POST['release_endorsement'];
                $receive_endorsement    = $_POST['receive_endorsement'];
                $remark_endorsement     = mysqli_real_escape_string($connect,$_POST['remark_endorsement']);

                $waiver                 = $_POST['waiver'];
                $release_waiver         = $_POST['release_waiver'];
                $receive_waiver         = $_POST['receive_waiver'];
                $remark_waiver          = mysqli_real_escape_string($connect,$_POST['remark_waiver']);

                $evaluation             = $_POST['evaluation'];
                $release_evaluation     = $_POST['release_evaluation'];
                $receive_evaluation     = $_POST['receive_evaluation'];
                $remark_evaluation      = mysqli_real_escape_string($connect,$_POST['remark_evaluation']);

                $coid                   = $_POST['coid'];
                $ad_id                  = $_POST['ad_id'];

                $company_query          = mysqli_query($connect, "SELECT * from company WHERE coid='$coid'");
                $company_moa            = mysqli_fetch_assoc($company_query);
                $moa                    = $company_moa["moa"];

                if ($endorsement == "yes" && $waiver == "yes" && $moa == "yes")  {
                    $status = "Complete";
                } else {
                    $status = "Incomplete";
                }
                
                $update = mysqli_query($connect, "UPDATE students SET first_name ='$first_name',last_name='$last_name', courseyear='$courseyear', mobile_number='$mobile_number', email='$email', vis_status='$vis_status', remark_visit='$remark_visit', release_evaluation='$release_evaluation', receive_evaluation='$receive_evaluation', remark_evaluation='$remark_evaluation', evaluation='$evaluation', release_endorsement='$release_endorsement', receive_endorsement='$receive_endorsement', remark_endorsement='$remark_endorsement', endorsement='$endorsement', release_waiver='$release_waiver', receive_waiver='$receive_waiver', remark_waiver='$remark_waiver', waiver ='$waiver', coid='$coid', status='$status', idnum='$idnum', ad_id='$ad_id', vis_ad_id='$vis_ad_id', vis_status='$vis_status', vis_date='$vis_date', remark_visit='$remark_visit' WHERE idnum='$idnum'") or die(mysqli_error());
                if($update){
                    header("Location: edit.php?idnum=".$idnum."&message=success");
                }else{
                    echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data could not be saved, please try again.</div>';
                }
            }
            
            if(isset($_GET['message']) == 'success'){
                echo '<div class="alert alert-success" role="alert">
                      <strong><span class = "fa fa-check-circle"></span> Success!</strong> The information on this student has been updated. <a href="index.php" class="alert-link"><span class="fa fa-arrow-circle-left"></span> Go back to list of students.</a>.
                    </div>';
            }
            ?>
            
            <div class="container-fluid">
                <form method="post">
                    <div class="row">
                        <div class="col-md-3">
                            <h2 class="head-title titleFont">Basic Information</h2>
                            <hr class="style-four">

                            <div class="form-group">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label">ID Number</label>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" name="idnum" value="<?php echo $row ['idnum']; ?>" class="form-control" placeholder="ID no." required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label">First Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input maxlength = "35" type="text" class="form-control" name="first_name" value="<?php echo strip_tags(htmlentities($row ['first_name'])); ?>" class="form-control" placeholder="First Name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label">Last Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input maxlength = "35" type="text" class="form-control" name="last_name" value="<?php echo strip_tags(htmlentities($row ['last_name'])); ?>" class="form-control" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label">Course & Year</label>
                                        </div>
                                        <div class="col-sm-5">
                                            <select name="courseyear" class="form-control touch">
                                            <?php
                                                echo "<option value='BSIT 3' ";
                                                if($row ['courseyear'] == 'BSIT 3'){ 
                                                    echo 'selected';
                                                } 
                                                echo ">BSIT-3</option>";
                                                
                                                echo "<option value='BSIT 4' ";
                                                if($row ['courseyear'] == 'BSIT 4'){ 
                                                    echo 'selected';
                                                } 
                                                echo ">BSIT-4</option>";
                                                
                                                echo "<option value='BSCS 3' ";
                                                if($row ['courseyear'] == 'BSCS 3'){ 
                                                    echo 'selected';
                                                } 
                                                echo ">BSCS-3</option>";
                                                
                                                echo "<option value='BSCS 4' ";
                                                if($row ['courseyear'] == 'BSCS 4'){ 
                                                    echo 'selected';
                                                } 
                                                echo ">BSCS-4</option>";
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label">Email</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input maxlength = '45' type="email" class="form-control" name="email" value="<?php echo $row ['email']; ?>" class="form-control" placeholder="Email" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-inline">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label">Mobile Number</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" maxlength = '18' class="form-control" name="mobile_number" value="<?php echo strip_tags(htmlentities($row ['mobile_number'])); ?>" class="form-control" placeholder="Mobile Number" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label">Company Name</label>
                                        </div>
                                        
                                        <div class="col-sm-8">
                                            <select name="coid" class="form-control touch">
                                            <?php
                                            $con = mysqli_query($connect, "SELECT * FROM company ORDER BY coname ASC");
                                            while ($row2 = mysqli_fetch_assoc($con)) {
                                                echo "
                                                <option value='".$row2['coid']."'";
                                                if($row['coid'] == $row2['coid']){ echo 'selected'; } 
                                                echo "
                                                >".$row2['coname']."</option>
                                                ";
                                            }
                                            ?>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label">Type</label>
                                        </div>
                                        
                                        <div class="col-sm-8" style="font-size: 18px">
                                            <?php
                                                if ($row ['typeofcompany'] == "Private") {
                                                    echo "<span class='label label-info'>Private</span>";
                                                } else {
                                                    echo "<span class='label label-primary'>Government</span>";
                                                }
                                                ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label">Adviser</label>
                                        </div>
                                        
                                        <div class="col-sm-8">
                                            <select name="ad_id" class="form-control touch">
                                            <?php
                                            $con = mysqli_query($connect, "SELECT * FROM advisers ORDER BY adviser ASC");
                                            while ($row2 = mysqli_fetch_assoc($con)) {
                                                echo "
                                                <option value='".$row2['ad_id']."'";
                                                if($row['ad_id'] == $row2['ad_id']){ echo 'selected'; } 
                                                echo "
                                                >".$row2['adviser']."</option>
                                                ";
                                            }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> <!--End of Basic information col-md-3-->

                        <div class="col-md-7">
                            <div class="col">

                                <h2 class="head-title black titleFont">Practicum 2 Requirements</h2>
                                <hr class="style-four">

                                <div class="form-group text-center">
                                    <div class="container-fluid">
                                        <div class="row ">
                                            <div class="col-sm-12 pdBottom"> 
                                                <label class="control-label space">Requirement Status</label>
                                                <?php
                                                    if ($row ['endorsement'] == "yes" && $row ['waiver'] == "yes" && $row ['moa'] == "yes")  {
                                                        echo "<span class='label label-success' style='font-size: 13px'>Complete</span>";
                                                        echo  "<input type='hidden' name='status' value='Complete'>";
                                                    } else {
                                                        echo "<span class='label label-warning' style='font-size: 13px'>Incomplete</span>";
                                                        echo  "<input type='hidden' name='status' value='Incomplete'>";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <p class="subLabel"><strong>MOA</strong> <a class="editButton" href = "editcompany.php?coid=<?php echo $row ['coid']; ?>">(edit)</a></p>
                                        <div class="col">
                                            <?php 
                                                if($row['moa'] == 'yes'){
                                                    echo '  
                                                        <span class="glyphicon glyphicon-ok fontGlyphiconOk"></span>
                                                        </a>
                                                        </span><strong>Submitted</strong>
                                                    </td>';
                                                }
                                                else if ($row['moa'] == 'no' ){
                                                    echo '  
                                                        <span class="glyphicon glyphicon-remove fontGlyphiconNo"></span>
                                                        </a>
                                                        </span><strong>Submitted</strong>
                                                    </td>';
                                                }
                                                ?>
                                            <br>
                                            <label class='control-label'>Date Released</label>
                                            <div class="input-group">
                                                <input placeholder="Date of Release" type="text" class="form-control " name="release_moa" value="<?php echo $row ['release_moa']; ?>" class="form-control " readonly>
                                                <span class='input-group-addon touch'><span class='glyphicon glyphicon-calendar'></span>
                                            </div>
                                            <br>

                                            <label class='control-label'>Date Received</label>
                                            <div class="input-group">
                                                <input placeholder="Date Received" type="text" class="form-control" name="receive_moa" value="<?php echo $row ['receive_moa']; ?>" class="form-control" readonly>
                                                <span class='input-group-addon touch'><span class='glyphicon glyphicon-calendar'></span>
                                            </div>
                                            <br>

                                            <label class='control-label'>Remark/s</label>
                                            <textarea  maxlength = '200' rows="5" class="form-control" name="remark_moa" class="form-control" readonly> <?php echo strip_tags(htmlentities($row ['remark_moa'])); ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <p class="subLabel"><strong>Endorsement</strong></p>
                                        <div class="col">
                                            <?php
                                                echo  "<input type='hidden' name='endorsement' value='no'>";
                                                
                                                if ($row ['endorsement'] == 'yes') {
                                                    echo "<input type='checkbox' name='endorsement' value='yes' checked><span class='space'></span><strong>Submitted</strong> <br>";
                                                } 
                                                
                                                if($row ['endorsement'] == 'no') {
                                                    echo "<input type='checkbox' name='endorsement' value='yes'><span class='space'></span><strong>Submitted</strong> <br>";
                                                }   
                                                ?>
                                            <label class='control-label'>Date Released</label>
                                                <div class='input-group date'>
                                                    <input placeholder="Date of Release" type="text" name="release_endorsement" value="<?php echo $row ['release_endorsement']; ?>" class='input-group date form-control touch' date='' data-date-format='date_started' name="receive_endorsement">
                                                    <span class='input-group-addon touch'><span class='glyphicon glyphicon-calendar'></span>
                                                </div>
                                            <br>
                                            <label class='control-label'>Date Received</label>
                                                <div class='input-group date'>
                                                    <input placeholder="Date Received" type="text" class='input-group date form-control touch' date='' data-date-format='date_started' name="receive_endorsement" value="<?php echo $row ['receive_endorsement']; ?>">
                                                    <span class='input-group-addon touch'><span class='glyphicon glyphicon-calendar'></span>
                                                </div>
                                            <br>
                                            <label class='control-label'>Remark/s</label>
                                            <textarea maxlength = '200' rows="5" class="form-control" name="remark_endorsement" class="form-control" placeholder="Remarks"><?php echo strip_tags(htmlentities($row ['remark_endorsement'])); ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <p class="subLabel"><strong>Waiver</strong></p>
                                        <div class="col">
                                            <?php
                                                echo  "<input type='hidden' name='waiver' value='no'>";
                                                
                                                if ($row ['waiver'] == 'yes') {
                                                    echo "<input type='checkbox' name='waiver' value='yes' checked><span class='space'></span><strong>Submitted</strong> <br>";
                                                } 
                                                
                                                if($row ['waiver'] == 'no') {
                                                    echo "<input type='checkbox' name='waiver' value='yes'><span class='space'></span><strong>Submitted</strong> <br>";
                                                }   
                                                ?>
                                            <label class='control-label'>Date Released</label>
                                                <div class='input-group date'>
                                                    <input placeholder="Date of Release" type="text" name="release_waiver" value="<?php echo $row ['release_waiver']; ?>" class='input-group date form-control touch' date='' data-date-format='date_started' name="receive_endorsement"  >
                                                    <span class='input-group-addon touch'><span class='glyphicon glyphicon-calendar'></span>
                                                </div>
                                            <br>
                                            <label class='control-label'>Date Received</label>
                                                <div class='input-group date'>
                                                    <input placeholder="Date Received" type="text" name="receive_waiver" value="<?php echo $row ['receive_waiver']; ?>" class='input-group touch date form-control' date='' data-date-format='date_started' name="receive_endorsement"  >
                                                    <span class='input-group-addon touch'><span class='glyphicon glyphicon-calendar'></span>
                                                </div>
                                            <br>
                                            <label class='control-label'>Remark/s</label>
                                            <textarea maxlength = '200' rows="5" class="form-control" name="remark_waiver" class="form-control" placeholder="Remarks" ><?php echo strip_tags(htmlentities($row ['remark_waiver'])); ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <p class="subLabel"><strong>Evaluation</strong></p>
                                        <div class="col">
                                            <?php
                                                echo  "<input type='hidden' name='evaluation' value='no'>";
                                                
                                                
                                                if ($row ['evaluation'] == 'yes') {
                                                    echo "<input type='checkbox' name='evaluation' value='yes' checked><span class='space'></span><strong>Submitted</strong> <br>";
                                                } 
                                                
                                                if($row ['evaluation'] == 'no') {
                                                    echo "<input type='checkbox' name='evaluation' value='yes'><span class='space'></span><strong>Submitted</strong> <br>";
                                                }   
                                                ?>
                                            <label class='control-label'>Date Released</label>
                                                <div class='input-group date'>
                                                    <input placeholder="Date of Release" type="text" name="release_evaluation" value="<?php echo $row ['release_evaluation']; ?>" class='touch input-group date form-control' date='' data-date-format='date_started' name="receive_endorsement">
                                                    <span class='input-group-addon touch'><span class='glyphicon glyphicon-calendar'></span>
                                                </div>
                                            <br>
                                            <label class='control-label'>Date Received</label>
                                            <div class='input-group date'>
                                                    <input placeholder="Date Received" type="text" name="receive_evaluation" value="<?php echo $row ['receive_evaluation']; ?>" class='touch input-group date form-control' date='' data-date-format='date_started' name="receive_endorsement">
                                                    <span class='input-group-addon touch'><span class='glyphicon glyphicon-calendar'></span>
                                                </div>
                                            <br>
                                            <label class='control-label'>Remark/s</label>
                                            <textarea maxlength = '200' rows="5" class="form-control" placeholder="Remarks" name="remark_evaluation" class="form-control"><?php echo strip_tags(htmlentities($row ['remark_evaluation'])); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> <!--End of practicum 2 requirements col-md-9-->
                    

                    <div class="col-md-2">
                        <div class="row">
                            
                            <h2 class="head-title black titleFont">Visit</h2>
                            <hr class="style-four">

                            <div class="form-group text-center">
                                    <div class="container-fluid">
                                        <div class="row ">
                                            <div class="col-sm-12 pdBottom"> 
                                                <label class="control-label space">Visit Status</label>
                                                <?php
                                                    if ($row ['vis_status'] == "yes")  {
                                                        echo "<span class='label label-success' style='font-size: 13px'>Done</span>";
                                                    } else {
                                                        echo "<span class='label label-warning' style='font-size: 13px'>Pending</span>";
                                                        echo  "<input type='hidden' name='status' value='Incomplete'>";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                <p class="subLabel"><strong>Advisory Visit</strong></p>
                                    <div class="col">
                                        <?php
                                            echo  "<input type='hidden' name='vis_status' value='no'>";

                                            if ($row ['vis_status'] == 'yes') {
                                                echo "<input type='checkbox' name='vis_status' value='yes' checked><span class='space'></span><strong>Visited</strong><br>";
                                            } 
                                            else if ($row ['vis_status'] == 'no') {
                                                echo "<input type='checkbox' name='vis_status' value='yes'><span class='space'></span><strong>Visited</strong> <br>";
                                            }   
                                        ?>
                                        <label class='control-label'>Visiting Adviser</label>
                                        <select name="vis_ad_id" class="form-control touch">
                                            <?php
                                            $con = mysqli_query($connect, "SELECT * FROM advisers ORDER BY adviser ASC");
                                            while ($row2 = mysqli_fetch_assoc($con)) {
                                                echo "
                                                <option value='".$row2['ad_id']."'";
                                                if($row['vis_ad_id'] == $row2['ad_id']){ echo 'selected'; } 
                                                echo "
                                                >".$row2['adviser']."</option>
                                                ";
                                            }
                                            ?>
                                        </select>
                                        <br>
                                        <label class='control-label'>Date of Visit</label>
                                        <div class='input-group date'>
                                            <input type='text' name='vis_date'  value = "<?php echo $row ['vis_date']; ?>" class='input-group date form-control touch' date='' data-date-format='date_started' placeholder = 'Date of Visit'>
                                            <span class='input-group-addon touch'><span class='glyphicon glyphicon-calendar'></span>
                                        </div>
                                        <br>
                                        <label class='control-label'>Remarks</label>
                                        <textarea maxlength = '200' rows='5' name='remark_visit' class='form-control' placeholder = 'Input remarks...'><?php echo strip_tags(htmlentities($row ['remark_visit'])); ?></textarea>
                                        <br>
                                    </div>
                                </div>
                        </div>
                    </div> <!--End of Visit col-md-2-->

                    </div> <!--End of row-->
                    <div class="form-group text-center">
                                <button type="submit" name="save" class="btn btn-md btn-success disableHighlight" value="Save"><span class="fa fa-save space"></span>Save</button>
                                <a href="index.php" class="btn btn-md btn-danger disableHighlight"><span class="fa fa-times space"></span>Cancel</a>
                            </div>
                </form>
            </div> <!--End of Form Container Fluid-->

        </div> <!--End of Main Container Fluid-->
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
    <script src="js/alertFade.js"></script>
    <script src="js/dropdown.js"></script>

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