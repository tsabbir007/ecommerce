<?php
global $con;
include '../../includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subcategory_name = $_POST['subcategory_name'];
    $category_id = $_POST['category_id'];

    $insert_subcategory_query = "INSERT INTO sub_category (name, category_id) VALUES ('$subcategory_name', '$category_id')";

    if (mysqli_query($con, $insert_subcategory_query)) {
        echo "Subcategory inserted successfully.";
    } else {
        echo "Error inserting subcategory: " . mysqli_error($con);
    }
}

