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
                    <p class="small text-muted mb-0">&copy; 2024 All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<a class="btn btn-primary btn-sm d-none d-lg-inline-block" href="./admin/" id="style-switch-button"><i
            class="fa fa-cog fa-2x"></i></a>

<!-- JavaScript files-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://d19m59y37dris4.cloudfront.net/boutique/2-0/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://d19m59y37dris4.cloudfront.net/boutique/2-0/vendor/glightbox/js/glightbox.min.js"></script>
<script src="https://d19m59y37dris4.cloudfront.net/boutique/2-0/vendor/nouislider/nouislider.min.js"></script>
<script src="https://d19m59y37dris4.cloudfront.net/boutique/2-0/vendor/swiper/swiper-bundle.min.js"></script>
<script src="https://d19m59y37dris4.cloudfront.net/boutique/2-0/vendor/choices.js/public/assets/scripts/choices.min.js"></script>
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
        ajax.onload = function (e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
        }
    }

    injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');

</script>
<!-- JavaScript files-->
<script src="https://d19m59y37dris4.cloudfront.net/boutique/2-0/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://d19m59y37dris4.cloudfront.net/boutique/2-0/vendor/glightbox/js/glightbox.min.js"></script>
<script src="https://d19m59y37dris4.cloudfront.net/boutique/2-0/vendor/nouislider/nouislider.min.js"></script>
<script src="https://d19m59y37dris4.cloudfront.net/boutique/2-0/vendor/swiper/swiper-bundle.min.js"></script>
<script src="https://d19m59y37dris4.cloudfront.net/boutique/2-0/vendor/choices.js/public/assets/scripts/choices.min.js"></script>

<!-- Nouislider Config-->
<script>
    var range = document.getElementById('range');
    noUiSlider.create(range, {
        range: {
            'min': 0,
            'max': 2000
        },
        step: 5,
        start: [100, 1000],
        margin: 300,
        connect: true,
        direction: 'ltr',
        orientation: 'horizontal',
        behaviour: 'tap-drag',
        tooltips: true,
        format: {
            to: function (value) {
                return '$' + value;
            },
            from: function (value) {
                return value.replace('', '');
            }
        }
    });

</script>
<!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</div>
</body>
</html>