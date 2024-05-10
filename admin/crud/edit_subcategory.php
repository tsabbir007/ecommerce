<?php
global $con;
include '../../includes/config.php';

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subcategory_id = $_POST['subcategory_id'];
    $subcategory_name = $_POST['subcategory_name'];
    $category_id = $_POST['category_id'];

    // Updating data in the sub_category table
    $update_subcategory_query = "UPDATE sub_category SET name = '$subcategory_name', category_id = '$category_id' WHERE id = '$subcategory_id'";

    if (mysqli_query($con, $update_subcategory_query)) {
        echo "Subcategory updated successfully.";
    } else {
        echo "Error updating subcategory: " . mysqli_error($con);
    }
}
