<?php
global $con;
include '../../includes/config.php';

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];

    // delete product
    $delete_product_query = "DELETE FROM products WHERE id = '$product_id'";
    if (mysqli_query($con, $delete_product_query)) {
        echo "Product deleted successfully.";
    } else {
        echo "Error deleting product: " . mysqli_error($con);
    }
}