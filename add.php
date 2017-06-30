<?php
    include("connect.php");
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add Student</title>
        <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        <link rel="icon" href="img/scisLogo.png">
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
                                <li><a href="index.php">List of Students</a></li>
                                <li class="active"><a href="add.php">Add Student</a></li>
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
                <h1 class="top-title"><span class="title">Add </span>a Student</h1>
                <hr>
            </div>

            <a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>

            <?php
            if(isset($_POST['add'])){
                $idnum           = $_POST['idnum'];
                $last_name           = mysqli_real_escape_string($connect,$_POST['last_name']);
                $first_name          = mysqli_real_escape_string($connect,$_POST['first_name']);
                $courseyear      = $_POST['courseyear'];
                $mobile_number       = $_POST['mobile_number'];

                $email       = mysqli_real_escape_string($connect,$_POST['email']);

                $endorsement         = $_POST['endorsement'];
                $release_endorsement         = $_POST['release_endorsement'];
                $receive_endorsement         = $_POST['receive_endorsement'];
                $remark_endorsement      = mysqli_real_escape_string($connect,$_POST['remark_endorsement']);

                $waiver      = $_POST['waiver'];
                $release_waiver      = $_POST['release_waiver'];
                $receive_waiver      = $_POST['receive_waiver'];
                $remark_waiver     = mysqli_real_escape_string($connect,$_POST['remark_waiver']);

                $evaluation      = $_POST['evaluation'];
                $release_evaluation      = $_POST['release_evaluation'];
                $receive_evaluation      = $_POST['receive_evaluation'];
                $remark_evaluation     = mysqli_real_escape_string($connect,$_POST['remark_evaluation']);

                $coid        = $_POST['coid'];

 
                $con = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE idnum='$idnum'");

                if(mysqli_num_rows($con) == 0){
                    $company_query = mysqli_query($connect, "SELECT * from company WHERE coid='$coid'");
                    $company_moa = mysqli_fetch_assoc($company_query);
                    $moa  = $company_moa["moa"];
                    if ($endorsement == "yes" && $waiver == "yes" && $moa == "yes")  {
                        $status = "Complete";
                    } else {
                        $status = "Incomplete";
                    }
                
                    $insert = mysqli_query($connect, "INSERT INTO students(idnum, last_name, first_name, courseyear, mobile_number, email, release_endorsement, receive_endorsement, remark_endorsement, endorsement, release_waiver, receive_waiver, remark_waiver, waiver, release_evaluation, receive_evaluation, remark_evaluation, evaluation, coid, status)
                                                            VALUES('$idnum','$last_name', '$first_name','$courseyear','$mobile_number','$email', '$release_endorsement', '$receive_endorsement', '$remark_endorsement', '$endorsement', '$release_waiver', '$receive_waiver', '$remark_waiver', '$waiver', '$release_evaluation', '$receive_evaluation', '$remark_evaluation','$evaluation','$coid','$status')") or die('Error: ' . mysqli_error($connect));
                    if($insert){
                            echo '<div class="alert alert-success" role="alert">
                                  <span class = "fa fa-check-circle"></span><strong> Success!</strong> You have successfully added this student.  <a href="index.php" class="alert-link">Go back to list of students.</a>.
                                </div>';
                    } 
                    
                } else {
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong> <span class="fa fa-check-circle-o"></span> Sorry! </strong> The student you are adding <strong> already exists in the database. </strong></div>';
                    }
                
            }
            ?>

            <div class="container-fluid">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-3">
                        
                            <h2 class="head-title titleFont">Basic Information</h2>
                            <hr class="style-four">
                            <div class="form-group">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-4 text-right">
                                            <label class="control-label">ID Number</label>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="number" name="idnum" class="form-control" placeholder="2100000" size="7" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-4 text-right">
                                            <label class="control-label">First Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-4 text-right">
                                            <label class="control-label">Last Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-4 text-right">
                                            <label class="control-label">Course & Year</label>
                                        </div>
                                        <div class="col-sm-5">
                                            <select name="courseyear" class="form-control touch">
                                                <option value="BSIT 3">BSIT-3</option>
                                                <option value="BSIT 4">BSIT-4</option>
                                                <option value="BSCS 3">BSCS-3</option>
                                                <option value="BSCS 4">BSCS-4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-4 text-right">
                                            <label class="control-label">Email</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input maxlength = '45' type="email" name="email" class="form-control" placeholder="Email" maxlength = "100" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-4 text-right">
                                            <label class="control-label">Mobile Number</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input maxlength = "18" type="text" name="mobile_number" class="form-control" placeholder="Mobile Number">

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-4 text-right">
                                            <label class="control-label">Company Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select name="coid" class="form-control touch">
                                                <option value='1'>No current company</option>
                                                <?php
                                                    $con = mysqli_query($connect, "SELECT * FROM company ORDER BY coname ASC");
                                                    while ($row = mysqli_fetch_assoc($con)) {
                                                        echo "<option value='".$row["coid"]."'>".htmlentities($row["coname"])."</option>";
                                                    }
                                                    echo "</select>";
                                                    ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div> <!--end of basic information col-md-6-->

                    <div class="col-md-9">
                        <div class="row">

                            <h2 class="head-title black titleFont">Practicum 2 Requirements</h2>
                            <hr class="style-four">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <p class="subLabel"><strong>Endorsement</strong></p>
                                    <div class="col">
                                        <?php
                                            echo  " <input type='hidden' name='endorsement' value='no'>";
                                            
                                            echo  " <input type='checkbox' name='endorsement' value='yes'>
                                                    <label class='control-label'> <span class='space'></span> Submitted</label> <br>" ;
                                            
                                            echo  " <label class='control-label'>Date Released</label>
                                                    <input type='text' name='release_endorsement' class='input-group date form-control touch' date='' data-date-format='release_endorsement' placeholder ='Date of Release'>
                                            
                                                    <br>" ;
                                            
                                            echo  " <label class='control-label'>Date Received</label>
                                                    <input type='text' name='receive_endorsement' class='input-group date form-control touch' date='' data-date-format='date_started' placeholder = 'Date Received'>
                                                    <br>" ;
                                            
                                            echo  " <label class='control-label'>Remarks</label>
                                                    <textarea maxlength = '200' rows='5' name='remark_endorsement' class='form-control' placeholder = 'Input remarks'></textarea>
                                                    <br>" ;
                                        ?>
                                    </div>
                                </div>
                            </div> <!--End of col for Endorsement-->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <p class="subLabel"><strong>Waiver</strong></p>
                                    <div class="col">
                                        <?php
                                            echo  "<input type='hidden' name='waiver' value='no'>";
                                            
                                            echo  "<input type='checkbox' name='waiver' value='yes'><label class='control-label'> <span class='space'></span> Submitted</label> <br>" ;
                                            echo  "<label class='control-label'>Date Released</label><input type='text' name='release_waiver' class='input-group date form-control touch' date='' data-date-format='release_waiver' placeholder ='Date of Release'><br>" ;
                                            echo  "<label class='control-label'>Date Received</label><input type='text' name='receive_waiver' class='input-group date form-control touch' date='' data-date-format='date_started' placeholder = 'Date Received'><br>" ;
                                            echo  "<label class='control-label'>Remarks</label>
                                                <textarea maxlength = '200' rows='5' name='remark_waiver' class='form-control' placeholder = 'Input remarks'></textarea><br>" ;
                                            ?>
                                    </div>
                                </div>
                            </div> <!--End of col for Waiver-->

                            <div class="col-md-4">
                                <div class="form-group">
                                <p class="subLabel"><strong>Evaluation</strong></p>
                                <div class="col">
                                    <?php
                                        echo  "<input type='hidden' name='evaluation' value='no'>";
                                        
                                        echo  "<input type='checkbox' name='evaluation' value='yes'><label class='control-label'> <span class='space'></span> Submitted</label> <br>" ;
                                        echo  "<label class='control-label'>Date Released</label><input type='text' name='release_evaluation' class='input-group date form-control touch' date='' data-date-format='release_evaluation' placeholder ='Date of Release'><br>" ;
                                        echo  "<label class='control-label'>Date Received</label><input type='text' name='receive_evaluation' class='input-group date form-control touch' date='' data-date-format='date_started' placeholder = 'Date Received'><br>" ;
                                        echo  "<label class='control-label'>Remarks</label>
                                            <textarea maxlength = '200' rows='5' name='remark_evaluation' class='form-control' placeholder = 'Input remarks...'></textarea><br>" ;
                                        ?>
                                </div>
                                </div>
                            </div> <!--End of col for Evaluation-->

                        </div> <!--End of ROW-->
                    </div> <!--end of practicum 2 requirements col-md-6-->
                    <div class="form-group text-center">
                        <div class="col">
                            <input type="submit" name="add" class="btn btn-md btn-success" value="Add Student">
                            <a href="index.php" class="btn btn-md btn-danger">Cancel</a>
                        </div>
                    </div>
                </form>
                </div>
            </div> <!--End of Container Fluid-->

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
    <script src="js/bootstrap-notify.min.js"></script>
    <script type="js/Gruntfile.js"></script>


    <script>
    $('.date').datepicker({
        format: 'MM dd yyyy',
    })
    </script>
    
  </body>
</html>