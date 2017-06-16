<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SCIS OJT Monitoring</title>
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
            <nav class="nav navbar-default navbar-fixed-top">
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
                                <li class="active"><a href="index.php">List of Students</a></li>
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
                <div class="wrapper wow fadeInUp delay-05s " >
                    <h2 class="top-title">List of Practicum 2</h2>
                    <h3 class="title">Students</h3>
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
            if(isset($_GET['action']) == 'delete'){
                $idnum = $_GET['idnum'];
                $con = mysqli_query($connect, "SELECT * FROM students WHERE idnum='$idnum ORDER BY last_name ASC, first_name ASC'");
                if(mysqli_num_rows($con) == 0){
                    echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Welcome Admin!</div>';
                }else{
                    $delete = mysqli_query($connect, "DELETE FROM students WHERE idnum='$idnum '");
                    if($delete){
                        echo '<div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> You have successfully <strong> deleted </strong> the student!
                                </div>';
                    }else{
                        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>';
                    }
                }
            }
            ?>

                    <form class="form-inline" method="get">

                        <div class="form-group">
                            <select name="filter" class="form-control" onchange="form.submit()">
                                <option value="0">Filter Students By:</option>
                                <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
                                <option value="" <?php if($filter == ''){ echo 'selected'; } ?>>Show All</option>
                                <option value="Complete" <?php if($filter == 'Complete'){ echo 'selected'; } ?>>Complete</option>
                                <option value="Incomplete" <?php if($filter == 'Incomplete'){ echo 'selected'; } ?>>Incomplete</option>
                                <option value="In-house" <?php if($filter == 'In-house'){ echo 'selected'; } ?>>In-house</option>
                                <option value="Company-based" <?php if($filter == 'Company-based'){ echo 'selected'; } ?>>Company-based</option>
                            </select>
                        </div>

                        <form id="Name" action="#">
                        <div class="input-group">
                                <input type="text" id="myInput" onkeyup="filterData()" class="form-control" placeholder="Search ID Number / Student Name">
                                <span class="input-group-btn">  
                                    <button class="btn btn-primary" type="button" onclick="resetName()" value="reset">Reset</button>
                                </span>
                            </div>
                        </form> 

                    </form>

                
                <div class="padding-top">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-center" id="myTable">
                                <tr class="info">
                                    <th class="text-center">No</th>
                                    <th class="text-center">ID Number</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Course & Year</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Mobile No.</th>
                                    <th class="text-center">Endorsement</th>
                                    <th class="text-center">Waiver</th>
                                    <th class="text-center">MOA</th>
                                    <th class="text-center">Evaluation</th>
                                    <th class="text-center">Requirement Status</th>
                                    <th class="text-center">Company Name</th>
                                    <th class="text-center">OJT Type</th>
                                    <th class="text-center">Tools</th>
                                </tr>
                                <?php
                                    if($filter){
                                        $sql = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid WHERE status='$filter' or typeofojt='$filter' ORDER BY last_name ASC, first_name ASC");
                                    }else{
                                        $sql = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid  ORDER BY last_name ASC, first_name ASC");
                                    }
                                    if(mysqli_num_rows($sql) == 0){
                                        echo '<tr class="nothingToDisplay text-center"><td colspan="8">Nothing to Display</td></tr>';
                                    }else{
                                        $no = 1;
                                        while($row = mysqli_fetch_assoc($sql)){
                                            echo '
                                            <tr>
                                                <td>'.$no.'</td>
                                                <td>'.$row['idnum'].'</td>
                                                <td><a href="profile.php?idnum='.$row['idnum'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$row['last_name'].", ".$row['first_name'].'</a></td>
                                                            <td>'.$row['courseyear'].'</td>
                                                            <td>'.$row['email'].'</td>
                                                            <td>'.$row['mobile_number'].'</td>';
                                    
                                                if($row['endorsement'] == 'yes'){
                                                    echo '  <td>
                                                                <a href="" data-html="true" data-toggle="tooltip" 
                                                                title=" 
                                                                    Date Released: '.$row ['release_endorsement'].' 
                                                                    <br> 
                                                                    Date Received: '.$row ['receive_endorsement'].' 
                                                                    <br> Remarks: '.$row ['remark_endorsement'].' " >
                                                                    <span class="glyphicon glyphicon-ok fontGlyphiconOk"></span>
                                                                </a>
                                                            </td>';

                                                }
                                                            else if ($row['endorsement'] == 'no' ){
                                                    echo '  <td>
                                                                <a href="" data-html="true" data-toggle="tooltip" 
                                                                title=" 
                                                                    Date Released: '.$row ['release_endorsement'].' 
                                                                    <br> 
                                                                    Date Received: '.$row ['receive_endorsement'].' 
                                                                    <br> Remarks: '.$row ['remark_endorsement'].' " >
                                                                    <span class="glyphicon glyphicon-remove fontGlyphiconNo"></span>
                                                                </a>
                                                            </td>';
                                                }
                                    
                                    
                                                if($row['waiver'] == 'yes'){
                                                    echo '  <td>
                                                                <a href="" data-html="true" data-toggle="tooltip" 
                                                                title=" 
                                                                    Date Released: '.$row ['release_waiver'].' 
                                                                    <br> 
                                                                    Date Received: '.$row ['receive_waiver'].' 
                                                                    <br> Remarks: '.$row ['remark_waiver'].' " >
                                                                    <span class="glyphicon glyphicon-ok fontGlyphiconOk"></span>
                                                                </a>
                                                            </td>';
                                                }
                                                            else if ($row['waiver'] == 'no' ){
                                                    echo '  <td>
                                                                <a href="" data-html="true" data-toggle="tooltip" 
                                                                title=" 
                                                                    Date Released: '.$row ['release_waiver'].' 
                                                                    <br> 
                                                                    Date Received: '.$row ['receive_waiver'].' 
                                                                    <br> Remarks: '.$row ['remark_waiver'].' " >
                                                                    <span class="glyphicon glyphicon-remove fontGlyphiconNo"></span>
                                                                </a>
                                                            </td>';
                                                }
                                    
                                                if($row['moa'] == 'yes'){

                                                    echo '  <td>
                                                                <a href="" data-html="true" data-toggle="tooltip" 
                                                                title=" 
                                                                    Date Released: '.$row ['release_moa'].' 
                                                                    <br> 
                                                                    Date Received: '.$row ['receive_moa'].' 
                                                                    <br> Remarks: '.$row ['remark_moa'].' " >
                                                                    <span class="glyphicon glyphicon-ok fontGlyphiconOk"></span>
                                                                </a>
                                                            </td>';

                                                }
                                                            else if ($row['moa'] == 'no' ){
                                                    echo '  <td>
                                                                <a href="" data-html="true" data-toggle="tooltip" 
                                                                title=" 
                                                                    Date Released: '.$row ['release_moa'].' 
                                                                    <br> 
                                                                    Date Received: '.$row ['receive_moa'].' 
                                                                    <br> Remarks: '.$row ['remark_moa'].' " >
                                                                    <span class="glyphicon glyphicon-remove fontGlyphiconNo"></span>
                                                                </a>
                                                            </td>';
                                                }
                                    
                                                if($row['evaluation'] == 'yes'){
                                                    echo '  <td>
                                                                <a href="" data-html="true" data-toggle="tooltip" 
                                                                title=" 
                                                                    Date Released: '.$row ['release_evaluation'].' 
                                                                    <br> 
                                                                    Date Received: '.$row ['receive_evaluation'].' 
                                                                    <br> Remarks: '.$row ['remark_evaluation'].' " >
                                                                    <span class="glyphicon glyphicon-ok fontGlyphiconOk"></span>
                                                                </a>
                                                            </td>';
                                                }
                                                            else if ($row['evaluation'] == 'no' ){
                                                    echo '  <td>
                                                                <a href="" data-html="true" data-toggle="tooltip" 
                                                                title=" 
                                                                    Date Released: '.$row ['release_evaluation'].' 
                                                                    <br> 
                                                                    Date Received: '.$row ['receive_evaluation'].' 
                                                                    <br> Remarks: '.$row ['remark_evaluation'].' " >
                                                                    <span class="glyphicon glyphicon-remove fontGlyphiconNo"></span>
                                                                </a>
                                                            </td>';
                                                }
                                    
                                            echo '
                                                </td>
                                                <td>';
                                                if($row['status'] == 'Complete'){
                                                    echo '<span type="button" data-toggle="modal" data-target="#'.$row['idnum'].'" class="label label-success btn btn-sm">Complete</span>';
                                                } else if ($row['status'] == 'Incomplete' ){
                                                    echo '<span type="button" data-toggle="modal" data-target="#'.$row['idnum'].'" class="label label-warning btn btn-sm">Incomplete</span>';
                                                }

                                        echo '
                                             <div id='.$row['idnum'].' class="modal fade" role="dialog">
                                                          <div class="modal-dialog">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">'.$row['first_name'].'</h4>
                                                              </div>
                                                              <div class="modal-body">
                                                                <h2 class="titleRequirements">Letter of Endorsement</h2>
                                                                <p>Date Released: <span class="dateRequirement">'.$row ['release_endorsement'].'</span></p>
                                                                <p>Date Received: <span class="dateRequirement">'.$row ['receive_endorsement'].'</span></p>
                                                                <p>Remarks: <span class="dateRequirement">'.$row ['remark_endorsement'].'</span></p>
                                                                <br>
                                                                <h2 class="titleRequirements">OJT Waiver</h2>
                                                                <p>Date Released: <span class="dateRequirement">'.$row ['release_waiver'].'</span></p>
                                                                <p>Date Received: <span class="dateRequirement">'.$row ['receive_waiver'].'</span></p>
                                                                <p>Remarks: <span class="dateRequirement">'.$row ['remark_waiver'].'</span></p>
                                                                <br>
                                                                <h2 class="titleRequirements">Memorandum of Agreement</h2>
                                                                <p>Date Released: <span class="dateRequirement">'.$row ['release_moa'].'</span></p>
                                                                <p>Date Received: <span class="dateRequirement">'.$row ['receive_moa'].'</span></p>
                                                                <p>Remarks: <span class="dateRequirement">'.$row ['remark_moa'].'</span></p>
                                                                <br>
                                                                <h2 class="titleRequirements">Evaluation</h2>
                                                                <p>Date Released: <span class="dateRequirement">'.$row ['release_evaluation'].'</span></p>
                                                                <p>Date Received: <span class="dateRequirement">'.$row ['receive_evaluation'].'</span></p>
                                                                <p>Remarks: <span class="dateRequirement">'.$row ['remark_evaluation'].'</span></p>
                                                              </div>
                                                              <div class="modal-footer">
                                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                                              </div>
                                                            </div>

                                                          </div>
                                                        </div>
                                            ';

                                           
                                    
                                            echo '
                                                <td>'.$row['coname'].'</td>
                                                <td>';
                                                if($row['typeofojt'] == 'In-house'){
                                                    echo '<span class="label label-info">In-house</span>';
                                                }
                                                            else if ($row['typeofojt'] == 'Company-based' ){
                                                    echo '<span class="label label-primary">Company-based</span>';
                                                }
                                    
                                    
                                            echo '
                                                </td>
                                                <td>
                                                    <a href="edit.php?idnum='.$row['idnum'].'" title="Edit Data" class="btn btn-success btn-sm">
                                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                    </a>
                                                    <a href="index.php?action=delete&idnum='.$row['idnum'].'" title="Remove Student" onclick="return confirm(\'Are you sure you want to delete '.$row['first_name']." ".$row['last_name'].'?\')" class="btn btn-danger btn-sm">
                                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            ';
                                            $no++;
                                        }
                                    }
                                    ?>
                            </table>
                        </div>
                </div>
            </div> <!--End of col-md-12-->
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
    <!--contact ends-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/smoothScroll.js"></script>
    <script src="js/preloader.js"></script>
    <script src="js/tooltip.js"></script>
    <script>
        function filterData() {
                var input, filter, table, tr, td, i;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");

                for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }       
                }
            }
            
             function resetName(){
                document.getElementById("Name").reset;
            }
    </script>
    
  </body>
</html>