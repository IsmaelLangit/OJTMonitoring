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
                                <li><a href="advisers.php"><span class="fa fa-address-book space"></span>list of Advisers</a></li>
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
                            $sql = mysqli_query($connect, "SELECT * from advisers NATURAL JOIN students NATURAL JOIN company WHERE ad_id='$ad_id'");
                            $row = mysqli_fetch_assoc($sql);
                            if (substr($row ['lname'], -1) == "s") {
                                echo htmlentities($row ['lname'])."'";
                            } else if (substr($row ['lname'], -1) != "s"){
                                 echo htmlentities($row ['lname'])."'s";
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
                            <th width="10%">No</th>
                            <th width="12%" class="text-left">Student Name</th>
                            <th width="10%" class="text-left">
                                <div class="btn-group-vertical">
                                    <input title="Sort by Ascending" class="btn arrowSort" type="submit" name="adviser" value="&#9650;">
                                    <input title="Sort by Descending" class="btn arrowSort" type="submit" name="adviser" value="&#9660;">
                                </div>
                            </th>
                            <th width="12%" class="text-right">Company Name</th>
                            <th width="10%" class="text-left">
                                <div class="btn-group-vertical">
                                    <input title="Sort by Ascending" class="btn arrowSort" type="submit" name="adviser" value="&#9650;">
                                    <input title="Sort by Descending" class="btn arrowSort" type="submit" name="adviser" value="&#9660;">
                                </div>
                            </th>
                            <th width="12%" class="text-right">Visit Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
             
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Ismael Langit</td>
                                <td>SLU SCIS IT/CS Department</td>
                                
                                <td><span class="glyphicon glyphicon-remove fontGlyphiconNo"></td>
                                <td>
                                    <button type="button" title="Edit Data" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editStudent"> <span class="glyphicon glyphicon-edit" aria-hidden="true"> </span>
                                    </button>

                                    <div class="modal fade" id="editStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center">Ismael Langit</h4>
                                          </div>
                                          <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label class="control-label">Name</label>
                                                        <input type="text" class="form-control" name="" value="" class="form-control" placeholder="Student Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Company Name</label>
                                                        <select name="coid" class="form-control touch">
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Visited</label>
                                                        <div class="form-check form-check-inline">
                                                          <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"> Yes
                                                          </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                          <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2"> No
                                                          </label>
                                                        </div>
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


                                    <a href="" title="Remove Student" class="confirm btn btn-danger btn-sm"
                                            data-text="Are you sure you want to delete (NAME)"                                            '" data-confirm-button="Yes"
                                            data-cancel-button="No"
                                            data-confirm-button-class= "btn-success"
                                            data-cancel-button-class= "btn-danger"
                                            data-title="Delete Student">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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

    <script>
    $('.date').datepicker({
        format: 'yyyy-mm-dd',
    })
    </script>
    
  </body>
</html>