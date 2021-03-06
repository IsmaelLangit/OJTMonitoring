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
    <link rel="stylesheet" type="text/css" href="css/datepicker.css">
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

                                <li class="dropdown active">
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
                                    <li><a href="changeadviser.php"><span class="fa fa-user-plus green space"></span>Change Adviser</a></li>
                                    <li><a href="editvisit.php"><span class="fa fa-pencil-square-o orange space"></span>Edit Visit Status</a></li>
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
            <!--/ nav-->
        </div>
    </header>
    <!--/ header-->

    <section class="section-padding">
        <div class="container">

            <div class="col text-center">
                <h1 class="top-title"><span class="title">Add </span>a Company</h1>
                
            </div>
            
            <a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>

            <?php
            if(isset($_POST['add'])){
                $coname          = mysqli_real_escape_string($connect, $_POST['coname']);
                $coaddress           = mysqli_real_escape_string($connect,$_POST['coaddress']);
                $company_head        = mysqli_real_escape_string($connect,$_POST['company_head']);
                $position        = mysqli_real_escape_string($connect,$_POST['position']);
                $contact_person        = mysqli_real_escape_string($connect,$_POST['contact_person']);
                $cp_position        = mysqli_real_escape_string($connect,$_POST['cp_position']);
                $typeofcompany       = mysqli_real_escape_string($connect,$_POST['typeofcompany']);
                $moa         = $_POST['moa'];
                $release_moa         = $_POST['release_moa'];
                $receive_moa         = $_POST['receive_moa'];
                $remark_moa     = mysqli_real_escape_string($connect,$_POST['remark_moa']);
               
                $con = mysqli_query($connect, "SELECT * from company WHERE coname='$coname'");
                if(mysqli_num_rows($con) == 0){
                    $insert = mysqli_query($connect, "INSERT INTO company(coname, coaddress, company_head, position, contact_person, cp_position, typeofcompany, release_moa, receive_moa, remark_moa, moa)
                                                            VALUES('$coname','$coaddress', '$company_head','$position', '$contact_person','$cp_position', '$typeofcompany', '$release_moa', '$receive_moa', '$remark_moa', '$moa')") or die('Error: ' . mysqli_error($connect));
                    if($insert){
                            echo '<div class="alert alert-success" role="alert">
                                  <strong> <span class = "fa fa-check-circle"></span></strong> You have successfully added the company. <a href="company.php" class="alert-link"> <span class="fa fa-chevron-circle-left"></span> Go back to the list of companies.</a>.
                                </div>';
                        }else{
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ID no.</div>';
                        }
                    
                }
                
            }
            ?>

            <form action="" method="post">
                <div class="row">

                    <div class="col-md-6">

                        <h2 class="head-title titleFont text-center">Company Information</h2>
                        <hr class="style-four">

                        <div class="form-group">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="control-label">Company Name</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <textarea rows="2" type="text" maxlength = '100' name="coname" class="form-control" placeholder="Company Name" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="control-label">Address</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <textarea rows="3" type="text" maxlength = '300' name="coaddress" class="form-control" placeholder="Address" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="control-label">Company Head</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" maxlength = '70' name="company_head" class="form-control" placeholder="Company Head">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="control-label">Position</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input maxlength = '120' type="text" name="position" class="form-control" placeholder="Position">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="control-label">Contact Person</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" maxlength = '70' name="contact_person" class="form-control" placeholder="Contact Person">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="control-label">Position</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input maxlength = '120' type="text" name="cp_position" class="form-control" placeholder="Position">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="control-label">Type</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="typeofcompany" class="touch form-control">
                                            <option value="Government">Government</option>
                                            <option value="Private">Private</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!--End of basic information company col-md-6-->

                    <div class="col-md-6">

                        <h2 class="head-title titleFont text-center">Memorandum of Agreement</h2>
                        <hr class="style-four">

                        <div class="form-group">
                            <div class="container-fluid">
                                <div class="col">
                                    <?php
                                        echo  "<input type='hidden' name='moa' value='no'>";
                                        
                                        echo  " <input type='checkbox' name='moa' value='yes'>
                                                <label class='control-label'> <span class='space'></span> Submitted</label> <br>" ;
                                        echo  " <label class='control-label'>Date Released</label>
                                                    <div class='input-group date col-sm-6'>
                                                        <input type='text' name='release_moa' class='input-group date form-control touch' date='' data-date-format='release_moa' placeholder='Date of Release'>
                                                        <span class='input-group-addon touch'><span class='glyphicon glyphicon-calendar'></span>
                                                    </div>
                                                <br>" ;
                                        echo  " <label class='control-label'>Date Received</label>
                                                    <div class='input-group date col-sm-6'>
                                                        <input type='text' name='receive_moa' class='input-group date form-control touch' date='' data-date-format='date_started' placeholder='Date Received'>
                                                            <span class='input-group-addon touch'><span class='glyphicon glyphicon-calendar'></span>
                                                    </div>
                                                <br>" ;
                                        echo  " <label class='control-label'>Remarks</label>
                                                <textarea rows='5' name='remark_moa' class='form-control' placeholder = 'Input remarks'></textarea><br>" ;
                                        ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="submit" name="add" class="btn btn-md btn-success disableHighlight" value="Add"><i class="fa fa-plus space"></i><span>Add</span></button>
                    <a href="index.php" class="btn btn-md btn-danger disableHighlight "><i class="fa fa-times space"></i><span>Cancel</span></a>
                </div>
                
            </form>
        </div> <!--End of Container Fluid-->
    </section>
    <!---->
    <!---->
    <footer class="footer">
        <div class="row text-center">
            <img class="footerLogo" src="img/newLogo.png">
            <p class="credits">Copyright © 2018 - Developed by Ismael Langit and Designed by John Allen Basco</p>        
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
    <script src="js/bootstrap-notify.js"></script>
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