<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>SIGEMOY | REKAM MEDIS GIGI KESEHATAN</title>

    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/favicon.ico') }}" type="image/x-icon" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Exo:wght@300;400;500;600;700;800&family=Roboto:wght@300&family=Shippori+Mincho:wght@500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- CSS Vendor -->
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/css/jquery.datetimepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/css/swiper.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/css/fancybox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/css/aos.min.css') }}" rel="stylesheet" />

    <!-- CSS Custom -->
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/css/sigemoy-custom.css') }}" rel="stylesheet" />
</head>

<body>

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader-wrap">
            <div class="preloader">
                <span class="dot"></span>
                <div class="dots">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>

        <!-- Header (Dinonaktifkan sesuai permintaan) -->
        {{-- @include('Frontend.partials._header') --}}

        <main class="main-content">
            
            <!-- Hero Slider -->
            @include('Frontend.partials._hero')

            <!-- Services / Layanan -->
            @include('Frontend.partials._services')

            <!-- About -->
            @include('Frontend.partials._about')

            <!-- Features / Mengapa Memilih Kami -->
            @include('Frontend.partials._features')

            <!-- Edukasi -->
            @include('Frontend.partials._edukasi')

            <!-- TOGA -->
            @include('Frontend.partials._toga')

            <!-- Testimonials -->
            @include('Frontend.partials._testimonials')

            <!-- Newsletter -->
            @include('Frontend.partials._newsletter')

        </main>

        <!-- Footer -->
        @include('Frontend.partials._footer')

        <!-- Scroll To Top -->
        <div id="scroll-to-top" class="scroll-to-top"><span class="fa fa-angle-up"></span></div>

        <!-- Mobile Menu -->
        @include('Frontend.partials._mobile-menu')

    </div>

    <!-- JS Vendor -->
    <script src="{{ asset('frontend/assets/js/modernizr-3.5.0.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery-3.6.0-main.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery-3.3.2-migrate.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/fancybox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/waypoint-4.0.1.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/counterup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/aos.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.datetimepicker.min.js') }}"></script>
    
    <!-- JS Custom -->
    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            // Mobile Menu Toggle Fix
            $('.sigemoy-mobile-toggle').on('click', function() {
                $('.off-canvas-wrapper').addClass('off-canvas-open');
                $('body').addClass('off-canvas-active');
            });
            
            $('.off-canvas-overlay, .btn-close').on('click', function() {
                $('.off-canvas-wrapper').removeClass('off-canvas-open');
                $('body').removeClass('off-canvas-active');
            });
        });
    </script>
</body>

</html>
