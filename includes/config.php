<?php
// Establishing a connection to the database
const DB_SERVER = 'localhost';
const DB_USER = 'user';
const DB_PASS = '12345';
const DB_NAME = 'ecommerce';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

//create user table
$create_user_table_query = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

if (mysqli_query($con, $create_user_table_query)) {
//    echo "Table 'users' created successfully.\n";
} else {
    echo "Error creating table: " . mysqli_error($con) . "\n";
}


//check if exists product table
$check_product_table_query = "SELECT 1 FROM products LIMIT 1";
if (!mysqli_query($con, $check_product_table_query)) {

// Creating the 'category' table
    $create_category_table_query = "CREATE TABLE IF NOT EXISTS category (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image_url VARCHAR(255),
)";

    if (mysqli_query($con, $create_category_table_query)) {
        echo "Table 'category' created successfully.\n";
    } else {
        echo "Error creating table: " . mysqli_error($con) . "\n";
    }

// Creating the 'sub_category' table
    $create_sub_category_table_query = "CREATE TABLE IF NOT EXISTS sub_category (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category_id INT(11),
    FOREIGN KEY (category_id) REFERENCES category(id)
)";

    if (mysqli_query($con, $create_sub_category_table_query)) {
        echo "Table 'sub_category' created successfully.\n";
    } else {
        echo "Error creating table: " . mysqli_error($con) . "\n";
    }

// Creating the 'products' table
    $create_products_table_query = "CREATE TABLE IF NOT EXISTS products (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT(11) NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    category_id INT(11),
    sub_category_id INT(11),
    FOREIGN KEY (category_id) REFERENCES category(id),
    FOREIGN KEY (sub_category_id) REFERENCES sub_category(id)
)";

    if (mysqli_query($con, $create_products_table_query)) {
        echo "Table 'products' created successfully.\n";
    } else {
        echo "Error creating table: " . mysqli_error($con) . "\n";
    }

}