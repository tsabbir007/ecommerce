<?php
global $con;
include '../../includes/config.php';

// Handling form submission to insert a new category
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = $_POST['category_name'];
    $category_image = $_POST['category_image'];

    // Inserting data into the category table
    $insert_category_query = "INSERT INTO category (name, image_url) VALUES ('$category_name', '$category_image')";

    if (mysqli_query($con, $insert_category_query)) {
        echo "Category inserted successfully.";
    } else {
        echo "Error inserting category: " . mysqli_error($con);
    }
}