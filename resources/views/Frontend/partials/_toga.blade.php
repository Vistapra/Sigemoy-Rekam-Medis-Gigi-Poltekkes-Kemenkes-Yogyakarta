<section class="sg-section sg-toga" id="toga">
    <div class="sg-toga__bg" aria-hidden="true"></div>
    <div class="sg-container">
        <div class="sg-section-head">
            <div>
                <span class="sg-eyebrow" data-sg-reveal><span class="sg-eyebrow__dot"></span>TOGA</span>
                <h2 class="sg-title" data-sg-reveal>
                    Tanaman <em>Obat Keluarga</em>.
                </h2>
            </div>
            <p class="sg-section-head__note" data-sg-reveal>
                Kenali tanaman obat keluarga yang bermanfaat untuk kesehatan — dokumentasi resmi SI-GEMOY.
            </p>
        </div>

        @if(isset($toga) && $toga->count() > 0)
            <div class="sg-card-grid sg-card-grid--3" data-sg-stagger>
                @foreach($toga as $item)
                    <article class="sg-toga-card">
                        <div class="sg-toga-card__media">
                            @if($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" loading="lazy">
                            @else
                                <div class="sg-toga-card__placeholder" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" width="34" height="34"><path fill="currentColor" d="M17 8C8 10 5.9 16.17 3.82 21.34l1.89.66.95-2.3c.48.17.98.3 1.34.3C19 20 22 3 22 3c-1 2-8 2.25-13 3.25S2 11.5 2 13.5s1.75 3.75 1.75 3.75C7 8 17 8 17 8"/></svg>
                                </div>
                            @endif
                        </div>
                        <div class="sg-toga-card__body">
                            <h3 class="sg-toga-card__title">{{ $item->judul }}</h3>
                            <p class="sg-toga-card__desc">{{ Str::limit(strip_tags($item->deskripsi), 120) }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="sg-empty" data-sg-reveal>
                <svg viewBox="0 0 24 24" width="42" height="42" aria-hidden="true"><path fill="currentColor" d="M17 8C8 10 5.9 16.17 3.82 21.34l1.89.66.95-2.3c.48.17.98.3 1.34.3C19 20 22 3 22 3c-1 2-8 2.25-13 3.25S2 11.5 2 13.5s1.75 3.75 1.75 3.75C7 8 17 8 17 8"/></svg>
                <p>Informasi TOGA akan segera tersedia.</p>
            </div>
        @endif
    </div>
</section>
