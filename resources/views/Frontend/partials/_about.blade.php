<section class="sg-section sg-about" id="about">
    <div class="sg-container">
        <div class="sg-about__grid">
            <div class="sg-about__media" data-sg-reveal>
                <div class="sg-about__media-frame">
                    <img src="{{ asset('frontend/assets/img/photos/about1.webp') }}" alt="Tentang SI-GEMOY" loading="lazy" onerror="this.src='{{ asset('frontend/assets/img/slider/logosigemoy.png') }}'">
                </div>
                <div class="sg-about__badge">
                    <span class="sg-about__badge-num">2024</span>
                    <span class="sg-about__badge-label">Sejak diluncurkan</span>
                </div>
                <div class="sg-about__shape sg-about__shape--a" aria-hidden="true"></div>
                <div class="sg-about__shape sg-about__shape--b" aria-hidden="true"></div>
            </div>

            <div class="sg-about__content">
                <span class="sg-eyebrow" data-sg-reveal><span class="sg-eyebrow__dot"></span>Tentang SI-GEMOY</span>
                <h2 class="sg-title" data-sg-reveal>
                    Jaga <em>kesehatan gigi</em> Anda dengan sistem rekam medis yang terpadu.
                </h2>
                <p class="sg-lead" data-sg-reveal>
                    SI-GEMOY hadir untuk membantu tenaga kesehatan mendokumentasikan setiap tindakan perawatan gigi secara akurat, aman, dan mudah diakses kembali. Cocok untuk klinik, poli, dan pembelajaran mahasiswa Poltekkes Kemenkes Yogyakarta.
                </p>

                <ul class="sg-checklist" data-sg-stagger>
                    <li>Riwayat perawatan pasien terdokumentasi lengkap</li>
                    <li>Integrasi antara dokter gigi, perawat, dan mahasiswa praktik</li>
                    <li>Data terlindungi dengan standar keamanan modern</li>
                    <li>Antarmuka ringan, dapat digunakan dari mana saja</li>
                </ul>

                <div class="sg-about__cta" data-sg-reveal>
                    <a href="{{ route('login') }}" class="sg-btn sg-btn--primary">Buat Reservasi</a>
                    <a href="#layanan" class="sg-link-arrow" data-sg-scroll>
                        Lihat layanan kami
                        <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path fill="currentColor" d="M13 5l7 7-7 7-1.4-1.4L16.2 13H4v-2h12.2l-4.6-4.6z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
