<section class="team-area team-default-area" id="tim-dokter">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h5 class="sub-title">TIM KAMI</h5>
                    <h2 class="title">Dokter <span>Gigi</span> Profesional</h2>
                    <div class="desc"><p>Tim dokter gigi berpengalaman dan bersertifikasi yang siap membantu Anda</p></div>
                </div>
            </div>
        </div>
        @if(isset($dokter) && $dokter->count() > 0)
        <div class="row justify-content-center">
            @foreach($dokter as $dr)
            <div class="col-sm-6 col-lg-4 col-xl-3 mb-4">
                <div class="sigemoy-doctor-card">
                    <div class="sigemoy-doctor-avatar">
                        <span>{{ strtoupper(substr($dr->nama, 0, 1)) }}</span>
                    </div>
                    <div class="sigemoy-doctor-info">
                        <h5 class="sigemoy-doctor-name">{{ $dr->nama }}</h5>
                        @if($dr->nip)
                        <p class="sigemoy-doctor-nip">NIP: {{ $dr->nip }}</p>
                        @endif
                        <span class="sigemoy-doctor-role">Dokter Gigi</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="row">
            <div class="col-12 text-center">
                <div class="sigemoy-empty-state">
                    <i class="fa fa-user-md sigemoy-empty-icon"></i>
                    <p>Informasi tim dokter akan segera tersedia.</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
