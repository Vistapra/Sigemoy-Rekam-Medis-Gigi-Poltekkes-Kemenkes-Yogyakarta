<section class="toga-area" id="toga">
    <div class="container" data-aos="fade-up">
        <div class="section-title text-center">
            <h5 class="sub-title">TOGA</h5>
            <h2 class="title">Tanaman <span>Obat</span> Keluarga</h2>
            <div class="desc"><p>Kenali tanaman obat keluarga yang bermanfaat untuk kesehatan</p></div>
        </div>
        @if(isset($toga) && $toga->count() > 0)
        <div class="row">
            @foreach($toga as $item)
            <div class="col-sm-6 col-lg-4 mb-4">
                <div class="sigemoy-toga-card">
                    @if($item->foto)
                    <div class="sigemoy-toga-img">
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" loading="lazy">
                    </div>
                    @endif
                    <div class="sigemoy-toga-content">
                        <h4 class="sigemoy-toga-title">{{ $item->judul }}</h4>
                        <p class="sigemoy-toga-desc">{{ Str::limit(strip_tags($item->deskripsi), 120) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="row">
            <div class="col-12 text-center">
                <div class="sigemoy-empty-state">
                    <i class="fa fa-leaf sigemoy-empty-icon"></i>
                    <p>Informasi TOGA akan segera tersedia.</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
