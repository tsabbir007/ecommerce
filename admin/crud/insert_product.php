<?php
global $con;
include '../../includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];
    $category_id = $_POST['category_id'];
    $sub_category_id = $_POST['sub_category_id'];

    $insert_product_query = "INSERT INTO products (name, price, quantity, description, image_url, category_id, sub_category_id) VALUES ('$name', '$price', '$quantity','$description', '$image_url', '$category_id', '$sub_category_id')";

    if (mysqli_query($con, $insert_product_query)) {
        echo "Product inserted successfully.";
    } else {
        echo "Error inserting product: " . mysqli_error($con);
    }
}
