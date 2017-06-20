<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Company</title>
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
                                <li class="active"><a href="company.php">list of Companies</a></li>
                                <li><a href="addcompany.php">Add Company</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!--/ nav-->
            <div class="container text-center">
                <div class="wrapper wow fadeIn delay-05s " >
                    <h2 class="top-title">List of Practicum 2</h2>
                    <h3 class="title">Companies</h3>
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
                $coid = $_GET['coid'];
                $con = mysqli_query($connect, "SELECT * FROM company JOIN students ON company.coid = students.coid WHERE company.coid=$coid");
                if(mysqli_num_rows($con) != 0){
                    echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> You <strong> cannot delete a Company! </strong> with OJT students</div>';
                }else{
                    $delete = mysqli_query($connect, "DELETE FROM company WHERE coid='$coid'");
                    if($delete){
                        echo '<div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> You have successfully <strong> deleted </strong> the company!
                                </div>';
                    }else{
                        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>';
                    }
                }
            }
            ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-11">

                    <form class="form-inline" method="get">
                <div class="form-group input-group">
                    <span class="input-group-btn">  
                            <input style="width:90px;" type="text" class="form-control" placeholder="Filter By:" readonly> 
                    </span>
                    <select name="filter" class="form-control touch" onchange="form.submit()">
                        <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
                        <option value="" <?php if($filter == ''){ echo 'selected'; } ?>>None</option>
                        <option value="Company-based" <?php if($filter == 'company-based'){ echo 'selected'; } ?>>Company-based</option>
                        <option value="In-house" <?php if($filter == 'in-house'){ echo 'selected'; } ?>>In-house</option>
                        <option value="Government" <?php if($filter == 'government'){ echo 'selected'; } ?>>Government</option>
                        <option value="Private" <?php if($filter == 'private'){ echo 'selected'; } ?>>Private</option>
                    </select>
                </div>

                <form id="Name" action="#">
                    <div class="input-group">
                        <span class="input-group-btn">  
                            <input style="width:75px;" type="text" class="form-control" placeholder="Search" readonly> 
                        </span>
                        <input type="text" id="myInput" onkeyup="filterData()" class="form-control input-xxlarge">
                    </div>
                </form>

            </form>

                    </div>
                    <div class="col-md-1 text-center paddingTopSlight">
                        <a class="btn btn-success" href="addcompany.php" role="button"> <span class="glyphicon glyphicon-plus space"></span>Add Company</a>
                    </div>
                </div>
            </div>

            

            <br>

            <div class="table-responsive">
                <table class="table table-striped table-hover" id="myTable">
                    <tr class="info">
                        <th>No</th>
                        <th>Company Name</th>
                        <th>Address</th>
                        <th>Type</th>
                        <th>Company Head</th>
                        <th>Position</th>
                        <th>Number of students</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        if($filter){
                            $sql = mysqli_query($connect, "SELECT * from company WHERE coname != 'No Company' AND (typeofojt='$filter' or typeofcompany = '$filter') ORDER BY coname ASC");
                        }else{
                            $sql = mysqli_query($connect, "SELECT * from company WHERE coname != 'No Company' ORDER BY coname ASC");
                        }
                        if(mysqli_num_rows($sql) == 0){
                            echo '<tr class="nothingToDisplay text-center"><td colspan="8">Nothing to Display</td></tr>';
                        }else{
                            $no = 1;
                            while($row = mysqli_fetch_assoc($sql)){
                                echo '
                                <tr>
                                    <td>'.$no.'</td>
                                    <td><a href="profilecompany.php?coid='.$row['coid'].'"><span class="glyphicon glyphicon-home"></" aria-hidden="true"></span> '.$row['coname'].'</a></td>
                                                <td>'.$row['coaddress'].'</td>';
                                            echo '
                                    <td class = "text-center">';
                                    if($row['typeofojt'] == 'In-house' && $row['typeofcompany'] == 'Private'){
                                        echo '<span class="label label-danger">Private</span> <br>';
                                        echo '<span class="label label-info">In-house</span>';
                                    } else if($row['typeofojt'] == 'In-house' && $row['typeofcompany'] == 'Government'){
                                        echo '<span class="label label-success">Government</span> <br>';
                                        echo '<span class="label label-info">In-house</span>';
                                    } else if ($row['typeofojt'] == 'Company-based' && $row['typeofcompany'] == 'Private'){
                                        echo '<span class="label label-danger">Private</span> <br>';
                                        echo '<span class="label label-primary">Company-based</span>';
                                    } else if ($row['typeofojt'] == 'Company-based' && $row['typeofcompany'] == 'Government'){
                                        echo '<span class="label label-success">Government</span> <br>';
                                        echo '<span class="label label-primary">Company-based</span>';
                                    }

                      
                                  
                          
                                echo '
                                <td>'.$row['company_head'].'</td>
                                <td>'.$row['position'].'</td>
                                ';

                                  $con = mysqli_query($connect, "SELECT count(idnum) AS countidnum FROM students JOIN company ON students.coid = company.coid where coname = '".mysqli_real_escape_string($connect,$row['coname'])."'");
                                    while ($row1 = mysqli_fetch_assoc($con)) {
                                        echo '
                                        <td>'.$row1['countidnum'].'</td>
                                    ';
                                    } 

                                echo '
                                    <td>
                                        <a href="editcompany.php?coid='.$row['coid'].'" title="Edit Data" class="btn btn-success btn-sm">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        </a>
                                        <a href="company.php?action=delete&coid='.$row['coid'].'" title="Remove Company" onclick="return confirm(\'Are you sure you want to delete '.$row['coname'].'?\')" class="btn btn-danger btn-sm">
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
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/preloader.js"></script>
    <script>
    function filterData() {
                var input, filter, table, tr, td, i;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");

                for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                td1 = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td1.innerHTML.toUpperCase().indexOf(filter) > -1) {
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


    <script>
    $('.date').datepicker({
        format: 'yyyy-mm-dd',
    })
    </script>
    
  </body>
</html>