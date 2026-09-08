<section class="sg-hero" id="hero">
    <canvas class="sg-hero__canvas" id="sgHeroCanvas" aria-hidden="true"></canvas>
    <div class="sg-hero__glow" aria-hidden="true"></div>

    <div class="sg-container sg-hero__inner">
        <div class="sg-hero__content">
            <span class="sg-eyebrow" data-sg-reveal>
                <span class="sg-eyebrow__dot"></span>
                Poltekkes Kemenkes Yogyakarta
            </span>

            <h1 class="sg-hero__title" data-sg-split>
                Rekam medis gigi yang <em>terhubung</em>, terjaga, &amp; mudah diakses.
            </h1>

            <p class="sg-hero__lead" data-sg-reveal data-sg-delay="0.15">
                SI-GEMOY adalah platform digital untuk mencatat, memantau, dan mengelola rekam medis gigi pasien secara aman. Dirancang untuk klinik, tenaga kesehatan, dan mahasiswa Poltekkes Kemenkes Yogyakarta.
            </p>

            <div class="sg-hero__cta" data-sg-reveal data-sg-delay="0.25">
                <a href="{{ route('login') }}" class="sg-btn sg-btn--primary sg-btn--lg">
                    <span>Mulai Sekarang</span>
                    <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path fill="currentColor" d="M13 5l7 7-7 7-1.4-1.4L16.2 13H4v-2h12.2l-4.6-4.6z"/></svg>
                </a>
                <a href="#about" class="sg-btn sg-btn--ghost sg-btn--lg" data-sg-scroll>
                    <svg viewBox="0 0 24 24" width="16" height="16" aria-hidden="true"><path fill="currentColor" d="M8 5v14l11-7z"/></svg>
                    <span>Pelajari SI-GEMOY</span>
                </a>
            </div>

            <dl class="sg-hero__stats" data-sg-reveal data-sg-delay="0.4">
                <div>
                    <dt data-sg-count="2024">2024</dt>
                    <dd>Beroperasi sejak</dd>
                </div>
                <div>
                    <dt data-sg-count="100" data-sg-suffix="%">100%</dt>
                    <dd>Digital &amp; paperless</dd>
                </div>
                <div>
                    <dt data-sg-count="24" data-sg-suffix="/7">24/7</dt>
                    <dd>Akses rekam medis</dd>
                </div>
            </dl>
        </div>

        <div class="sg-hero__visual" data-sg-reveal data-sg-delay="0.2" aria-hidden="true">
            <div class="sg-hero__card sg-hero__card--main">
                <img src="{{ asset('frontend/assets/img/slider/logosigemoy.png') }}" alt="Logo SI-GEMOY" width="420" height="420" loading="eager" onerror="this.style.display='none'">
            </div>
            <div class="sg-hero__card sg-hero__card--stat">
                <div class="sg-hero__stat-ico">
                    <svg viewBox="0 0 24 24" width="22" height="22"><path fill="currentColor" d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 22 12 18.56 5.82 22 7 14.14l-5-4.87 6.91-1.01z"/></svg>
                </div>
                <div>
                    <strong>Terverifikasi</strong>
                    <span>Data terenkripsi</span>
                </div>
            </div>
            <div class="sg-hero__card sg-hero__card--pulse">
                <span class="sg-pulse"></span>
                <div>
                    <strong>Live monitoring</strong>
                    <span>Rekam medis realtime</span>
                </div>
            </div>
        </div>
    </div>

    <a href="#about" class="sg-hero__scroll" data-sg-scroll aria-label="Gulir ke bawah">
        <span></span>
    </a>
</section>
