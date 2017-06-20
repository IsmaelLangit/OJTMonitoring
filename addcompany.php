<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Company</title>
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
                            <ul class="nav navbar-nav">
                                <li><a href="index.php">List of Students</a></li>
                                <li><a href="add.php">Add Student</a></li>
                                <li><a href="company.php">list of Companies</a></li>
                                <li class="active"><a href="addcompany.php">Add Company</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!--/ nav-->
            <div class="container text-center">
                <div class="wrapper wow fadeIn delay-05s " >
                    <h2 class="top-title">Company</h2>
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
                $coname          = mysqli_real_escape_string($connect, $_POST['coname']);
                $coaddress           = mysqli_real_escape_string($connect,$_POST['coaddress']);
                $company_head        = mysqli_real_escape_string($connect,$_POST['company_head']);
                $position        = mysqli_real_escape_string($connect,$_POST['position']);
                $typeofojt       = mysqli_real_escape_string($connect,$_POST['typeofojt']);
                $typeofcompany       = mysqli_real_escape_string($connect,$_POST['typeofcompany']);
               
                $con = mysqli_query($connect, "SELECT * from company WHERE coname='$coname'");
                if(mysqli_num_rows($con) == 0){
                    $insert = mysqli_query($connect, "INSERT INTO company(coname, coaddress, company_head, position, typeofojt, typeofcompany)
                                                            VALUES('$coname','$coaddress', '$company_head','$position','$typeofojt' ,'$typeofcompany')") or die('Error: ' . mysqli_error($connect));
                    if($insert){
                            echo '<div class="alert alert-success" role="alert">
                                  <span class = "fa fa-check-circle"></span><strong> Success!</strong> You have successfully added this company  <a href="company.php" class="alert-link">Go back to list of companies.</a>.
                                </div>';
                        }else{
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ID no.</div>';
                        }
                    
                }
                
            }
            ?>

            <div class="container">
                <form class="form-horizontal well padding-top padding-bottom" action="" method="post">
                <div class="row">

                    <div class="col-md-9 ">

                        
                            <div class="form-group">
                                <div class="container">
                                    <div class="row">
                                        <label class="col-sm-2 control-label">Company Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="coname" class="form-control" placeholder="Company name..." required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="container">
                                    <div class="row">
                                        <label class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="coaddress" class="form-control" placeholder="Address.." required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="container">
                                    <div class="row">
                                        <label class="col-sm-2 control-label">Company Head</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="company_head" class="form-control" placeholder="Company head..">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="container">
                                    <div class="row">
                                        <label class="col-sm-2 control-label">Position</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="position" class="form-control" placeholder="Position..">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="container">
                                    <div class="row">
                                        <label class="col-sm-2 control-label">Type</label>
                                        <div class="col-sm-6">
                                            <select name="typeofojt" class="form-control">
                                                <option value="Company-based">Company-Based</option>
                                                <option value="In-house">In-House</option>
                                            </select>
                                            <br>
                                            <select name="typeofcompany" class="form-control">
                                                <option value="Government">Government</option>
                                                <option value="Private">Private</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="container">
                                    <div class="row">
                                        <label class="col-sm-2 control-label">&nbsp;</label>
                                        <div class="col-sm-6">
                                            <input type="submit" name="add" class="btn btn-md btn-success" value="Add">
                                            <a href="index.php" class="btn btn-md btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="col-md-3">
                        <img class="img-responsive center-block addPicture" src="img/0af0e35a05b3955209dd049fd0a974f5.png">
                    </div>
                </div>
            </form>
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
                <p class="footer-company-name">&copy; Designed by OJT2 2017</p>
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