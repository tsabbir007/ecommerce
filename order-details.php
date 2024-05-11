<?php
global $con;

include 'common/header.php';
include 'common/nav.php';

$order_id = $_GET['order_id'];

$select_order_query = "SELECT * FROM orders WHERE id = '$order_id'";
$result = mysqli_query($con, $select_order_query);
$row = mysqli_fetch_assoc($result);

?>

<div class="container">
    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">Order Details : <?php echo $row['id']; ?></h1>
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
                                <th class="text-uppercase text-xxs font-weight-bolder">Product Name</th>
                                <th class="text-uppercase text-xxs font-weight-bolder">Quantity</th>
                                <th class="text-uppercase text-xxs font-weight-bolder">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $select_order_items_query = "SELECT * FROM order_items WHERE order_id = '$order_id'";
                            $result = mysqli_query($con, $select_order_items_query);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $product_id = $row['product_id'];
                                    $select_product_query = "SELECT * FROM products WHERE id = '$product_id'";
                                    $product_result = mysqli_query($con, $select_product_query);
                                    $product_row = mysqli_fetch_assoc($product_result);
                                    echo '<tr>';
                                    echo '<td>' . $product_row['name'] . '</td>';
                                    echo '<td>' . $row['quantity'] . '</td>';
                                    echo '<td>' . $row['price'] . '</td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
