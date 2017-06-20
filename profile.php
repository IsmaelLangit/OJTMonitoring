<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Student Profile</title>
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
                        <div class="collapse navbar-collapse navbar-right borderXwidth" id="mynavbar">
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
                <div class="wrapper wow fadeIn delay-05s " >
                    <h2 class="title">
                        <?php 
                            $idnum = $_GET['idnum'];
                            $sql = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE idnum='$idnum'");
                            $row = mysqli_fetch_assoc($sql);

                            if (substr($row ['last_name'], -1) == "s") {
                                echo $row ['last_name']."'";
                            } else if (substr($row ['last_name'], -1) != "s"){
                                 echo $row ['last_name']."'s";
                            }
                            
                            ?> 
                    </h2>
                    <h3 class="top-title">Profile</h3>
                </div>
            </div>
        </div>
    </header>
    <!--/ header-->
    <!---->
    <section class="section-padding">
        <div class="container">

            <a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>

            <?php
            $idnum = $_GET['idnum'];
            
            $sql = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE idnum='$idnum'");
            if(mysqli_num_rows($sql) == 0){
                header("Location: index.php");
            }else{
                $row = mysqli_fetch_assoc($sql);
            }
            
            if(isset($_GET['aksi']) == 'delete'){
                $delete = mysqli_query($connect, "DELETE FROM students WHERE idnum='$idnum'");
                if($delete){
                    echo '<div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> You have successfully <strong> deleted </strong> the student!
                                </div>';
                }else{
                    echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data not deleted successfully.</div>';
                }
            }
            ?>



            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <th scope="row" class="info">ID Number</th>
                    <td><?php echo $row['idnum']; ?></td>
                </tr>
                <tr>
                    <th scope="row" class="info">Name</th>
                    <td><?php echo $row['last_name'].", ", $row['first_name']; ?></td>
                </tr>
                <tr>
                    <th scope="row" class="info">Course & Year</th>
                    <td><?php echo $row['courseyear']; ?></td>
                </tr>
                <tr>
                    <th scope="row" class="info">Mobile Number</th>
                    <td><?php echo "(+63) ".$row['mobile_number']; ?></td>
                </tr>
                <tr>
                    <th scope="row" class="info">Email</th>
                    <td><?php echo $row['email']; ?></td>
                </tr>
                <tr>
                    <th scope="row" class="info">Company Name</th>
                    <td><?php echo $row['coname']; ?></td>
                </tr>
                <tr>
                    <th scope="row" class="info">Status</th>
                    <?php
                        if ($row ['status'] == "Complete") {
                            echo '<td><span class="label label-success">'.$row ['status'].'</span></td><br>';
                        } else if ($row ['status'] == "Incomplete") {
                            echo '<td><span class="label label-warning">'.$row ['status'].'</span></td><br>';
                        }
                    ?>
                </tr>
            </table>

            <div class="pull-right">
                <a href="index.php" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-menu-left space" aria-hidden="true"></span>Back</a>
                <a href="edit.php?idnum=<?php echo $row['idnum']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a>
                <a href="profile.php?aksi=delete&idnum=<?php echo $row['idnum']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete <?php echo $row['first_name'].$row['last_name']; ?> ?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a>
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