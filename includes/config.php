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

if (!mysqli_query($con, $create_user_table_query)) {
    echo "Error creating user table: " . mysqli_error($con) . "\n";
}

// Creating the 'category' table
$create_category_table_query = "CREATE TABLE IF NOT EXISTS category (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image_url VARCHAR(255)
)";

if (!mysqli_query($con, $create_category_table_query)) {
    echo "Error creating category table: " . mysqli_error($con) . "\n";
}

// Creating the 'sub_category' table
$create_sub_category_table_query = "CREATE TABLE IF NOT EXISTS sub_category (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category_id INT(11),
    FOREIGN KEY (category_id) REFERENCES category(id)
)";

if (!mysqli_query($con, $create_sub_category_table_query)) {
    echo "Error creating sub_category table: " . mysqli_error($con) . "\n";
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

if (!mysqli_query($con, $create_products_table_query)) {
    echo "Error creating products table: " . mysqli_error($con) . "\n";
}

//create order table
$create_order_table_query = "CREATE TABLE IF NOT EXISTS orders (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11),
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    post_code VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL,
    payment_method VARCHAR(255) NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

if (!mysqli_query($con, $create_order_table_query)) {
    echo "Error creating order table: " . mysqli_error($con) . "\n";
}

//create order_items table
$create_order_items_table_query = "CREATE TABLE IF NOT EXISTS order_items (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    order_id INT(11),
    product_id INT(11),
    quantity INT(11) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
)";

if (!mysqli_query($con, $create_order_items_table_query)) {
    echo "Error creating order_items table: " . mysqli_error($con) . "\n";
}
?>
