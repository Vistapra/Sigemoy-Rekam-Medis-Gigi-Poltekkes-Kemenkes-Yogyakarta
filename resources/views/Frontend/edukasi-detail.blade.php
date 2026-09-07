<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ $edukasi->judul }} | Edukasi SIGEMOY</title>

    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/favicon.ico') }}" type="image/x-icon" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Exo:wght@300;400;500;600;700;800&family=Roboto:wght@300&family=Shippori+Mincho:wght@500;600;700;800&display=swap"
        rel="stylesheet">

    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/css/sigemoy-custom.css') }}" rel="stylesheet" />
</head>

<body>

    <div class="wrapper">

        {{-- Header (Dinonaktifkan sesuai permintaan) --}}
        {{--
        <header class="header-wrapper">
            ...
        </header>
        --}}

        <main class="main-content">
            
            {{-- Breadcrumb --}}
            <div class="sigemoy-breadcrumb">
                <div class="container">
                    <ul class="sigemoy-breadcrumb-list">
                        <li><a href="{{ route('sigemoy') }}"><i class="fa fa-home"></i> Beranda</a></li>
                        <li><a href="{{ route('edukasi.publik') }}">Edukasi</a></li>
                        <li class="active">{{ Str::limit($edukasi->judul, 40) }}</li>
                    </ul>
                </div>
            </div>

            <article class="sigemoy-edu-detail">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            
                            <h1 class="sigemoy-edu-detail-title">{{ $edukasi->judul }}</h1>
                            
                            <div class="sigemoy-edu-detail-meta">
                                <span><i class="fa fa-calendar"></i> {{ $edukasi->created_at->format('d F Y') }}</span>
                                <span>
                                    @if($edukasi->media_type === 'foto') <i class="fa fa-image"></i> Artikel Foto
                                    @elseif($edukasi->media_type === 'video_url') <i class="fa fa-youtube-play"></i> Artikel Video
                                    @else <i class="fa fa-film"></i> Artikel Video
                                    @endif
                                </span>
                            </div>

                            <div class="sigemoy-edu-detail-media">
                                @if($edukasi->media_type === 'foto' && $edukasi->media_path)
                                    <img src="{{ asset('storage/' . $edukasi->media_path) }}" alt="{{ $edukasi->judul }}">
                                @elseif($edukasi->media_type === 'video_url' && $edukasi->video_url)
                                    @php $ytId = $edukasi->getYouTubeId($edukasi->video_url); @endphp
                                    @if($ytId)
                                        <div class="sigemoy-video-wrapper">
                                            <iframe src="https://www.youtube.com/embed/{{ $ytId }}" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                    @else
                                        <div class="alert alert-warning">URL Video tidak valid.</div>
                                    @endif
                                @elseif($edukasi->media_type === 'video_upload' && $edukasi->media_path)
                                    <div class="sigemoy-video-wrapper">
                                        <video controls>
                                            <source src="{{ asset('storage/' . $edukasi->media_path) }}" type="video/mp4">
                                            Browser Anda tidak mendukung tag video.
                                        </video>
                                    </div>
                                @endif
                            </div>

                            <div class="sigemoy-edu-detail-body">
                                {!! nl2br(e($edukasi->deskripsi)) !!}
                            </div>

                        </div>
                    </div>
                </div>
            </article>

            {{-- Edukasi Terkait --}}
            @if(isset($edukasiLainnya) && $edukasiLainnya->count() > 0)
            <section class="sigemoy-edu-related">
                <div class="container">
                    <div class="section-title text-center">
                        <h2 class="title">Edukasi <span>Lainnya</span></h2>
                    </div>
                    
                    <div class="row">
                        @foreach($edukasiLainnya as $item)
                        <div class="col-md-4 mb-4">
                            <div class="sigemoy-edu-card">
                                <div class="sigemoy-edu-media">
                                    @if($item->media_type === 'foto' && $item->media_path)
                                        <img src="{{ asset('storage/' . $item->media_path) }}" alt="{{ $item->judul }}" loading="lazy">
                                    @elseif($item->media_type === 'video_url' && $item->video_url)
                                        @php $ytId = $item->getYouTubeId($item->video_url); @endphp
                                        @if($ytId)
                                            <img src="https://img.youtube.com/vi/{{ $ytId }}/mqdefault.jpg" alt="{{ $item->judul }}" loading="lazy">
                                            <div class="sigemoy-edu-play"><i class="fa fa-play"></i></div>
                                        @endif
                                    @elseif($item->media_type === 'video_upload' && $item->media_path)
                                        <div class="sigemoy-edu-placeholder"><i class="fa fa-film"></i></div>
                                    @else
                                        <div class="sigemoy-edu-placeholder"><i class="fa fa-book"></i></div>
                                    @endif
                                </div>
                                <div class="sigemoy-edu-content">
                                    <div class="sigemoy-edu-date">
                                        <i class="fa fa-calendar"></i> {{ $item->created_at->format('d M Y') }}
                                    </div>
                                    <h4 class="sigemoy-edu-title">
                                        <a href="{{ route('edukasi.publik.detail', $item->id) }}">{{ $item->judul }}</a>
                                    </h4>
                                    <a href="{{ route('edukasi.publik.detail', $item->id) }}" class="sigemoy-edu-link">
                                        Baca Selengkapnya <i class="fa fa-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            @endif

        </main>

        {{-- Footer --}}
        <footer class="footer-area">
            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 text-center">
                            <p class="copyright">&copy; {{ date('Y') }} SI-GEMOY &mdash; Poltekkes Kemenkes Yogyakarta. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <div id="scroll-to-top" class="scroll-to-top"><span class="fa fa-angle-up"></span></div>
    </div>

    <script src="{{ asset('frontend/assets/js/jquery-3.6.0-main.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        // Scroll to top
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 300) {
                $('#scroll-to-top').addClass('show');
            } else {
                $('#scroll-to-top').removeClass('show');
            }
        });
        $('#scroll-to-top').on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({scrollTop: 0}, 300);
        });
    </script>
</body>

</html>
