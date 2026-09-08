<header class="sg-header" data-sg-header>
    <div class="sg-header__inner sg-container">
        <a href="{{ route('sigemoy') }}" class="sg-brand" aria-label="SI-GEMOY — Beranda">
            <span class="sg-brand__mark" aria-hidden="true">
                <svg viewBox="0 0 40 40" width="34" height="34"><defs><linearGradient id="sgLogo" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="#14C3C2"/><stop offset="100%" stop-color="#0B7A79"/></linearGradient></defs><rect x="2" y="2" width="36" height="36" rx="12" fill="url(#sgLogo)"/><path d="M13 14c0-2.8 2.7-4.5 5.2-3.3.8.4 1.8.4 2.6 0C23.3 9.5 26 11.2 26 14c0 3.4-2.4 6-3.4 9.7-.5 1.9-2.7 1.9-3.2 0C18.4 20 16 17.4 16 14z" fill="#fff" opacity=".95"/><circle cx="20" cy="27.5" r="1.6" fill="#F59E0B"/></svg>
            </span>
            <span class="sg-brand__text">
                <strong>SI-GEMOY</strong>
                <em>Rekam Medis Gigi Digital</em>
            </span>
        </a>

        <nav class="sg-nav" aria-label="Navigasi utama">
            <ul class="sg-nav__list">
                <li><a class="sg-nav__link" href="#hero" data-sg-scroll>Beranda</a></li>
                <li><a class="sg-nav__link" href="#about" data-sg-scroll>Tentang</a></li>
                <li><a class="sg-nav__link" href="#layanan" data-sg-scroll>Layanan</a></li>
                <li><a class="sg-nav__link" href="#edukasi" data-sg-scroll>Edukasi</a></li>
                <li><a class="sg-nav__link" href="#toga" data-sg-scroll>TOGA</a></li>
            </ul>
        </nav>

        <div class="sg-header__actions">
            <a href="{{ route('login') }}" class="sg-btn sg-btn--primary sg-btn--sm sg-hide-mobile">
                <span>Masuk</span>
                <svg viewBox="0 0 24 24" width="16" height="16" aria-hidden="true"><path fill="currentColor" d="M13 5l7 7-7 7-1.4-1.4L16.2 13H4v-2h12.2l-4.6-4.6z"/></svg>
            </a>
            <button class="sg-menu-toggle" type="button" aria-controls="sgMobileMenu" aria-expanded="false" aria-label="Buka menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>
