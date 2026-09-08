<section class="sg-section sg-doctors" id="tim-dokter">
    <div class="sg-container">
        <div class="sg-section-head sg-section-head--center">
            <span class="sg-eyebrow" data-sg-reveal><span class="sg-eyebrow__dot"></span>Tim Kami</span>
            <h2 class="sg-title" data-sg-reveal>
                Dokter gigi <em>profesional</em> &amp; tersertifikasi.
            </h2>
            <p class="sg-lead sg-center-block" data-sg-reveal>
                Tim dokter gigi berpengalaman yang mendukung layanan dan pembelajaran di Poltekkes Kemenkes Yogyakarta.
            </p>
        </div>

        @if(isset($dokter) && $dokter->count() > 0)
            <div class="sg-card-grid sg-card-grid--4" data-sg-stagger>
                @foreach($dokter as $dr)
                    <article class="sg-doc-card">
                        <div class="sg-doc-card__avatar" aria-hidden="true">
                            <span>{{ strtoupper(substr($dr->nama, 0, 1)) }}</span>
                        </div>
                        <h3 class="sg-doc-card__name">{{ $dr->nama }}</h3>
                        @if($dr->nip)
                            <p class="sg-doc-card__nip">NIP: {{ $dr->nip }}</p>
                        @endif
                        <span class="sg-doc-card__role">Dokter Gigi</span>
                    </article>
                @endforeach
            </div>
        @else
            <div class="sg-empty" data-sg-reveal>
                <svg viewBox="0 0 24 24" width="42" height="42" aria-hidden="true"><path fill="currentColor" d="M12 12a5 5 0 1 0-5-5 5 5 0 0 0 5 5m0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5"/></svg>
                <p>Informasi tim dokter akan segera tersedia.</p>
            </div>
        @endif
    </div>
</section>
