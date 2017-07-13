<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Advisers</title>
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
                                <li class="active"><a href="advisers.php"><span class="fa fa-address-book space"></span>list of Advisers</a></li>
                                <li><a href="export_csv.php"><span class="fa fa-download space"></span>Export Data</a></li>
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
                <h1 class="top-title">List of Practicum 2 <span class="title">Advisers </span></h1>  
            </div>

            <?php
            if(isset($_POST['add'])){
                $adviser           = $_POST['adviser'];
                $con = mysqli_query($connect, "SELECT * from advisers WHERE adviser='$adviser'");
                if(mysqli_num_rows($con) == 0){
                    $insert = mysqli_query($connect, "INSERT INTO advisers (adviser) VALUES('$adviser')") or die('Error: ' . mysqli_error($connect));
                    echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong> <span class = "fa fa-check-circle"></span> Success!</strong> You have successfully added an adviser.
                        </div>';
                } else {
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-exclamation-circle"></span> The adviser you are adding <strong> already exists in the database. </strong></div>';
                    }
                
            }

            if(isset($_GET['action']) == 'delete'){
                $ad_id = $_GET['ad_id'];
                $con = mysqli_query($connect, "SELECT * FROM advisers NATURAL JOIN students WHERE ad_id=".$ad_id);
                if (mysqli_num_rows($con) == 0) {
                    $delete = mysqli_query($connect, "DELETE FROM advisers WHERE ad_id=".$ad_id);
                    if($delete){
                        echo '<div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <span class = "fa fa-check-circle"></span> You have successfully <strong> deleted </strong> the adviser!
                                </div>';
                    }  
                } else {
                     echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <span class="fa fa-exclamation-triangle"></span> You <strong> cannot delete an adviser </strong> with present OJT students.</div>';
    
                    }
                }

            $sql =mysqli_query($connect,"SELECT * from (SELECT * from advisers WHERE adviser != 'No Adviser') t1 LEFT JOIN (SELECT count(ad_id) as countstudents, ad_id AS studad_id from advisers NATURAL JOIN students WHERE adviser != 'No Adviser' GROUP BY 2) t2 ON t1.ad_id = t2.studad_id");
            ?>

            <a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>

            <div class="row text-center ">
                <button class="btn btn-primary removeButton" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Add an Adviser</button>
 
                <div class="form-group row collapse paddingTopSlight" id="collapseExample">
                    <form class="form-inline" method = "post">
                      <label class="sr-only" for="inlineFormInput">Name</label>
                      <input type="text" class="form-control" id="inlineFormInput" name = "adviser" placeholder="Enter Name of Adviser">
                      <button type="submit" class="btn btn-success removeButton" name = "add" value="Add Adviser">Add</button>
                    </form>
                </div>

            </div> <!--End of Row-->

            <div class="row paddingTopSlight">
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr class="info">
                            <th width="20%">No</th>
                            <th width="12%" class="text-left">Name of Adviser</th>
                            <th width="10%" class="text-left">
                                <div class="btn-group-vertical">
                                    <input title="Sort by Ascending" class="btn arrowSort" type="submit" name="idnum" value="&#9650;">
                                    <input title="Sort by Descending" class="btn arrowSort" type="submit" name="idnum" value="&#9660;">
                                </div>
                            </th>
                            <th width="20%" class="text-right">Total Students</th>
                            <th width="0.5%" class="text-left">
                                <div class="btn-group-vertical">
                                    <input title="Sort by Ascending" class="btn arrowSort" type="submit" name="idnum" value="&#9650;">
                                    <input title="Sort by Descending" class="btn arrowSort" type="submit" name="idnum" value="&#9660;">
                                </div>
                            </th>
                            <th class="text-center">Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(mysqli_num_rows($sql) == 0){
                            echo '<tr class="nothingToDisplay text-center"><td colspan="14">Nothing to Display</td></tr>';
                        }else{
                            $no = 1;
                            while($row = mysqli_fetch_assoc($sql)){
                                if($row['countstudents'] == "") {
                                    $row['countstudents'] = 0;
                                }

                                echo '
                                <tr>
                                    <td>'.$no.'</td>
                                    <td colspan="2">'.$row['adviser'].'</td>
                                    <td colspan="2" class="text-center"><a title="View Company Students" class="touch" type="button" data-toggle="modal" data-target="#'.$row['ad_id'].'"><span class="countNumber">'.$row['countstudents'].'</span></a></td>
                                        <div id="'.$row['ad_id'].'" class="modal fade" role="dialog">
                                          <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title text-center">'.strip_tags(htmlentities($row['adviser'])).'</h4>
                                              </div>
                                              <div class="modal-body text-center">
                                                <h2 class="infoStudent">Practicum Student/s</h2>
                                            ';
                            $con1 = mysqli_query($connect, "SELECT * from advisers NATURAL JOIN students where ad_id = '".mysqli_real_escape_string($connect,$row['ad_id'])."' ORDER BY last_name, first_name");
                            while ($row2 = mysqli_fetch_assoc($con1)) {
                                    echo '
                                        <p class="student"><a href="profile.php?idnum='.$row2['idnum'].'">'.strip_tags(htmlentities($row2['last_name'])).", ".strip_tags(htmlentities($row2['first_name'])).'</a></p>
                                                    ';
                                                }
                                    echo '
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                            
                                    <td class="text-center">
                                        <a href="editcompany.php?coid='.$row['ad_id'].'" title="Edit Data" class="btn btn-success btn-sm">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        </a>
                                         <a href="advisers.php?action=delete&ad_id='.$row['ad_id'].'" title="Delete Company" ';
                                if($row['countstudents'] == 0){
                                echo ' data-text="Are you sure you want to delete '.strip_tags(htmlentities($row['adviser'])).
                                    '" data-confirm-button="Yes"
                                    data-cancel-button="No"
                                    data-confirm-button-class= "btn-success"
                                    data-cancel-button-class= "btn-danger"
                                    data-title="Delete Company" class="confirm btn btn-danger btn-sm">'; 
                                } else {
                                    echo '
                                    class="btn btn-danger btn-sm">';
                                }
                                echo '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                </tr>
                                ';
                                $no++;
                            }
                        }
                    ?>

              
                           
                     
                    </tbody>
                </table>
            </div>
        </div> <!--End of Container Fluid-->
    </section>
    <!---->
    <!---->
    <footer class="footer">
        <div class="row text-center">
            <img class="footerLogo" src="img/newLogo.png">
            <p class="credits">Designed and Developed by OJT2 2016-2017</p>
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
    <script src="js/tooltip.js"></script>
    <script src="js/jquery.confirm.js"></script>
    <script>
        $(".confirm").confirm();
    </script>
  
  </body>
</html>