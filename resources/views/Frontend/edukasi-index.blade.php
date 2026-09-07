<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Edukasi Kesehatan Gigi | SIGEMOY</title>

    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/favicon.ico') }}" type="image/x-icon" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Exo:wght@300;400;500;600;700;800&family=Roboto:wght@300&family=Shippori+Mincho:wght@500;600;700;800&display=swap"
        rel="stylesheet">

    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/css/aos.min.css') }}" rel="stylesheet" />
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

            {{-- Page Header --}}
            <div class="sigemoy-page-header">
                <div class="container">
                    <h1>Edukasi Kesehatan Gigi</h1>
                    <p>Temukan informasi penting tentang kesehatan gigi dan mulut</p>
                </div>
            </div>

            {{-- Breadcrumb --}}
            <div class="sigemoy-breadcrumb">
                <div class="container">
                    <ul class="sigemoy-breadcrumb-list">
                        <li><a href="{{ route('sigemoy') }}"><i class="fa fa-home"></i> Beranda</a></li>
                        <li class="active">Edukasi</li>
                    </ul>
                </div>
            </div>

            {{-- Search --}}
            <div class="container" style="padding-top: 40px;">
                <form action="{{ route('edukasi.publik') }}" method="GET" class="sigemoy-search-form">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Cari edukasi..." value="{{ $search ?? '' }}" aria-label="Cari edukasi">
                        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>

                @if(isset($search) && $search)
                <div class="text-center mb-4">
                    <p class="text-muted">Hasil pencarian untuk: <strong>"{{ $search }}"</strong></p>
                    <a href="{{ route('edukasi.publik') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fa fa-times"></i> Hapus Pencarian
                    </a>
                </div>
                @endif
            </div>

            {{-- Edukasi Grid --}}
            <div class="container" style="padding-bottom: 60px;">
                @if($edukasi->count() > 0)
                <div class="row">
                    @foreach($edukasi as $item)
                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="sigemoy-edu-card">
                            <div class="sigemoy-edu-media">
                                @if($item->media_type === 'foto' && $item->media_path)
                                    <img src="{{ asset('storage/' . $item->media_path) }}" alt="{{ $item->judul }}" loading="lazy">
                                @elseif($item->media_type === 'video_url' && $item->video_url)
                                    @php $ytId = $item->getYouTubeId($item->video_url); @endphp
                                    @if($ytId)
                                        <img src="https://img.youtube.com/vi/{{ $ytId }}/mqdefault.jpg" alt="{{ $item->judul }}" loading="lazy">
                                        <div class="sigemoy-edu-play"><i class="fa fa-play"></i></div>
                                    @else
                                        <div class="sigemoy-edu-placeholder"><i class="fa fa-video-camera"></i></div>
                                    @endif
                                @elseif($item->media_type === 'video_upload' && $item->media_path)
                                    <div class="sigemoy-edu-placeholder"><i class="fa fa-film"></i></div>
                                @else
                                    <div class="sigemoy-edu-placeholder"><i class="fa fa-book"></i></div>
                                @endif
                                <span class="sigemoy-edu-badge">
                                    @if($item->media_type === 'foto') <i class="fa fa-image"></i> Foto
                                    @elseif($item->media_type === 'video_url') <i class="fa fa-youtube-play"></i> Video
                                    @else <i class="fa fa-film"></i> Video
                                    @endif
                                </span>
                            </div>
                            <div class="sigemoy-edu-content">
                                <div class="sigemoy-edu-date">
                                    <i class="fa fa-calendar"></i> {{ $item->created_at->format('d M Y') }}
                                </div>
                                <h4 class="sigemoy-edu-title">
                                    <a href="{{ route('edukasi.publik.detail', $item->id) }}">{{ $item->judul }}</a>
                                </h4>
                                <p class="sigemoy-edu-desc">{{ Str::limit(strip_tags($item->deskripsi), 120) }}</p>
                                <a href="{{ route('edukasi.publik.detail', $item->id) }}" class="sigemoy-edu-link">
                                    Baca Selengkapnya <i class="fa fa-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="sigemoy-pagination">
                    {{ $edukasi->appends(['search' => $search ?? ''])->links('pagination::bootstrap-5') }}
                </div>
                @else
                <div class="text-center" style="padding: 60px 0;">
                    <div class="sigemoy-empty-state">
                        <i class="fa fa-graduation-cap sigemoy-empty-icon"></i>
                        @if(isset($search) && $search)
                            <p>Tidak ditemukan edukasi dengan kata kunci "<strong>{{ $search }}</strong>".</p>
                        @else
                            <p>Konten edukasi akan segera tersedia.</p>
                        @endif
                    </div>
                </div>
                @endif
            </div>

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

    <script src="{{ asset('frontend/assets/js/modernizr-3.5.0.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery-3.6.0-main.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/aos.min.js') }}"></script>
    <script>
        AOS.init({ once: true, duration: 1200 });

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
