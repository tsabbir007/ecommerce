<?php
global $con;
include '../../includes/config.php';

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Getting data from the form
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    $category_image = $_POST['category_image'];



    // Updating the category in the database
    $update_category_query = "UPDATE category SET name = '$category_name', image_url = '$category_image' WHERE id = $category_id";
    $result = mysqli_query($con, $update_category_query);

    if ($result) {
        echo "Category updated successfully!";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
