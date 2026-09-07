<footer class="footer-area">
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <!-- Column 1: About SIGEMOY -->
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="footer-widget">
                        <h4 class="footer-widget-title" style="color: #fff; font-family: 'Exo', sans-serif;">SI-GEMOY</h4>
                        <div class="footer-widget-content">
                            <p style="color: #fff; opacity: 0.8;">Sistem Informasi Gigi E-Monitoring Yogyakarta. Platform digital untuk mengelola dan memantau rekam medis gigi pasien oleh Poltekkes Kemenkes Yogyakarta.</p>
                        </div>
                    </div>
                </div>
                <!-- Column 2: Quick Links -->
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <div class="footer-widget widget-menu">
                        <h4 class="widget-title">Navigasi</h4>
                        <div class="widget-menu-wrap">
                            <ul class="nav-menu">
                                <li><a href="#">Beranda</a></li>
                                <li><a href="#about">Tentang</a></li>
                                <li><a href="#layanan">Layanan</a></li>
                                <li><a href="#edukasi">Edukasi</a></li>
                                <li><a href="{{ route('login') }}">Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Column 3: Services -->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <div class="footer-widget widget-menu2">
                        <h4 class="widget-title">Layanan</h4>
                        <div class="widget-menu-wrap">
                            <ul class="nav-menu">
                                <li><a href="#layanan">Pemeriksaan Gigi</a></li>
                                <li><a href="#layanan">Pembersihan Karang Gigi</a></li>
                                <li><a href="#layanan">Perawatan Saluran Akar</a></li>
                                <li><a href="#edukasi">Edukasi Kesehatan</a></li>
                                <li><a href="#toga">TOGA</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Column 4: Contact -->
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget widget-contact">
                        <h4 class="widget-title">Kontak</h4>
                        <div class="widget-contact-wrap">
                            <ul>
                                <li><i class="fa fa-map-marker"></i> Poltekkes Kemenkes Yogyakarta</li>
                                <li><i class="fa fa-globe"></i> <a href="https://sigemoypolkesyo.com/" target="_blank" rel="noopener">sigemoypolkesyo.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container pt--0 pb--0">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <p class="copyright">&copy; {{ date('Y') }} SI-GEMOY — Poltekkes Kemenkes Yogyakarta. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
