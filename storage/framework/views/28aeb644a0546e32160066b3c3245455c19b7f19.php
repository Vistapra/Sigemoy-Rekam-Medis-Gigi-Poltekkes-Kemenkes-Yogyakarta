<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>SIGEMOY | REKAM MEDIS GIGI KESEHATAN</title>

    <link rel="shortcut icon" href="<?php echo e(asset('frontend/assets/img/favicon.ico')); ?>" type="image/x-icon" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Exo:wght@300;400;500;600;700;800&family=Roboto:wght@300&family=Shippori+Mincho:wght@500;600;700;800&display=swap"
        rel="stylesheet">

    <link href="<?php echo e(asset('frontend/assets/css/bootstrap.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('frontend/assets/css/font-awesome.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('frontend/assets/css/jquery.datetimepicker.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('frontend/assets/css/swiper.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('frontend/assets/css/fancybox.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('frontend/assets/css/aos.min.css')); ?>" rel="stylesheet" />

    <link href="<?php echo e(asset('frontend/assets/css/style.css')); ?>" rel="stylesheet" />
</head>

<body>

    <div class="wrapper">

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

        <header class="header-wrapper">
            
            <div class="header-area sticky-header header-default">
                <div class="container">
                    <div class="row no-gutter align-items-center position-relative">
                        <div class="col-12">
                            <div class="header-align">
                                <div class="header-align-left">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="main-content">
            <section class="home-slider-area">
                <div class="swiper-container home-slider-container default-slider-container">
                    <div class="swiper-wrapper home-slider-wrapper slider-default">
                        <div class="swiper-slide">
                            <div class="slider-content-area"
                                data-bg-img="<?php echo e(asset('frontend/assets/img/slider/logosigemoy.png')); ?>">
                                <div class="slider-container">
                                    <div class="slider-content">
                                        <div class="content">
                                            <div class="sub-title-box">
                                                <h4 class="sub-title">POLTEKKES KEMENKES YOGYAKARTA</h4>
                                            </div>
                                            <div class="title-box">
                                                <h2 class="title">SI-GEMOY</h2>
                                            </div>
                                            <div class="desc-box">
                                                <p class="desc">SI-GEMOY (Sistem Informasi Gigi E-Monitoring Yogyakarta) adalah platform digital inovatif yang dikembangkan oleh Poltekkes Kemenkes Yogyakarta. Sistem ini dirancang untuk mengelola dan memantau rekam medis gigi pasien.</p>
                                            </div>
                                            <div class="btn-slider-box">
                                                <a class="btn-slider btn-login" href="<?php echo e(route('login')); ?>">LOGIN</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-thumb">
                                        <div class="thumb">
                                            <a href="<?php echo e(route('login')); ?>">
                                                <div class="shape1">
                                                    <img src="<?php echo e(asset('frontend/assets/img/slider/logosigemoy.png')); ?>"
                                                        width="575" height="575" alt="Image-HasTech">
                                                </div>
                                            </a>
                                            <a href="<?php echo e(route('login')); ?>">
                                                <div class="shape2"
                                                    data-bg-img="<?php echo e(asset('frontend/assets/img/icons/1.webp')); ?>">
                                                </div>
                                            </a>
                                            <a href="<?php echo e(route('login')); ?>">
                                                <div class="shape3"
                                                    data-bg-img="<?php echo e(asset('frontend/assets/img/shape/3.webp')); ?>">
                                                </div>
                                            </a>
                                            <a href="<?php echo e(route('login')); ?>">
                                                <div class="shape4">
                                                    <img src="<?php echo e(asset('frontend/assets/img/shape/4.webp')); ?>"
                                                        width="86" height="120" alt="Image-HasTech">
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="service-list-area service-list-default-area">
                <div class="container pb--0">
                    <div class="row">
                        <div class="col-12">
                            <div class="service-list-content-wrap">
                                <div class="grid-item">
                                    <div class="service-list-item" data-aos="fade-up">
                                        <div class="icon-box">
                                            <img src="<?php echo e(asset('frontend/assets/img/icons/fun1.webp')); ?>"
                                                width="62" height="79" alt="Image-HasTech">
                                        </div>
                                        <div class="content">
                                            <h2 class="price-number"><span>Membantu</span> </h2>
                                            <h6 class="title">Pemeriksaan Gigi</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-item">
                                    <div class="service-list-item" data-aos="fade-up">
                                        <div class="icon-box">
                                            <img src="<?php echo e(asset('frontend/assets/img/icons/fun2.webp')); ?>"
                                                width="74" height="79" alt="Image-HasTech">
                                        </div>
                                        <div class="content">
                                            <h2 class="price-number"><span>Membantu</span> </h2>
                                            <h6 class="title">Pembersihan Karang Gigi</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-item">
                                    <div class="service-list-item" data-aos="fade-up">
                                        <div class="icon-box">
                                            <img src="<?php echo e(asset('frontend/assets/img/icons/fun3.webp')); ?>"
                                                width="89" height="78" alt="Image-HasTech">
                                        </div>
                                        <div class="content">
                                            <h2 class="price-number"><span>Membantu</span></h2>
                                            <h6 class="title">Perawatan Saluran Akar</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="about-area about-default-area">
                <div class="container pb--0">
                    <div class="about-content-wrap">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="about-thumb">
                                    <img data-aos="fade-right"
                                        src="<?php echo e(asset('frontend/assets/img/photos/about1.webp')); ?>" width="480"
                                        height="691" alt="Image-HasTech">
                                    <div class="shape-one layer-style mousemove-layer" data-speed="2.2"><img
                                            width="593" height="617"
                                            src="<?php echo e(asset('frontend/assets/img/shape/1.webp')); ?>"
                                            alt="Image-HasTech">
                                    </div>
                                    <div class="shape-two layer-style mousemove-layer" data-speed="1.2"><img
                                            width="608" height="649"
                                            src="<?php echo e(asset('frontend/assets/img/shape/2.webp')); ?>"
                                            alt="Image-HasTech">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="about-content" data-aos="fade-up">
                                    <div class="section-title mb--0">
                                        <h5 class="sub-title">SEJAK 2024</h5>
                                        <h2 class="title">Jaga <span>Kesehatan Gigi</span> Anda</h2>
                                        <div class="desc">
                                            <p>SIGEMOY hadir untuk membantu Anda dalam menjaga kesehatan gigi. Dengan
                                                sistem rekam medis yang terintegrasi, kami memastikan perawatan gigi
                                                Anda terdokumentasi dengan baik.</p>
                                        </div>
                                    </div>
                                    <h4 class="note-info">Perawatan gigi rutin penting untuk kesehatan gigi dan senyum
                                        Anda</h4>
                                    <div class="about-content-bottom-info">
                                        <a class="about-btn-link" href="https://sigemoy.id/">Buat Janji Sekarang</a>
                                        <div class="video-content-wrap">
                                            <a class="" href="https://sigemoy.id/">
                                                <img class="icon-img"
                                                    src="<?php echo e(asset('frontend/assets/img/icons/play1.webp')); ?>"
                                                    width="41" height="41" alt="Image-HasTech">
                                                <span>Video Tour</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="divider-area position-relative z-index-1">
                <div class="container pt--0 pb--0">
                    <div class="row divider-style-wrap">
                        <div class="col-md-5">
                            <div class="divider-content">
                                <div class="section-title mb--0">
                                    <h5 class="sub-title">LAYANAN KAMI</h5>
                                    <h2 class="title mb--0">Layanan <span>Terbaik untuk</span> Gigi Anda</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="divider-content justify-content-end">
                                <div class="emergency-call-info">
                                    <div class="content">
                                        <h4 class="title">Hubungi kami untuk Reservasi</h4>
                                        <h3 class="number">Sigemoy.id</h3>
                                    </div>
                                    <div class="icon-box">
                                        <img class="icon-img"
                                            src="<?php echo e(asset('frontend/assets/img/icons/booking1.webp')); ?>"
                                            width="79" height="89" alt="Image-HasTech">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-layer-style" data-bg-img="<?php echo e(asset('frontend/assets/img/photos/bg1.webp')); ?>">
                </div>
            </div>

            

            <div class="divider-area">
                <div class="container pt--0 pb--0">
                    <div class="row divider-style2-wrap">
                        <div class="col-lg-7">
                            <div class="divider-thumb">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="swiper-container feature-slider-container" data-aos="fade-right">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="slider-thumb-area">
                                                        <div class="thumb">
                                                            <img src="<?php echo e(asset('frontend/assets/img/photos/fea1.webp')); ?>"
                                                                width="540" height="527" alt="Image-HasTech">
                                                        </div>
                                                        <div class="shape1"></div>
                                                        <div class="shape2"></div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="slider-thumb-area">
                                                        <div class="thumb">
                                                            <img src="<?php echo e(asset('frontend/assets/img/photos/fea2.webp')); ?>"
                                                                width="540" height="527" alt="Image-HasTech">
                                                        </div>
                                                        <div class="shape1"></div>
                                                        <div class="shape2"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="swiper-btn-wrap">
                                                <div class="swiper-btn-prev"><i class="fa fa-angle-left"></i>
                                                </div>
                                                <div class="swiper-btn-next"><i class="fa fa-angle-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="divider-content" data-aos="fade-up">
                                <div class="section-title mb--0 position-relative">
                                    <h5 class="sub-title">MENGAPA KAMI TERBAIK</h5>
                                    <h2 class="title">Orang <span>Memilih Kami</span> karena...</h2>
                                    <div class="desc">
                                        <p>SIGEMOY menyediakan layanan rekam medis gigi terbaik dengan teknologi terkini
                                        </p>
                                    </div>
                                    <div class="section-title-shape"></div>
                                </div>
                                <div class="feature-box-wrap">
                                    <div class="feature-box">
                                        <div class="inner-content">
                                            <div class="icon">
                                                <img class="icon-img"
                                                    src="<?php echo e(asset('frontend/assets/img/icons/f1.webp')); ?>"
                                                    width="57" height="51" alt="Image-HasTech">
                                            </div>
                                            <div class="content">
                                                <h4 class="title">Dokter Gigi Ahli</h4>
                                                <p>Tim dokter gigi berpengalaman dan bersertifikasi</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="feature-box">
                                        <div class="inner-content">
                                            <div class="icon">
                                                <img class="icon-img"
                                                    src="<?php echo e(asset('frontend/assets/img/icons/f2.webp')); ?>"
                                                    width="52" height="50" alt="Image-HasTech">
                                            </div>
                                            <div class="content">
                                                <h4 class="title">Layanan 24/7</h4>
                                                <p>Dukungan dan layanan darurat 24 jam setiap hari</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="feature-box">
                                        <div class="inner-content">
                                            <div class="icon">
                                                <img class="icon-img"
                                                    src="<?php echo e(asset('frontend/assets/img/icons/f3.webp')); ?>"
                                                    width="55" height="51" alt="Image-HasTech">
                                            </div>
                                            <div class="content">
                                                <h4 class="title">Teknologi Terkini</h4>
                                                <p>Menggunakan peralatan dan teknologi gigi terbaru</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

            <section class="testimonial-area testimonial-default-area">
                <div class="container" data-aos="fade-up">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="testi-slider-content">
                                <div class="section-title">
                                    <h5 class="sub-title">TESTIMONI</h5>
                                    <h2 class="title">Pasien <span>Puas</span> dengan <span>Layanan</span> Kami
                                    </h2>
                                </div>
                                <div class="swiper-container testimonial-top">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="testimonial-item">
                                                <div class="testi-inner-content">
                                                    <div class="testi-content">
                                                        <p>"SIGEMOY sangat membantu dalam mengelola rekam medis gigi
                                                            saya. Dokter gigi dapat dengan mudah melihat riwayat
                                                            perawatan saya."</p>
                                                    </div>
                                                    <div class="testi-author">
                                                        <div class="testi-info">
                                                            <span class="name">Budi Santoso</span>
                                                            <span class="designation"> (Pasien Reguler)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="testimonial-item">
                                                <div class="testi-inner-content">
                                                    <div class="testi-content">
                                                        <p>"Layanan di sini sangat profesional. Sistem SIGEMOY membuat
                                                            proses administrasi menjadi lebih cepat dan efisien."</p>
                                                    </div>
                                                    <div class="testi-author">
                                                        <div class="testi-info">
                                                            <span class="name">Siti Rahma</span>
                                                            <span class="designation"> (Pasien Baru)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-btn-wrap">
                                        <div class="swiper-btn-prev"><i
                                                class="fa fa-long-arrow-left"></i><span>sebelumnya</span></div>
                                        <div class="swiper-btn-next"><span>selanjutnya</span><i
                                                class="fa fa-long-arrow-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="testi-slider-thumb">
                                <div class="swiper-container testimonial-thumbs">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="testimonial-item">
                                                <div class="testi-inner-thumb">
                                                    <div class="testi-thumb">
                                                        <img src="<?php echo e(asset('frontend/assets/img/testimonial/1.webp')); ?>"
                                                            width="309" height="309" alt="Image-HasTech">
                                                        <div class="quote-icon">
                                                            <img src="<?php echo e(asset('frontend/assets/img/icons/quote.webp')); ?>"
                                                                width="48" height="34" alt="Image-HasTech">
                                                        </div>
                                                        <div class="shape"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="testimonial-item">
                                                <div class="testi-inner-thumb">
                                                    <div class="testi-thumb">
                                                        <img src="<?php echo e(asset('frontend/assets/img/testimonial/2.webp')); ?>"
                                                            width="309" height="309" alt="Image-HasTech">
                                                        <div class="quote-icon">
                                                            <img src="<?php echo e(asset('frontend/assets/img/icons/quote.webp')); ?>"
                                                                width="48" height="34" alt="Image-HasTech">
                                                        </div>
                                                        <div class="shape"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="testi-thumb-shape"><img
                                        src="<?php echo e(asset('frontend/assets/img/testimonial/s1.webp')); ?>" width="170"
                                        height="182" alt="Image-HasTech"></div>
                                <div class="testi-thumb-shape2"><img
                                        src="<?php echo e(asset('frontend/assets/img/testimonial/s2.webp')); ?>" width="170"
                                        height="182" alt="Image-HasTech"></div>
                                <div class="testi-thumb-shape3"></div>
                                <div class="testi-thumb-shape4"></div>
                                <div class="testi-thumb-shape5"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            

            <section class="newsletter-area bg-overlay bg-overlay-theme-color bg-img z-index-1" data-aos="fade-up"
                data-bg-img="<?php echo e(asset('frontend/assets/img/photos/bg2.webp')); ?>">
                <div class="container pt--0 pb--0">
                    <div class="newsletter-content-wrap">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div class="newsletter-content">
                                    <div class="section-title section-title-light mb--0">
                                        <h5 class="sub-title">NEWSLETTER</h5>
                                        <h2 class="title mb--0">Berlangganan Newsletter Kami</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="newsletter-form">
                                    <form>
                                        <input type="email" class="form-control"
                                            placeholder="Masukkan alamat email Anda">
                                        <button class="btn-submit" type="submit">Berlangganan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        

        <div id="scroll-to-top" class="scroll-to-top"><span class="fa fa-angle-up"></span></div>

        <aside class="off-canvas-wrapper offcanvas offcanvas-start" tabindex="-1" id="AsideOffcanvasMenu"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h1 class="d-none" id="offcanvasExampleLabel">Menu Samping</h1>
                <button class="btn-menu-close" data-bs-dismiss="offcanvas" aria-label="Close">menu <i
                        class="fa fa-chevron-left"></i></button>
            </div>
            
        </aside>
    </div>

    <script src="<?php echo e(asset('frontend/assets/js/modernizr-3.5.0.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/jquery-3.6.0-main.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/jquery-3.3.2-migrate.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/swiper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/fancybox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/waypoint-4.0.1.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/aos.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/counterup.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/jquery.datetimepicker.min.js')); ?>"></script>

    <script src="<?php echo e(asset('frontend/assets/js/custom.js')); ?>"></script>

</body>

</html>
<?php /**PATH D:\PROJECT 2024\Sigemoy\Development\sigemoy\resources\views/Frontend/sigemoy.blade.php ENDPATH**/ ?>