<section class="blog-area blog-default-area" id="edukasi">
    <div class="container" data-aos="fade-up">
        <div class="section-title text-center">
            <h5 class="sub-title">EDUKASI KESEHATAN</h5>
            <h2 class="title">Informasi <span>Edukasi</span> Gigi</h2>
            <div class="desc"><p>Temukan informasi penting tentang kesehatan gigi dan mulut</p></div>
        </div>
        @if(isset($edukasi) && $edukasi->count() > 0)
        <div class="row">
            @foreach($edukasi as $item)
            <div class="col-sm-6 col-lg-4 mb-4">
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
                        <p class="sigemoy-edu-desc">{{ Str::limit(strip_tags($item->deskripsi), 100) }}</p>
                        <a href="{{ route('edukasi.publik.detail', $item->id) }}" class="sigemoy-edu-link">
                            Baca Selengkapnya <i class="fa fa-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-3">
            <div class="col-12 text-center">
                <a href="{{ route('edukasi.publik') }}" class="btn-theme">Lihat Semua Edukasi</a>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-12 text-center">
                <div class="sigemoy-empty-state">
                    <i class="fa fa-graduation-cap sigemoy-empty-icon"></i>
                    <p>Konten edukasi akan segera tersedia.</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
