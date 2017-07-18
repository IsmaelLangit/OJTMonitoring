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
                                <li><a href="index.php"><span class="fa fa-user space"></span>Students</a></li>
                                <li><a href="add.php"><span class="fa fa-plus space"></span>Add Student</a></li>
                                <li><a href="company.php"><span class="fa fa-building space"></span>Companies</a></li>
                                <li><a href="addcompany.php"><span class="fa fa-plus space"></span>Add Company</a></li>
                                <li><a href="adviser.php"><span class="fa fa-address-book space"></span>Advisers</a></li>
                                <li><a href="changeadviser.php"><span class="fa fa-exchange space"></span>Change Adviser</a></li>
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
                            $ad_id = $_GET['ad_id'];
                            $sql = mysqli_query($connect, "SELECT * from advisers WHERE ad_id='$ad_id'");
                            $row = mysqli_fetch_assoc($sql);
                            if (substr($row ['adviser'], -1) == "s") {
                                echo htmlentities($row ['adviser'])."'";
                            } else if (substr($row ['adviser'], -1) != "s"){
                                 echo htmlentities($row ['adviser'])."'s";
                            }
                        ?>
                    </span>  
                Profile</h1>
            </div>

            <a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>

            <div class="row">
                <div class="col" style="height: 300px; overflow:auto;">
                    <table class="table table-hover table-responsive">
                        <thead>
                           <tr class="info">
                            <th width="5%">No</th>
                            <th width="10.5%" class="text-right">Student Name</th>
                            <th width="15%" class="text-left">
                                <div class="btn-group-vertical">
                                    <input title="Sort by Ascending" class="btn arrowSort" type="submit" name="adviser" value="&#9650;">
                                    <input title="Sort by Descending" class="btn arrowSort" type="submit" name="adviser" value="&#9660;">
                                </div>
                            </th>
                            <th width="11.5%" class="text-left">Company Name</th>
                            <th width="25%" class="text-left">
                                <div class="btn-group-vertical">
                                    <input title="Sort by Ascending" class="btn arrowSort" type="submit" name="adviser" value="&#9650;">
                                    <input title="Sort by Descending" class="btn arrowSort" type="submit" name="adviser" value="&#9660;">
                                </div>
                            </th>
                            <th width="12%" class="text-right">Visit Status</th>
                            <th width="7%" class="text-left">
                                <div class="btn-group-vertical">
                                    <input title="Sort by Ascending" class="btn arrowSort" type="submit" name="adviser" value="&#9650;">
                                    <input title="Sort by Descending" class="btn arrowSort" type="submit" name="adviser" value="&#9660;">
                                </div>
                            </th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
             
                        <tbody>
                            <?php
                            $sql =mysqli_query($connect,"SELECT idnum, concat(last_name, ', ', first_name) as Name, coname, vis_status, remark_visit, ad_id from company NATURAL JOIN students NATURAL JOIN advisers WHERE ad_id='$ad_id' ORDER BY last_name, first_name");
                                if(mysqli_num_rows($sql) == 0){
                                    echo '<tr class="nothingToDisplay text-center"><td colspan="14">Nothing to Display</td></tr>';
                                }else{
                                    $no = 1;
                                    while($row = mysqli_fetch_assoc($sql)){
                            ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <!--Student Name Column-->
                                <td colspan="2"><?php echo strip_tags(htmlentities($row ['Name'])) ?></td>
                                <!--Company Column-->
                                <td colspan="2"><?php echo strip_tags(htmlentities($row ['coname'])) ?></td>
                                <!--Visit Status Column-->
                                <td colspan="2">
                                <?php
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
                                ?>
                                <!--Action Column-->
                                <td class="text-center">

                                    <?php
                                    echo '

                                    <button type="button" title="Edit Data" class="btn btn-success btn-sm" data-toggle="modal" data-target="#'.$row['idnum'].'"><span class="glyphicon glyphicon-edit" aria-hidden="true"> </span>
                                    </button>

                                    <!--Modal for Edit Student-->
                                    <div id="'.$row['idnum'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    ';

                                    ?>
                                      <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center"><?php echo strip_tags(htmlentities($row ['Name'])) ?></h4>
                                          </div>
                                          <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label class="control-label">Visited</label>
                                                        <div class="form-check form-check-inline">
                                                          <label class="form-check-label">
                                                            <input class="form-check-input" name = "vis_status" type="radio" id="inlineCheckbox1" value="yes" <?php if(strip_tags(htmlentities($row ['vis_status'])) == 'yes'){ echo 'checked'; }?>> Yes
                                                          </label>
                                                          <label class="form-check-label">
                                                            <input class="form-check-input" name = "vis_status" type="radio" id="inlineCheckbox2" value="no" <?php if(strip_tags(htmlentities($row ['vis_status'])) == 'no'){ echo 'checked'; }?>> No
                                                          </label>
                                                        </div>
                                                        <label class='control-label'>Remark/s</label>
                                                        <textarea maxlength = '200' rows="5" class="form-control" name="remark_moa" class="form-control"> <?php echo strip_tags(htmlentities($row ['remark_visit'])); ?></textarea>
                                                    </div>
                                                </form>
                                          </div>
                                          <div class="modal-footer">
                                                <button type="button" class="btn btn-success">Edit</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <!--Deleting Student-->
                                    <a href="" title="Remove Student" class="confirm btn btn-danger btn-sm"
                                            data-text="Are you sure you want to delete (NAME)" data-confirm-button="Yes"
                                            data-cancel-button="No"
                                            data-confirm-button-class= "btn-success"
                                            data-cancel-button-class= "btn-danger"
                                            data-title="Delete Student">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </a>
                                </td>
                            </tr>
                            <?php
                            $no++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div> <!--End of Col-->
            </div> <!--End of Row-->

            
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

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/smoothScroll.js"></script>
    <script src="js/tooltip.js"></script>
    <script src="js/jquery.confirm.js"></script>

    <script>
        $(".confirm").confirm();
    </script>
    
  </body>
</html>