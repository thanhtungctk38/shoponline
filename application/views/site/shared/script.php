   <!-- JS Global Compulsory -->
        <script src="public/site/plugins/jquery/jquery.min.js"></script>
        <script src="public/site/plugins/jquery/jquery-migrate.min.js"></script>
        <script src="public/site/plugins/bootstrap/js/bootstrap.min.js"></script>
        <!-- JS Implementing Plugins -->
        <script src="public/site/plugins/back-to-top.js"></script>
        <script src="public/site/plugins/smoothScroll.js"></script>
        <script src="public/site/plugins/jquery.parallax.js"></script>
        <script src="public/site/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
        <script src="public/site/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="public/site/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script src="public/site/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        <!-- JS Customization -->
        <script src="public/site/js/custom.js"></script>
        <!-- JS Page Level -->
        <script src="public/site/js/shop.app.js"></script>
        <script src="public/site/js/plugins/owl-carousel.js"></script>
        <script src="public/site/js/plugins/revolution-slider.js"></script>
        <script src="public/site/js/plugins/style-switcher.js"></script>
        <script>
            jQuery(document).ready(function () {
                App.init();
                App.initScrollBar();
                App.initParallaxBg();
                OwlCarousel.initOwlCarousel();
                RevolutionSlider.initRSfullWidth();
                StyleSwitcher.initStyleSwitcher();
            });
        </script>