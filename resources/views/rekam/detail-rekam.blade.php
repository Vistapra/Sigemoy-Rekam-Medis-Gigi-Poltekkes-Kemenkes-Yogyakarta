@extends('layout.apps')

@section('content')
    @include('rekam.partial.modal-pemeriksaan')
    @include('rekam.partial.modal-tindakan')
    @include('rekam.partial.modal-diagnosa')
    @include('rekam.partial.modal-resep-obat')

    <div class="row">
        <!-- Detail Pasien Section -->
        <div class="col-xl-12">
            <div class="row">
                <div class="col-sm-12 col-lg-5">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="fs-20 text-black mb-0">Detail Pasien</h4>
                            <div class="dropdown">
                                <span class="badge badge-primary">RM# {{ $pasien->id ? str_pad($pasien->id, 6, '0', STR_PAD_LEFT) : 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="media mb-4 align-items-center">
                                <div class="media-body">
                                    <input type="hidden" id="pasien_id" value="{{ $pasien->id }}">
                                    <input type="hidden" id="rekam_id" value="{{ $rekamLatest ? $rekamLatest->id : '' }}">

                                    <h3 class="fs-18 font-w600 mb-1">
                                        <a href="javascript:void(0)" class="text-black">{{ $pasien->nama ?? 'Nama tidak tersedia' }}</a>
                                    </h3>
                                    <h4 class="fs-14 font-w600 mb-1">
                                        {{ ($pasien->tmp_lahir ? $pasien->tmp_lahir . ', ' : '') . ($pasien->tgl_lahir ? \Carbon\Carbon::parse($pasien->tgl_lahir)->format('d-m-Y') : 'Tanggal lahir tidak tersedia') }}
                                    </h4>
                                    @if($pasien->tgl_lahir)
                                        @php
                                            $b_day = \Carbon\Carbon::parse($pasien->tgl_lahir);
                                            $now = \Carbon\Carbon::now();
                                            $usia = $b_day->diffInYears($now);
                                        @endphp
                                        <h4 class="fs-14 font-w600 mb-1">
                                            <i class="fas fa-birthday-cake text-primary mr-1"></i>
                                            Usia: {{ $usia }} tahun
                                        </h4>
                                    @endif
                                    <h4 class="fs-14 font-w600 mb-1">
                                        <i class="fas fa-venus-mars text-info mr-1"></i>
                                        {{ $pasien->jk ? ($pasien->jk === 'LakiLaki' ? 'Laki-Laki' : 'Perempuan') : 'Tidak diketahui' }}
                                        @if($pasien->status_menikah)
                                            , {{ $pasien->status_menikah }}
                                        @endif
                                    </h4>
                                    @if($pasien->alamat_lengkap)
                                        <span class="fs-14">
                                            <i class="fas fa-map-marker-alt text-danger mr-1"></i>
                                            {{ $pasien->alamat_lengkap }}
                                        </span>
                                    @endif
                                    @if($pasien->kelurahan || $pasien->kecamatan || $pasien->kabupaten)
                                        <br>
                                        <span class="fs-14 text-muted">
                                            {{ implode(', ', array_filter([$pasien->kelurahan, $pasien->kecamatan, $pasien->kabupaten])) }}
                                            @if($pasien->kodepos)
                                                ({{ $pasien->kodepos }})
                                            @endif
                                        </span>
                                    @endif
                                    @if($pasien->kewarganegaraan)
                                        <br>
                                        <span class="fs-14">
                                            <i class="fas fa-flag text-success mr-1"></i>
                                            {{ $pasien->kewarganegaraan }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-7">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="fs-20 text-black mb-0">Info Pasien</h4>
                            <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-info btn-xs">
                                <i class="flaticon-381-edit"></i> Edit Pasien
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-xl-12 col-xxl-6 col-sm-6">
                                    <!-- Nomor HP -->
                                    <div class="d-flex mb-3 align-items-center">
                                        <span class="fs-12 col-6 p-0 text-black">
                                            <i class="fas fa-phone text-primary mr-2"></i>
                                            No HP
                                        </span>
                                        <div class="col-6 p-0">
                                            <p class="mb-0">{{ $pasien->no_hp ?? 'Tidak tersedia' }}</p>
                                        </div>
                                    </div>
                                    
                                    <!-- Agama -->
                                    <div class="d-flex mb-3 align-items-center">
                                        <span class="fs-12 col-6 p-0 text-black">
                                            <i class="fas fa-pray text-success mr-2"></i>
                                            Agama
                                        </span>
                                        <div class="col-6 p-0">
                                            <p class="mb-0">{{ $pasien->agama ?? 'Tidak tersedia' }}</p>
                                        </div>
                                    </div>

                                    <!-- Pendidikan -->
                                    <div class="d-flex mb-3 align-items-center">
                                        <span class="fs-12 col-6 p-0 text-black">
                                            <i class="fas fa-graduation-cap text-info mr-2"></i>
                                            Pendidikan
                                        </span>
                                        <div class="col-6 p-0">
                                            <p class="mb-0">{{ $pasien->pendidikan ?? 'Tidak tersedia' }}</p>
                                        </div>
                                    </div>

                                    <!-- Pekerjaan -->
                                    <div class="d-flex mb-3 align-items-center">
                                        <span class="fs-12 col-6 p-0 text-black">
                                            <i class="fas fa-briefcase text-warning mr-2"></i>
                                            Pekerjaan
                                        </span>
                                        <div class="col-6 p-0">
                                            <p class="mb-0">{{ $pasien->pekerjaan ?? 'Tidak tersedia' }}</p>
                                        </div>
                                    </div>

                                    <!-- Alergi -->
                                    <div class="d-flex mb-3 align-items-center">
                                        <span class="fs-12 col-6 p-0 text-black">
                                            <i class="fas fa-exclamation-triangle text-danger mr-2"></i>
                                            Alergi
                                        </span>
                                        <div class="col-6 p-0">
                                            <p class="mb-0">
                                                @if($pasien->alergi)
                                                    <span class="badge badge-danger">{{ $pasien->alergi }}</span>
                                                @else
                                                    <span class="text-muted">Tidak ada alergi</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>

                                    <!-- File General -->
                                    <div class="d-flex align-items-center">
                                        <span class="fs-12 col-6 p-0 text-black">
                                            <i class="fas fa-file-medical text-secondary mr-2"></i>
                                            File General
                                        </span>
                                        <div class="col-6 p-0">
                                            @if($pasien->general_uncent != null)
                                                <a href="{{ $pasien->getGeneralUncent() }}" target="_blank" class="btn btn-info btn-xs">
                                                    <i class="fas fa-eye"></i> Lihat Data
                                                </a>
                                            @else
                                                <span class="text-muted">Belum Tersedia</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik Rekam Medis -->
        <div class="col-xl-12 mt-2">
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-right">
                                    <h2 class="num-text text-black font-w600">{{ $rekam->total() }}</h2>
                                    <span class="fs-14">Total Kunjungan</span>
                                </div>
                                <div class="d-inline-block ml-2">
                                    <div class="social-icon2 bg-primary">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-right">
                                    <h2 class="num-text text-black font-w600">{{ $riwayattindakan->count() }}</h2>
                                    <span class="fs-14">Tindakan Gigi</span>
                                </div>
                                <div class="d-inline-block ml-2">
                                    <div class="social-icon2 bg-success">
                                        <i class="fas fa-tooth"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-right">
                                    <h2 class="num-text text-black font-w600">{{ $pasien->rekamMedisKader->count() }}</h2>
                                    <span class="fs-14">Rekam Kader</span>
                                </div>
                                <div class="d-inline-block ml-2">
                                    <div class="social-icon2 bg-warning">
                                        <i class="fas fa-user-nurse"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-right">
                                    <h2 class="num-text text-black font-w600">{{ $pasien->jawabanPasien->count() }}</h2>
                                    <span class="fs-14">Survey Jawaban</span>
                                </div>
                                <div class="d-inline-block ml-2">
                                    <div class="social-icon2 bg-info">
                                        <i class="fas fa-poll"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Odontogram Section untuk Admin/Dokter -->
        @if (auth()->user()->role_display() == 'Admin' || auth()->user()->role_display() == 'Dokter')
            <div class="col-xl-12 mt-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-tooth text-primary mr-2"></i>
                            Odontogram {{ $pasien->nama }}
                        </h5>
                        <div class="card-header-right">
                            <a href="{{ route('rekam.gigi.edit', $pasien->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> Edit Odontogram
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-9">
                                <div class="mb-3">
                                    <button id="zoomIn" class="btn btn-sm btn-light">
                                        <i class="fas fa-search-plus"></i>
                                    </button>
                                    <button id="zoomOut" class="btn btn-sm btn-light">
                                        <i class="fas fa-search-minus"></i>
                                    </button>
                                    <button id="resetZoom" class="btn btn-sm btn-light">
                                        <i class="fas fa-sync-alt"></i>
                                    </button>
                                </div>
                                <div id="odontograma" class="odontogram-container"
                                    data-odontogram="{{ json_encode($odontogram_data) }}"></div>
                            </div>
                            <div class="col-xl-3">
                                <div class="card shadow-sm">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">Panduan Odontogram</h6>
                                    </div>
                                    <div class="card-body">
                                        <div id="odontogram-guide" class="guide-list"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Riwayat Pemeriksaan Gigi -->
            <div class="col-xl-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="fas fa-history text-info mr-2"></i>
                            Riwayat Pemeriksaan Gigi
                        </h4>
                        <div class="card-header-right">
                            <span class="badge badge-info">{{ $riwayattindakan->count() }} Record</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-riwayat" class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Dokter/Petugas</th>
                                        <th>Elemen Gigi</th>
                                        <th>Kondisi Gigi</th>
                                        <th>Diagnosa</th>
                                        <th>Tindakan</th>
                                        <th>Catatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($riwayattindakan as $index => $riwayat)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <span class="badge badge-primary">
                                                    {{ $riwayat->created_at ? $riwayat->created_at->format('d/m/Y') : now()->format('d/m/Y') }}
                                                </span>
                                            </td>
                                            <td>
                                                <small>{{ $riwayat->user->name ?? 'Tidak diketahui' }}</small>
                                            </td>
                                            <td>
                                                <span class="badge badge-secondary">{{ $riwayat->elemen_gigi ?? 'N/A' }}</span>
                                            </td>
                                            <td>
                                                <div class="kondisi-gigi">
                                                    {!! $riwayat->pemeriksaan ? strip_tags($riwayat->pemeriksaan) : '<span class="text-muted">Tidak ada data</span>' !!}
                                                </div>
                                            </td>
                                            <td>
                                                @if($riwayat->diagnosis)
                                                    <div class="diagnosis-info">
                                                        <span class="badge badge-warning">{{ $riwayat->diagnosis->code }}</span>
                                                        <br>
                                                        <small>{{ $riwayat->diagnosis->name_id }}</small>
                                                    </div>
                                                @else
                                                    <span class="text-muted">Tidak ada data</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($riwayat->tindak)
                                                    <div class="tindakan-info">
                                                        <span class="badge badge-success">{{ $riwayat->tindak->kode }}</span>
                                                        <br>
                                                        <small>{{ $riwayat->tindak->nama }}</small>
                                                    </div>
                                                @else
                                                    <span class="text-muted">Tidak ada data</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($riwayat->catatan_diagnosa || $riwayat->catatan_tindakan || $riwayat->catatan_perencanaan || $riwayat->catatan_evaluasi)
                                                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#catatanModal{{ $riwayat->id }}">
                                                        <i class="fas fa-eye"></i> Lihat
                                                    </button>
                                                    
                                                    <!-- Modal untuk Catatan -->
                                                    <div class="modal fade" id="catatanModal{{ $riwayat->id }}" tabindex="-1" role="dialog">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Catatan Gigi {{ $riwayat->elemen_gigi }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal">
                                                                        <span>&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @if($riwayat->catatan_diagnosa)
                                                                        <div class="mb-3">
                                                                            <h6><i class="fas fa-stethoscope text-primary"></i> Catatan Diagnosa:</h6>
                                                                            <p class="border p-2 bg-light">{{ $riwayat->catatan_diagnosa }}</p>
                                                                        </div>
                                                                    @endif
                                                                    @if($riwayat->catatan_perencanaan)
                                                                        <div class="mb-3">
                                                                            <h6><i class="fas fa-clipboard-list text-info"></i> Catatan Perencanaan:</h6>
                                                                            <p class="border p-2 bg-light">{{ $riwayat->catatan_perencanaan }}</p>
                                                                        </div>
                                                                    @endif
                                                                    @if($riwayat->catatan_tindakan)
                                                                        <div class="mb-3">
                                                                            <h6><i class="fas fa-tools text-success"></i> Catatan Tindakan:</h6>
                                                                            <p class="border p-2 bg-light">{{ $riwayat->catatan_tindakan }}</p>
                                                                        </div>
                                                                    @endif
                                                                    @if($riwayat->catatan_evaluasi)
                                                                        <div class="mb-3">
                                                                            <h6><i class="fas fa-chart-line text-warning"></i> Catatan Evaluasi:</h6>
                                                                            <p class="border p-2 bg-light">{{ $riwayat->catatan_evaluasi }}</p>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <span class="text-muted">Tidak ada catatan</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">
                                                <div class="py-3">
                                                    <i class="fas fa-tooth fa-3x text-muted mb-3"></i>
                                                    <p class="text-muted">Tidak ada data riwayat gigi.</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Rekam Medis Kader Section untuk Admin/Kader -->
        @if (auth()->user()->role_display() == 'Admin' || auth()->user()->role_display() == 'KaderKesehatan')
            <div class="col-xl-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="fas fa-user-nurse text-warning mr-2"></i>
                            Rekam Medis Kader Kesehatan
                        </h4>
                        <div class="card-header-right">
                            <a href="{{ route('rekammediskaderkesehatan.create', $pasien->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-plus"></i> Tambah Rekam Kader
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Kader Kesehatan</th>
                                        <th>Kondisi Gigi</th>
                                        <th>Total</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pasien->rekamMedisKader as $index => $rekamMedisKader)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <span class="badge badge-info">
                                                    {{ $rekamMedisKader->created_at->format('d/m/Y H:i') }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-xs mr-2">
                                                        <div class="avatar-title rounded-circle bg-warning text-white">
                                                            {{ substr($rekamMedisKader->user->name, 0, 1) }}
                                                        </div>
                                                    </div>
                                                    {{ $rekamMedisKader->user->name }}
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge badge-primary">
                                                    {{ $rekamMedisKader->namaKondisiGigi->nama_kondisi }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="font-weight-bold text-success">{{ $rekamMedisKader->total }}</span>
                                            </td>
                                            <td>
                                                @if($rekamMedisKader->keterangan)
                                                    <span class="text-truncate" style="max-width: 200px;" title="{{ $rekamMedisKader->keterangan }}">
                                                        {{ $rekamMedisKader->keterangan }}
                                                    </span>
                                                @else
                                                    <span class="text-muted">Tidak ada keterangan</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('rekammediskaderkesehatan.edit', $rekamMedisKader->id) }}" 
                                                       class="btn btn-primary btn-sm" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('rekammediskaderkesehatan.destroy', $rekamMedisKader->id) }}" 
                                                          method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus rekam medis ini?')" 
                                                                title="Hapus">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                <div class="py-3">
                                                    <i class="fas fa-user-nurse fa-3x text-muted mb-3"></i>
                                                    <p class="text-muted">Tidak ada data rekam medis kader</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Rekam Medis Umum Section untuk Admin/Dokter -->
        @if (auth()->user()->role_display() == 'Admin' || auth()->user()->role_display() == 'Dokter')
        <div class="col-sm-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="fas fa-clipboard-list text-success mr-2"></i>
                        Rekam Medis Umum (SOAP)
                    </h4>
                    <div class="card-header-right">
                        <a href="{{ route('rekam.tambah', $pasien->id) }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> Tambah Rekam Baru
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive card-table">
                        <table class="table table-responsive-md table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Tgl Periksa</th>
                                    <th>Dokter/Petugas</th>
                                    <th>Keluhan (S)</th>
                                    <th>Pemeriksaan (O)</th>
                                    <th>Diagnosa (A)</th>
                                    <th>Tindakan (P)</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rekam as $key => $row)
                                    <tr>
                                        <td>{{ $rekam->firstItem() + $key }}</td>
                                        <td>
                                            <span class="badge badge-info">{{ $row->tgl_rekam }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-xs mr-2">
                                                    <div class="avatar-title rounded-circle bg-primary text-white">
                                                        {{ substr($row->user->name ?? Auth::user()->name, 0, 1) }}
                                                    </div>
                                                </div>
                                                <small>{{ $row->user->name ?? Auth::user()->name }}</small>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="keluhan-content">
                                                {{ $row->keluhan }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="pemeriksaan-content">
                                                {!! $row->pemeriksaan !!}
                                                @if ($row->pemeriksaan_file != null)
                                                    <br>
                                                    <a target="_blank" href="{{ $row->getFilePemeriksaan() }}" class="btn btn-outline-primary btn-xs mt-1">
                                                        <i class="fas fa-image"></i> Lihat Foto
                                                    </a>
                                                @endif
                                                @if (auth()->user()->role_display() == 'Dokter' ||
                                                        auth()->user()->role_display() == 'Admin' ||
                                                        auth()->user()->role_display() == 'KaderKesehatan')
                                                    <br>
                                                    <a href="javascript:void(0)" data-toggle="modal"
                                                        data-target="#addPemeriksaan" data-id="{{ $row->id }}"
                                                        data-tanggal="{{ $row->tgl_rekam }}"
                                                        data-pemeriksaan="{{ $row->pemeriksaan }}"
                                                        class="btn btn-info btn-xs addPemeriksaan mt-2">
                                                        <i class="flaticon-381-pencil"></i> Edit Object
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="diagnosa-content">
                                                @if($row->diagnosa()->count() > 0)
                                                    <table class="table table-sm table-borderless">
                                                        @foreach ($row->diagnosa() as $item)
                                                            <tr>
                                                                <td class="p-1">
                                                                    <span class="badge badge-warning">{{ $item->diagnosis->code }}</span>
                                                                </td>
                                                                <td class="p-1">
                                                                    <a href="{{ route('rekam.diagnosa.delete', $item->id) }}"
                                                                        class="btn btn-danger btn-xs"
                                                                        onclick="return confirm('Hapus diagnosa ini?')">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" class="p-1">
                                                                    <small>{{ $item->diagnosis->name_id }}</small>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                @else
                                                    <span class="text-muted">Belum ada diagnosa</span>
                                                @endif
                                                @if (auth()->user()->role_display() == 'Dokter' ||
                                                        auth()->user()->role_display() == 'Admin' ||
                                                        auth()->user()->role_display() == 'KaderKesehatan')
                                                    <a href="javascript:void(0)" data-toggle="modal"
                                                        data-target="#addDiagnosa" data-id="{{ $row->id }}"
                                                        data-tanggal="{{ $row->tgl_rekam }}"
                                                        data-tindakan="{{ $row->tindakan }}"
                                                        class="btn btn-primary btn-xs addDiagnosa mt-2">
                                                        <i class="flaticon-381-pencil"></i> Edit Assessment
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="tindakan-content">
                                                {!! $row->tindakan !!}
                                                @if ($row->tindakan_file != null)
                                                    <br>
                                                    <a target="_blank" href="{{ $row->getFileTindakan() }}" class="btn btn-outline-success btn-xs mt-1">
                                                        <i class="fas fa-image"></i> Lihat Foto
                                                    </a>
                                                @endif
                                                @if (auth()->user()->role_display() == 'Dokter' ||
                                                        auth()->user()->role_display() == 'Admin' ||
                                                        auth()->user()->role_display() == 'KaderKesehatan')
                                                    <br>
                                                    <a href="javascript:void(0)" data-toggle="modal"
                                                        data-target="#addTindakan" data-id="{{ $row->id }}"
                                                        data-tanggal="{{ $row->tgl_rekam }}"
                                                        data-tindakan="{{ $row->tindakan }}"
                                                        class="btn btn-success btn-xs addTindakan mt-2">
                                                        <i class="flaticon-381-pencil"></i> Edit Plan
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group-vertical" role="group">
                                                <a href="{{ route('rekam.edit', $row->id) }}" class="btn btn-warning btn-xs mb-1">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('rekam.delete', $row->id) }}" 
                                                   class="btn btn-danger btn-xs"
                                                   onclick="return confirm('Hapus rekam medis ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            <div class="py-3">
                                                <i class="fas fa-clipboard-list fa-3x text-muted mb-3"></i>
                                                <p class="text-muted">Tidak ada data rekam medis umum.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        @if($rekam->hasPages())
                            <div class="dataTables_info d-flex justify-content-between align-items-center mt-3">
                                <div>
                                    Showing {{ $rekam->firstItem() }} to {{ $rekam->lastItem() }} of
                                    {{ $rekam->total() }} entries
                                </div>
                                <div>
                                    {{ $rekam->appends(request()->except('page'))->links() }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Data Survey Pasien -->
        <div class="col-xl-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="fas fa-poll text-info mr-2"></i>
                        Data Survey Pasien
                    </h4>
                    <div class="card-header-right">
                        @if($pasien->jawabanPasien->isNotEmpty())
                            <span class="badge badge-success">{{ $pasien->jawabanPasien->count() }} Jawaban</span>
                            <a href="{{ route('kuisioner.jawabKuisioner', $pasien->id) }}" class="btn btn-warning btn-sm ml-2">
                                <i class="fas fa-edit"></i> Edit Survey
                            </a>
                        @else
                            <a href="{{ route('kuisioner.jawabKuisioner', $pasien->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-plus"></i> Isi Survey
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    @if ($pasien->jawabanPasien->isNotEmpty())
                        @php
                            // Group jawaban berdasarkan kategori dan pertanyaan
                            $groupedAnswers = $pasien->jawabanPasien->groupBy(function($item) {
                                return $item->pertanyaan->kategori->nama_kategori;
                            })->map(function($kategoriAnswers) {
                                return $kategoriAnswers->groupBy('pertanyaan_id');
                            });
                        @endphp
                        
                        @foreach ($groupedAnswers as $namaKategori => $pertanyaanGroup)
                            <div class="kategori-section mb-4">
                                <h5 class="mt-4 mb-3">
                                    <i class="fas fa-folder text-primary mr-2"></i>
                                    {{ $namaKategori }}
                                    <span class="badge badge-primary ml-2">{{ $pertanyaanGroup->count() }} Pertanyaan</span>
                                </h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="35%">Pertanyaan</th>
                                                <th width="10%">Jenis</th>
                                                <th width="30%">Jawaban</th>
                                                <th width="20%">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pertanyaanGroup as $pertanyaanId => $jawabans)
                                                @php
                                                    $firstAnswer = $jawabans->first();
                                                    $pertanyaan = $firstAnswer->pertanyaan;
                                                @endphp
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <div class="question-text">
                                                            {{ $pertanyaan->teks_pertanyaan }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if($pertanyaan->jenis_jawaban == 'single_choice')
                                                            <span class="badge badge-primary">
                                                                <i class="fas fa-dot-circle mr-1"></i>
                                                                Pilih Satu
                                                            </span>
                                                        @else
                                                            <span class="badge badge-success">
                                                                <i class="fas fa-check-square mr-1"></i>
                                                                Pilih Banyak
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="answer-container">
                                                            @if($pertanyaan->jenis_jawaban == 'single_choice')
                                                                <!-- Single Choice Answer -->
                                                                @if($firstAnswer->opsiJawaban)
                                                                    <span class="badge badge-success answer-badge">
                                                                        <i class="fas fa-check mr-1"></i>
                                                                        {{ $firstAnswer->opsiJawaban->teks_opsi }}
                                                                    </span>
                                                                @else
                                                                    <span class="badge badge-secondary">
                                                                        <i class="fas fa-times mr-1"></i>
                                                                        Tidak dijawab
                                                                    </span>
                                                                @endif
                                                            @else
                                                                <!-- Multiple Choice Answers -->
                                                                <div class="multiple-answers">
                                                                    @forelse($jawabans->where('opsi_jawaban_id', '!=', null) as $jawaban)
                                                                        <span class="badge badge-success answer-badge mb-1">
                                                                            <i class="fas fa-check mr-1"></i>
                                                                            {{ $jawaban->opsiJawaban->teks_opsi }}
                                                                        </span>
                                                                        @if(!$loop->last)<br>@endif
                                                                    @empty
                                                                        <span class="badge badge-secondary">
                                                                            <i class="fas fa-times mr-1"></i>
                                                                            Tidak dijawab
                                                                        </span>
                                                                    @endforelse
                                                                </div>
                                                                
                                                                @if($jawabans->where('opsi_jawaban_id', '!=', null)->count() > 1)
                                                                    <div class="mt-2">
                                                                        <small class="text-info">
                                                                            <i class="fas fa-info-circle mr-1"></i>
                                                                            {{ $jawabans->where('opsi_jawaban_id', '!=', null)->count() }} pilihan dipilih
                                                                        </small>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @php
                                                            // Ambil keterangan dari jawaban pertama yang memiliki keterangan
                                                            $keterangan = $jawabans->whereNotNull('keterangan')->first()->keterangan ?? null;
                                                        @endphp
                                                        
                                                        @if($keterangan)
                                                            <div class="keterangan-content">
                                                                <div class="keterangan-text">
                                                                    {{ Str::limit($keterangan, 50) }}
                                                                </div>
                                                                @if(strlen($keterangan) > 50)
                                                                    <button type="button" class="btn btn-link btn-sm p-0 mt-1" 
                                                                            data-toggle="modal" 
                                                                            data-target="#keteranganModal{{ $pertanyaanId }}">
                                                                        <small>Lihat selengkapnya...</small>
                                                                    </button>
                                                                    
                                                                    <!-- Modal untuk Keterangan Lengkap -->
                                                                    <div class="modal fade" id="keteranganModal{{ $pertanyaanId }}" tabindex="-1" role="dialog">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">
                                                                                        <i class="fas fa-comment-alt mr-2"></i>
                                                                                        Keterangan Lengkap
                                                                                    </h5>
                                                                                    <button type="button" class="close" data-dismiss="modal">
                                                                                        <span>&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <h6 class="mb-3">Pertanyaan:</h6>
                                                                                    <p class="border-left border-primary pl-3 mb-3">
                                                                                        {{ $pertanyaan->teks_pertanyaan }}
                                                                                    </p>
                                                                                    <h6 class="mb-3">Keterangan:</h6>
                                                                                    <div class="bg-light p-3 rounded">
                                                                                        {{ $keterangan }}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @else
                                                            <span class="text-muted">
                                                                <i class="fas fa-minus mr-1"></i>
                                                                Tidak ada keterangan
                                                            </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                        
                        <!-- Summary Statistics -->
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <div class="card bg-primary text-white">
                                    <div class="card-body text-center">
                                        <i class="fas fa-poll fa-2x mb-2"></i>
                                        <h4>{{ $groupedAnswers->sum(function($group) { return $group->count(); }) }}</h4>
                                        <small>Total Pertanyaan Dijawab</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-success text-white">
                                    <div class="card-body text-center">
                                        <i class="fas fa-check-square fa-2x mb-2"></i>
                                        <h4>{{ $pasien->jawabanPasien->where('pertanyaan.jenis_jawaban', 'multiple_choice')->count() }}</h4>
                                        <small>Multiple Choice</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-info text-white">
                                    <div class="card-body text-center">
                                        <i class="fas fa-dot-circle fa-2x mb-2"></i>
                                        <h4>{{ $pasien->jawabanPasien->where('pertanyaan.jenis_jawaban', 'single_choice')->count() }}</h4>
                                        <small>Single Choice</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-warning text-white">
                                    <div class="card-body text-center">
                                        <i class="fas fa-comment fa-2x mb-2"></i>
                                        <h4>{{ $pasien->jawabanPasien->whereNotNull('keterangan')->count() }}</h4>
                                        <small>Dengan Keterangan</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-poll fa-5x text-muted mb-3"></i>
                            <h5 class="text-muted">Tidak ada data survey pasien</h5>
                            <p class="text-muted">Pasien belum mengisi kuisioner survey.</p>
                            <a href="{{ route('kuisioner.jawabKuisioner', $pasien->id) }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Isi Survey Sekarang
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Timeline Aktivitas Pasien -->
        <div class="col-xl-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="fas fa-timeline text-warning mr-2"></i>
                        Timeline Aktivitas Pasien
                    </h4>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        @php
                            $allActivities = collect();
                            
                            // Tambah rekam medis umum
                            foreach($rekam as $r) {
                                $allActivities->push([
                                    'type' => 'rekam',
                                    'date' => \Carbon\Carbon::parse($r->tgl_rekam),
                                    'title' => 'Rekam Medis Umum',
                                    'description' => $r->keluhan,
                                    'icon' => 'fas fa-clipboard-list',
                                    'color' => 'primary'
                                ]);
                            }
                            
                            // Tambah rekam gigi
                            foreach($riwayattindakan as $rg) {
                                $allActivities->push([
                                    'type' => 'gigi',
                                    'date' => $rg->created_at,
                                    'title' => 'Pemeriksaan Gigi ' . $rg->elemen_gigi,
                                    'description' => strip_tags($rg->pemeriksaan ?? 'Pemeriksaan gigi'),
                                    'icon' => 'fas fa-tooth',
                                    'color' => 'success'
                                ]);
                            }
                            
                            // Tambah rekam kader
                            foreach($pasien->rekamMedisKader as $rk) {
                                $allActivities->push([
                                    'type' => 'kader',
                                    'date' => $rk->created_at,
                                    'title' => 'Rekam Kader: ' . $rk->namaKondisiGigi->nama_kondisi,
                                    'description' => 'Total: ' . $rk->total . ' - ' . ($rk->keterangan ?? 'Tidak ada keterangan'),
                                    'icon' => 'fas fa-user-nurse',
                                    'color' => 'warning'
                                ]);
                            }
                            
                            // Urutkan berdasarkan tanggal terbaru
                            $allActivities = $allActivities->sortByDesc('date')->take(10);
                        @endphp
                        
                        @forelse($allActivities as $activity)
                            <div class="timeline-item">
                                <div class="timeline-marker">
                                    <div class="timeline-marker-icon bg-{{ $activity['color'] }}">
                                        <i class="{{ $activity['icon'] }}"></i>
                                    </div>
                                </div>
                                <div class="timeline-content">
                                    <h6 class="timeline-title">{{ $activity['title'] }}</h6>
                                    <p class="timeline-description">{{ $activity['description'] }}</p>
                                    <span class="timeline-date">
                                        <i class="fas fa-calendar"></i>
                                        {{ $activity['date']->format('d M Y, H:i') }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-3">
                                <i class="fas fa-clock fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Tidak ada aktivitas untuk ditampilkan.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('header')
    <link rel="stylesheet" href="{{ asset('odontograma/css/jquery.svg.css') }}">
    <link rel="stylesheet" href="{{ asset('odontograma/css/odontograma.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <style>
        .odontogram-container {
            position: relative;
            width: 100%;
            height: 400px;
            overflow: hidden;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        #odontograma svg {
            transition: transform 0.3s ease;
        }

        .btn-light {
            margin-right: 5px;
        }

        .btn-light i {
            font-size: 1.2em;
        }

        .odontogram-guide-item {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .odontogram-guide-color {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            border: 1px solid #ddd;
        }

        .guide-list .guide-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .guide-list .guide-item:hover {
            background-color: #f8f9fa;
        }

        .guide-list .guide-color {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
        }

        .guide-list .guide-text {
            font-size: 14px;
        }

        .avatar-xs {
            width: 30px;
            height: 30px;
        }

        .avatar-title {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 600;
        }

        .timeline {
            position: relative;
            padding-left: 30px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 15px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #e9ecef;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 30px;
        }

        .timeline-marker {
            position: absolute;
            left: -23px;
            top: 0;
        }

        .timeline-marker-icon {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 8px;
        }

        .timeline-content {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            border-left: 3px solid #007bff;
        }

        .timeline-title {
            margin-bottom: 5px;
            font-weight: 600;
        }

        .timeline-description {
            color: #6c757d;
            margin-bottom: 10px;
        }

        .timeline-date {
            font-size: 12px;
            color: #adb5bd;
        }

        .social-icon2 {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            color: white;
            font-size: 20px;
        }

        .num-text {
            font-size: 28px;
            margin-bottom: 5px;
        }

        .keluhan-content, .pemeriksaan-content, .diagnosa-content, .tindakan-content {
            max-width: 250px;
            word-wrap: break-word;
        }

        .keterangan-content {
            max-height: 60px;
            overflow-y: auto;
            word-wrap: break-word;
        }

        .kondisi-gigi, .diagnosis-info, .tindakan-info {
            font-size: 12px;
        }

        .kategori-section {
            border-left: 4px solid #007bff;
            padding-left: 15px;
            margin-bottom: 30px;
        }

        .btn-group-vertical .btn {
            margin-bottom: 2px;
        }

        .card-header-right {
            margin-left: auto;
        }

        .table-borderless td {
            border: none !important;
        }
        .question-text {
            font-weight: 500;
            line-height: 1.4;
        }

        .answer-container {
            min-height: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .answer-badge {
            font-size: 12px;
            padding: 4px 8px;
            margin-right: 5px;
            margin-bottom: 3px;
            display: inline-flex;
            align-items: center;
        }

        .multiple-answers {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .multiple-answers .answer-badge {
            align-self: flex-start;
        }

        .keterangan-content {
            max-width: 200px;
        }

        .keterangan-text {
            word-wrap: break-word;
            white-space: pre-wrap;
            font-size: 13px;
            line-height: 1.3;
        }

        .kategori-section {
            border-left: 4px solid #007bff;
            padding-left: 15px;
            margin-bottom: 30px;
            background: #f8f9fa;
            border-radius: 5px;
            padding: 20px;
        }

        .kategori-section h5 {
            color: #2c3e50;
            font-weight: 600;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.05);
        }

        .btn-link.btn-sm {
            font-size: 11px;
            text-decoration: none;
        }

        .btn-link.btn-sm:hover {
            text-decoration: underline;
        }

        /* Summary Cards Styles */
        .card.bg-primary, .card.bg-success, .card.bg-info, .card.bg-warning {
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.2s ease;
        }

        .card.bg-primary:hover, .card.bg-success:hover, .card.bg-info:hover, .card.bg-warning:hover {
            transform: translateY(-2px);
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 10px;
            border: none;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }

        .modal-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 10px 10px 0 0;
        }

        .modal-header .close {
            color: white;
            opacity: 0.8;
        }

        .modal-header .close:hover {
            opacity: 1;
        }

        /* Badge improvements */
        .badge {
            font-weight: 500;
        }

        .badge i {
            font-size: 10px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .kategori-section {
                padding: 15px 10px;
                margin-left: -15px;
                margin-right: -15px;
            }
            
            .answer-container {
                min-height: auto;
            }
            
            .multiple-answers .answer-badge {
                font-size: 11px;
                padding: 3px 6px;
            }
            
            .keterangan-content {
                max-width: 150px;
            }
            
            .table-responsive {
                font-size: 13px;
            }
        }
    </style>
@endsection

@section('script')
    <script src="{{ asset('odontograma/js/modernizr-2.0.6.min.js') }}"></script>
    <script src="{{ asset('odontograma/js/plugins.js') }}"></script>
    <script src="{{ asset('odontograma/js/jquery-ui-1.8.17.custom.min.js') }}"></script>
    <script src="{{ asset('odontograma/js/jquery.tmpl.js') }}"></script>
    <script src="{{ asset('odontograma/js/knockout-2.0.0.js') }}"></script>
    <script src="{{ asset('odontograma/js/jquery.svg.min.js') }}"></script>
    <script src="{{ asset('odontograma/js/jquery.svggraph.min.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>

    <script>
        jQuery(function() {
            var currentZoom = 1;
            var zoomStep = 0.1;
            var maxZoom = 3;
            var minZoom = 0.5;
            var isDragging = false;
            var startX, startY, translateX = 0, translateY = 0;

            // Fungsi untuk mengatur zoom
            function setZoom(zoom) {
                currentZoom = Math.max(minZoom, Math.min(maxZoom, zoom));
                updateTransform();
            }

            // Fungsi untuk memperbarui transformasi SVG
            function updateTransform() {
                var svg = $('#odontograma svg');
                svg.css('transform', `translate(${translateX}px, ${translateY}px) scale(${currentZoom})`);
            }

            // Fungsi untuk mendapatkan warna berdasarkan kondisi gigi
            function getColorForCondition(condition) {
                switch (condition) {
                    case "_": return "#bda25c";
                    case "∑": return "#fe8024";
                    case "Ο": return "#ff2e2e";
                    case "X": return "#b1b1b1";
                    case "V": return "#2d28ff";
                    case "⚫": return "#2bc155";
                    default: return "#FFFFFF";
                }
            }

            // Fungsi untuk menggambar satu gigi
            function drawDiente(svg, parentGroup, diente) {
                if (!diente) throw new Error('Error: no se ha especificado el diente.');

                var x = diente.x || 0, y = diente.y || 0;
                var color = getColorForCondition(diente.condition);
                var stroke = 'navy';
                var strokeWidth = 0.5;

                var defaultPolygon = {
                    fill: color,
                    stroke: stroke,
                    strokeWidth: strokeWidth
                };

                var dienteGroup = svg.group(parentGroup, {
                    transform: 'translate(' + x + ',' + y + ')'
                });

                // Menggambar polygon gigi
                var caraSuperior = svg.polygon(dienteGroup, [[0, 0], [20, 0], [15, 5], [5, 5]], defaultPolygon);
                var caraInferior = svg.polygon(dienteGroup, [[5, 15], [15, 15], [20, 20], [0, 20]], defaultPolygon);
                var caraDerecha = svg.polygon(dienteGroup, [[15, 5], [20, 0], [20, 20], [15, 15]], defaultPolygon);
                var caraIzquierda = svg.polygon(dienteGroup, [[0, 0], [5, 5], [5, 15], [0, 20]], defaultPolygon);
                var caraCentral = svg.polygon(dienteGroup, [[5, 5], [15, 5], [15, 15], [5, 15]], defaultPolygon);

                var displayText = diente.condition || diente.id;
                var caraCompleto = svg.text(dienteGroup, 6, 30, displayText, {
                    fill: 'navy',
                    stroke: 'navy',
                    strokeWidth: 0.1,
                    style: 'font-size: 6pt;font-weight:normal'
                });
            }

            // Fungsi untuk merender SVG
            function renderSvg() {
                console.log('Rendering odontogram');
                var svg = $('#odontograma').svg('get').clear();
                var parentGroup = svg.group({
                    transform: 'scale(1.5)'
                });

                var containerWidth = $('#odontograma').width();
                var containerHeight = $('#odontograma').height();
                var scale = Math.min(containerWidth / 400, containerHeight / 250);
                $(parentGroup).attr('transform', 'scale(' + scale + ')');

                var odontogramData = JSON.parse($('#odontograma').attr('data-odontogram'));
                console.log('odontogramData:', odontogramData);

                // Daftar lengkap semua gigi
                var allTeeth = [
                    11, 12, 13, 14, 15, 16, 17, 18,
                    21, 22, 23, 24, 25, 26, 27, 28,
                    31, 32, 33, 34, 35, 36, 37, 38,
                    41, 42, 43, 44, 45, 46, 47, 48,
                    51, 52, 53, 54, 55,
                    61, 62, 63, 64, 65,
                    71, 72, 73, 74, 75,
                    81, 82, 83, 84, 85
                ];

                allTeeth.forEach(function(toothId) {
                    var diente = {
                        id: toothId.toString(),
                        condition: odontogramData[toothId] || "",
                        x: calculateX(toothId),
                        y: calculateY(toothId)
                    };
                    drawDiente(svg, parentGroup, diente);
                });

                addInteractivity();
                updateOdontogramGuide(odontogramData);
            }

            // Fungsi untuk menambahkan interaktivitas
            function addInteractivity() {
                $('#odontograma').off('wheel').on('wheel', function(event) {
                    event.preventDefault();
                    var delta = event.originalEvent.deltaY;
                    setZoom(delta > 0 ? currentZoom - zoomStep : currentZoom + zoomStep);
                });

                $('#odontograma').off('mousedown').on('mousedown', function(event) {
                    isDragging = true;
                    startX = event.clientX - translateX;
                    startY = event.clientY - translateY;
                });

                $(document).off('mousemove').on('mousemove', function(event) {
                    if (isDragging) {
                        translateX = event.clientX - startX;
                        translateY = event.clientY - startY;
                        updateTransform();
                    }
                });

                $(document).off('mouseup').on('mouseup', function() {
                    isDragging = false;
                });
            }

            // Fungsi untuk memperbarui panduan odontogram
            function updateOdontogramGuide(odontogramData) {
                console.log('Updating odontogram guide');
                var guideElement = $('#odontogram-guide');
                guideElement.empty();

                var conditions = {};
                if (typeof odontogramData === 'object' && odontogramData !== null) {
                    Object.values(odontogramData).forEach(function(condition) {
                        conditions[condition] = true;
                    });
                }

                var guideItems = [
                    { condition: "_", label: "Gigi belum erupsi", icon: "●" },
                    { condition: "∑", label: "Gigi goyah", icon: "∑" },
                    { condition: "Ο", label: "Karies", icon: "Ο" },
                    { condition: "X", label: "Gigi sudah dicabut/tanggal", icon: "X" },
                    { condition: "V", label: "Gigi tinggal akar", icon: "V" },
                    { condition: "⚫", label: "Tumpatan", icon: "⚫" }
                ];

                guideItems.forEach(function(item) {
                    var guideItemHtml = `
                        <div class="guide-item">
                            <div class="guide-color" style="background-color: ${getColorForCondition(item.condition)}">
                                ${item.icon}
                            </div>
                            <span class="guide-text">${item.label}</span>
                        </div>
                    `;
                    guideElement.append(guideItemHtml);
                });
            }

            // Fungsi untuk menghitung posisi X dan Y gigi
            function calculateX(toothId) {
                var id = parseInt(toothId);
                var quadrant = Math.floor(id / 10);
                var position = id % 10;

                if (quadrant === 1 || quadrant === 4) {
                    return (8 - position) * 25;
                } else if (quadrant === 2 || quadrant === 3) {
                    return 210 + (position - 1) * 25;
                } else if (quadrant === 5 || quadrant === 8) {
                    return 75 + (5 - position) * 25;
                } else if (quadrant === 6 || quadrant === 7) {
                    return 210 + (position - 1) * 25;
                }
                return 0;
            }

            function calculateY(toothId) {
                var id = parseInt(toothId);
                var quadrant = Math.floor(id / 10);

                if (quadrant === 1 || quadrant === 2) {
                    return 0;
                } else if (quadrant === 3 || quadrant === 4) {
                    return 120;
                } else if (quadrant === 5 || quadrant === 6) {
                    return 40;
                } else if (quadrant === 7 || quadrant === 8) {
                    return 80;
                }
                return 0;
            }

            // Inisialisasi SVG
            $('#odontograma').svg({
                settings: {
                    width: '100%',
                    height: '100%'
                }
            });

            // Render SVG
            renderSvg();

            // Event listener untuk tombol zoom
            $('#zoomIn').click(function() {
                setZoom(currentZoom + zoomStep);
            });

            $('#zoomOut').click(function() {
                setZoom(currentZoom - zoomStep);
            });

            $('#resetZoom').click(function() {
                currentZoom = 1;
                translateX = 0;
                translateY = 0;
                updateTransform();
            });

            // Event listener untuk resize window
            $(window).resize(function() {
                renderSvg();
            });

            // Inisialisasi DataTables
            $('#table-riwayat').DataTable({
                responsive: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json'
                },
                pageLength: 10,
                order: [[1, 'desc']] // Urutkan berdasarkan tanggal terbaru
            });

            var table = $('#icd-table').DataTable({
                processing: true,
                serverSide: true,
                searching: true,
                paging: true,
                select: false,
                pageLength: 5,
                lengthChange: false,
                ajax: "{{ route('icd.data') }}",
                columns: [
                    { data: 'action', name: 'action' },
                    { data: 'code', name: 'code' },
                    { data: 'name_id', name: 'name_id' }
                ]
            });

            // Inisialisasi CKEditor
            CKEDITOR.addCss('.cke_editable p { margin: 0 !important; }');
            CKEDITOR.replace('editor', {
                height: '250px',
                filebrowserUploadMethod: 'form',
                toolbarGroups: [
                    { name: 'document', groups: ['mode', 'document'] },
                    { name: 'clipboard', groups: ['clipboard', 'undo'] },
                ]
            });

            CKEDITOR.replace('editor2', {
                height: '250px',
                filebrowserUploadMethod: 'form',
                toolbarGroups: [
                    { name: 'document', groups: ['mode', 'document'] },
                    { name: 'clipboard', groups: ['clipboard', 'undo'] },
                ]
            });

            CKEDITOR.replace('editor3', {
                height: '250px',
                filebrowserUploadMethod: 'form',
                toolbarGroups: [
                    { name: 'document', groups: ['mode', 'document'] },
                    { name: 'clipboard', groups: ['clipboard', 'undo'] },
                ]
            });

            // Event handlers untuk modal
            $(document).on("click", ".addPemeriksaan", function() {
                var rekamId = $(this).data('id');
                var pemeriksaan = $(this).data('pemeriksaan');
                $(".modal-body #rekamId").val(rekamId);
                if (pemeriksaan == "--") {
                    pemeriksaan = '<table border="0" cellpadding="0" cellspacing="0" style="width:100%">' +
                        '<tbody>' +
                        '<tr><td style="width:20%">TD</td><td style="width:2%">:</td><td>&nbsp;</td></tr>' +
                        '<tr><td>Temp</td><td>:</td><td>&nbsp;</td></tr>' +
                        '<tr><td>Resp</td><td>:</td><td>&nbsp;</td></tr>' +
                        '<tr><td>Nadi</td><td>:</td><td>&nbsp;</td></tr>' +
                        '<tr><td>BB</td><td>:</td><td>&nbsp;</td></tr>' +
                        '</tbody>' +
                        '</table>' +
                        '<p>&nbsp;</p>';
                }
                CKEDITOR.instances.editor.setData(pemeriksaan);
            });

            $(document).on("click", ".pilihIcd", function() {
                var diagnosa_id = $(this).data('id');
                var rekam_id = $("#rekam_id").val();
                var pasien_id = $("#pasien_id").val();
                var token = '{{ csrf_token() }}';
                $("#addDiagnosa").modal('hide');
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                $.ajax({
                    type: 'POST',
                    url: "{{ route('diagnosa.update') }}",
                    data: {
                        rekam_id: rekam_id,
                        pasien_id: pasien_id,
                        diagnosa: diagnosa_id,
                        _token: token
                    },
                    success: function(data) {
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat menyimpan diagnosa');
                    }
                });
            });

            $(document).on("click", ".addTindakan", function() {
                var rekamId = $(this).data('id');
                var tindakan = $(this).data('tindakan');
                $(".modal-body #rekamId").val(rekamId);
                CKEDITOR.instances.editor2.setData(tindakan);
            });

            $(document).on("click", ".addDiagnosa", function() {
                var rekamId = $(this).data('id');
                var diagnosa = $(this).data('diagnosa');
                $(".modal-body #rekamId").val(rekamId);
                CKEDITOR.instances.editor.setData(diagnosa);
            });

            $(document).on("click", ".addResep", function() {
                var rekamId = $(this).data('id');
                var resep = $(this).data('resep');
                $(".modal-body #rekamId").val(rekamId);
                CKEDITOR.instances.editor3.setData(resep);
            });

            // Fungsi untuk menyimpan perubahan odontogram
            function saveOdontogramChanges() {
                var odontogramData = {};
                $('.diente').each(function() {
                    var toothId = $(this).data('tooth-id');
                    var condition = $(this).data('condition');
                    if (condition) {
                        odontogramData[toothId] = condition;
                    }
                });

                $.ajax({
                    url: "{{ route('rekam.gigi.store', $pasien->id) }}",
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        pasien_id: '{{ $pasien->id }}',
                        odontogram_data: JSON.stringify(odontogramData)
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Odontogram berhasil disimpan');
                            location.reload();
                        } else {
                            alert('Gagal menyimpan odontogram');
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menyimpan odontogram');
                    }
                });
            }

            // Tambahkan event listener untuk tombol simpan
            $('#saveOdontogram').click(function() {
                saveOdontogramChanges();
            });

            // Fungsi untuk mengubah kondisi gigi
            function changeToothCondition(toothId, newCondition) {
                var tooth = $(`#tooth-${toothId}`);
                tooth.data('condition', newCondition);
                tooth.attr('fill', getColorForCondition(newCondition));
                updateOdontogramGuide();
            }

            // Event listener untuk klik pada gigi
            $(document).on('click', '.diente', function() {
                var toothId = $(this).data('tooth-id');
                var currentCondition = $(this).data('condition') || '';
                var newCondition = prompt("Masukkan kondisi gigi baru (_, ∑, Ο, X, V, ⚫):", currentCondition);

                if (newCondition !== null) {
                    changeToothCondition(toothId, newCondition);
                }
            });

            // Fungsi untuk memperbarui tampilan odontogram
            function updateOdontogramDisplay() {
                renderSvg();
                updateOdontogramGuide();
            }

            // Panggil fungsi ini setiap kali ada perubahan data
            function handleDataChange() {
                updateOdontogramDisplay();
            }

            // Tambahkan event listener untuk perubahan data
            $(document).on('odontogramDataChanged', handleDataChange);

            // Tooltip untuk badge dan elemen interaktif
            $('[data-toggle="tooltip"]').tooltip();

            // Smooth scroll untuk navigasi internal
            $('a[href^="#"]').on('click', function(event) {
                var target = $(this.getAttribute('href'));
                if (target.length) {
                    event.preventDefault();
                    $('html, body').stop().animate({
                        scrollTop: target.offset().top - 100
                    }, 1000);
                }
            });

            // Auto-refresh untuk notifikasi (opsional)
            setInterval(function() {
                // Bisa ditambahkan logic untuk refresh notifikasi real-time
                // $.get('/api/notifications/count', function(data) {
                //     $('#notification-count').text(data.count);
                // });
            }, 30000); // Refresh setiap 30 detik

            // Print functionality
            $('.print-rekam').on('click', function() {
                window.print();
            });

            // Export functionality placeholder
            $('.export-rekam').on('click', function() {
                alert('Fitur export akan segera tersedia');
            });

            // Inisialisasi tampilan awal
            updateOdontogramDisplay();

            // Loading indicator untuk AJAX requests
            $(document).ajaxStart(function() {
                $('.loading-overlay').show();
            }).ajaxStop(function() {
                $('.loading-overlay').hide();
            });

            // Konfirmasi sebelum menghapus data
            $('.btn-delete').on('click', function(e) {
                e.preventDefault();
                var href = $(this).attr('href');
                var message = $(this).data('message') || 'Apakah Anda yakin ingin menghapus data ini?';
                
                if (confirm(message)) {
                    window.location.href = href;
                }
            });

            // Auto-save draft untuk form yang sedang diisi (opsional)
            var autoSaveTimer;
            $('textarea, input[type="text"]').on('input', function() {
                clearTimeout(autoSaveTimer);
                autoSaveTimer = setTimeout(function() {
                    // Logic untuk auto-save draft
                    console.log('Auto-saving draft...');
                }, 5000);
            });

            console.log('Detail rekam medis loaded successfully');
        });
    </script>
@endsection