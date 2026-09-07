<section class="home-slider-area">
    <div class="swiper-container home-slider-container default-slider-container">
        <div class="swiper-wrapper home-slider-wrapper slider-default">
            <div class="swiper-slide">
                <div class="slider-content-area"
                    data-bg-img="{{ asset('frontend/assets/img/slider/logosigemoy.png') }}">
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
                                    <a class="btn-slider btn-login" href="{{ route('login') }}">LOGIN</a>
                                </div>
                            </div>
                        </div>
                        <div class="slider-thumb">
                            <div class="thumb">
                                <a href="{{ route('login') }}">
                                    <div class="shape1">
                                        <img src="{{ asset('frontend/assets/img/slider/logosigemoy.png') }}"
                                            width="575" height="575" alt="Logo SIGEMOY">
                                    </div>
                                </a>
                                <a href="{{ route('login') }}">
                                    <div class="shape2"
                                        data-bg-img="{{ asset('frontend/assets/img/icons/1.webp') }}">
                                    </div>
                                </a>
                                <a href="{{ route('login') }}">
                                    <div class="shape3"
                                        data-bg-img="{{ asset('frontend/assets/img/shape/3.webp') }}">
                                    </div>
                                </a>
                                <a href="{{ route('login') }}">
                                    <div class="shape4">
                                        <img src="{{ asset('frontend/assets/img/shape/4.webp') }}"
                                            width="86" height="120" alt="Shape">
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
