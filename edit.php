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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/preloader.css">

    <link rel="icon" href="img/Logo.png">
  </head>
  <body>
    <!--header-->
    <header class="main-header" id="header">
        <div class="bg-color">
            <!--nav-->
            <nav class="nav navbar-default navbar-fixed-top">
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
                                <li><a href="index.php">List of Students</a></li>
                                <li><a href="add.php">Add Student</a></li>
                                <li><a href="company.php">list of Companies</a></li>
                                <li><a href="addcompany.php">Add Company</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!--/ nav-->
            <div class="container text-center">
                <div class="wrapper wow fadeInUp delay-05s " >
                    <h2 class="top-title">Edit</h2>
                    <h2 class="title">
                        <?php 
                            $idnum = $_GET['idnum'];
                            $sql = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE idnum='$idnum'");
                            $row = mysqli_fetch_assoc($sql);
                            echo $row ['last_name']."'s";
                        ?> 
                    </h2>
                    <h3 class="top-title">Details</h3>
                </div>
            </div>
        </div>
    </header>
    <!--/ header-->
    <!---->
    <section class="section-padding">
        <div class="container-fluid">

            <a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>

            <?php
            $idnum = $_GET['idnum'];
            $sql = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE idnum='$idnum'");
            if(mysqli_num_rows($sql) == 0){
                header("Location: index.php");
            }else{
                $row = mysqli_fetch_assoc($sql);
            }
            if(isset($_POST['save'])){
                $idnum           = $_POST['idnum'];
                $last_name           = $_POST['last_name'];
                $first_name          = $_POST['first_name'];
                $courseyear      = $_POST['courseyear'];
                $mobile_number       = $_POST['mobile_number'];
                $email       = $_POST['email'];

                $endorsement         = $_POST['endorsement'];
                $release_endorsement         = $_POST['release_endorsement'];
                $receive_endorsement         = $_POST['receive_endorsement'];
                $remark_endorsement      = $_POST['remark_endorsement'];

                $waiver      = $_POST['waiver'];
                $release_waiver      = $_POST['release_waiver'];
                $receive_waiver      = $_POST['receive_waiver'];
                $remark_waiver     = $_POST['remark_waiver'];

            

                $moa         = $_POST['moa'];
                $release_moa         = $_POST['release_moa'];
                $receive_moa         = $_POST['receive_moa'];
                $remark_moa     = $_POST['remark_moa'];

                $evaluation      = $_POST['evaluation'];
                $release_evaluation      = $_POST['release_evaluation'];
                $receive_evaluation      = $_POST['receive_evaluation'];
                $remark_evaluation     = $_POST['remark_evaluation'];

                $coid        = $_POST['coid'];
                $status          = $_POST['status'];

                if ($endorsement == "yes" && $waiver == "yes" && $moa == "yes")  {
                    $status = "Complete";
                } else {
                    $status = "Incomplete";
                }
                
                $update = mysqli_query($connect, "UPDATE students SET first_name ='$first_name',last_name='$last_name', courseyear='$courseyear', release_evaluation='$release_evaluation', receive_evaluation='$receive_evaluation', remark_evaluation='$remark_evaluation', evaluation='$evaluation', release_endorsement='$release_endorsement', receive_endorsement='$receive_endorsement', remark_endorsement='$remark_endorsement', endorsement='$endorsement', release_waiver='$release_waiver', receive_waiver='$receive_waiver', remark_waiver='$remark_waiver', waiver ='$waiver', release_moa='$release_moa', receive_moa='$receive_moa', remark_moa='$remark_moa',  moa='$moa', coid='$coid', status='$status', idnum='$idnum' WHERE idnum='$idnum'") or die(mysqli_error());
                if($update){
                    header("Location: edit.php?idnum=".$idnum."&message=success");
                }else{
                    echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data could not be saved, please try again.</div>';
                }
            }
            
            if(isset($_GET['message']) == 'success'){
                echo '<div class="alert alert-success" role="alert">
                                  <strong> Success!</strong> You have successfully updated the information on this student.  <a href="index.php" class="alert-link">Go back to list of students.</a>.
                                </div>';
            }
            ?>
            
            <div class="col-md-8 well">
                
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">ID Number</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="idnum" value="<?php echo $row ['idnum']; ?>" class="form-control" placeholder="ID no." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">First Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="first_name" value="<?php echo $row ['first_name']; ?>" class="form-control" placeholder="First Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Last Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="last_name" value="<?php echo $row ['last_name']; ?>" class="form-control" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Course & Year</label>
                        <div class="col-sm-2">
                            <select name="courseyear" class="form-control">
                                <option value="<?php echo $row ['courseyear']; ?>"><?php echo $row ['courseyear']; ?></option>
                                ";
                                <?php
                                    if ($row ['courseyear'] == 'BSIT 3') {
                                        echo "<option value='BSIT 4'>BSIT-4</option>";
                                        echo "<option value='BSCS 3'>BSCS-3</option>";
                                        echo "<option value='BSCS 4'>BSCS-4</option>";
                                    } else if ($row ['courseyear'] == 'BSIT 4') {
                                        echo "<option value='BSIT 3'>BSIT-3</option>";
                                        echo "<option value='BSCS 3'>BSCS-3</option>";
                                        echo "<option value='BSCS 4'>BSCS-4</option>";
                                    } else if ($row ['courseyear'] == 'BSCS 3') {
                                        echo "<option value='BSIT 3'>BSIT-3</option>";
                                        echo "<option value='BSIT 4'>BSIT-4</option>";
                                        echo "<option value='BSCS 4'>BSCS-4</option>";
                                    } else if ($row ['courseyear'] == 'BSCS 4') {
                                        echo "<option value='BSIT 3'>BSIT-3</option>";
                                        echo "<option value='BSIT 4'>BSIT-4</option>";
                                        echo "<option value='BSCS 3'>BSCS-3</option>";
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" name="email" value="<?php echo $row ['email']; ?>" class="form-control" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Mobile No.</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="mobile_number" value="<?php echo $row ['mobile_number']; ?>" class="form-control" placeholder="Mobile Number" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Endorsement</label>
                        <div class="col-sm-4">
                            <?php
                                echo  "<input type='hidden' name='endorsement' value='no'>";
                                
                                
                                if ($row ['endorsement'] == 'yes') {
                                    echo "<input type='checkbox' name='endorsement' value='yes' checked><span class='space'></span>Submitted <br>";
                                } 
                                
                                if($row ['endorsement'] == 'no') {
                                    echo "<input type='checkbox' name='endorsement' value='yes'><span class='space'></span>Submitted <br>";
                                }   
                          ?>
                            <input type="text" class="form-control" name="release_endorsement" value="<?php echo $row ['release_endorsement']; ?>" class="form-control" placeholder="Date release">
                            <input type="text" class="form-control" name="receive_endorsement" value="<?php echo $row ['receive_endorsement']; ?>" class="form-control" placeholder="Date release">
                            <input type="text" class="form-control" name="remark_endorsement" value="<?php echo $row ['remark_endorsement']; ?>" class="form-control" placeholder="Date release">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Waiver</label>
                        <div class="col-sm-4">
                            <?php
                                echo  "<input type='hidden' name='waiver' value='no'>";
                                
                                
                                if ($row ['waiver'] == 'yes') {
                                    echo "<input type='checkbox' name='waiver' value='yes' checked><span class='space'></span>Submitted <br>";
                                } 
                                
                                if($row ['waiver'] == 'no') {
                                    echo "<input type='checkbox' name='waiver' value='yes'><span class='space'></span>Submitted <br>";
                                }   
                          ?>
                            <input type="text" class="form-control" name="release_waiver" value="<?php echo $row ['release_waiver']; ?>" class="form-control" placeholder="Date release">
                            <input type="text" class="form-control" name="receive_waiver" value="<?php echo $row ['receive_waiver']; ?>" class="form-control" placeholder="Date release">
                            <input type="text" class="form-control" name="remark_waiver" value="<?php echo $row ['remark_waiver']; ?>" class="form-control" placeholder="Date release">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Memorandum of Agreement</label>
                        <div class="col-sm-4">
                            <?php
                                echo  "<input type='hidden' name='moa' value='no'>";
                                
                                
                                if ($row ['moa'] == 'yes') {
                                    echo "<input type='checkbox' name='moa' value='yes' checked><span class='space'></span>Submitted <br>";
                                } 
                                
                                if($row ['moa'] == 'no') {
                                    echo "<input type='checkbox' name='moa' value='yes'><span class='space'></span>Submitted <br>";
                                }   
                          ?>
                            <input type="text" class="form-control" name="release_moa" value="<?php echo $row ['release_moa']; ?>" class="form-control" placeholder="Date release">
                            <input type="text" class="form-control" name="receive_moa" value="<?php echo $row ['receive_moa']; ?>" class="form-control" placeholder="Date release">
                            <input type="text" class="form-control" name="remark_moa" value="<?php echo $row ['remark_moa']; ?>" class="form-control" placeholder="Date release">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Evaluation</label>
                        <div class="col-sm-4">
                            <?php
                                echo  "<input type='hidden' name='evaluation' value='no'>";
                                
                                
                                if ($row ['evaluation'] == 'yes') {
                                    echo "<input type='checkbox' name='evaluation' value='yes' checked><span class='space'></span>Submitted <br>";
                                } 
                                
                                if($row ['evaluation'] == 'no') {
                                    echo "<input type='checkbox' name='evaluation' value='yes'><span class='space'></span>Submitted <br>";
                                }   
                          ?>
                            <input type="text" class="form-control" name="release_evaluation" value="<?php echo $row ['release_evaluation']; ?>" class="form-control" placeholder="Date release">
                            <input type="text" class="form-control" name="receive_evaluation" value="<?php echo $row ['receive_evaluation']; ?>" class="form-control" placeholder="Date release">
                            <input type="text" class="form-control" name="remark_evaluation" value="<?php echo $row ['remark_evaluation']; ?>" class="form-control" placeholder="Date release">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Company Name</label>
                        <div class="col-sm-3">
                            <select name="coid" class="form-control">
                            <option value="<?php echo $row ['coid']; ?>"><?php echo $row ['coname']; ?></option>
                            ";
                            <?php
                                $con = mysqli_query($connect, "SELECT * FROM company ORDER BY coname ASC");
                                while ($row2 = mysqli_fetch_assoc($con)) {
                                    if($row ['coid'] != $row2 ['coid'])
                                    echo "<option value='".$row2["coid"]."'>".$row2["coname"]."</option>";
                                }
                                echo "</select>";
                                ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Type of OJT</label>
                        <div class="col-sm-2">
                            <?php
                                if ($row ['typeofojt'] == "In-house") {
                                    echo "<span class='label label-info'>In-house</span>";
                                } else {
                                    echo "<span class='label label-primary'>Company-based</span>";
                                }
                                ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Requirement Status</label>
                        <div class="col-sm-2">
                            <?php
                                if ($row ['endorsement'] == "yes" && $row ['waiver'] == "yes" && $row ['moa'] == "yes")  {
                                    echo "<span class='label label-success'>Complete</span>";
                                    echo  "<input type='hidden' name='status' value='Complete'>";
                                } else {
                                    echo "<span class='label label-warning'>Incomplete</span>";
                                    echo  "<input type='hidden' name='status' value='Incomplete'>";
                                }
                                ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">&nbsp;</label>
                        <div class="col-sm-6">
                            <input type="submit" name="save" class="btn btn-sm btn-success" value="Save">
                            <a href="index.php" class="btn btn-sm btn-danger">Cancel</a>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-md-4">
                <img class="text-center center-block img-responsive" src="img/edit.png">
            </div>
            
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
                <p class="footer-company-name">OJT 2 Monitoring &copy; 2017</p>
            </div>
            <div class="footer-center">
                <div>
                    <i class="fa fa-map-marker"></i>
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
    <!-- end-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/smoothScroll.js"></script>
    <script src="js/filter.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/preloader.js"></script>


    <script>
    $('.date').datepicker({
        format: 'yyyy-mm-dd',
    })
    </script>
    
  </body>
</html>