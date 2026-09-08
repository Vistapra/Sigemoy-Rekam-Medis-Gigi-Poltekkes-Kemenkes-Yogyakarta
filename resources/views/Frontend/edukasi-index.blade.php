<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edukasi Kesehatan Gigi | SI-GEMOY</title>
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/favicon.ico') }}" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/css/sigemoy-rebuild.css') }}" rel="stylesheet" />
</head>
<body class="sg-body">
    <a href="#main" class="sg-skip-link">Lewati ke konten utama</a>
    @include('Frontend.partials._header')
    @include('Frontend.partials._mobile-menu')

    <main id="main" class="sg-main">
        <section class="sg-page-hero">
            <div class="sg-container">
                <nav class="sg-breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ route('sigemoy') }}"><svg viewBox="0 0 24 24" width="14" height="14"><path fill="currentColor" d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg> Beranda</a>
                    <span aria-hidden="true">/</span>
                    <span aria-current="page">Edukasi</span>
                </nav>
                <h1 class="sg-title sg-title--xl">Edukasi <em>Kesehatan Gigi</em></h1>
                <p class="sg-lead">Temukan informasi penting tentang kesehatan gigi dan mulut dari SI-GEMOY.</p>

                <form action="{{ route('edukasi.publik') }}" method="GET" class="sg-search" role="search">
                    <label class="sg-search__field">
                        <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path fill="currentColor" d="M15.5 14h-.8l-.3-.3a6.5 6.5 0 1 0-.7.7l.3.3v.8l5 5 1.5-1.5zm-6 0A4.5 4.5 0 1 1 14 9.5 4.5 4.5 0 0 1 9.5 14"/></svg>
                        <input type="text" name="search" placeholder="Cari edukasi..." value="{{ $search ?? '' }}" aria-label="Cari edukasi">
                    </label>
                    <button type="submit" class="sg-btn sg-btn--primary">Cari</button>
                </form>

                @if(isset($search) && $search)
                    <div class="sg-search-info">
                        <span>Hasil pencarian: <strong>"{{ $search }}"</strong></span>
                        <a href="{{ route('edukasi.publik') }}" class="sg-chip-clear">
                            <svg viewBox="0 0 24 24" width="14" height="14"><path fill="currentColor" d="M18.3 5.7L12 12l6.3 6.3-1.4 1.4L10.6 13.4 4.3 19.7 2.9 18.3 9.2 12 2.9 5.7 4.3 4.3l6.3 6.3 6.3-6.3z"/></svg>
                            Hapus pencarian
                        </a>
                    </div>
                @endif
            </div>
        </section>

        <section class="sg-section sg-edu-listing">
            <div class="sg-container">
                @if($edukasi->count() > 0)
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
                                            <span class="sg-edu-card__play"><svg viewBox="0 0 24 24" width="18" height="18"><path fill="currentColor" d="M8 5v14l11-7z"/></svg></span>
                                        @else
                                            <div class="sg-edu-card__placeholder"><i class="fa fa-video-camera"></i></div>
                                        @endif
                                    @elseif($item->media_type === 'video_upload' && $item->media_path)
                                        <div class="sg-edu-card__placeholder"><i class="fa fa-film"></i></div>
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
                                    <p class="sg-edu-card__desc">{{ Str::limit(strip_tags($item->deskripsi), 120) }}</p>
                                    <a href="{{ route('edukasi.publik.detail', $item->id) }}" class="sg-link-arrow">
                                        Baca selengkapnya
                                        <svg viewBox="0 0 24 24" width="16" height="16" aria-hidden="true"><path fill="currentColor" d="M13 5l7 7-7 7-1.4-1.4L16.2 13H4v-2h12.2l-4.6-4.6z"/></svg>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="sg-pagination">
                        {{ $edukasi->appends(['search' => $search ?? ''])->links('pagination::bootstrap-5') }}
                    </div>
                @else
                    <div class="sg-empty">
                        <svg viewBox="0 0 24 24" width="42" height="42" aria-hidden="true"><path fill="currentColor" d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9M17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73z"/></svg>
                        @if(isset($search) && $search)
                            <p>Tidak ditemukan edukasi dengan kata kunci "<strong>{{ $search }}</strong>".</p>
                        @else
                            <p>Konten edukasi akan segera tersedia.</p>
                        @endif
                    </div>
                @endif
            </div>
        </section>
    </main>

    @include('Frontend.partials._footer')

    <button type="button" id="scrollToTop" class="sg-scroll-top" aria-label="Kembali ke atas">
        <svg viewBox="0 0 24 24" width="18" height="18"><path fill="currentColor" d="M12 4l8 8-1.4 1.4L13 7.8V20h-2V7.8L5.4 13.4 4 12z"/></svg>
    </button>

    <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="{{ asset('frontend/assets/js/jquery-3.6.0-main.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script defer src="{{ asset('frontend/assets/js/sigemoy-rebuild.js') }}"></script>
</body>
</html>
