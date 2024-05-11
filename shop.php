<?php global $con;
include './common/header.php';
include './common/nav.php';

?>

<div class="page-holder">
    <!--  Modal -->
    <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="h2 text-uppercase mb-0">Shop</h1>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                                <li class="breadcrumb-item"><a class="text-dark" href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Shop</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            <div class="container p-0">
                <div class="row">
                    <!-- SHOP SIDEBAR-->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <h5 class="text-uppercase mb-4">Categories</h5>

                        <?php
                        // Fetching all categories from the database
                        $fetch_categories_query = "SELECT * FROM category";
                        $result = mysqli_query($con, $fetch_categories_query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "
                                <div class='py-2 px-4 bg-dark text-white mb-3'><strong class='small text-uppercase fw-bold'><a class='reset-anchor' href='shop.php?category_id=" . $row['id'] . "'>" . $row['name'] . "</a></strong></div>
                                <ul class='list-unstyled small text-muted ps-lg-4 font-weight-normal'>";
                            $fetch_subcategories_query = "SELECT * FROM sub_category WHERE category_id = " . $row['id'];
                            $subcategories = mysqli_query($con, $fetch_subcategories_query);
                            if(mysqli_num_rows($subcategories) > 0) {
                                while ($subcat = mysqli_fetch_assoc($subcategories)) {
                                    echo "<li class='mb-2'><a class='reset-anchor' href='shop.php?subcategory_id=" . $subcat['id'] . "'>" . $subcat['name'] . "</a></li>";
                                }
                            }
                            echo "</ul>";
                        }
                        ?>
                    </div>
                    <!-- SHOP LISTING-->
                    <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                        <div class="row mb-3 align-items-center">
                            <div class="col-lg-6 mb-2 mb-lg-0">
                                <p class="text-sm text-muted mb-0">Showing 1–12 of 53 results</p>
                            </div>
                        </div>
                        <div class="row">
                            <!-- PRODUCT-->

                            <?php
                            // Fetching all products from the database

                            $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : '';
                            $subcategory_id = isset($_GET['subcategory_id']) ? $_GET['subcategory_id'] : '';
                            $fetch_products_query = "SELECT * FROM products";
                            if ($category_id) {
                                $fetch_products_query = "SELECT * FROM products WHERE category_id = $category_id";
                            }
                            if ($subcategory_id) {
                                $fetch_products_query = "SELECT * FROM products WHERE sub_category_id = $subcategory_id";
                            }
                            $result = mysqli_query($con, $fetch_products_query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<div class='col-lg-4 col-sm-6'>
                                    <div class='product text-center'>
                                        <div class='mb-3 position-relative'>
                                            <div class='badge text-white bg-'></div><a class='d-block' href='detail.php?product_id=" . $row['id'] . "'>
                                            <img class='img-fluid w-100' src='../ecommerce/assets/images/" . $row['image_url'] . "' alt='...'></a>
                                            <div class='product-overlay'>
                                                <ul class='mb-0 list-inline'>
                                                    <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-dark' href='cart.php?product_id=" . $row['id'] . "&action=add&quantity=1'>Add to cart</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h6> <a class='reset-anchor' href='detail.php'>" . $row['name'] . "</a></h6>
                                        <p class='small text-muted'>$" . $row['price'] . "</p>
                                    </div>
                                </div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include './common/footer.php' ?>
