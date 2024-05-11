<?php
global $con;
session_start(); // Starting the session

include 'common/header.php';
include 'common/nav.php';

?>
    <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="h2 text-uppercase mb-0">Checkout</h1>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                                <li class="breadcrumb-item"><a class="text-dark" href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a class="text-dark" href="cart.php">Cart</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            <!-- BILLING ADDRESS-->
            <h2 class="h5 text-uppercase mb-4">Shipping details</h2>
            <div class="row">
                <div class="col-lg-8">
                    <form  method="POST">
                        <div class="row gy-3">
                            <div class="col-lg-6">
                                <label class="form-label text-sm text-uppercase" for="firstName">First name </label>
                                <input class="form-control form-control-lg" type="text" id="firstName"
                                       placeholder="Enter your first name">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label text-sm text-uppercase" for="lastName">Last name </label>
                                <input class="form-control form-control-lg" type="text" id="lastName"
                                       placeholder="Enter your last name">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label text-sm text-uppercase" for="email">Email address </label>
                                <input class="form-control form-control-lg" type="email" id="email"
                                       placeholder="e.g. Jason@example.com">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label text-sm text-uppercase" for="phone">Phone number </label>
                                <input class="form-control form-control-lg" type="tel" id="phone"
                                       placeholder="e.g. +02 245354745">
                            </div>

                            <div class="col-lg-12">
                                <label class="form-label text-sm text-uppercase" for="address">Address</label>
                                <input class="form-control form-control-lg" type="text" id="address"
                                       placeholder="House number and street name">
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label text-sm text-uppercase" for="post-code">Postal code </label>
                                <input class="form-control form-control-lg" type="number" id="post-code"
                                       placeholder="Postal code">
                            </div>

                            <div class="col-lg-12">
                                <label class="form-label
                                text-sm text-uppercase" for="country">Country </label>
                                <select class="selectpicker" id="country" data-width="100%">
                                    <option value="Bangladesh">Bangladesh</option>
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label
                                text-sm text-uppercase" for="payment_method">Payment Method </label>
                                <select class="selectpicker" id="payment_method" data-width="100%">
                                    <option value="cod">Cash on delivery</option>
                                </select>
                            </div>

                            <div class="col-lg-12 form-group">
                                <button class="btn btn-dark" type="submit">Place order</button>
                            </div>
                        </div>
                    </form>
                </div>
                <script>
                    $(document).ready(function () {
                        $('form').submit(function (e) {
                            e.preventDefault();
                            var name = $('#firstName').val() + ' ' + $('#lastName').val();
                           $.ajax({
                               type: 'POST',
                               url: './checkout-handle.php',
                                 data: {
                                      name: name,
                                      email: $('#email').val(),
                                      phone: $('#phone').val(),
                                      address: $('#address').val(),
                                      post_code:$('#post-code').val(),
                                      country: $('#country').val(),
                                      payment_method: $('#payment_method').val(),
                                        submit: true
                                    },
                                    success: function (response) {
                                        window.location.href = 'order-list.php';
                                    },
                           });
                        });
                    });
                </script>
                <!-- ORDER SUMMARY-->
                <div class="col-lg-4">
                    <div class="card border-0 rounded-0 p-lg-4 bg-light">
                        <div class="card-body">
                            <h5 class="text-uppercase mb-4">Your order</h5>
                            <ul class="list-unstyled mb-0">
                                <?php
                                if (isset($_SESSION['cart'])) {
                                    $total = 0;
                                    foreach ($_SESSION['cart'] as $key => $value) {
                                        $total += $value['price'];
                                        ?>
                                        <li class="d-flex align-items-center justify-content-between"><strong
                                                    class="small fw-bold"><?php echo $value['name']; ?></strong><span
                                                    class="text-muted small">$<?php echo $value['price']; ?></span></li>
                                        <li class="border-bottom my-2"></li>
                                        <?php
                                    }
                                    ?>
                                    <li class="d-flex align-items-center justify-content-between"><strong
                                                class="text-uppercase small fw-bold">Total</strong><span>$<?php echo $total; ?></span>
                                    </li>
                                    <?php
                                } else {
                                    ?>
                                    <li class="d-flex align-items-center justify-content-between"><strong
                                                class="text-uppercase small fw-bold">Total</strong><span>$0</span></li>
                                    <?php
                                }
                                //if cart is empty
                                if (empty($_SESSION['cart'])) {
                                    ?>
                                    <a href="shop.php" class="btn btn-dark mt-4">Go to shop</a>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php include 'common/footer.php'; ?>