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
    <link rel="icon" href="img/scisLogo.png">
  </head>
  <body>

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
        </div>
    </header>
    <!--/ header-->

    <section class="section-padding">
        <form class="form-inline" method="get">
        <div class="container-fluid">

            <div class="col text-center">
                <h1 class="top-title">List of Practicum 2 <span class="title">Companies </span></h1>
                
            </div>

            <a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>
            <?php
            if(isset($_GET['action']) == 'delete'){
                $coid = $_GET['coid'];
                $con = mysqli_query($connect, "SELECT * FROM company NATURAL JOIN students WHERE company.coid=$coid");
                if(mysqli_num_rows($con) != 0){
                    echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <span class="fa fa-exclamation-triangle"></span> You <strong> cannot delete a company </strong> with present OJT students.</div>';
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
                    <div class="col-md-10">

                   
                <div class="input-group dropdown-toggle">
                    <span class="input-group-addon" id="basic-addon1">Filter By:</span>
                    <select name="filter" class="form-control touch" onchange="form.submit()">
                        <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
                        <option value="none" <?php if($filter == 'none'){ echo 'selected'; } ?>>None</option>
                        <option value="Government" <?php if($filter == 'government'){ echo 'selected'; } ?>>Government</option>
                        <option value="Private" <?php if($filter == 'private'){ echo 'selected'; } ?>>Private</option>
                    </select>
                </div>

                <div class="input-group dropdown-toggle">
                    <span class="input-group-addon" id="basic-addon1">Number of Rows:</span>
                                <select name="viewperpage" class="form-control touch" onchange="form.submit()">
                                    <?php $viewperpage = (isset($_GET['viewperpage']) ? strtolower($_GET['viewperpage']) : NULL);  ?>
                                    <option value="all" <?php if($viewperpage == 'all'){ echo 'selected'; } ?>>All</option>
                                    <option value="10" <?php if($viewperpage == '10'){ echo 'selected'; } ?>>10</option>
                                    <option value="20" <?php if($viewperpage == '20'){ echo 'selected'; } ?>>20</option>
                                    <option value="50" <?php if($viewperpage == '50'){ echo 'selected'; } ?>>50</option>
                                    <option value="100" <?php if($viewperpage == '100'){ echo 'selected'; } ?>>100</option>   
                                </select>
                </div>

                <div class="input-group">
                                <span class="input-group-btn">
                                    <?php
                                    $search_input = (isset($_GET['search_input']) ? strtolower($_GET['search_input']) : NULL);
                                    ?>
                                    <input placeholder = "Search" onchange="form.submit()" name = "search_input" type="text" class="form-control input-xxlarge" value = "<?php echo $search_input ?>">
                                    <button class="form-control">Search</button>
                                </span>
                            </div>
            </form>

                    </div>
                    <div class="col-md-2 text-center paddingTopSlight">
                        <a class="btn btn-success" href="addcompany.php" role="button"> <span class="glyphicon glyphicon-plus space"></span>Add Company</a>
                    </div>
                </div>
            </div>

            <div class="table-responsive paddingTopSlight">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr class="info">
                            <th>No</th>
                            <th width="1%" class="text-right">
                                <div class="btn-group-vertical">
                                    <input class="btn arrowSort" type="submit" name="coname" value="&#9650;">
                                    <input class="btn arrowSort" type="submit" name="coname" value="&#9660;">
                                </div>
                            </th>
                            <th class="align-middle">Company Name</th>
                            <th class="text-center">Address</th>
                            <th width="1%" class="text-right">
                                <div class="btn-group-vertical">
                                    <input class="btn arrowSort" type="submit" name="typeofcompany" value="&#9650;">
                                    <input class="btn arrowSort" type="submit" name="typeofcompany" value="&#9660;">
                                </div>
                            </th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Company Head</th>
                            <th class="text-center">Position</th>
                            <th width="1%" class="text-right">
                                <div class="btn-group-vertical">
                                    <input class="btn arrowSort" type="submit" name="countstudent" value="&#9650;">
                                    <input class="btn arrowSort" type="submit" name="countstudent" value="&#9660;">
                                </div>
                            </th>
                            <th class="text-center touch">Number of OJT Student/s</th>
                            <th width="1%" class="text-right">
                                <div class="btn-group-vertical">
                                    <input class="btn arrowSort" type="submit" name="moa" value="&#9650;">
                                    <input class="btn arrowSort" type="submit" name="moa" value="&#9660;">
                                </div>
                            </th>
                            <th class="text-center touch">MOA</th>
                            <th class="text-center">Action</th>
                        </tr>

                    </thead>
                    <?php 
                     $coname = (isset($_GET['coname']) ? strtolower($_GET['coname']) : NULL);
                    $coaddress = (isset($_GET['coaddress']) ? strtolower($_GET['coaddress']) : NULL);
                    $typeofcompany = (isset($_GET['typeofcompany']) ? strtolower($_GET['typeofcompany']) : NULL);
                    $company_head = (isset($_GET['company_head']) ? strtolower($_GET['company_head']) : NULL);
                    $position = (isset($_GET['position']) ? strtolower($_GET['position']) : NULL);
                    $moa = (isset($_GET['moa']) ? strtolower($_GET['moa']) : NULL);
                    $countstudent = (isset($_GET['countstudent']) ? strtolower($_GET['countstudent']) : NULL);

                    $sort = 'coname';

                                switch ($coname) {
                                    case "▲":
                                        $sort = 'coname';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'coname DESC';
                                        break;
                                }

                                switch ($coaddress) {
                                    case "▲":
                                        $sort = 'coaddress, coname';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'coaddress DESC, coname';
                                        break;
                                }

                                switch ($typeofcompany) {
                                    case "▲":
                                        $sort = 'typeofcompany, coname';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'typeofcompany DESC, coname';
                                        break;
                                }

                                switch ($company_head) {
                                    case "▲":
                                        $sort = 'company_head, coname';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'company_head DESC, coname';
                                        break;
                                }

                                switch ($position) {
                                    case "▲":
                                        $sort = 'position, coname';
                                        break;
                                    
                                    case "▼":
                                        $sort = 'position DESC, coname';
                                        break;
                                }

                                 switch ($moa) {
                                    case "▼":
                                        $sort = 'moa, coname';
                                        break;
                                    
                                    case "▲":
                                        $sort = 'moa DESC, coname';
                                        break;
                                }

                                switch ($countstudent) {
                                    case "▼":
                                        $sort = 'countstudent, coname';
                                        break;
                                    
                                    case "▲":
                                        $sort = 'countstudent DESC, coname';
                                        break;
                                }




                        $t=mysqli_query($connect,"SELECT count(students.coid) as 'countstudent',coid, coname, coaddress, company_head, position, typeofcompany FROM company NATURAL JOIN students WHERE coname != 'No Company'  AND typeofcompany = '$filter' AND CONCAT_WS('', coname, coaddress, company_head, position, typeofcompany) LIKE '%".$search_input."%'"." GROUP BY coid, coname, coaddress, company_head, position, typeofcompany");
                        $total=mysqli_num_rows($t);
                        $start=0;
                        $page=0;

                        if($viewperpage == "all") {
                            $limit = $total;
                        } else {
                            $limit=$viewperpage; 
                        }
                        
                        if(isset($_GET['id'])){
                            $id=$_GET['id'];
                            $start=($id-1)*$limit;
                        } else {
                            $id=1;
                        }

                        if ($filter == 'none' || !$filter) {
                            $all=mysqli_query($connect,"SELECT count(students.coid) as 'countstudent', coid,  coname, coaddress, company_head, position, typeofcompany, moa, remark_moa, release_moa, receive_moa FROM company NATURAL JOIN students WHERE  CONCAT_WS('', coname, coaddress, company_head, position, typeofcompany) LIKE '%".$search_input."%'"." GROUP BY coid, coname, coaddress, company_head, position, typeofcompany, moa, remark_moa, release_moa, receive_moa");
                            $allrows=mysqli_num_rows($all);
                            if (!$viewperpage) {
                                $limit = $allrows;
                                $sql = mysqli_query($connect, "SELECT count(students.coid) as 'countstudent',coid, coname, coaddress, company_head, position, typeofcompany, moa, remark_moa, release_moa, receive_moa FROM company NATURAL JOIN students WHERE CONCAT_WS('', coname, coaddress, company_head, position, typeofcompany) LIKE '%".$search_input."%'"." GROUP BY coid, coname, coaddress, company_head, position, typeofcompany, moa, remark_moa, release_moa, receive_moa ORDER BY ".$sort." LIMIT $start,$limit");
                            }else if ($viewperpage == "all") {
                                $limit = $allrows;
                                $sql = mysqli_query($connect, "SELECT count(students.coid) as 'countstudent',coid, coname, coaddress, company_head, position, typeofcompany, moa, remark_moa, release_moa, receive_moa FROM company NATURAL JOIN students WHERE CONCAT_WS('', coname, coaddress, company_head, position, typeofcompany) LIKE '%".$search_input."%'"." GROUP BY coid, coname, coaddress, company_head, position, typeofcompany, moa, remark_moa, release_moa, receive_moa ORDER BY ".$sort." LIMIT $start,$limit");
                            } else {
                                $sql = mysqli_query($connect, "SELECT count(students.coid) as 'countstudent',coid, coname, coaddress, company_head, position, typeofcompany, moa, remark_moa, release_moa, receive_moa FROM company NATURAL JOIN students WHERE CONCAT_WS('', coname, coaddress, company_head, position, typeofcompany) LIKE '%".$search_input."%'"." GROUP BY coid, coname, coaddress, company_head, position, typeofcompany, moa, remark_moa, release_moa, receive_moa ORDER BY ".$sort." LIMIT $start,$viewperpage");
                                $page=ceil($allrows/$viewperpage);
                            }
                        } else if($filter){
                            if($viewperpage == "all") {
                                $limit = $total;
                            }
        
                            if($total != 0) {
                                $page=ceil($total/$limit);
                            }
                            $sql = mysqli_query($connect, "SELECT count(students.coid) as 'countstudent',coid, coname, coaddress, company_head, position, typeofcompany, moa, remark_moa, release_moa, receive_moa FROM company NATURAL JOIN students WHERE typeofcompany = '$filter' AND CONCAT_WS('', coname, coaddress, company_head, position, typeofcompany) LIKE '%".$search_input."%'"." GROUP BY coid, coname, coaddress, company_head, position, typeofcompany, moa, remark_moa, release_moa, receive_moa ORDER BY ".$sort." LIMIT $start,$limit");
                        } 
                    ?>

                    
                            <?php 

                                    if ($page > 1){
                                        if($id > 1) {
                                        echo ' <div class="text-center"><ul class="pagination list-group"><li><a href="?filter='.$filter.'&viewperpage='.$viewperpage.'&id='.($id-1).'">Previous</a></li>';
                                        } else {
                                            echo '<div class="text-center"><ul class="pagination list-group"><li><a href="?filter='.$filter.'&viewperpage='.$viewperpage.'&id=1">Previous</a></li>';
                                        }

                                        for($i=1; $i <= $page; $i++){
                                         echo '<li><a href="?filter='.$filter.'&viewperpage='.$viewperpage.'&id='.$i.'&search_input='.$search_input.'" ';
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
                                            echo '<li><a href="?filter='.$filter.'&viewperpage='.$viewperpage.'&id='.($id+1).'">Next</a></li></ul></div>';
                                        } else {
                                            echo '<li><a href="?filter='.$filter.'&viewperpage='.$viewperpage.'&id='.$page.'">Next</a></li></ul></div>';
                                        }
                                    }
                                ?> 
                        <?php
                        if(mysqli_num_rows($sql) == 0){
                            echo '<tr class="nothingToDisplay text-center"><td colspan="14">Nothing to Display</td></tr>';
                        }else{
                            if($id == 1) {
                                $no = 1;
                            } else {
                                $no = $viewperpage * ($id-1) + 1;
                            }
                            while($row = mysqli_fetch_assoc($sql)){
                                echo '
                                <tr>
                                    <td>'.$no.'</td>
                                    <td colspan="2" class="col-md-2"><a href="profilecompany.php?coid='.$row['coid'].'">'.strip_tags(htmlentities($row['coname'])).'</a></td>
                                    <td>'.strip_tags(htmlentities($row['coaddress'])).'</td>';
                                            echo '
                                    <td colspan="2" class = "text-center">';
                                    if ($row['typeofcompany'] == 'Private'){
                                        echo '<span class="label label-primary">Private</span> <br>';
                                    } else if ($row['typeofcompany'] == 'Government'){
                                        echo '<span class="label label-info">Government</span> <br>';
                                    }
                          
                                echo '
                                <td class="col-md-1">'.strip_tags(htmlentities($row['company_head'])).'</td>
                                <td class="col-md-2" >'.strip_tags(htmlentities($row['position'])).'</td>
                                        <td colspan="2" class="text-center col-md-1"><a class="touch" type="button" data-toggle="modal" data-target="#'.$row['coid'].'"><span class="countNumber">'.$row['countstudent'].'</span></a></td>
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
                                        ';
                                        echo '
                                            <td colspan="2" class="text-center">
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
                                echo '
                                    <td>
                                        <a href="editcompany.php?coid='.$row['coid'].'" title="Edit Data" class="btn btn-success btn-sm">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        </a>
                                        <a href="company.php?action=delete&coid='.$row['coid'].'" title="Remove Company" ';
                                $con = mysqli_query($connect, "SELECT * FROM company NATURAL JOIN students WHERE company.coid=".$row['coid']);
                                if(mysqli_num_rows($con) == 0){
                                echo 'onclick="return confirm(\'Are you sure you want to delete '.strip_tags(htmlentities($row['coname'])).'?\')"';
                                }
                                echo 'class="confirm btn btn-danger btn-sm" >
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
        </form>
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
    <script src="js/tooltip.js"></script>
  
  </body>
</html>