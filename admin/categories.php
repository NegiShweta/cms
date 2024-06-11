<?php include "include/admin_header.php"; ?>

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
                        if (isset($_POST['submit'])) {
                            $cat_tittle = mysqli_real_escape_string($connection, $_POST['cat_tittle']);
                            if (empty($cat_tittle)) {
                                echo "This field should not be empty";
                            } else {
                                $query = "INSERT INTO categories(cat_tittle) VALUES ('{$cat_tittle}')";
                                $create_category = mysqli_query($connection, $query);
                                if (!$create_category) {
                                    die("Query failed: " . mysqli_error($connection));
                                } else {
                                    echo "Category created successfully";
                                }
                            }
                        }

                        if (isset($_GET['delete'])) {
                            $the_cat_id = mysqli_real_escape_string($connection, $_GET['delete']);
                            $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
                            $delete_query = mysqli_query($connection, $query);
                            header("Location: categories.php");
                        }

                        if (isset($_GET['edit'])) {
                            $cat_id = mysqli_real_escape_string($connection, $_GET['edit']);
                            include "include/update_categories.php";
                        }
                        ?>
                    </div>

                    <div class="col-xs-6">
                        <!-- Display Categories Table -->
                        <?php
                        $query = "SELECT * FROM categories";
                        $select_categories = mysqli_query($connection, $query);
                        ?>

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Title</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($select_categories)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_tittle = $row['cat_tittle'];
                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_tittle}</td>";
                                    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a> | <a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                    echo "</tr>";
                                }
                                ?>
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