<footer class="sg-footer">
    <div class="sg-container">
        <div class="sg-footer__grid">
            <div class="sg-footer__brand">
                <a href="{{ route('sigemoy') }}" class="sg-brand sg-brand--light">
                    <span class="sg-brand__mark" aria-hidden="true">
                        <svg viewBox="0 0 40 40" width="34" height="34"><defs><linearGradient id="sgLogoF" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="#14C3C2"/><stop offset="100%" stop-color="#0B7A79"/></linearGradient></defs><rect x="2" y="2" width="36" height="36" rx="12" fill="url(#sgLogoF)"/><path d="M13 14c0-2.8 2.7-4.5 5.2-3.3.8.4 1.8.4 2.6 0C23.3 9.5 26 11.2 26 14c0 3.4-2.4 6-3.4 9.7-.5 1.9-2.7 1.9-3.2 0C18.4 20 16 17.4 16 14z" fill="#fff" opacity=".95"/><circle cx="20" cy="27.5" r="1.6" fill="#F59E0B"/></svg>
                    </span>
                    <span class="sg-brand__text">
                        <strong>SI-GEMOY</strong>
                        <em>Sistem Informasi Gigi E-Monitoring Yogyakarta</em>
                    </span>
                </a>
                <p class="sg-footer__about">
                    Platform digital rekam medis gigi yang dikembangkan oleh Poltekkes Kemenkes Yogyakarta untuk mendukung pelayanan klinis dan pembelajaran.
                </p>
            </div>

            <div class="sg-footer__col">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="#hero" data-sg-scroll>Beranda</a></li>
                    <li><a href="#about" data-sg-scroll>Tentang</a></li>
                    <li><a href="#layanan" data-sg-scroll>Layanan</a></li>
                    <li><a href="#edukasi" data-sg-scroll>Edukasi</a></li>
                    <li><a href="{{ route('login') }}">Masuk</a></li>
                </ul>
            </div>

            <div class="sg-footer__col">
                <h4>Layanan</h4>
                <ul>
                    <li><a href="#layanan" data-sg-scroll>Pemeriksaan Gigi</a></li>
                    <li><a href="#layanan" data-sg-scroll>Pembersihan Karang Gigi</a></li>
                    <li><a href="#layanan" data-sg-scroll>Perawatan Saluran Akar</a></li>
                    <li><a href="#edukasi" data-sg-scroll>Edukasi Kesehatan</a></li>
                    <li><a href="#toga" data-sg-scroll>TOGA</a></li>
                </ul>
            </div>

            <div class="sg-footer__col">
                <h4>Kontak</h4>
                <ul class="sg-footer__contact">
                    <li>
                        <svg viewBox="0 0 24 24" width="16" height="16" aria-hidden="true"><path fill="currentColor" d="M12 2C8.1 2 5 5.1 5 9c0 5.3 7 13 7 13s7-7.7 7-13c0-3.9-3.1-7-7-7m0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5"/></svg>
                        Poltekkes Kemenkes Yogyakarta
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" width="16" height="16" aria-hidden="true"><path fill="currentColor" d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2m0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8m4-8a4 4 0 1 1-4-4 4 4 0 0 1 4 4"/></svg>
                        <a href="https://sigemoypolkesyo.com/" target="_blank" rel="noopener">sigemoypolkesyo.com</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="sg-footer__bottom">
            <p>&copy; {{ date('Y') }} SI-GEMOY — Poltekkes Kemenkes Yogyakarta. Seluruh hak cipta dilindungi.</p>
            <p class="sg-footer__meta">Dibangun untuk pelayanan kesehatan gigi yang lebih baik.</p>
        </div>
    </div>
</footer>
