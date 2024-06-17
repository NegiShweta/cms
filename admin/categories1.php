<?php include "include/admin_header.php"; ?>\

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'include/admin_navigation.php'; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Author</small>
                    </h1>

                    <div class="col-xs-6">

                        <!-- insert categories -->
                        <?php insert_categories(); ?>

                        <!-- Add Category Form -->
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_tittle">Add Category</label>
                                <input type="text" class="form-control" name="cat_tittle">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>


                        <?php
                        // update and include query
                        if (isset($_GET['edit'])) {
                            $cat_id =  $_GET['edit'];
                            include "include/update_categories1.php";
                        }

                        ?>
                    </div>

                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Title</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <!-- Display Categories Table -->
                                 <!-- find all categories query -->
                                <?php  findAllCategories(); ?>

                                <?php
                                // delete Query
                                deleteCategories();  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include 'include/admin_footer.php'; ?>

</div>