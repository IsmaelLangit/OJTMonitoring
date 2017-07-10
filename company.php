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
                                <li class="active"><a href="company.php"><span class="fa fa-building space"></span>list of Companies</a></li>
                                <li><a href="addcompany.php"><span class="fa fa-plus space"></span>Add Company</a></li>
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
        <form class="form-inline" method="get">

        <div class="container-fluid">
            <div class="col text-center">
                <h1 class="top-title">List of Practicum 2 <span class="title">Companies </span></h1>  
            </div>

            <a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>
            <?php
            if(isset($_GET['action']) == 'delete'){
                $coid = $_GET['coid'];
                $con = mysqli_query($connect, "SELECT * FROM company NATURAL JOIN students WHERE coid=".$coid);
                if (mysqli_num_rows($con) == 0) {
                    $delete = mysqli_query($connect, "DELETE FROM company WHERE coid='$coid'");
                    if($delete){
                        echo '<div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <span class = "fa fa-check-circle"></span> You have successfully <strong> deleted </strong> the company!
                                </div>';
                    }  
                } else {
                     echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <span class="fa fa-exclamation-triangle"></span> You <strong> cannot delete a company </strong> with present OJT students.</div>';
    
                    }
                }
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10">


                   
                <div class="input-group dropdown-toggle">
                                <span class="input-group-addon" id="basic-addon1"><span class="fa fa-filter space"></span>Filter By:</span>
                    <select name="filter" class="form-control touch" onchange="form.submit()">
                        <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
                        <option value="none" <?php if($filter == 'none'){ echo 'selected'; } ?>>None</option>
                        <option value="Government" <?php if($filter == 'government'){ echo 'selected'; } ?>>Government</option>
                        <option value="Private" <?php if($filter == 'private'){ echo 'selected'; } ?>>Private</option>
                    </select>
                </div>

                <div class="input-group dropdown-toggle">
                                <span class="input-group-addon" id="basic-addon1"><span class="fa fa-list-ol space"></span>Number of Rows:</span>
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
                                    <button class="form-control"><span class="fa fa-search space"></span>Search</button>
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
                            <th class="text-center">No</th>
                            <th width="10%" class="text-right">Company Name</th>
                            <th width="0.5%" class="text-left">
                                <div class="btn-group-vertical">
                                    <input title="Sort Ascending" class="btn arrowSort" type="submit" name="coname" value="&#9650;">
                                    <input title="Sort Descending" class="btn arrowSort" type="submit" name="coname" value="&#9660;">
                                </div>
                            </th>
                            <th class="text-center">Address</th>
                            <th class="text-right">Type</th>
                            <th width="0.5%" class="text-left">
                                <div class="btn-group-vertical">
                                    <input title="Sort by Government" class="btn arrowSort" type="submit" name="typeofcompany" value="&#9650;">
                                    <input title="Sort by Private" class="btn arrowSort" type="submit" name="typeofcompany" value="&#9660;">
                                </div>
                            </th>
                            
                            <th class="text-center">Company Head</th>
                            <th class="text-center">Position</th>
                            <th class="text-center">Contact Person</th>
                            <th class="text-center">Position</th>
                            <th width="7%" class="text-center">Number of OJT Student/s</th>
                            <th width="0.5%" class="text-left">
                                <div class="btn-group-vertical">
                                    <input title="Sort by without MOA" class="btn arrowSort" type="submit" name="countstudents" value="&#9650;">
                                    <input title="Sort by with MOA" class="btn arrowSort" type="submit" name="countstudents" value="&#9660;">
                                </div>
                            </th>
                            <th class="text-right">MOA</th>
                            <th width="0.5%" class="text-left">
                                <div class="btn-group-vertical">
                                    <input title="Sort by without MOA" class="btn arrowSort" type="submit" name="moa" value="&#9650;">
                                    <input title="Sort by with MOA" class="btn arrowSort" type="submit" name="moa" value="&#9660;">
                                </div>
                            </th>
                            
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <?php 
                        $coname = (isset($_GET['coname']) ? strtolower($_GET['coname']) : NULL);
                        $coaddress = (isset($_GET['coaddress']) ? strtolower($_GET['coaddress']) : NULL);
                        $typeofcompany = (isset($_GET['typeofcompany']) ? strtolower($_GET['typeofcompany']) : NULL);
                        $company_head = (isset($_GET['company_head']) ? strtolower($_GET['company_head']) : NULL);
                        $position = (isset($_GET['position']) ? strtolower($_GET['position']) : NULL);
                        $contact_person = (isset($_GET['contact_person']) ? strtolower($_GET['contact_person']) : NULL);
                        $cp_position = (isset($_GET['cp_position']) ? strtolower($_GET['cp_position']) : NULL);                 
                        $moa = (isset($_GET['moa']) ? strtolower($_GET['moa']) : NULL);
                        $countstudents = (isset($_GET['countstudents']) ? strtolower($_GET['countstudents']) : NULL);
                        $sort = 'coname';
                        $sortvar = "&coname=";
                        $sortval = $coname;


                        switch ($coname) {
                            case "▲":
                                $sort = 'coname';
                                break;
                            
                            case "▼":
                                $sort = 'coname DESC';
                                break;
                        }

                        if($coname) {
                            $sortvar = "&coname=";
                            $sortval = $coname;
                        }

                        switch ($coaddress) {
                            case "▲":
                                $sort = 'coaddress, coname';
                                break;
                            
                            case "▼":
                                $sort = 'coaddress DESC, coname';
                                break;
                        }

                        if($coaddress) {
                            $sortvar = "&coaddress=";
                            $sortval = $coaddress;
                        }

                        switch ($typeofcompany) {
                            case "▲":
                                $sort = 'typeofcompany, coname';
                                break;
                            
                            case "▼":
                                $sort = 'typeofcompany DESC, coname';
                                break;
                        }

                        if($typeofcompany) {
                            $sortvar = "&typeofcompany=";
                            $sortval = $typeofcompany;
                        }

                        switch ($company_head) {
                            case "▲":
                                $sort = 'company_head, coname';
                                break;
                            
                            case "▼":
                                $sort = 'company_head DESC, coname';
                                break;
                        }

                        if($company_head) {
                            $sortvar = "&company_head=";
                            $sortval = $company_head;
                        }

                        switch ($position) {
                            case "▲":
                                $sort = 'position, coname';
                                break;
                            
                            case "▼":
                                $sort = 'position DESC, coname';
                                break;
                        }

                        if($position) {
                            $sortvar = "&position=";
                            $sortval = $position;
                        }
                                           
                        switch ($contact_person) {
                            case "▲":
                                $sort = 'contact_person, coname';
                                break;
                            
                            case "▼":
                                $sort = 'contact_person DESC, coname';
                                break;
                        }

                        if($contact_person) {
                            $sortvar = "&contact_person=";
                            $sortval = $contact_person;
                        }

                        switch ($cp_position) {
                            case "▲":
                                $sort = 'cp_position, coname';
                                break;
                            
                            case "▼":
                                $sort = 'cp_position DESC, coname';
                                break;
                        }

                        if($cp_position) {
                            $sortvar = "&cp_position=";
                            $sortval = $cp_position;
                        }

                         switch ($moa) {
                            case "▲":
                                $sort = 'moa DESC, coname';
                                break;
                            
                            case "▼":
                                $sort = 'moa , coname';
                                break;
                        }

                        if($moa) {
                            $sortvar = "&moa=";
                            $sortval = $moa;
                        }

                        switch ($countstudents) {
                            case "▲":
                                $sort = 'countstudents DESC, coname';
                                break;
                            
                            case "▼":
                                $sort = 'countstudents, coname';
                                break;
                        }

                        if($countstudents) {
                            $sortvar = "&countstudents=";
                            $sortval = $countstudents;
                        }

                        $sql_total = $pdo->prepare("SELECT * from (SELECT * from company WHERE coname != 'No Company' AND CONCAT_WS('', coname, coaddress, company_head, position, typeofcompany) LIKE ? t1 LEFT JOIN (SELECT count(coid) as countstudents, coid AS studcoid from company NATURAL JOIN students WHERE coname != 'No Company' GROUP BY 2) t2 ON t1.coid = t2.studcoid");

                        $sql_total->bindValue(1, "%$search_input%", PDO::PARAM_STR);
                        $sql_total->execute();
                        $total = $sql_total->fetch(PDO::FETCH_ASSOC);

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
                            $all=mysqli_query($connect,"SELECT * from (SELECT * from company WHERE coname != 'No Company' AND CONCAT_WS('', coname, coaddress, company_head, position, contact_person, cp_position, typeofcompany) LIKE '%".$search_input."%') t1 LEFT JOIN (SELECT count(coid) as countstudents, coid AS studcoid from company NATURAL JOIN students WHERE coname != 'No Company' GROUP BY 2) t2 ON t1.coid = t2.studcoid");
                            $allrows=mysqli_num_rows($all);
                            if (!$viewperpage || $viewperpage == "all") {
                                $limit = $allrows;
                                $sql = mysqli_query($connect, "SELECT * from (SELECT * from company WHERE coname != 'No Company' AND CONCAT_WS('', coname, coaddress, company_head, position, contact_person, cp_position, typeofcompany) LIKE '%".$search_input."%') t1 LEFT JOIN (SELECT count(coid) as countstudents, coid AS studcoid from company NATURAL JOIN students WHERE coname != 'No Company' GROUP BY 2) t2 ON t1.coid = t2.studcoid ORDER BY ".$sort." LIMIT $start,$limit");
                            } else {
                                $sql = mysqli_query($connect, "SELECT * from (SELECT * from company WHERE coname != 'No Company' AND CONCAT_WS('', coname, coaddress, company_head, position, contact_person, cp_position, typeofcompany) LIKE '%".$search_input."%') t1 LEFT JOIN (SELECT count(coid) as countstudents, coid AS studcoid from company NATURAL JOIN students WHERE coname != 'No Company' GROUP BY 2) t2 ON t1.coid = t2.studcoid ORDER BY ".$sort." LIMIT $start,$viewperpage");
                                $page=ceil($allrows/$viewperpage);
                            }
                        } else if($filter){
                            if($viewperpage == "all") {
                                $limit = $total;
                            }
        
                            if($total != 0) {
                                $page=ceil($total/$limit);
                            }

                            $sql = mysqli_query($connect, "SELECT * from (SELECT * from company WHERE coname != 'No Company' AND typeofcompany = '".$filter."' AND CONCAT_WS('', coname, coaddress, company_head, position, contact_person, cp_position, typeofcompany) LIKE '%".$search_input."%') t1 LEFT JOIN (SELECT count(coid) as countstudents, coid AS studcoid from company NATURAL JOIN students WHERE coname != 'No Company' GROUP BY 2) t2 ON t1.coid = t2.studcoid ORDER BY ".$sort." LIMIT $start,$limit");
                        } 
           
                        if ($page > 1){
                            if($id > 1) {
                            echo '<div class="text-center"><ul class="pagination"><li><a href="?filter='.$filter.'&viewperpage='.$viewperpage.'&search_input='.$search_input.$sortvar.$sortval.'&id='.($id-1).'">Previous</a></li>';
                            } else {
                                echo '<div class="text-center"><ul class="pagination"><li><a href="?filter='.$filter.'&viewperpage='.$viewperpage.'&search_input='.$search_input.$sortvar.$sortval.'&id=1">Previous</a></li>';
                            }
                            for($i=1; $i <= $page; $i++){
                             echo '<li><a href="?filter='.$filter.'&viewperpage='.$viewperpage.'&search_input='.$search_input.$sortvar.$sortval.'&id='.$i.'" ';
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
                                echo '<li><a href="?filter='.$filter.'&viewperpage='.$viewperpage.'&search_input='.$search_input.$sortvar.$sortval.'&id='.($id+1).'">Next</a></li></ul></div>';
                            } else {
                                echo '<li><a href="?filter='.$filter.'&viewperpage='.$viewperpage.'&search_input='.$search_input.$sortvar.$sortval.'&id='.$page.'">Next</a></li></ul></div>';
                            }
                        }

                        if(mysqli_num_rows($sql) == 0){
                            echo '<tr class="nothingToDisplay text-center"><td colspan="14">Nothing to Display</td></tr>';
                        }else{
                            if($id == 1) {
                                $no = 1;
                            } else {
                                $no = $viewperpage * ($id-1) + 1;
                            }

                            while($row = mysqli_fetch_assoc($sql)){
                                 if ($row['countstudents'] == '') {
                                    $row['countstudents'] = 0;
                                }

                                echo '
                                <tr>
                                    <td>'.$no.'</td>
                                    <td colspan="2" class="col-md-2"><a href="profilecompany.php?coid='.$row['coid'].'">'.strip_tags(htmlentities($row['coname'])).'</a></td>
                                    <td class="col-md-3">'.strip_tags(htmlentities($row['coaddress'])).'</td>';
                                            echo '
                                    <td  colspan="2" class = "text-center">';
                                    if ($row['typeofcompany'] == 'Private'){
                                        echo '<span class="label label-primary">Private</span> <br>';
                                    } else if ($row['typeofcompany'] == 'Government'){
                                        echo '<span class="label label-info">Government</span> <br>';
                                    }
                          
                                echo '
                                <td >'.strip_tags(htmlentities($row['company_head'])).'</td>
                                <td class="col-md-2">'.strip_tags(htmlentities($row['position'])).'</td>
                                <td >'.strip_tags(htmlentities($row['contact_person'])).'</td>
                                <td class="col-md-2">'.strip_tags(htmlentities($row['cp_position'])).'</td>
                                ';

                                    echo '
                                        <td colspan="2" class="text-center"><a class="touch" type="button" data-toggle="modal" data-target="#'.$row['coid'].'"><span class="countNumber">'.$row['countstudents'].'</span></a></td>
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
                                            <td coslpan="1" class="text-center" colspan="2">
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
                                         <a href="company.php?action=delete&coid='.$row['coid'].'" title="Delete Company" ';
                                if($row['countstudents'] == 0){
                                echo ' data-text="Are you sure you want to delete '.strip_tags(htmlentities($row['coname'])).
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
                </table>
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
  
  </body>
</html>