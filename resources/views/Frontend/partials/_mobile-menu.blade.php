<div class="sg-mobile" id="sgMobileMenu" role="dialog" aria-modal="true" aria-labelledby="sgMobileTitle" aria-hidden="true">
    <div class="sg-mobile__backdrop" data-sg-mobile-close></div>
    <aside class="sg-mobile__panel">
        <header class="sg-mobile__head">
            <span id="sgMobileTitle" class="sg-mobile__title">Menu</span>
            <button type="button" class="sg-mobile__close" data-sg-mobile-close aria-label="Tutup menu">
                <svg viewBox="0 0 24 24" width="20" height="20"><path fill="currentColor" d="M18.3 5.7L12 12l6.3 6.3-1.4 1.4L10.6 13.4 4.3 19.7 2.9 18.3 9.2 12 2.9 5.7 4.3 4.3l6.3 6.3 6.3-6.3z"/></svg>
            </button>
        </header>
        <nav class="sg-mobile__nav" aria-label="Navigasi mobile">
            <a href="#hero" data-sg-mobile-close data-sg-scroll><span>Beranda</span><i></i></a>
            <a href="#about" data-sg-mobile-close data-sg-scroll><span>Tentang</span><i></i></a>
            <a href="#layanan" data-sg-mobile-close data-sg-scroll><span>Layanan</span><i></i></a>
            <a href="#edukasi" data-sg-mobile-close data-sg-scroll><span>Edukasi</span><i></i></a>
            <a href="#toga" data-sg-mobile-close data-sg-scroll><span>TOGA</span><i></i></a>
        </nav>
        <div class="sg-mobile__foot">
            <a href="{{ route('login') }}" class="sg-btn sg-btn--primary sg-btn--block">Masuk ke SI-GEMOY</a>
            <p class="sg-mobile__note">Poltekkes Kemenkes Yogyakarta</p>
        </div>
    </aside>
</div>
