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
    <link rel="icon" href="img/scisLogo.png">
  </head>
  <body>
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

    <div class="text-center sect bg">
        <div class="wow fadeIn">
            <h2 class="top-title">Edit
            <span class="companytitle">
                <?php 
                    $coid = $_GET['coid'];
                    $sql = mysqli_query($connect, "SELECT * from company WHERE coid='$coid'");
                    $row = mysqli_fetch_assoc($sql);
                    echo $row ['coname']."'s";
                    ?> 
            </span>
            Details</h2>
        </div>
    </div>
    <section class="section-padding">
        <div class="container-fluid">
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
                $typeofcompany       = $_POST['typeofcompany'];

                $moa         = $_POST['moa'];
                $release_moa         = $_POST['release_moa'];
                $receive_moa         = $_POST['receive_moa'];
                $remark_moa     = mysqli_real_escape_string($connect,$_POST['remark_moa']);
                
                $update = mysqli_query($connect, "UPDATE company SET coname ='$coname',coaddress='$coaddress', company_head='$company_head', position='$position' ,typeofcompany='$typeofcompany', release_moa='$release_moa', receive_moa='$receive_moa', remark_moa='$remark_moa',  moa='$moa' WHERE coid='$coid'") or die(mysqli_error());
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
                                            <select name="typeofcompany" class="form-control">
                                                <option value="<?php echo $row ['typeofcompany']; ?>"><?php echo $row ['typeofcompany']; ?></option>
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
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-3 text-right">
                                            <label class="control-label subLabel">Memorandum of Agreement</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <?php
                                                    echo  "<input type='hidden' name='moa' value='no'>";
                                                    
                                                    
                                                    if ($row ['moa'] == 'yes') {
                                                        echo "<input type='checkbox' name='moa' value='yes' checked><span class='space'></span><strong>Submitted</strong> <br>";
                                                    } 
                                                    
                                                    if($row ['moa'] == 'no') {
                                                        echo "<input type='checkbox' name='moa' value='yes'><span class='space'></span><strong>Submitted</strong> <br>";
                                                    }   
                                              ?>
                                                <label class='control-label'>Date Released</label>
                                                <input type="text" name="release_moa" value="<?php echo $row ['release_moa']; ?>" class='input-group date form-control touch' date='' data-date-format='date_started' name="receive_endorsement">
                                                <br>
                                                <label class='control-label'>Date Received</label>
                                                <input type="text" name="receive_moa" value="<?php echo $row ['receive_moa']; ?>" class='input-group date form-control touch' date='' data-date-format='date_started' name="receive_endorsement">
                                                <br>
                                                <label class='control-label'>Remark/s</label>
                                                <input type="text" class="form-control" name="remark_moa" value="<?php echo $row ['remark_moa']; ?>" class="form-control" >
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
                <p class="footer-company-name">&copy; Designed by OJT2 2016-2017 </p>
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
    <script>
    $('.date').datepicker({
        format: 'yyyy-mm-dd',
    })
    </script>
  </body>
</html>