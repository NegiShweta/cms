<?php include "include/admin_header.php"; ?>

<?php

function insert_categories()
{

    global $connection;
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

function findAllCategories()
{

    global $connection;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_tittle = $row['cat_tittle'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_tittle}</td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo " <a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "</tr>";
    }
}

function deleteCategories(){
    global $connection;

    if (isset($_GET['delete'])) {
        $the_cat_id =  $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
}