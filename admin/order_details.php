<?php
global $con;
include '../includes/config.php';

if (isset($_POST['order_id'])) {
    $order_id = intval($_POST['order_id']); // Sanitize user input
    $fetch_order_details_query = "SELECT products.name, order_items.quantity, order_items.price FROM order_items INNER JOIN products ON order_items.product_id = products.id WHERE order_items.order_id = $order_id";
    $result = mysqli_query($con, $fetch_order_details_query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['quantity']."</td>";
        echo "<td>".$row['quantity']. "x    $".$row['price']."</td>";
        echo "</tr>";
    }
}
?>