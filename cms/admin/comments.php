<?php include "includes/admin_header.php"?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>



    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Welcome to here !!!
                        <small>Let do it</small>
                    </h1>

                    <?php
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }

                    switch ($source) {
                        case 'add_post';
                            require_once "includes/add_post.php";
                            break;

                        case 'edit_post';
                            require_once "includes/edit_post.php";
                            break;

                        case '100';
                            echo "NICE100";
                            break;

                        default:
                            include "includes/view_all_comments.php";
                            break;
                    }

                    ?>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>

    </div>
    <!-- /#page-wrapper -->
</div>

<?php include "includes/admin_footer.php"?>

