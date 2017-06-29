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
        

    <div class="text-center sect bg">
        <div class="wow fadeIn">
            <h2 class="top-title">List of Practicum 2 <span class="title">Companies</span></h2>
        </div>
    </div>

    <section class="section-padding">
        <div class="container-fluid">
            <a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>
            <?php
            if(isset($_GET['action']) == 'delete'){
                $coid = $_GET['coid'];
                $con = mysqli_query($connect, "SELECT * FROM company JOIN students ON company.coid = students.coid WHERE company.coid=$coid");
                if(mysqli_num_rows($con) != 0){
                    echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <span class="fa fa-exclamation-triangle"></span> You <strong> cannot delete a company </strong> with present OJT students</div>';
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
                        <option value="none" <?php if($filter == 'none'){ echo 'selected'; } ?>>None</option>
                        <option value="Government" <?php if($filter == 'government'){ echo 'selected'; } ?>>Government</option>
                        <option value="Private" <?php if($filter == 'private'){ echo 'selected'; } ?>>Private</option>
                    </select>
                </div>

                <div class="form-group input-group dropdown-toggle">
                                <span class="input-group-btn">  
                                    <input style="width:150px;" type="text" class="form-control black" placeholder="Number of rows:" readonly>
                                 </span>
                                <select name="sort" class="btn btn-default form-control touch" onchange="form.submit()">
                                    <?php $sort = (isset($_GET['sort']) ? strtolower($_GET['sort']) : NULL);  ?>
                                    <option value="all" <?php if($sort == 'all'){ echo 'selected'; } ?>>All</option>
                                    <option value="10" <?php if($sort == '10'){ echo 'selected'; } ?>>10</option>
                                    <option value="20" <?php if($sort == '20'){ echo 'selected'; } ?>>20</option>
                                    <option value="50" <?php if($sort == '50'){ echo 'selected'; } ?>>50</option>
                                    <option value="100" <?php if($sort == '100'){ echo 'selected'; } ?>>100</option>   
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

            <div class="table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr class="info">
                            <th id="no" class="text-center touch"><span class="fa fa-sort space"></span>No</th>
                            <th id="name" class="text-center touch"><span class="fa fa-sort space"></span>Company Name</th>
                            <th id="address" class="text-center">Address</th>
                            <th id="type" class="text-center touch"><span class="fa fa-sort space"></span>Type</th>
                            <th id="head" class="text-center">Company Head</th>
                            <th id="position" class="text-center">Position</th>
                            <th id="number" class="text-center touch"><span class="fa fa-sort space"></span>Number of OJT Student/s</th>
                            <th id="moa" class="text-center touch"><span class="fa fa-sort space"></span>MOA</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <?php
                        $t=mysqli_query($connect,"SELECT * from company WHERE coname != 'No Company' AND typeofcompany = '$filter'");
                        $total=mysqli_num_rows($t);
                        $start=0;
                        $page=0;
                        if($sort == "all") {
                            $limit = $total;
                        } else {
                            $limit=$sort; 
                        }
                        
                        if(isset($_GET['id'])){
                            $id=$_GET['id'];
                            $start=($id-1)*$limit;
                        } else {
                            $id=1;
                        }
                        if ($filter == 'none' || !$filter) {
                            $all=mysqli_query($connect,"SELECT * from company");
                            $allrows=mysqli_num_rows($all);
                            if (!$sort) {
                                $limit = $allrows;
                                $sql = mysqli_query($connect, "SELECT * from company WHERE coname != 'No Company' ORDER BY coname ASC LIMIT $start,$limit");
                            }else if ($sort == "all") {
                                $limit = $allrows;
                                $sql = mysqli_query($connect, "SELECT * from company WHERE coname != 'No Company' ORDER BY coname ASC LIMIT $start,$limit");
                            } else {
                                $sql = mysqli_query($connect, "SELECT * from company WHERE coname != 'No Company' ORDER BY coname ASC LIMIT $start,$sort");
                                $page=ceil($allrows/$sort);
                            }
                        } else if($filter){
                            if($sort == "all") {
                                $limit = $total;
                            }
        
                            if($total != 0) {
                                $page=ceil($total/$limit);
                            }
                            $sql = mysqli_query($connect, "SELECT * from company WHERE coname != 'No Company' AND typeofcompany = '$filter' ORDER BY coname ASC LIMIT $start,$limit");
                        } 
                    ?>

                    <div class="text-center">
                        <ul class="pagination">
                            <?php 
           
                                if ($page > 1){
                                    if($id > 1) {
                                    echo '<li><a href="?filter='.$filter.'&sort='.$sort.'&id='.($id-1).'">Previous</a></li>';
                                    } else {
                                        echo '<li><a href="?filter='.$filter.'&sort='.$sort.'&id=1">Previous</a></li>';
                                    }
                                    for($i=1; $i <= $page; $i++){
                                     echo '<li><a href="?filter='.$filter.'&sort='.$sort.'&id='.$i.'" ';
                                        if($id == $i) {
                                            echo 'class="list-group-item active">'.$i.'</a></li>';
                                        } else {
                                            echo '>'.$i.'</a></li>';
                                        }
                                    }
                                    if (!$id) {
                                        $id = 1;
                                    }
                                    if($id!=$page) {
                                        echo '<li><a href="?filter='.$filter.'&sort='.$sort.'&id='.($id+1).'">Next</a></li>';
                                    } else {
                                        echo '<li><a href="?filter='.$filter.'&sort='.$sort.'&id='.$page.'">Next</a></li>';
                                    }
                                }
                            ?>
                        </ul>
                    </div>

                        <?php
                        if(mysqli_num_rows($sql) == 0){
                            echo '<tr class="nothingToDisplay text-center"><td colspan="14">Nothing to Display</td></tr>';
                        }else{
                            if($id == 1) {
                                $no = 1;
                            } else {
                                $no = $sort * ($id-1) + 1;
                            }
                            while($row = mysqli_fetch_assoc($sql)){
                                echo '
                                <tr>
                                    <td>'.$no.'</td>
                                    <td class="col-md-2"><a href="profilecompany.php?coid='.$row['coid'].'">'.$row['coname'].'</a></td>
                                    <td class="col-md-4">'.$row['coaddress'].'</td>';
                                            echo '
                                    <td class = "text-center">';
                                    if ($row['typeofcompany'] == 'Private'){
                                        echo '<span class="label label-primary">Private</span> <br>';
                                    } else if ($row['typeofcompany'] == 'Government'){
                                        echo '<span class="label label-info">Government</span> <br>';
                                    }
                          
                                echo '
                                <td >'.$row['company_head'].'</td>
                                <td class="col-md-1">'.$row['position'].'</td>
                                ';
                                $con = mysqli_query($connect, "SELECT count(idnum) AS countidnum FROM students JOIN company ON students.coid = company.coid where coname = '".mysqli_real_escape_string($connect,$row['coname'])."'");
                                while ($row1 = mysqli_fetch_assoc($con)) {
                                    echo '
                                        <td class="text-center"><a class="touch" type="button" data-toggle="modal" data-target="#'.$row['coid'].'"><span class="countNumber">'.$row1['countidnum'].'</span></a></td>
                                            <div id="'.$row['coid'].'" class="modal fade" role="dialog">
                                              <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title text-center">'.$row['coname'].'</h4>
                                                  </div>
                                                  <div class="modal-body text-center">
                                                    <h2 class="infoStudent">Practicum Student/s</h2>
                                                ';
                                $con1 = mysqli_query($connect, "SELECT * from students JOIN company ON students.coid = company.coid where coname = '".mysqli_real_escape_string($connect,$row['coname'])."' ORDER BY last_name, first_name");
                                while ($row2 = mysqli_fetch_assoc($con1)) {
                                        echo '
                                            <p class="student"><a href="profile.php?idnum='.$row2['idnum'].'">'.$row2['last_name'].", ".$row2['first_name'].'</a></p>
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
                                        ';
                                    } 
                                        echo '
                                            <td>
                                                <a class="help" data-html="true" data-toggle="tooltip" 
                                                    title=" 
                                                        Date Released: '.$row ['release_moa'].' 
                                                        <br> 
                                                        Date Received: '.$row ['receive_moa'].' 
                                                        <br> Remarks: '.$row ['remark_moa'].' " >
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
                                echo '
                                    <td>
                                        <a href="editcompany.php?coid='.$row['coid'].'" title="Edit Data" class="btn btn-success btn-sm">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        </a>
                                        <a href="company.php?action=delete&coid='.$row['coid'].'" title="Remove Company" ';
                                $con = mysqli_query($connect, "SELECT * FROM company JOIN students ON company.coid = students.coid WHERE company.coid=".$row['coid']);
                                if(mysqli_num_rows($con) == 0){
                                echo 'onclick="return confirm(\'Are you sure you want to delete '.$row['coname'].'?\')"';
                                }
                                echo 'class="btn btn-danger btn-sm">
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
                <p class="footer-company-name">&copy; Designed by OJT2 2016-2017</p>
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
    <script src="js/tooltip.js"></script>
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
            
    </script>

    <script>
        function sortTable(f,n){
            var rows = $('#myTable tbody  tr').get();
            rows.sort(function(a, b) {
                var A = getVal(a);
                var B = getVal(b);
                if(A < B) {
                    return -1*f;
                }
                if(A > B) {
                    return 1*f;
                }
                return 0;
            });
            function getVal(elm){
                var v = $(elm).children('td').eq(n).text().toUpperCase();
                if($.isNumeric(v)){
                    v = parseInt(v,10);
                }
                return v;
            }
            $.each(rows, function(index, row) {
                $('#myTable').children('tbody').append(row);
            });
        }
        var f_no = 1;
        var address = 1;
        var f_name = 1;
        var f_type = 1;
        var f_number = 1;
        var f_moa = 1;
        $("#no").click(function(){
            f_no *= -1;
            var n = $(this).prevAll().length;
            sortTable(f_no,n);
        });
        $("#name").click(function(){
            f_name *= -1;
            var n = $(this).prevAll().length;
            sortTable(f_name,n);
        });
        $("#address").click(function(){
            f_address*= -1;
            var n = $(this).prevAll().length;
            sortTable(f_address,n);
        });
        $("#number").click(function(){
            f_number *= -1;
            var n = $(this).prevAll().length;
            sortTable(f_number,n);
        });
        $("#moa").click(function(){
            f_moa *= -1;
            var n = $(this).prevAll().length;
            sortTable(f_moa,n);
        });
        $("#type").click(function(){
            f_type *= -1;
            var n = $(this).prevAll().length;
            sortTable(f_type,n);
        });
    </script>


    <script>
    $('.date').datepicker({
        format: 'yyyy-mm-dd',
    })
    </script>
    
  </body>
</html>