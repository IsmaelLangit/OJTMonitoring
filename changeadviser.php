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
    <?php
    if(isset($_POST['change'])){
        $ad_id  = $_POST['ad_id'];
        $con = mysqli_query($connect, "SELECT idnum FROM students");
        $row = mysqli_num_rows($con);

        if(!empty($_POST['check_list'])) {
            foreach($_POST['check_list'] as $check) {
                $update = mysqli_query($connect, "UPDATE students SET ad_id = ".$ad_id." where idnum = ".$check) or die(mysqli_error()); 
            }
        }

        if(!empty($_POST['company_list'])) {
            foreach($_POST['company_list'] as $check_company) {
                $update = mysqli_query($connect, "UPDATE students SET ad_id = ".$ad_id." where coid = ".$check_company) or die(mysqli_error()); 
            }
        }
    }
    ?>

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
                                <li><a href="index.php"><span class="fa fa-user space"></span>Students</a></li>
                                <li><a href="add.php"><span class="fa fa-plus space"></span>Add Student</a></li>
                                <li><a href="company.php"><span class="fa fa-building space"></span>Companies</a></li>
                                <li><a href="addcompany.php"><span class="fa fa-plus space"></span>Add Company</a></li>
                                <li class="active"><a href="advisers.php"><span class="fa fa-address-book space"></span>Advisers</a></li>
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
        <form method = "post">
        <div class="container">
            <div class="col text-center">
                <h1 class="top-title">List of Practicum 2 <span class="title">Advisers </span></h1>  
            </div>
            <?php               
            $sql1 =mysqli_query($connect,"SELECT idnum, concat(last_name, ', ', first_name) as Name, coname, adviser, coid from company NATURAL JOIN students NATURAL JOIN advisers ORDER BY last_name, first_name");
            $sql2 = mysqli_query($connect, "SELECT count(students.coid) as countstudents, coname, coid from company NATURAL JOIN students WHERE coname != 'No Company' GROUP BY 2,3");
            ?>
            <a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>

            <div class="form-group">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label">Set adviser</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select name="ad_id" class="form-control touch">
                                                <option value='1'>No Current Adviser</option>
                                                <?php
                                                    $con = mysqli_query($connect, "SELECT * FROM advisers where adviser != 'No Adviser' ORDER BY adviser ASC");
                                                    while ($row = mysqli_fetch_assoc($con)) {
                                                        echo "<option value='".$row["ad_id"]."'>".htmlentities($row["adviser"])."</option>";
                                                    }
                                                    echo "</select>";
                                                    ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

            <div class="row paddingTopSlight">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                <table class="table table-hover table-responsive" id="myTable">
                    <thead>
                        <tr class="info">
                            <th>ID No.</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Current Adviser</th>
                            <th>Change</th>
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
                                    <td>'.$row['adviser'].'</td>
                                    <td><input type = "checkbox" name = "check_list[]"  value = "'.$row['idnum'].'"></td>
                                </tr>
                                ';
                            }
                        }
                    ?>
  
                    </tbody>
                </table>
            </div>


            <div class="table-responsive">
                <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search for names.." title="Type in a name">
                <table class="table table-hover" id="myTable2">
                    <thead>
                        <tr class="info">
                            <th>Company Name</th>
                            <th>Total Students</th>
                            <th>Change</th>
                        </tr>
                    </thead>

                    <?php 

                        if(mysqli_num_rows($sql2) == 0){
                            echo '<tr class="nothingToDisplay text-center"><td colspan="14">Nothing to Display</td></tr>';
                        }else{
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
                                    <td><input type = "checkbox" name = "company_list[]"  value = "'.$row['coid'].'"></td>           
                                </tr>
                                ';
                            }
                        }
                        ?>
                </table>
            </div>
            <div class="form-group text-center">
                <div class="col">
                    <button type="submit" name="change" class="btn btn-md btn-success disableHighlight" value="Change Adviser"><span class="fa fa-plus space"></span>Change Adviser</button>
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
            var td1 = tr[i].getElementsByTagName("td")[1];
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
  </body>
</html>