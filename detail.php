<?php global $con;
include './common/header.php';
$product_id = $_GET['product_id'];
$fetch_products_query = "SELECT * FROM products WHERE id = $product_id";
$result = mysqli_query($con, $fetch_products_query);
$row = mysqli_fetch_assoc($result);
?>
    <div class="page-holder bg-light">
    <!-- navbar-->
    <?php include './common/nav.php' ?>
    <section class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6">
                    <!-- PRODUCT SLIDER-->
                    <div class="row m-sm-0">
                        <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0 px-xl-2">
                            <div class="swiper product-slider-thumbs">
                                <div class="swiper-wrapper">
                                    <?php
                                    echo "<div class='swiper-slide h-auto swiper-thumb-item mb-3'><img class='w-100' src='../ecommerce/assets/images/" . $row['image_url'] . "' alt='...'></div>";
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-10 order-1 order-sm-2">
                            <div class="swiper product-slider">
                                <div class="swiper-wrapper">
                                    <?php
                                    echo "<div class='swiper-slide h-auto'><img class='img-fluid' src='../ecommerce/assets/images/" . $row['image_url'] . "' alt='...'></div>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PRODUCT DETAILS-->
                <div class="col-lg-6">
                    <?php
                    echo "<h1>" . $row['name'] . "</h1>";
                    echo "<p class='text-muted lead'>$" . $row['price'] . "</p>";
                    echo "<p class='text-sm mb-4'>" . $row['description'] . "</p>";
                    ?>
                    <div class="row align-items-stretch mb-4">
                        <div class="col-sm-5 pr-sm-0">
                            <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white">
                                <span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                                <div class="quantity">
                                    <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                                    <input id="input" class="form-control border-0 shadow-0 p-0" type="text" value="1">
                                    <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 pl-sm-0"><a
                                    class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0"
                                    href="cart.php?product_id=<?php echo $row['id'] ?>&action=add&quantity=1">Add to cart</a>
                    </div>
                    <ul class="list-unstyled small d-inline-block">
                        <?php
                        //get category name by product id
                        $category_id = $row['category_id'];
                        $fetch_category_query = "SELECT * FROM category WHERE id = $category_id";
                        $category_result = mysqli_query($con, $fetch_category_query);
                        $category_row = mysqli_fetch_assoc($category_result);
                        echo "<li class='px-3 py-2 mb-1 bg-white text-muted'><strong class='text-uppercase text-dark'>Category:</strong><a class='reset-anchor ms-2' href='shop.php?category_id=" . $category_row['id'] . "'>" . $category_row['name'] . "</a></li>";
                        ?>
                    </ul>
                </div>
            </div>
            <!-- DETAILS TABS-->
            <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link text-uppercase active" id="description-tab" data-bs-toggle="tab"
                                        href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                </li>
            </ul>
            <div class="tab-content mb-5" id="myTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel"
                     aria-labelledby="description-tab">
                    <div class="p-4 p-lg-5 bg-white">
                        <h6 class="text-uppercase">Product description </h6>
                        <?php echo "<p class='text-muted text-small'>" . $row['description'] . "</p>"; ?>
                    </div>
                </div>
            </div>
            <!-- RELATED PRODUCTS-->
            <h2 class="h5 text-uppercase mb-4">Related products</h2>
            <div class="row">
                <!-- PRODUCT-->
                <?php
                $fetch_products_query = "SELECT * FROM products WHERE category_id = $category_id AND id != $product_id";
                $result = mysqli_query($con, $fetch_products_query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col-lg-3 col-sm-6'>
                    <div class='product text-center'>
                        <div class='d-block mb-3 position-relative'><a class='d-block' href='detail.php?product_id=" . $row['id'] . "'><img class='img-fluid w-100' src='../ecommerce/assets/images/" . $row['image_url'] . "' alt='...'></a>
                            <div class='product-overlay'>
                                <ul class='mb-0 list-inline'>
                                    <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-outline-dark' href='#!'><i class='far fa-heart'></i></a></li>
                                    <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-dark' href='cart.php?product_id=" . $row['id'] . "&action=add&quantity=". $row['quantity'] ."'>Add to cart</a></li>
                                    <li class='list-inline-item mr-0'><a class='btn btn-sm btn-outline-dark' href='#productView' data-bs-toggle='modal'><i class='fas fa-expand'></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <h6> <a class='reset-anchor' href='detail.php?product_id=" . $row['id'] . "'>" . $row['name'] . "</a></h6>
                        <p class='small text-muted'>$" . $row['price'] . "</p>
                    </div>
                </div>";
                }
                ?>
            </div>
        </div>
    </section>
<?php include './common/footer.php' ?>