<?php
include("connect.php");

if(isset($_POST['import'])){
        
        $filename=$_FILES["file"]["tmp_name"];      
 
 
         if($_FILES["file"]["size"] > 0)
         {
            $file = fopen($filename, "r");
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
             {
 
 
               $sql = mysqli_query($connect,"INSERT INTO students (idnum, last_name, first_name, courseyear, mobile_number,email) VALUES 
                ( 
                    '".$getData[0]."', 
                    '".$getData[1]."', 
                    '".$getData[2]."', 
                    '".$getData[3]."',
                    '".$getData[4]."',
                    '".$getData[5]."'
                ) 
            "); 
                if(!isset($sql))
                {
                    echo "<script type=\"text/javascript\">
                            alert(\"Invalid File:Please Upload CSV File.\");
                            window.location = \"index.php\"
                          </script>";       
                }
                else {
                      echo "<script type=\"text/javascript\">
                        alert(\"CSV File has been successfully Imported.\");
                        window.location = \"index.php\"
                    </script>";
                }
             }
            
             fclose($file); 
         }
    }    
 
 
 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Import Data</title>
        <link rel="icon" href="img/scisLogo.png">

        <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/hover.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        <link rel="stylesheet" type="text/css" href="css/preloader.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>

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
                        <div class="collapse navbar-collapse navbar-right" id="mynavbar">
                            <ul class="nav navbar-nav">

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
        <div class="container-fluid">

            <div class="col text-center">
                <h1 class="top-title">Import<span class="title"> CSV File</span></h1>
            </div>

            <a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>

            <div class="row">
            	<div class="col-md-offset-2 col-md-8 text-center">

                    <img class="importIcon" src="img/import.png">

                    <div class="col">
                        <p class="resetInfo">Please import your CSV data file below to fill up the students data. Sample data is shown below for reference.</p>

                        <table class="table table-hover text-center">
                            <tr class="info">
                                <th class="text-center">ID Number</th>
                                <th class="text-center">Last Name</th>
                                <th class="text-center">First Name</th>
                                <th class="text-center">Coure and Year</th>
                                <th class="text-center">Mobile Number</th>
                                <th class="text-center">Email</th>
                            </tr>
                            <tr>
                                <td>2100001</td>
                                <td>Rivera</td>
                                <td>George</td>
                                <td>BSIT 3</td>
                                <td>09123456789</td>
                                <td>georgerivera@slu.edu.ph</td>
                            </tr>
                            <tr>
                                <td>2110002</td>
                                <td>Reyes</td>
                                <td>Laura Mae</td>
                                <td>BSCS 4</td>
                                <td>09987654321</td>
                                <td>laurareyes@gmail.com</td>
                            </tr>
                        </table>
                    </div>



					<form class="form-inline" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
                        <div class="form-group">
    					   <input type="file" name="file" id="file" class="btn btn-primary" id="csv"/> 
                        </div>
                        <div class="form-group">
    					  <button type="submit" name="import" class="btn btn-md btn-success"><span>Import</span></button>
                        </div> 
					</form> 

				</div>
            </div>

		</div>
	</section>

	<footer class="footer">
        <div class="row text-center">
            <img class="footerLogo" src="img/newLogo.png">
            <p class="credits">Designed and Developed by OJT2 2016-2017</p>
        </div>
    </footer>
    </div> <!--End of main-container-->
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
    <script src="js/bootstrap-notify.js"></script>
    <script src="js/alertFade.js"></script>
    <script src="js/preloader.js"></script>
    <script src="js/dropdown.js"></script>

    <script>
        $(".confirm").confirm();
    </script>
    
  </body>
</html>