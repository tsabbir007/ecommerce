<?php
global $con;
include 'common/header.php';
include 'common/nav.php';

if (isset($_GET['id']) && $_GET['action'] == 'add') {
    $id = $_GET['id'];
    //if cart session have or this product session have update session
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += 1;
    } else {
        $fetch_product_query = "SELECT * FROM products WHERE id = $id";
        $result = mysqli_query($con, $fetch_product_query);
        $product = mysqli_fetch_assoc($result);
        $product['quantity'] = 1;
        $product['image'] = '../ecommerce/assets/images/' . $product['image_url'];
        $_SESSION['cart'][$id] = $product;
    }
}

if (isset($_GET['id']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    unset($_SESSION['cart'][$id]);
}

?>

    <div class="container">
        <!-- HERO SECTION-->
        <!-- ... -->
        <section class="py-5">
            <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
            <div class="row">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <!-- CART TABLE-->
                    <div class="table-responsive mb-4">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Product</strong></th>
                                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Price</strong></th>
                                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Quantity</strong></th>
                                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Total</strong></th>
                                    <th class="border-0" scope="col"> </th>
                                </tr>
                            <!-- ... -->
                            <tbody class="border-0">
                                <?php
                                $total = 0;
                                foreach ($_SESSION['cart'] as $product) {
                                    $total += $product['price'] * $product['quantity'];
                                    echo "<tr>
                                        <th class='border-0' scope='row'>
                                            <div class='d-flex align-items-center'>
                                                <img src='" . $product['image'] . "' alt='" . $product['name'] . "' width='70' class='img-fluid rounded shadow-sm'>
                                              
                                            </div>
                                        </th>
                                        <td class='border-0 align-middle'><strong>$" . $product['price'] . "</strong></td>
                                        <td class='border-0 align-middle'>
                                            <div class='border d-flex align-items-center justify-content-between px-3'><span class='small text-uppercase text-gray headings-font-family'>Quantity</span>
                                                <div class='quantity'>
                                                    <button class='dec-btn p-0'><i class='fas fa-caret-left'></i></button>
                                                    <input class='form-control form-control-sm border-0 shadow-0 p-0' type='text' value='" . $product['quantity'] . "'>
                                                    <button class='inc-btn p-0'><i class='fas fa-caret-right'></i></button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class='border-0 align-middle'><strong>$" . $product['price'] * $product['quantity'] . "</strong></td>
                                        <td class='border-0 align-middle'><a href='cart.php?id=" . $product['id'] . "&action=delete' class='reset-anchor'><i class='fas fa-trash-alt small text-muted'></i></a></td>
                                    </tr>";
                                }
                                if(count($_SESSION['cart']) == 0) {
                                    echo "<tr><td colspan='5'>No products in cart</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- checkout -->

                    <!-- ... -->
                </div>
                <!-- ORDER TOTAL-->
                <div class="col-lg-4">
                    <div class="card border-0 rounded-0 p-lg-4 bg-light">
                        <div class="card-body">
                            <h5 class="text-uppercase mb-4">Cart total</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex align-items-center justify-content-between mb-4">
                                    <strong class="text-uppercase small font-weight-bold">Total</strong>
                                    <span>$<?php echo $total; ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php include './common/footer.php'; ?>