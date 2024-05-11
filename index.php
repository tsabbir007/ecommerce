<?php
global $con;
include('./common/header.php')
?>
    <div class="page-holder">
<?php include './common/nav.php' ?>

    <!-- HERO SECTION-->
    <div class="container">
        <?php include './common/hero.php' ?>
        <!-- CATEGORIES SECTION-->
        <section class="pt-5">
            <header class="text-center">
                <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
                <h2 class="h5 text-uppercase mb-4">Browse our categories</h2>
            </header>
            <div class="row">
                <?php
                // Fetching all categories from the database
                $fetch_categories_query = "SELECT * FROM category";
                $result = mysqli_query($con, $fetch_categories_query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                        <div class='col-md-3'>
                            <a class='category-item' href='shop.php?category_id=" . $row['id'] . "'>
                               <img class='img-fluid' src='../ecommerce/assets/images/" . $row['image_url'] . "' alt=''>
                               <strong class='category-item-title'>" . $row['name'] . "</strong>
                            </a>
                        </div>";
                }
                ?>
            </div>
        </section>
        <!-- TRENDING PRODUCTS-->
        <section class="py-5">
            <header>
                <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
                <h2 class="h5 text-uppercase mb-4">Top trending products</h2>
            </header>
            <div class="row">
                <!-- PRODUCT-->

                <?php
                // Fetching all products from the database
                $fetch_products_query = "SELECT * FROM products";
                $result = mysqli_query($con, $fetch_products_query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col-xl-3 col-lg-4 col-sm-6'>
                    <div class='product text-center'>
                        <div class='position-relative mb-3'>
                            <div class='badge text-white bg-'></div>
                            <a class='d-block' href='detail.php?product_id=" . $row['id'] . "'>
                                <img class='img-fluid w-100' src='../ecommerce/assets/images/" . $row['image_url'] . "' alt='...'>
                            </a>
                            <div class='product-overlay'>
                                <ul class='mb-0 list-inline'>
                                    <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-dark' href='cart.php?product_id=" . $row['id'] . "&action=add'>Add to cart</a></li>
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
        </section>
        <?php include './common/news-letter.php' ?>
    </div>


<?php include './common/footer.php' ?>