<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{ route('dashboard') }}" class="ai-icon">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            @php
                $userRole = auth()->user()->role_display();
                $isAdmin = $userRole == 'Admin';
                $isDokterOrKader = in_array($userRole, ['Dokter', 'KaderKesehatan']);
            @endphp

            @if ($isAdmin)
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void(0)">
                        <i class="flaticon-381-user"></i>
                        <span class="nav-text">Petugas</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('dokter') }}">Terapis Gigi</a></li>
                        <li><a href="{{ route('petugas') }}">Kader Kesehatan</a></li>
                    </ul>
                </li>
            @endif

            @if ($isAdmin || $isDokterOrKader)
                <li>
                    <a href="{{ route('pasien.add') }}" class="ai-icon">
                        <i class="flaticon-381-television"></i>
                        <span class="nav-text">Pasien</span>
                    </a>
                </li>
            @endif

            <li>
                <a href="{{ route('toga.index') }}" class="ai-icon">
                    <i class="flaticon-381-notebook"></i>
                    <span class="nav-text">Toga</span>
                </a>
            </li>

            @if ($isAdmin)
                <li>
                    <a href="{{ route('edukasi.index') }}" class="ai-icon">
                        <i class="flaticon-381-notebook"></i>
                        <span class="nav-text">Edukasi</span>
                    </a>
                </li>
            @endif

            @if ($isAdmin)
                <li>
                    <a href="{{ route('pasien') }}" class="ai-icon">
                        <i class="flaticon-381-notebook"></i>
                        <span class="nav-text">Data Pasien</span>
                    </a>
                </li>

                <!--<li>-->
                <!--    <a href="{{ route('rekam', ['tab' => 2]) }}" class="ai-icon">-->
                <!--        <i class="flaticon-381-notepad"></i>-->
                <!--        <span class="nav-text">Rekam Medis Terapis</span>-->
                <!--    </a>-->
                <!--</li>-->

                <!--<li>-->
                <!--    <a href="{{ route('rekammediskaderkesehatan.index') }}" class="ai-icon">-->
                <!--        <i class="flaticon-381-notepad"></i>-->
                <!--        <span class="nav-text">Rekam Medis Kader</span>-->
                <!--    </a>-->
                <!--</li>-->
            @endif

            @if ($isAdmin)
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void(0)">
                        <i class="flaticon-381-notebook-4"></i>
                        <span class="nav-text">Master Data</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('tindakan.index') }}">Pilihan Edukasi</a></li>
                        <li><a href="{{ route('icd.index') }}">Diagnosa/Icd</a></li>
                        <li><a href="{{ route('kuisioner.index') }}">Kuisioner</a></li>
                        <li><a href="{{ route('rekammediskader.index') }}">Kondisi Gigi</a></li>
                    </ul>
                </li>
            @endif
        </ul>


        <div class="copyright">
            <p><strong>SIGEMOY</strong> © 2024 POLTEKKES KEMENKES YOGYAKARTA</p>
        </div>
    </div>
</div>
