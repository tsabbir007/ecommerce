<?php
global $con;
include '../../includes/config.php';

// Handling AJAX request
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];

    // Fetching subcategories based on the provided category ID
    $fetch_subcategories_query = "SELECT * FROM sub_category WHERE category_id = '$category_id'";
    $result = mysqli_query($con, $fetch_subcategories_query);

    $subcategories = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $subcategories[] = array(
            'id' => $row['id'],
            'name' => $row['name']
        );
    }

    echo json_encode($subcategories);
} else {
    echo json_encode(array('error' => 'Invalid request'));
}