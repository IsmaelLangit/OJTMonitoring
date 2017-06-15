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
    <link rel="stylesheet" type="text/css" href="css/preloader.css">

    <link rel="icon" href="img/scisLogo.png">
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
                            <a href="index.php" class="navbar-brand"><img class="logoNav img-responsive" src="img/Picture1.png"></a>
                        </div>
                        <div class="collapse navbar-collapse navbar-right" id="mynavbar">
                            <ul class="nav navbar-nav">
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
            <div class="container text-center">
                <div class="wrapper wow fadeInUp delay-05s " >
                    <h2 class="top-title">List of Practicum 2 Students</h2>
                    <h3 class="title">Addition</h3>
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
            if(isset($_POST['add'])){
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
                
                $con = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE idnum='$idnum'");
                if(mysqli_num_rows($con) == 0){
                    $insert = mysqli_query($connect, "INSERT INTO students(idnum, last_name, first_name, courseyear, mobile_number, email, release_endorsement, receive_endorsement, remark_endorsement, endorsement, release_waiver, receive_waiver, remark_waiver, waiver,  release_moa, receive_moa, remark_moa, moa,  release_evaluation, receive_evaluation, remark_evaluation, evaluation, coid, status)
                                                            VALUES('$idnum','$last_name', '$first_name','$courseyear','$mobile_number','$email', '$release_endorsement', '$receive_endorsement', '$remark_endorsement', '$endorsement', '$release_waiver', '$receive_waiver', '$remark_waiver', '$waiver', '$release_moa', '$receive_moa', '$remark_moa', '$moa', '$release_evaluation', '$receive_evaluation', '$remark_evaluation','$evaluation','$coid','$status')") or die('Error: ' . mysqli_error($connect));
                    if($insert){
                            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Student has been Successfully Added !</div>';
                        }else{
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ID no.</div>';
                        }
                    
                }
                
            }
            ?>

            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="col-md-9">

                        <form class="form-horizontal margin-top margin-bottom well" action="" method="post">

                        <h2 class="head-title black titleFont">Basic Information</h2>
                        <hr class="style-four">

                            <div class="form-group">
                                <label class="col-sm-4 control-label">ID Number</label>
                                <div class="col-sm-8">
                                    <input type="number" name="idnum" class="form-control" placeholder="0000000" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">First Name</label>
                                <div class="col-sm-8">
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Last Name</label>
                                <div class="col-sm-8">
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Course & Year</label>
                                <div class="col-sm-8">
                                    <select name="courseyear" class="form-control">
                                        <option value="BSIT 3">BSIT-3</option>
                                        <option value="BSIT 4">BSIT-4</option>
                                        <option value="BSCS 3">BSCS-3</option>
                                        <option value="BSCS 4">BSCS-4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Mobile Number</label>
                                <div class="col-sm-8">
                                    <input type="number" name="mobile_number" class="form-control" placeholder="09000000000" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Company Name</label>
                                <div class="col-sm-8">
                                    <select name="coid" class="form-control">
                                    <option value='1'>No current company</option>
                                    <?php
                                        $con = mysqli_query($connect, "SELECT * FROM company ORDER BY coname ASC");
                                        while ($row = mysqli_fetch_assoc($con)) {
                                            echo "<option value='".$row["coid"]."'>".$row["coname"]."</option>";
                                        }
                                        echo "</select>";
                                        ?>
                                </div>
                            </div>

                        <h2 class="head-title black titleFont">Practicum 2 Requirements</h2>
                        <hr class="style-four">

                            <div class="form-group">
                                <label class="col-sm-4 control-label subLabel">Endorsement</label>
                                <div class="col-sm-8">
                                    <?php
                                        echo  "<input type='hidden' name='endorsement' value='no'>";
                                        
                                        echo  "<input type='checkbox' name='endorsement' value='yes'><label class='control-label'> <span class='space'></span> Submitted</label> <br>" ;
                                        echo  "<label class='control-label'>Date Released</label><input type='text' name='release_endorsement' class='input-group date form-control' date='' data-date-format='release_endorsement''><br>" ;
                                        echo  "<label class='control-label'>Date Received</label><input type='text' name='receive_endorsement' class='input-group date form-control' date='' data-date-format='date_started''><br>" ;
                                        echo  "<label class='control-label'>Remarks</label><input type='text' name='remark_endorsement' class='form-control' placeholder = 'Input remarks...'><br>" ;
                                        ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label subLabel">Waiver</label>
                                <div class="col-sm-8">
                                    <?php
                                        echo  "<input type='hidden' name='waiver' value='no'>";
                                        
                                        echo  "<input type='checkbox' name='waiver' value='yes'><label class='control-label'> <span class='space'></span> Submitted</label> <br>" ;
                                        echo  "<label class='control-label'>Date Released</label><input type='text' name='release_endorsement' class='input-group date form-control' date='' data-date-format='release_waiver''><br>" ;
                                        echo  "<label class='control-label'>Date Received</label><input type='text' name='receive_waiver' class='input-group date form-control' date='' data-date-format='date_started''><br>" ;
                                        echo  "<label class='control-label'>Remarks</label><input type='text' name='remark_waiver' class='form-control' placeholder = 'Input remarks...'><br>" ;
                                        ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label subLabel">Memorandum of Agreement</label>
                                <div class="col-sm-8">
                                    <?php
                                        echo  "<input type='hidden' name='moa' value='no'>";
                                        
                                        echo  "<input type='checkbox' name='moa' value='yes'><label class='control-label'> <span class='space'></span> Submitted</label> <br>" ;
                                        echo  "<label class='control-label'>Date Released</label><input type='text' name='release_moa' class='input-group date form-control' date='' data-date-format='release_endorsement''><br>" ;
                                        echo  "<label class='control-label'>Date Received</label><input type='text' name='receive_moa' class='input-group date form-control' date='' data-date-format='date_started''><br>" ;
                                        echo  "<label class='control-label'>Remarks</label><input type='text' name='remark_moa' class='form-control' placeholder = 'Input remarks...'><br>" ;
                                        ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label subLabel">Evaluation</label>
                                <div class="col-sm-8">
                                    <?php
                                        echo  "<input type='hidden' name='evaluation' value='no'>";
                                        
                                        echo  "<input type='checkbox' name='evaluation' value='yes'><label class='control-label'> <span class='space'></span> Submitted</label> <br>" ;
                                        echo  "<label class='control-label'>Date Released</label><input type='text' name='release_evaluation' class='input-group date form-control' date='' data-date-format='release_evaluation''><br>" ;
                                        echo  "<label class='control-label'>Date Received</label><input type='text' name='receive_evaluation' class='input-group date form-control' date='' data-date-format='date_started''><br>" ;
                                        echo  "<label class='control-label'>Remarks</label><input type='text' name='remark_evaluation' class='form-control' placeholder = 'Input remarks...'><br>" ;
                                        ?>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-4 control-label"></label>
                                <div class="col-sm-8">
                                    <?php
                                        if ($row ['endorsement'] == "yes" && $row ['waiver'] == "yes" && $row ['moa'] == "yes")  {
                                            echo  "<input type='hidden' name='status' value='Complete' checked>";
                                        } else {
                                            echo  "<input type='hidden' name='status' value='Incomplete' checked>";
                                        }
                                        ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">&nbsp;</label>
                                <div class="col-sm-8">
                                    <input type="submit" name="add" class="btn btn-sm btn-success" value="Submit">
                                    <a href="index.php" class="btn btn-sm btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-3">
                        <img class="img-responsive text-center center-block addPicture" src="img/1486485564-add-character-include-more-person-user_81147.png">
                    </div>

        </div> <!--End of Container Fluid-->
    </section>
    <!---->
    <!---->
    <footer class="footer-distributed footer">
            <div class="footer-left">
                <img class="footerLogo img-responsive" src="img/Picture1.png">
                <p class="footer-links">
                    <a href="#">Home</a>
                    |
                    <a href="#">Students</a>
                    |
                    <a href="#">Company</a>
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