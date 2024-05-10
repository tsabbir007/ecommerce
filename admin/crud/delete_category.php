<?php
global $con;
include '../../includes/config.php';

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_id = $_POST['category_id'];

    // delete subcategories of the category
    $delete_subcategories_query = "DELETE FROM sub_category WHERE category_id = '$category_id'";
    if (mysqli_query($con, $delete_subcategories_query)) {
        // delete category
        $delete_category_query = "DELETE FROM category WHERE id = '$category_id'";
        if (mysqli_query($con, $delete_category_query)) {
            echo "Category and its subcategories deleted successfully.";
        } else {
            echo "Error deleting category: " . mysqli_error($con);
        }
    } else {
        echo "Error deleting subcategories: " . mysqli_error($con);
    }
}