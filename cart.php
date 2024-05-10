<?php global $con;
include './common/header.php';
include './common/nav.php';

$session_id = session_id();
if(isset($_GET['action']) && $_GET['action']=="add"){
    $product_id = $_GET['product_id'];
    $quantity = $_GET['quantity'];
}
?>

<div class="container">
    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
      <div class="container">
        <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
          <div class="col-lg-6">
            <h1 class="h2 text-uppercase mb-0">Cadt</h1>
          </div>
          <div class="col-lg-6 text-lg-end">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                <li class="breadcrumb-item"><a class="text-dark" href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <section class="py-5">
      <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
      <div class="row">
        <div class="col-lg-8 mb-4 mb-lg-0">
          <!-- CART TABLE-->
          <div class="table-responsive mb-4">
            <table class="table text-nowrap">
              <thead class="bg-light">
              <tr>
                <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Product</strong></th>
                <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Price</strong></th>
                <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Quantity</strong></th>
                <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Total</strong></th>
                <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase"></strong></th>
              </tr>
              </thead>
              <tbody class="border-0">
              <?php
                // Fetching all
              ?>
              <tr>
                <th class="ps-0 py-3 border-0" scope="row">
                  <div class="d-flex align-items-center"><a class="reset-anchor d-block animsition-link" href="detail.php"><img src="https://d19m59y37dris4.cloudfront.net/boutique/2-0/img/product-detail-2.62056b28.jpg" alt="..." width="70"/></a>
                    <div class="ms-3"><strong class="h6"><a class="reset-anchor animsition-link" href="detail.php">Apple watch</a></strong></div>
                  </div>
                </th>
                <td class="p-3 align-middle border-0">
                  <p class="mb-0 small">$250</p>
                </td>
                <td class="p-3 align-middle border-0">
                  <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family">Quantity</span>
                    <div class="quantity">
                      <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                      <input class="form-control form-control-sm border-0 shadow-0 p-0" type="text" value="1"/>
                      <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                    </div>
                  </div>
                </td>
                <td class="p-3 align-middle border-0">
                  <p class="mb-0 small">$250</p>
                </td>
                <td class="p-3 align-middle border-0"><a class="reset-anchor" href="#!"><i class="fas fa-trash-alt small text-muted"></i></a></td>
              </tr>
              </tbody>
            </table>
          </div>
          <!-- CART NAV-->
          <div class="bg-light px-4 py-3">
            <div class="row align-items-center text-center">
              <div class="col-md-6 mb-3 mb-md-0 text-md-start"><a class="btn btn-link p-0 text-dark btn-sm" href="shop.php"><i class="fas fa-long-arrow-alt-left me-2"> </i>Continue shopping</a></div>
              <div class="col-md-6 text-md-end"><a class="btn btn-outline-dark btn-sm" href="checkout.html">Procceed to checkout<i class="fas fa-long-arrow-alt-right ms-2"></i></a></div>
            </div>
          </div>
        </div>
        <!-- ORDER TOTAL-->
        <div class="col-lg-4">
          <div class="card border-0 rounded-0 p-lg-4 bg-light">
            <div class="card-body">
              <h5 class="text-uppercase mb-4">Cart total</h5>
              <ul class="list-unstyled mb-0">
                <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Subtotal</strong><span class="text-muted small">$250</span></li>
                <li class="border-bottom my-2"></li>
                <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Total</strong><span>$250</span></li>
                <li>
                  <form action="#">
                    <div class="input-group mb-0">
                      <input class="form-control" type="text" placeholder="Enter your coupon">
                      <button class="btn btn-dark btn-sm w-100" type="submit"> <i class="fas fa-gift me-2"></i>Apply coupon</button>
                    </div>
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <footer class="bg-dark text-white">
    <div class="container py-4">
      <div class="row py-5">
        <div class="col-md-4 mb-3 mb-md-0">
          <h6 class="text-uppercase mb-3">Customer services</h6>
          <ul class="list-unstyled mb-0">
            <li><a class="footer-link" href="#!">Help &amp; Contact Us</a></li>
            <li><a class="footer-link" href="#!">Returns &amp; Refunds</a></li>
            <li><a class="footer-link" href="#!">Online Stores</a></li>
            <li><a class="footer-link" href="#!">Terms &amp; Conditions</a></li>
          </ul>
        </div>
        <div class="col-md-4 mb-3 mb-md-0">
          <h6 class="text-uppercase mb-3">Company</h6>
          <ul class="list-unstyled mb-0">
            <li><a class="footer-link" href="#!">What We Do</a></li>
            <li><a class="footer-link" href="#!">Available Services</a></li>
            <li><a class="footer-link" href="#!">Latest Posts</a></li>
            <li><a class="footer-link" href="#!">FAQs</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h6 class="text-uppercase mb-3">Social media</h6>
          <ul class="list-unstyled mb-0">
            <li><a class="footer-link" href="#!">Twitter</a></li>
            <li><a class="footer-link" href="#!">Instagram</a></li>
            <li><a class="footer-link" href="#!">Tumblr</a></li>
            <li><a class="footer-link" href="#!">Pinterest</a></li>
          </ul>
        </div>
      </div>
      <div class="border-top pt-4" style="border-color: #1d1d1d !important">
        <div class="row">
          <div class="col-md-6 text-center text-md-start">
            <p class="small text-muted mb-0">&copy; 2021 All rights reserved.</p>
          </div>
          <div class="col-md-6 text-center text-md-end">
            <p class="small text-muted mb-0">Template designed by <a class="text-white reset-anchor" href="https://bootstrapious.com/p/boutique-bootstrap-e-commerce-template">Bootstrapious</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <button class="btn btn-primary btn-sm d-none d-lg-inline-block" type="button" data-bs-toggle="collapse" data-bs-target="#style-switch" id="style-switch-button"><i class="fa fa-cog fa-2x"></i></button>
  <div class="collapse" id="style-switch">
    <h5>Select theme colour</h5>
    <form class="mb-3">
      <select class="form-select" name="colour" id="colour">
        <option value="">select colour variant</option>
        <option value="css/style.default.3fcf2f25.css">gold</option>
        <option value="css/style.red.6487edc8.css">red</option>
        <option value="css/style.pink.2763b2c6.css">pink</option>
        <option value="css/style.green.5389dff1.css">green</option>
        <option value="css/style.violet.6018f10d.css">violet</option>
        <option value="css/style.sea.9789c848.css">sea</option>
        <option value="css/style.blue.fe857ec8.css">blue</option>
      </select>
    </form>
    <p><img class="img-fluid" src="https://d19m59y37dris4.cloudfront.net/boutique/2-0/img/template-mac.e1286699.png" alt=""></p>
    <p class="text-muted text-sm">Stylesheet switching is done via JavaScript and can cause a blink while page loads. This will not happen in your production code.</p>
  </div>
  <!-- JavaScript files-->
  <script src="https://d19m59y37dris4.cloudfront.net/boutique/2-0/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://d19m59y37dris4.cloudfront.net/boutique/2-0/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="https://d19m59y37dris4.cloudfront.net/boutique/2-0/vendor/nouislider/nouislider.min.js"></script>
  <script src="https://d19m59y37dris4.cloudfront.net/boutique/2-0/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://d19m59y37dris4.cloudfront.net/boutique/2-0/vendor/choices.js/public/assets/scripts/choices.min.js"></script>
  <script src="js/front.e0700006.js"></script>
  <script src="js/js-cookie.55cdbe0d.js"> </script>
  <script src="js/demo.aa085612.js"> </script>
  <script>
    // ------------------------------------------------------- //
    //   Inject SVG Sprite -
    //   see more here
    //   https://css-tricks.com/ajaxing-svg-sprite/
    // ------------------------------------------------------ //
    function injectSvgSprite(path) {

      var ajax = new XMLHttpRequest();
      ajax.open("GET", path, true);
      ajax.send();
      ajax.onload = function(e) {
        var div = document.createElement("div");
        div.className = 'd-none';
        div.innerHTML = ajax.responseText;
        document.body.insertBefore(div, document.body.childNodes[0]);
      }
    }
    // this is set to BootstrapTemple website as you cannot
    // inject local SVG sprite (using only 'icons/orion-svg-sprite.c2a8f15b.svg' path)
    // while using file:// protocol
    // pls don't forget to change to your domain :)
    injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');

  </script>
  <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</div>
</body>
</html>