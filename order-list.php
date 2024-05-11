<?php
global $con;

include 'common/header.php';
include 'common/nav.php';

?>

    <div class="container">
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="h2 text-uppercase mb-0">Order List</h1>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                                <li class="breadcrumb-item"><a class="text-dark" href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a class="text-dark" href="cart.php">Cart</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Order List</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th class="text-uppercase text-xxs font-weight-bolder">Order ID</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder">Name</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder">Email</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder">Phone</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder">Address</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder">Postal Code</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder">Country</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder">Payment Method</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder">Total</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $user_id = $_SESSION['user']['id'];
                                $select_order_query = "SELECT * FROM orders WHERE user_id = '$user_id ' ORDER BY id DESC";
                                $result = mysqli_query($con, $select_order_query);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>';
                                        echo '<td>' . $row['id'] . '</td>';
                                        echo '<td>' . $row['name'] . '</td>';
                                        echo '<td>' . $row['email'] . '</td>';
                                        echo '<td>' . $row['phone'] . '</td>';
                                        echo '<td>' . $row['address'] . '</td>';
                                        echo '<td>' . $row['post_code'] . '</td>';
                                        echo '<td>' . $row['country'] . '</td>';
                                        echo '<td>' . $row['payment_method'] . '</td>';
                                        echo '<td>' . $row['total'] . '</td>';
                                        echo '<td><a href="order-details.php?order_id=' . $row['id'] . '" class="btn btn-primary">View</a></td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="9">No orders found.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
