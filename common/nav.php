<?php
include 'common/header.php';
?>


<header class="header bg-white">
    <div class="container px-lg-3">
        <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand"
                                                                          href="index.php"><span
                        class="fw-bold text-uppercase text-dark">Boutique</span></a>
            <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <!-- Link--><a class="nav-link active" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <!-- Link--><a class="nav-link" href="shop.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <!-- Link--><a class="nav-link" href="detail.html">Product detail</a>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#"
                                                     data-bs-toggle="dropdown" aria-haspopup="true"
                                                     aria-expanded="false">Pages</a>
                        <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown"><a
                                    class="dropdown-item border-0 transition-link" href="index.html">Homepage</a><a
                                    class="dropdown-item border-0 transition-link" href="shop.php">Category</a><a
                                    class="dropdown-item border-0 transition-link" href="detail.html">Product
                                detail</a><a class="dropdown-item border-0 transition-link" href="cart.html">Shopping
                                cart</a><a class="dropdown-item border-0 transition-link"
                                           href="checkout.html">Checkout</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="cart.html"> <i
                                    class="fas fa-dolly-flatbed me-1 text-gray"></i>Cart<small
                                    class="text-gray fw-normal">(2)</small></a></li>
                    <li class="nav-item"><a class="nav-link" href="#!"> <i class="far fa-heart me-1"></i><small
                                    class="text-gray fw-normal"> (0)</small></a></li>

                    <?php

                    if (isset($_SESSION['user'])) {

                        echo "  <div class='dropdown'>
                    <li class='nav-item dropdown'><a class='nav-link dropdown-toggle' id='userInfo' href='#' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='fas fa-user me-2'></i>" . $_SESSION['user']['name'] . "</a>
                        <div class='dropdown-menu mt-3 shadow-sm' aria-labelledby='userInfo'>
                               <a class='dropdown-item border-0 transition-link' href='sign-out.php'>Sign out</a>
                        </div>
                       
                    </li>
                     </div>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='sign-in.php'><i class='fas fa-user me-2'></i>Sign in</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </nav>
    </div>
</header>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>