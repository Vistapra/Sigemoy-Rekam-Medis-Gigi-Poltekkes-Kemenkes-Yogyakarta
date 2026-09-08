<section class="sg-section sg-edu" id="edukasi">
    <div class="sg-container">
        <div class="sg-section-head">
            <div>
                <span class="sg-eyebrow" data-sg-reveal><span class="sg-eyebrow__dot"></span>Edukasi Kesehatan</span>
                <h2 class="sg-title" data-sg-reveal>
                    Informasi <em>edukasi</em> gigi &amp; mulut.
                </h2>
            </div>
            <p class="sg-section-head__note" data-sg-reveal>
                Kumpulan artikel dan video edukatif dari SI-GEMOY untuk mendukung kesehatan gigi Anda sehari-hari.
            </p>
        </div>

        @if(isset($edukasi) && $edukasi->count() > 0)
            <div class="sg-card-grid sg-card-grid--3" data-sg-stagger>
                @foreach($edukasi as $item)
                    <article class="sg-edu-card">
                        <a href="{{ route('edukasi.publik.detail', $item->id) }}" class="sg-edu-card__media" aria-label="Baca: {{ $item->judul }}">
                            @if($item->media_type === 'foto' && $item->media_path)
                                <img src="{{ asset('storage/' . $item->media_path) }}" alt="{{ $item->judul }}" loading="lazy">
                            @elseif($item->media_type === 'video_url' && $item->video_url)
                                @php $ytId = $item->getYouTubeId($item->video_url); @endphp
                                @if($ytId)
                                    <img src="https://img.youtube.com/vi/{{ $ytId }}/mqdefault.jpg" alt="{{ $item->judul }}" loading="lazy">
                                    <span class="sg-edu-card__play" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" width="18" height="18"><path fill="currentColor" d="M8 5v14l11-7z"/></svg>
                                    </span>
                                @else
                                    <div class="sg-edu-card__placeholder"><i class="fa fa-video-camera"></i></div>
                                @endif
                            @elseif($item->media_type === 'video_upload' && $item->media_path)
                                <div class="sg-edu-card__placeholder"><i class="fa fa-film"></i></div>
                                <span class="sg-edu-card__play" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" width="18" height="18"><path fill="currentColor" d="M8 5v14l11-7z"/></svg>
                                </span>
                            @else
                                <div class="sg-edu-card__placeholder"><i class="fa fa-book"></i></div>
                            @endif
                            <span class="sg-edu-card__badge">
                                @if($item->media_type === 'foto') <i class="fa fa-image"></i> Foto
                                @elseif($item->media_type === 'video_url') <i class="fa fa-youtube-play"></i> Video
                                @else <i class="fa fa-film"></i> Video
                                @endif
                            </span>
                        </a>
                        <div class="sg-edu-card__body">
                            <span class="sg-edu-card__date">
                                <svg viewBox="0 0 24 24" width="14" height="14" aria-hidden="true"><path fill="currentColor" d="M19 3h-1V1h-2v2H8V1H6v2H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2m0 18H5V8h14z"/></svg>
                                {{ $item->created_at->format('d M Y') }}
                            </span>
                            <h3 class="sg-edu-card__title">
                                <a href="{{ route('edukasi.publik.detail', $item->id) }}">{{ $item->judul }}</a>
                            </h3>
                            <p class="sg-edu-card__desc">{{ Str::limit(strip_tags($item->deskripsi), 110) }}</p>
                            <a href="{{ route('edukasi.publik.detail', $item->id) }}" class="sg-link-arrow">
                                Baca selengkapnya
                                <svg viewBox="0 0 24 24" width="16" height="16" aria-hidden="true"><path fill="currentColor" d="M13 5l7 7-7 7-1.4-1.4L16.2 13H4v-2h12.2l-4.6-4.6z"/></svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="sg-center" data-sg-reveal>
                <a href="{{ route('edukasi.publik') }}" class="sg-btn sg-btn--primary">Lihat Semua Edukasi</a>
            </div>
        @else
            <div class="sg-empty" data-sg-reveal>
                <svg viewBox="0 0 24 24" width="42" height="42" aria-hidden="true"><path fill="currentColor" d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9M17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73z"/></svg>
                <p>Konten edukasi akan segera tersedia.</p>
            </div>
        @endif
    </div>
</section>
