<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#0B7A79">
    <meta name="description" content="SI-GEMOY (Sistem Informasi Gigi E-Monitoring Yogyakarta) — platform digital rekam medis gigi oleh Poltekkes Kemenkes Yogyakarta.">

    <title>SI-GEMOY | Sistem Informasi Rekam Medis Gigi — Poltekkes Kemenkes Yogyakarta</title>

    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/favicon.ico') }}" type="image/x-icon" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Manrope:wght@500;600;700;800&family=Exo:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Vendor lama tetap dipertahankan sebagai fallback progressive enhancement --}}
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/css/swiper.min.css') }}" rel="stylesheet" />

    {{-- Design system baru (satu file, terkontrol) --}}
    <link href="{{ asset('frontend/assets/css/sigemoy-rebuild.css') }}" rel="stylesheet" />
</head>

<body class="sg-body">

    {{-- Preloader modern --}}
    <div class="sg-preloader" id="sgPreloader" aria-hidden="true">
        <div class="sg-preloader__ring"></div>
        <span class="sg-preloader__brand">SI-GEMOY</span>
    </div>

    <a href="#main" class="sg-skip-link">Lewati ke konten utama</a>

    @include('Frontend.partials._header')
    @include('Frontend.partials._mobile-menu')

    <main id="main" class="sg-main">
        @include('Frontend.partials._hero')
        @include('Frontend.partials._about')
        @include('Frontend.partials._services')
        @include('Frontend.partials._features')
        @include('Frontend.partials._edukasi')
        @include('Frontend.partials._toga')
        @include('Frontend.partials._testimonials')
        @include('Frontend.partials._newsletter')
    </main>

    @include('Frontend.partials._footer')

    <button type="button" id="scrollToTop" class="sg-scroll-top" aria-label="Kembali ke atas">
        <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path fill="currentColor" d="M12 4l8 8-1.4 1.4L13 7.8V20h-2V7.8L5.4 13.4 4 12z"/></svg>
    </button>

    {{-- Library CDN — dimuat modul & defer, ringan --}}
    <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/animejs@3.2.2/lib/anime.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/three@0.160.0/build/three.min.js"></script>

    {{-- Vendor lama tetap ada bila komponen lain memerlukannya --}}
    <script src="{{ asset('frontend/assets/js/jquery-3.6.0-main.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/swiper.min.js') }}"></script>

    <script defer src="{{ asset('frontend/assets/js/sigemoy-rebuild.js') }}"></script>
</body>

</html>
