<?php include "./include/db.php" ?>

<?php

function insert_categories()
{

    if (isset($_POST['submit'])) {

        $cat_tittle =  $_POST['cat_tittle'];

        if ($cat_tittle == "" || empty($cat_tittle)) {
            echo "This field should not be empty";
        } else {
            $query = "INSERT INTO categories(cat_tittle) VALUES ('{$cat_tittle}')";
            $create_category_query = mysqli_query($connection, $query);
            if (!$create_category_query) {
                die("Query failed: " . mysqli_error($connection));
            } else {
                echo "Category created successfully";
            }
        }
    }
}
