<?php
include("connect.php");
?>
<!DOCTYPE html>
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
    <link rel="stylesheet" type="text/css" href="css/preloader.css">

    <link rel="icon" href="img/scisLogo.png">
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
                        <div class="collapse navbar-collapse navbar-right borderXwidth"  id="mynavbar">
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
            <div class="container-fluid text-center">
                <div class="wrapper wow fadeIn delay-05s " >
                    <h2 class="top-title">Edit</h2>
                    <h2 class="companytitle">
                        <?php 
                            $coid = $_GET['coid'];
                            $sql = mysqli_query($connect, "SELECT * from company WHERE coid='$coid'");
                            $row = mysqli_fetch_assoc($sql);
                            echo $row ['coname']."'s";
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

            <div id="laserbar"></div>

            <a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>

            <?php
            $coid = $_GET['coid'];
            $sql = mysqli_query($connect, "SELECT * from company WHERE coid='$coid'");
            if(mysqli_num_rows($sql) == 0){
                header("Location: company.php");
            }else{
                $row = mysqli_fetch_assoc($sql);
            }
            if(isset($_POST['save'])){
                $coname          = mysqli_real_escape_string($connect,$_POST['coname']);
                $coaddress           = mysqli_real_escape_string($connect,$_POST['coaddress']);
                $company_head        = mysqli_real_escape_string($connect,$_POST['company_head']);
                $position        = mysqli_real_escape_string($connect,$_POST['position']);
                $typeofojt       = $_POST['typeofojt'];
                $typeofcompany       = $_POST['typeofcompany'];
                
                $update = mysqli_query($connect, "UPDATE company SET coname ='$coname',coaddress='$coaddress', company_head='$company_head', position='$position',typeofojt='$typeofojt' ,typeofcompany='$typeofcompany' WHERE coid='$coid'") or die(mysqli_error());
                if($update){
                    header("Location: editcompany.php?coid=".$coid."&message=success");
                }else{
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data could not be saved, please try again.</div>';
                }
            }
            
            if(isset($_GET['message']) == 'success'){
                echo '<div class="alert alert-success" role="alert">
                                  <span class = "fa fa-check-circle"></span><strong> Success!</strong> You have successfully updated the information on this company.  <a href="company.php" class="alert-link">Go back to list of companies.</a>.
                                </div>';
            }
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-9 ">

                        <form class="form-horizontal well padding-top padding-bottom" action="" method="post">
                            <div class="form-group">
                                <div class="container">
                                    <div class="row">
                                        <label class="col-sm-2 control-label">Company Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="coname" value="<?php echo $row ['coname']; ?>" class="form-control" placeholder="Company Name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="container">
                                    <div class="row">
                                        <label class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="coaddress" value="<?php echo $row ['coaddress']; ?>" class="form-control" placeholder="Company address" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="container">
                                    <div class="row">
                                        <label class="col-sm-2 control-label">Company Head</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="company_head" value="<?php echo $row ['company_head']; ?>" class="form-control" placeholder="Company head">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="container">
                                    <div class="row">
                                        <label class="col-sm-2 control-label">Position</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="position" value="<?php echo $row ['position']; ?>" class="form-control" placeholder="Position">
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
                                                <option value="<?php echo $row ['typeofojt']; ?>"><?php echo $row ['typeofojt']; ?></option>
                                                ";
                                                <?php
                                                    if ($row ['typeofojt'] == 'In-house') {
                                                        echo "<option value='Company-based'>Company-based</option>";
                                                    } else if ($row ['typeofojt'] == 'Company-based') {
                                                        echo "<option value='In-house'>In-house</option>";
                                                    }
                                                    ?>
                                            </select>
                                            <br>
                                            <select name="typeofcompany" class="form-control">
                                                <option value="<?php echo $row ['typeofcompany']; ?>"><?php echo $row ['typeofcompany']; ?></option>
                                                ";
                                                <?php
                                                    if ($row ['typeofcompany'] == 'Government') {
                                                        echo "<option value='Private'>Private</option>";
                                                    } else if ($row ['typeofcompany'] == 'Private') {
                                                        echo "<option value='Government'>Government</option>";
                                                    }
                                                    ?>
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
                                            <input type="submit" name="save" class="btn btn-md btn-success" value="Save">
                        <a href="company.php" class="btn btn-md btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-3">
                        <img class="img-responsive center-block addPicture" src="img/edit.png">
                    </div>
                </div>
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
                <p class="footer-company-name">&copy; Designed by OJT2 2017 </p>
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