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

            <a href="javascript:" id="return-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>

            <div class="row text-center ">
                <button class="btn btn-primary removeButton" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Add an Adviser</button>

                <div class="form-group row panel-collapse collapse" id="collapseExample">
                  <form class="form-inline">
                      <label class="sr-only" for="inlineFormInput">Name</label>
                      <input type="text" class="form-control" id="inlineFormInput" placeholder="Enter Name of Adviser">

                      <button type="submit" class="btn btn-success removeButton">Add</button>
                    </form>
                </div>

            </div> <!--End of Row-->

            <div class="row paddingTopSlight">
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr class="info">
                            <th>No</th>
                            <th width="25%" class="text-right">Name of Adviser</th>
                            <th width="0.5%" class="text-left">
                                <div class="btn-group-vertical">
                                    <input title="Sort by Ascending" class="btn arrowSort" type="submit" name="idnum" value="&#9650;">
                                    <input title="Sort by Descending" class="btn arrowSort" type="submit" name="idnum" value="&#9660;">
                                </div>
                            </th>
                            <th width="25%" class="text-right">Total Students</th>
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
                        <tr>
                            <td>1</td>
                            <td colspan="2" class="text-center">Ma. Concepcion Clemente</td>
                            <td colspan="2" class="text-center"> 
                                <a class="touch "title="View Adviser Students touch" data-toggle="modal" data-target="#myModal"><span class="countNumber">1</span></a>
                            </td>
                            <td class="text-center">
                                <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">
                                  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title text-center">Adviser's Name</h4>
                                      </div>
                                      <div class="modal-body text-center">
                                        <h2 class="infoStudent">Practicum Student/s</h2>
                                        <p class="student">
                                            <a href="">Ismael Langit</a>
                                        </p>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <a href="" title="Remove Student" class="confirm btn btn-danger btn-sm" 
                                        data-text="Are you sure you want to delete (NAME)" 
                                        data-confirm-button="Yes"
                                        data-cancel-button="No"
                                        data-confirm-button-class= "btn-success"
                                        data-cancel-button-class= "btn-danger"
                                        data-title="Delete Adviser">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </a>
                            </td>
                        </tr>
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