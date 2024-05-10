<?php
global $con;
include '../../includes/config.php';

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subcategory_id = $_POST['subcategory_id'];

    // delete subcategory
    $delete_subcategory_query = "DELETE FROM sub_category WHERE id = '$subcategory_id'";
    if (mysqli_query($con, $delete_subcategory_query)) {
        echo "Subcategory deleted successfully.";
    } else {
        echo "Error deleting subcategory: " . mysqli_error($con);
    }
}