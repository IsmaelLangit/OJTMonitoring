<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Visitation</title>
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

                                <li class="dropdown active">
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
        <form method = "post">
            <div class="container form-group">

                <div class="col text-center">
                        <?php
                        if(isset($_POST['change'])){
                            $choice_visit = $_POST['choice_visit'];
                            $con = mysqli_query($connect, "SELECT idnum FROM students");
                            $row = mysqli_num_rows($con);

                            if(!empty($_POST['check_list'])) {
                                foreach($_POST['check_list'] as $check) {
                                    if($choice_visit == "yes") {
                                        $update = mysqli_query($connect, "UPDATE students SET vis_status = 'yes' where idnum = ".$check) or die(mysqli_error()); 
                                    } else if($choice_visit == "no") {
                                        $update = mysqli_query($connect, "UPDATE students SET vis_status = 'no' where idnum = ".$check) or die(mysqli_error()); 
                                    }

                                    
                                }
                                echo '<div class="alert alert-success" role="alert">
                                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong> <span class = "fa fa-check-circle"></span> Success!</strong> You have updated the information.
                                                    </div>';

                            }

                            if(!empty($_POST['company_list'])) {
                                foreach($_POST['company_list'] as $check_company) {
                                    $update = mysqli_query($connect, "UPDATE students SET vis_status = 'yes' where coid = ".$check_company) or die(mysqli_error()); 
                                }
                                echo '<div class="alert alert-success" role="alert">
                                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong> <span class = "fa fa-check-circle"></span> Success!</strong> You have updated the information.
                                                    </div>';
                            }
                        }

                           

                        ?>

                    <h1 class="top-title">Edit <span class="title">Visit Status</span></h1>  
                </div>
                <?php               
                $sql1 =mysqli_query($connect,"SELECT idnum, vis_status, concat(last_name, ', ', first_name) as Name, coname, adviser, coid, ad_id from company NATURAL JOIN students NATURAL JOIN advisers ORDER BY last_name, first_name");
                $sql2 = mysqli_query($connect, "SELECT count(students.coid) as countstudents, coname, coid from company NATURAL JOIN students WHERE coname != 'No Company' GROUP BY 2,3");
                ?>
                <a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group input-group dropdown-toggle">
                            <span class="input-group-addon" id="basic-addon1"><span class="fa fa-user-circle space"></span>Visit Status: </span>
                                <select name="choice_visit" class="form-control touch">
                                    <option value='yes'>Yes</option>
                                    <option value='no'>No</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group input-group dropdown-toggle">
                            <span class="input-group-addon" id="basic-addon1"><span class="fa fa-user-circle space"></span>Change Visitation by: </span>
                                <select name="selecttable" class="form-control touch" id="tableSelect" onchange="form.submit()">
                                    <?php $selecttable = (isset($_POST['selecttable']) ? strtolower($_POST['selecttable']) : NULL);  ?>
                                    <option value="Group" <?php if($selecttable == 'group'){ echo 'selected'; } ?>>Group</option>
                                    <option value="Company" <?php if($selecttable == 'company'){ echo 'selected'; } ?>>Company</option>
                                </select>
                        </div>
                    </div>

                    

                <?php 
                 
                if(!$selecttable) {
                    $selecttable = "Group";
                } else {
                    $selecttable = $_POST['selecttable'];
                }

                if($selecttable == "Group") {

                ?>
                <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group input-group">
                                <span class="input-group-addon" id="basic-addon1"><span class="fa fa-search space"></span>Search</span>
                                <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search for names...">
                            </div>
                        </div>
                    </div>
                </div> <!--End of Row-->

                <div class="col" id="form">

                    <div class="form-group" style="height: 515px; overflow:auto;">

                        <table class="table table-hover table-responsive fixed_headers" id="myTable">
                            <thead>
                                <tr class="info">
                                    <th>ID No.</th>
                                    <th>Name</th>
                                    <th>Company</th>
                                    <th>Visitation Status</th>
                                    <th class="text-center">Change</th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(mysqli_num_rows($sql1) == 0){
                                    echo '<tr class="nothingToDisplay text-center"><td colspan="14">Nothing to Display</td></tr>';
                                }else{
                                    while($row = mysqli_fetch_assoc($sql1)){
                                        echo '
                                        <tr>
                                            <td>'.$row['idnum'].'</td>
                                            <td class="text-left"><a href="profile.php?idnum='.$row['idnum'].'"><span class="glyphicon" aria-hidden="true"></span> '.strip_tags(htmlentities($row['Name'])).'</a></td>
                                            <td><a href="profilecompany.php?coid='.$row['coid'].'">'.strip_tags(htmlentities($row['coname'])).'</a></td>
                                            <td>
                                            ';
                                            if($row['vis_status'] == 'yes'){
                                                    echo '  
                                                            <span class="glyphicon glyphicon-ok fontGlyphiconOk"></span>
                                                        </a>
                                                    </td>';
                                                }
                                                            else if ($row['vis_status'] == 'no' ){
                                                    echo '  
                                                            <span class="glyphicon glyphicon-remove fontGlyphiconNo"></span>
                                                        </a>
                                                    </td>';
                                                }

                                            
                                        echo '
                                            <td class="text-center"><input type = "checkbox" name = "check_list[]"  value = "'.$row['idnum'].'"></td>
                                        </tr>
                                        ';
                                    }
                                }
                            ?>
          
                            </tbody>
                        </table>
                    </div>
                </div>

                <?php 
                    }
                ?>

                <?php 
                if($selecttable == "Company") {

                ?>

                <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group input-group">
                                <span class="input-group-addon" id="basic-addon1"><span class="fa fa-search space"></span>Search</span>
                                <input type="text" id="myInput2" class="form-control" onkeyup="myFunction2()" placeholder="Search for names...">
                            </div>
                        </div>
                    </div>
                </div> <!--End of Row-->

                <div class="col" id="form">

                    <div class="form-group" style="height: 500px; overflow:auto;">

                        <table class="table table-hover fixed_headers" id="myTable2">
                            <thead>
                                <tr class="info">
                                    <th width="50%">Company Name</th>
                                    <th class="text-center">Total Number of Students</th>
                                    <th class="text-center">Change</th>
                                </tr>
                            </thead>

                            <?php 

                                if(mysqli_num_rows($sql2) == 0){
                                    echo '<tr class="nothingToDisplay text-center"><td colspan="14">Nothing to Display</td></tr>';
                                }else{
                                    $no = 1;

                                    while($row = mysqli_fetch_assoc($sql2)){
                                        echo '
                                        <tr>
                                            <td><a href="profilecompany.php?coid='.$row['coid'].'">'.strip_tags(htmlentities($row['coname'])).'</a></td>
                                            ';
                                  
                                            echo '
                                                <td class="text-center"><a title="View Company Students" class="touch" type="button" data-toggle="modal" data-target="#'.$row['coid'].'"><span class="countNumber">'.$row['countstudents'].'</span></a></td>
                                                    <div id="'.$row['coid'].'" class="modal fade" role="dialog">
                                                      <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title text-center">'.strip_tags(htmlentities($row['coname'])).'</h4>
                                                          </div>
                                                          <div class="modal-body text-center">
                                                            <h2 class="infoStudent">Practicum Student/s</h2>
                                                        ';
                                        $con1 = mysqli_query($connect, "SELECT * from company NATURAL JOIN students where coname = '".mysqli_real_escape_string($connect,$row['coname'])."' ORDER BY last_name, first_name");
                                        $no1 = 1;
                                        while ($row2 = mysqli_fetch_assoc($con1)) {
                                            echo '
                                                <p class="student"><a href="profile.php?idnum='.$row2['idnum'].'">'.$no1.". ".strip_tags(htmlentities($row2['last_name'])).", ".strip_tags(htmlentities($row2['first_name'])).'</a></p>
                                                ';
                                                $no1++;
                                        }
                                                echo '
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                            <td class="text-center"><input type = "checkbox" name = "company_list[]"  value = "'.$row['coid'].'"></td>           
                                        </tr>
                                        ';
                                        $no++;
                                    }
                                }
                                ?>
                        </table>
                    </div>
                </div>

                <?php 
                    }
                ?>

                <div class="form-group text-center">
                    <div class="col">
                        <button type="submit" name="change" class="btn btn-md btn-success disableHighlight" btn-collapsible alue="Change Visitation"><i class="fa fa-exchange space"></i><span>Change Visitation</span></button>
                    </div>
                </div>
            </div> <!--End of Container Fluid-->
        </form>
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
    <script src="js/tooltip.js"></script>
    <script src="js/jquery.confirm.js"></script>
    <script src="js/alertFade.js"></script>
    <script src="js/dropdown.js"></script>

    <script>
        $(".confirm").confirm();
    </script>

    <script>
        function myFunction() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            var td1 = tr[i].getElementsByTagName("td")[1];
            var td2 = tr[i].getElementsByTagName("td")[2];
            var td3 = tr[i].getElementsByTagName("td")[3];
            var td4 = tr[i].getElementsByTagName("td")[4];
            if (td1 || td2 || td3 || td4) {
              if (td1.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1 || td3.innerHTML.toUpperCase().indexOf(filter) > -1 || td4.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
        }
    </script>
    <script>
        function myFunction2() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("myInput2");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable2");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            var td1 = tr[i].getElementsByTagName("td")[0];
            if (td1) {
              if (td1.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
        }
    </script>


    <script>
        $(document).ready(function() {
            $('.table tr').click(function(event) {
                if (event.target.type !== 'checkbox') {
                    $(':checkbox', this).trigger('click');
                }
            });
        });
    </script>    
  </body>
</html>