<?php include "includes/header.php"?>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">CMS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <?php include "includes/top_sidebar.php"?>

            <?php include "includes/left_sidebar.php"?>
            <!-- /.navbar-collapse -->
        </nav>
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <?php 
                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        }else{
                            $source = "";
                        }
                        switch($source){
                            case "add_student";
                                include "includes/add_student.php";
                                break;
                                case "edit_student";
                                include "includes/edit_student.php";
                                break;    
                            
                            default: 
                                include "includes/view_all_students.php";

                        }
                        ?>

                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    
    <?php include "includes/footer.php"?>