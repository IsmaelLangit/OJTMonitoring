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
                                <li><a href="index.php"><span class="fa fa-user space"></span>List of Students</a></li>
                                <li><a href="add.php"><span class="fa fa-plus space"></span>Add Student</a></li>
                                <li><a href="company.php"><span class="fa fa-building space"></span>list of Companies</a></li>
                                <li><a href="addcompany.php"><span class="fa fa-plus space"></span>Add Company</a></li>
                                <li><a href="export_csv.php"><span class="fa fa-download space"></span>Export Data</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--/ header-->

    <section class="section-padding">
        <div class="container">

            <div class="col text-center">
                <h1 class="top-title">
                    <span class="title">
                        <?php 
                            $idnum = $_GET['idnum'];
                            $sql = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid JOIN advisers ON students.ad_id = advisers.ad_id WHERE idnum='$idnum'");
                            $row = mysqli_fetch_assoc($sql);

                            if (substr($row ['last_name'], -1) == "s") {
                                echo htmlentities($row ['last_name'])."'";
                            } else if (substr($row ['last_name'], -1) != "s"){
                                 echo htmlentities($row ['last_name'])."'s";
                            }
                            
                        ?>
                    </span> 
                Profile</h1>
            </div>

            <a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>

            <?php
            $idnum = $_GET['idnum'];
            $sql = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid JOIN advisers ON students.ad_id = advisers.ad_id WHERE idnum='$idnum'");
            if(mysqli_num_rows($sql) == 0){
                header("Location: profile.php");
            }else{
                $row = mysqli_fetch_assoc($sql);
            }
            
            if(isset($_GET['action']) == 'delete'){
                $delete = mysqli_query($connect, "DELETE FROM students WHERE idnum='$idnum'");
                if($delete){
                    echo '<div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <span class = "fa fa-check-circle"></span> You have successfully <strong> deleted </strong> the student!
                                </div>';
                }else{
                    echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data not deleted successfully.</div>';
                }
            }

            if(isset($_GET['action']) == 'delete'){
                $delete = mysqli_query($connect, "DELETE FROM students WHERE idnum='$idnum '");
                if($delete){
                    echo '<div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <span class = "fa fa-check-circle"></span> You have successfully <strong> deleted </strong> the student!
                                </div>';
                }else{
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close " data-dismiss="alert" aria-hidden="true">&times;</button></div>';
                }
            }
            ?>

            <div class="row">
                <div class="col-md-6">

                    <h2 class="head-title titleFont">Basic Information</h2>
                    <hr class="style-four">

                    <br>

                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th scope="row" class="bg-info col-md-3">ID Number</th>
                            <td class="col-md-10"><?php echo $row['idnum']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="bg-info">Name</th>
                            <td class="col-md-10"><?php echo strip_tags(htmlentities($row['last_name'])).", ".strip_tags(htmlentities($row['first_name'])); ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="bg-info">Course & Year</th>
                            <td class="col-md-10"><?php echo $row['courseyear']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="bg-info">Mobile Number</th>
                            <td class="col-md-6"><?php echo strip_tags(htmlentities($row['mobile_number'])); ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="bg-info">Email</th>
                            <td class="col-md-10"><?php echo $row['email']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="bg-info">Adviser</th>
                            <td class="col-md-10"><?php echo $row['adviser']; ?></td>
                        </tr>
                    </table>
                </div>

                <div class="col-md-6">

                    <h2 class="head-title titleFont">Practicum 2 Information</h2>
                    <hr class="style-four">

                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th scope="row" class="bg-danger text-white col-md-3">Company Name</th>
                            <td><a href = "profilecompany.php?coid= <?php echo $row['coid']; ?>"><?php echo strip_tags(htmlentities($row['coname'])); ?></a></td>
                        </tr>
                        <tr>
                            <th scope="row" class="bg-danger text-white">Address</th>
                            <td><?php echo strip_tags(htmlentities($row['coaddress'])); ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="bg-danger text-white">Status</th>
                            <?php
                                if ($row ['status'] == "Complete") {
                                    echo '<td><span class="label label-success">'.$row ['status'].'</span></td><br>';
                                } else if ($row ['status'] == "Incomplete") {
                                    echo '<td><span class="label label-warning">'.$row ['status'].'</span></td><br>';
                                }
                                ?>
                        </tr>
                        <tr>
                            <th scope="row" class="bg-danger text-white">Endorsement</th>
                            <?php
                                echo '
                                <td>
                                        <a class="help" data-html="true" data-toggle="tooltip" 
                                            title=" 
                                                Date Released: '.$row ['release_endorsement'].' 
                                                <br> 
                                                Date Received: '.$row ['receive_endorsement'].' 
                                                <br> Remarks: '.strip_tags($row ['remark_endorsement']).' " >
                                ';
                                if($row['endorsement'] == 'yes'){
                                    echo '  
                                            <span class="glyphicon glyphicon-ok fontGlyphiconOk"></span>
                                        </a>
                                    </td>';
                                
                                }
                                else if ($row['endorsement'] == 'no' ){
                                    echo '  
                                            <span class="glyphicon glyphicon-remove fontGlyphiconNo"></span>
                                        </a>
                                    </td>';
                                            }
                                    ?>
                        </tr>
                        <tr>
                            <th scope="row" class="bg-danger text-white">Waiver</th>
                            <?php
                                echo '
                                <td>
                                    <a class="help" data-html="true" data-toggle="tooltip" 
                                    title=" 
                                        Date Released: '.$row ['release_waiver'].' 
                                        <br> 
                                        Date Received: '.$row ['receive_waiver'].' 
                                        <br> Remarks: '.strip_tags($row ['remark_waiver']).' " >
                                ';
                                    if($row['waiver'] == 'yes'){
                                        echo '  
                                            <span class="glyphicon glyphicon-ok fontGlyphiconOk"></span>
                                            </a>
                                        </td>';
                                    }
                                    else if ($row['waiver'] == 'no' ){
                                            echo '  
                                                <span class="glyphicon glyphicon-remove fontGlyphiconNo"></span>
                                                </a>
                                            </td>';
                                    }
                                ?>
                        </tr>
                        <tr>
                            <th scope="row" class="bg-danger text-white">Memorandum of Agreement</th>
                            <?php
                                echo '
                                <td>
                                    <a class="help" data-html="true" data-toggle="tooltip" 
                                        title=" 
                                            Date Released: '.$row ['release_moa'].' 
                                            <br> 
                                            Date Received: '.$row ['receive_moa'].' 
                                            <br> Remarks: '.strip_tags($row ['remark_moa']).' " >
                                ';
                                if($row['moa'] == 'yes'){
                                    echo '  
                                            <span class="glyphicon glyphicon-ok fontGlyphiconOk"></span>
                                        </a>
                                    </td>';
                                }
                                else if ($row['moa'] == 'no' ){
                                        echo '  
                                            <span class="glyphicon glyphicon-remove fontGlyphiconNo"></span>
                                            </a>
                                        </td>';
                                }
                                ?>
                        </tr>
                        <tr>
                            <th scope="row" class="bg-danger text-white">Evaluation</th>
                            <?php
                                echo '
                                <td>
                                    <a class="help" data-html="true" data-toggle="tooltip" 
                                    title=" 
                                        Date Released: '.$row ['release_evaluation'].' 
                                        <br> 
                                        Date Received: '.$row ['receive_evaluation'].' 
                                        <br> Remarks: '.strip_tags($row ['remark_evaluation']).' " >
                                
                                ';
                                    if($row['evaluation'] == 'yes'){
                                        echo '  
                                                <span class="glyphicon glyphicon-ok fontGlyphiconOk"></span>
                                            </a>
                                        </td>';
                                    }
                                                else if ($row['evaluation'] == 'no' ){
                                        echo '  
                                                <span class="glyphicon glyphicon-remove fontGlyphiconNo"></span>
                                            </a>
                                        </td>';
                                    }
                                
                                ?>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row text-center">
                <?php
                $previous = "javascript:history.go(-1)";
                if(isset($_SERVER['HTTP_REFERER'])) {
                    $previous = $_SERVER['HTTP_REFERER'];
                }

                ?>
                <a href="<?= $previous ?>" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-menu-left space" aria-hidden="true"></span>Back</a>
                <a href="edit.php?idnum=<?php echo $row['idnum']; ?>" class="btn btn-md btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a>
                <a href="profile.php?action=delete&idnum=<?php echo $row['idnum']; ?>" class="confirm btn btn-danger btn-md" 
                                                            data-text="Are you sure you want to delete <?php echo strip_tags(htmlentities($row['last_name'])).", ".strip_tags(htmlentities($row['first_name']));
                                                            ?>" data-confirm-button="Yes"
                                                            data-cancel-button="No"
                                                            data-confirm-button-class= "btn-success"
                                                            data-cancel-button-class= "btn-danger"
                                                            data-title="Delete Student" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a>
            </div>
            
            
        </div> <!--End of Container Fluid-->
    </section>
    <!---->
    <!-- end-->
    <footer id="footer" class="footer">
        <div class="row text-center">
            <img class="footerLogo" src="img/newLogo.png">
            <p class="credits">Designed and Developed by OJT2 2016-2017</p>
        </div>
    </footer>

    </div>

    <script>
        $(".confirm").confirm();
    </script>

    <script>
    $('.date').datepicker({
        format: 'yyyy-mm-dd',
    })
    </script>
    
  </body>
</html>