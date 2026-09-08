<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $edukasi->judul }} | Edukasi SI-GEMOY</title>
    <meta name="description" content="{{ Str::limit(strip_tags($edukasi->deskripsi), 150) }}">
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
        <section class="sg-page-hero sg-page-hero--sm">
            <div class="sg-container">
                <nav class="sg-breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ route('sigemoy') }}"><svg viewBox="0 0 24 24" width="14" height="14"><path fill="currentColor" d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg> Beranda</a>
                    <span aria-hidden="true">/</span>
                    <a href="{{ route('edukasi.publik') }}">Edukasi</a>
                    <span aria-hidden="true">/</span>
                    <span aria-current="page">{{ Str::limit($edukasi->judul, 40) }}</span>
                </nav>
            </div>
        </section>

        <article class="sg-article">
            <div class="sg-container sg-container--narrow">
                <header class="sg-article__head">
                    <div class="sg-article__meta">
                        <span>
                            <svg viewBox="0 0 24 24" width="14" height="14" aria-hidden="true"><path fill="currentColor" d="M19 3h-1V1h-2v2H8V1H6v2H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2m0 18H5V8h14z"/></svg>
                            {{ $edukasi->created_at->format('d F Y') }}
                        </span>
                        <span class="sg-article__type">
                            @if($edukasi->media_type === 'foto') <i class="fa fa-image"></i> Artikel Foto
                            @elseif($edukasi->media_type === 'video_url') <i class="fa fa-youtube-play"></i> Artikel Video
                            @else <i class="fa fa-film"></i> Artikel Video
                            @endif
                        </span>
                    </div>
                    <h1 class="sg-article__title">{{ $edukasi->judul }}</h1>
                </header>

                <div class="sg-article__media">
                    @if($edukasi->media_type === 'foto' && $edukasi->media_path)
                        <img src="{{ asset('storage/' . $edukasi->media_path) }}" alt="{{ $edukasi->judul }}">
                    @elseif($edukasi->media_type === 'video_url' && $edukasi->video_url)
                        @php $ytId = $edukasi->getYouTubeId($edukasi->video_url); @endphp
                        @if($ytId)
                            <div class="sg-video-wrap">
                                <iframe src="https://www.youtube.com/embed/{{ $ytId }}" title="Video edukasi: {{ $edukasi->judul }}" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        @else
                            <div class="sg-note sg-note--warn">URL video tidak valid.</div>
                        @endif
                    @elseif($edukasi->media_type === 'video_upload' && $edukasi->media_path)
                        <div class="sg-video-wrap">
                            <video controls>
                                <source src="{{ asset('storage/' . $edukasi->media_path) }}" type="video/mp4">
                                Browser Anda tidak mendukung tag video.
                            </video>
                        </div>
                    @endif
                </div>

                <div class="sg-article__body">
                    {!! nl2br(e($edukasi->deskripsi)) !!}
                </div>
            </div>
        </article>

        @if(isset($edukasiLainnya) && $edukasiLainnya->count() > 0)
            <section class="sg-section sg-edu sg-edu--related">
                <div class="sg-container">
                    <div class="sg-section-head sg-section-head--center">
                        <span class="sg-eyebrow"><span class="sg-eyebrow__dot"></span>Bacaan lainnya</span>
                        <h2 class="sg-title">Edukasi <em>lainnya</em>.</h2>
                    </div>
                    <div class="sg-card-grid sg-card-grid--3">
                        @foreach($edukasiLainnya as $item)
                            <article class="sg-edu-card">
                                <a href="{{ route('edukasi.publik.detail', $item->id) }}" class="sg-edu-card__media" aria-label="Baca: {{ $item->judul }}">
                                    @if($item->media_type === 'foto' && $item->media_path)
                                        <img src="{{ asset('storage/' . $item->media_path) }}" alt="{{ $item->judul }}" loading="lazy">
                                    @elseif($item->media_type === 'video_url' && $item->video_url)
                                        @php $ytId = $item->getYouTubeId($item->video_url); @endphp
                                        @if($ytId)
                                            <img src="https://img.youtube.com/vi/{{ $ytId }}/mqdefault.jpg" alt="{{ $item->judul }}" loading="lazy">
                                            <span class="sg-edu-card__play"><svg viewBox="0 0 24 24" width="18" height="18"><path fill="currentColor" d="M8 5v14l11-7z"/></svg></span>
                                        @endif
                                    @elseif($item->media_type === 'video_upload' && $item->media_path)
                                        <div class="sg-edu-card__placeholder"><i class="fa fa-film"></i></div>
                                    @else
                                        <div class="sg-edu-card__placeholder"><i class="fa fa-book"></i></div>
                                    @endif
                                </a>
                                <div class="sg-edu-card__body">
                                    <span class="sg-edu-card__date">
                                        <svg viewBox="0 0 24 24" width="14" height="14" aria-hidden="true"><path fill="currentColor" d="M19 3h-1V1h-2v2H8V1H6v2H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2m0 18H5V8h14z"/></svg>
                                        {{ $item->created_at->format('d M Y') }}
                                    </span>
                                    <h3 class="sg-edu-card__title">
                                        <a href="{{ route('edukasi.publik.detail', $item->id) }}">{{ $item->judul }}</a>
                                    </h3>
                                    <a href="{{ route('edukasi.publik.detail', $item->id) }}" class="sg-link-arrow">
                                        Baca selengkapnya
                                        <svg viewBox="0 0 24 24" width="16" height="16" aria-hidden="true"><path fill="currentColor" d="M13 5l7 7-7 7-1.4-1.4L16.2 13H4v-2h12.2l-4.6-4.6z"/></svg>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
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
