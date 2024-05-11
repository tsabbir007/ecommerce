<?php
global $con;
session_start();
include './includes/config.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $post_code = $_POST['post_code'];
    $country = $_POST['country'];
    $payment_method = $_POST['payment_method'];
    $total = 0;

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $total += $value['price'];
        }
    }

    $user_id = $_SESSION['user']['id'];
    $user_id = 15;
    $insert_order_query = "INSERT INTO orders (user_id, name, email, phone, address, post_code, country,payment_method, total) VALUES ('$user_id', '$name', '$email', '$phone', '$address', '$post_code', '$country','$payment_method', '$total')";
    if (mysqli_query($con, $insert_order_query)) {
        $order_id = mysqli_insert_id($con);
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                $product_id = $value['id'];
                $quantity = 1;
                $price = $value['price'];
                $insert_order_items_query = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES ('$order_id', '$product_id', '$quantity', '$price')";
                if (mysqli_query($con, $insert_order_items_query)) {
                    unset($_SESSION['cart']);
                } else {
                    echo "Error: " . $insert_order_items_query . "<br>" . mysqli_error($con);
                }
            }
        }
    } else {
        echo "Error: " . $insert_order_query . "<br>" . mysqli_error($con);
    }
}
