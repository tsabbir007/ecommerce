<?php
global $con;
include '../includes/config.php';
include 'header.php';

$fetch_orders_query = "SELECT * FROM orders";
$result = mysqli_query($con, $fetch_orders_query);
?>
<div class="container mt-5">
    <h2 class="mb-4">All Orders</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Post Code</th>
            <th>Country</th>
            <th>Payment Method</th>
            <th>Total</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['phone']."</td>";
    echo "<td>".$row['address']."</td>";
    echo "<td>".$row['post_code']."</td>";
    echo "<td>".$row['country']."</td>";
    echo "<td>".$row['payment_method']."</td>";
    echo "<td>".$row['total']."</td>";
    echo "<td>".$row['created_at']."</td>";
    echo "<td><button class='btn btn-primary order-details-btn' data-toggle='modal' data-target='#orderDetailsModal' data-order-id='".$row['id']."'>View Details</button></td>";
}
?>
        </tbody>
    </table>

    <div class="modal fade" id="orderDetailsModal" tabindex="-1" role="dialog" aria-labelledby="orderDetailsModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderDetailsModalLabel">Order Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body order-details">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody id="orderDetailsTable">
                        <script>
                            $(document).ready(function () {
                                $('.order-details-btn').click(function () {
                                    var order_id = $(this).data('order-id');
                                    $.ajax({
                                        url: 'order_details.php',
                                        method: 'POST',
                                        data: {order_id: order_id},
                                        success: function (response) {
                                            $('#orderDetailsTable').html(response);
                                        }
                                    });
                                });
                            });
                        </script>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
