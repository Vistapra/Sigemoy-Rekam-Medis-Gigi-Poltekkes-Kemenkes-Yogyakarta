@extends('layout.apps')

@section('content')
    @include('rekam.partial.modal-pemeriksaan')
    @include('rekam.partial.modal-tindakan')
    @include('rekam.partial.modal-diagnosa')
    @include('rekam.partial.modal-resep-obat')

    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-sm-12 col-lg-5">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="fs-20 text-black mb-0">Detail Pasien</h4>
                            <div class="dropdown">
                                RM# {{ $pasien->no_rm }}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="media mb-4 align-items-center">
                                <div class="media-body">
                                    <input type="hidden" id="pasien_id" value="{{ $pasien->id }}">
                                    <input type="hidden" id="rekam_id" value="{{ $rekamLatest ? $rekamLatest->id : '' }}">

                                    <h3 class="fs-18 font-w600 mb-1">
                                        <a href="javascript:void(0)" class="text-black">{{ $pasien->nama }}</a>
                                    </h3>
                                    <h4 class="fs-14 font-w600 mb-1">{{ $pasien->tmp_lahir . ', ' . $pasien->tgl_lahir }}
                                    </h4>
                                    @php
                                        $b_day = \Carbon\Carbon::parse($pasien->tgl_lahir);
                                        $now = \Carbon\Carbon::now();
                                    @endphp
                                    <h4 class="fs-14 font-w600 mb-1">{{ 'Usia : ' . $b_day->diffInYears($now) }}</h4>
                                    <h4 class="fs-14 font-w600 mb-1">{{ $pasien->jk . ', ' . $pasien->status_menikah }}</h4>
                                    <span class="fs-14">{{ $pasien->alamat_lengkap }}</span>
                                    <span
                                        class="fs-14">{{ $pasien->kelurahan . ', ' . $pasien->kecamatan . ', ' . $pasien->kabupaten . ', ' . $pasien->kewarganegaraan }}</span>
                                    <br>
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
                                    <div class="d-flex mb-3 align-items-center">
                                        <span class="fs-12 col-6 p-0 text-black">
                                            <svg class="mr-2" width="19" height="19" viewBox="0 0 19 19"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="19" height="19" fill="#5F74BF" />
                                            </svg>
                                            No HP
                                        </span>
                                        <div class="col-6 p-0">
                                            <p>{{ $pasien->no_hp }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3 align-items-center">
                                        <span class="fs-12 col-6 p-0 text-black">
                                            <svg class="mr-2" width="19" height="19" viewBox="0 0 19 19"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="19" height="19" fill="#5F74BF" />
                                            </svg>
                                            Alergi
                                        </span>
                                        <div class="col-6 p-0">
                                            <p>{{ $pasien->alergi }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="fs-12 col-6 p-0 text-black">
                                            <svg class="mr-2" width="19" height="19" viewBox="0 0 19 19"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="19" height="19" fill="#5FBF91" />
                                            </svg>
                                            File General
                                        </span>
                                        <div class="col-6 p-0">
                                            @if ($pasien->general_uncent != null)
                                                <a href="{{ $pasien->getGeneralUncent() }}" target="_blank"
                                                    class="btn btn-info btn-xs">
                                                    Lihat Data
                                                </a>
                                            @else
                                                Belum Tersedia
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

        @if (auth()->user()->role_display() == 'Admin' || auth()->user()->role_display() == 'Dokter')
            <div class="col-xl-12 mt-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Odontogram {{ $pasien->nama }}</h5>
                        <div class="row">
                            <div class="col-xl-9">
                                <div class="mb-3">
                                    <button id="zoomIn" class="btn btn-sm btn-light"><i
                                            class="fas fa-search-plus"></i></button>
                                    <button id="zoomOut" class="btn btn-sm btn-light"><i
                                            class="fas fa-search-minus"></i></button>
                                    <button id="resetZoom" class="btn btn-sm btn-light"><i
                                            class="fas fa-sync-alt"></i></button>
                                </div>
                                <div id="odontograma" class="odontogram-container"
                                    data-odontogram="{{ json_encode($odontogram_data) }}"></div>
                            </div>
                            <div class="col-xl-3">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <a href="{{ route('rekam.gigi.edit', $pasien->id) }}"
                                            class="btn btn-primary btn-block mb-3">
                                            <i class="fas fa-edit"></i> Edit Odontogram
                                        </a>
                                        <h5 class="card-title mb-0">Panduan Odontogram</h5>
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

            <div class="col-xl-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Riwayat Pemeriksaan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-riwayat" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Elemen Gigi</th>
                                        <th>Kondisi Gigi</th>
                                        <th>Diagnosa</th>
                                        <th>Pilihan Edukasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($riwayattindakan as $riwayat)
                                        <tr>
                                            <td>{{ $riwayat->created_at ? $riwayat->created_at->format('d-m-Y') : now()->format('d-m-Y') }}
                                            </td>
                                            <td>{{ $riwayat->elemen_gigi ?? 'Tidak ada data' }}</td>
                                            <td>{!! $riwayat->pemeriksaan ? strip_tags($riwayat->pemeriksaan) : 'Tidak ada data' !!}</td>
                                            <td>{!! $riwayat->diagnosa ? $riwayat->diagnosis->code . ' - ' . $riwayat->diagnosis->name_id : 'Tidak ada data' !!}</td>
                                            <td>{!! $riwayat->tindakan ? $riwayat->tindak->kode . ' - ' . $riwayat->tindak->nama : 'Tidak ada data' !!}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data riwayat gigi.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (auth()->user()->role_display() == 'Admin' || auth()->user()->role_display() == 'KaderKesehatan')
            <div class="col-xl-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Rekam Medis Kader</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Kader Kesehatan</th>
                                        <th>Kondisi Gigi</th>
                                        <th>Total</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pasien->rekamMedisKader as $rekamMedisKader)
                                        <tr>
                                            <td>{{ $rekamMedisKader->created_at->format('Y-m-d') }}</td>
                                            <td>{{ $rekamMedisKader->user->name }}</td>
                                            <td>{{ $rekamMedisKader->namaKondisiGigi->nama_kondisi }}</td>
                                            <td>{{ $rekamMedisKader->total }}</td>
                                            <td>{{ $rekamMedisKader->keterangan ?? 'Tidak ada keterangan' }}</td>
                                            <td>
                                                <a href="{{ route('rekammediskaderkesehatan.edit', $rekamMedisKader->id) }}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                <form
                                                    action="{{ route('rekammediskaderkesehatan.destroy', $rekamMedisKader->id) }}"
                                                    method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus rekam medis ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data rekam medis kader</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (auth()->user()->role_display() == 'Admin' || auth()->user()->role_display() == 'Dokter')
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive card-table">
                        <table class="table table-responsive-md table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tgl Periksa</th>
                                    <th>Dokter</th>
                                    <th>Keluhan (S)</th>
                                    <th>Pemeriksaan (O)</th>
                                    <th>Diagnosa (A)</th>
                                    <th>Pilihan Edukasi (P)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rekam as $key => $row)
                                    <tr>
                                        <td>{{ $rekam->firstItem() + $key }}</td>
                                        <td>{{ $row->tgl_rekam }}</td>
                                        <td>{{ Auth::user()->name }}</td>
                                        <td>{{ $row->keluhan }}</td>
                                        <td>
                                            {!! $row->pemeriksaan !!}
                                            @if ($row->pemeriksaan_file != null)
                                                <br>
                                                <a target="_blank" href="{{ $row->getFilePemeriksaan() }}">
                                                    <u style="color:rgb(28, 85, 231);">Lihat Foto</u>
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
                                                    <i class="flaticon-381-pencil"></i> Object
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <table class="table table-sm">
                                                @foreach ($row->diagnosa() as $item)
                                                    <tr>
                                                        <td>{{ $item->diagnosis->code }}</td>
                                                        <td>
                                                            <a href="{{ route('rekam.diagnosa.delete', $item->id) }}"
                                                                class="btn btn-danger btn-xs">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">{{ $item->diagnosis->name_id }}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                            @if (auth()->user()->role_display() == 'Dokter' ||
                                                    auth()->user()->role_display() == 'Admin' ||
                                                    auth()->user()->role_display() == 'KaderKesehatan')
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#addDiagnosa" data-id="{{ $row->id }}"
                                                    data-tanggal="{{ $row->tgl_rekam }}"
                                                    data-tindakan="{{ $row->tindakan }}"
                                                    class="btn btn-primary btn-xs addDiagnosa mt-2">
                                                    <i class="flaticon-381-pencil"></i> Assessment
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {!! $row->tindakan !!}
                                            @if ($row->tindakan_file != null)
                                                <br>
                                                <a target="_blank" href="{{ $row->getFileTindakan() }}">
                                                    <u style="color:rgb(28, 85, 231);">Lihat Foto</u>
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
                                                    <i class="flaticon-381-pencil"></i> Plan
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="dataTables_info" id="example_info" aria-live="polite">
                            Showing {{ $rekam->firstItem() }} to {{ $rekam->perPage() * $rekam->currentPage() }} of
                            {{ $rekam->total() }} entries
                        </div>
                        {{ $rekam->appends(request()->except('page'))->links() }}
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="col-xl-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Survey Pasien</h4>
                </div>
                <div class="card-body">
                    @if ($pasien->jawabanPasien->isNotEmpty())
                        @foreach ($pasien->jawabanPasien->groupBy('pertanyaan.kategori.nama_kategori') as $kategori => $jawaban)
                            <h5 class="mt-4">{{ $kategori }}</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Pertanyaan</th>
                                            <th>Jawaban</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jawaban as $item)
                                            <tr>
                                                <td>{{ $item->pertanyaan->teks_pertanyaan }}</td>
                                                <td>{{ $item->opsiJawaban->teks_opsi ?? 'Tidak dijawab' }}</td>
                                                <td>{{ $item->keterangan ?? 'Tidak ada keterangan' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    @else
                        <p>Tidak ada data kuisioner Survey Pasien.</p>
                    @endif
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

        .odontogram-guide {
            border-radius: 10px;
            overflow: hidden;
        }

        .odontogram-guide .card-header {
            padding: 15px 20px;
        }

        .odontogram-guide .card-body {
            padding: 20px;
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
            var startX, startY, translateX = 0,
                translateY = 0;

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
                    case "_":
                        return "#bda25c";
                    case "∑":
                        return "#fe8024";
                    case "Ο":
                        return "#ff2e2e";
                    case "X":
                        return "#b1b1b1";
                    case "V":
                        return "#2d28ff";
                    case "⚫":
                        return "#2bc155";
                    default:
                        return "#FFFFFF"; // Warna default untuk gigi tanpa kondisi
                }
            }

            // Fungsi untuk menggambar satu gigi
            function drawDiente(svg, parentGroup, diente) {
                if (!diente) throw new Error('Error: no se ha especificado el diente.');

                var x = diente.x || 0,
                    y = diente.y || 0;
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

                var caraSuperior = svg.polygon(dienteGroup,
                    [
                        [0, 0],
                        [20, 0],
                        [15, 5],
                        [5, 5]
                    ],
                    defaultPolygon);
                var caraInferior = svg.polygon(dienteGroup,
                    [
                        [5, 15],
                        [15, 15],
                        [20, 20],
                        [0, 20]
                    ],
                    defaultPolygon);
                var caraDerecha = svg.polygon(dienteGroup,
                    [
                        [15, 5],
                        [20, 0],
                        [20, 20],
                        [15, 15]
                    ],
                    defaultPolygon);
                var caraIzquierda = svg.polygon(dienteGroup,
                    [
                        [0, 0],
                        [5, 5],
                        [5, 15],
                        [0, 20]
                    ],
                    defaultPolygon);
                var caraCentral = svg.polygon(dienteGroup,
                    [
                        [5, 5],
                        [15, 5],
                        [15, 15],
                        [5, 15]
                    ],
                    defaultPolygon);

                // Ubah ini untuk menampilkan kode kondisi alih-alih nomor gigi
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
                console.log('Conditions:', conditions);

                var guideItems = [{
                        condition: "_",
                        label: "Gigi belum erupsi",
                        icon: "●"
                    },
                    {
                        condition: "∑",
                        label: "Gigi goyah",
                        icon: "∑"
                    },
                    {
                        condition: "Ο",
                        label: "Karies",
                        icon: "Ο"
                    },
                    {
                        condition: "X",
                        label: "Gigi sudah dicabut/tanggal",
                        icon: "X"
                    },
                    {
                        condition: "V",
                        label: "Gigi tinggal akar",
                        icon: "V"
                    },
                    {
                        condition: "⚫",
                        label: "Tumpatan",
                        icon: "⚫"
                    }
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

                console.log('Guide items added:', guideElement.children().length);
            }

            // Fungsi untuk menghitung posisi X gigi
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

            // Fungsi untuk menghitung posisi Y gigi
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
                }
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
                columns: [{
                        data: 'action',
                        name: 'action'
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'name_id',
                        name: 'name_id'
                    }
                ]
            });

            // Inisialisasi CKEditor
            CKEDITOR.addCss('.cke_editable p { margin: 0 !important; }');
            CKEDITOR.replace('editor', {
                height: '250px',
                filebrowserUploadMethod: 'form',
                toolbarGroups: [{
                        name: 'document',
                        groups: ['mode', 'document']
                    },
                    {
                        name: 'clipboard',
                        groups: ['clipboard', 'undo']
                    },
                ]
            });

            CKEDITOR.replace('editor2', {
                height: '250px',
                filebrowserUploadMethod: 'form',
                toolbarGroups: [{
                        name: 'document',
                        groups: ['mode', 'document']
                    },
                    {
                        name: 'clipboard',
                        groups: ['clipboard', 'undo']
                    },
                ]
            });

            CKEDITOR.replace('editor3', {
                height: '250px',
                filebrowserUploadMethod: 'form',
                toolbarGroups: [{
                        name: 'document',
                        groups: ['mode', 'document']
                    },
                    {
                        name: 'clipboard',
                        groups: ['clipboard', 'undo']
                    },
                ]
            });

            // Event handlers
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
                    url: "# ",
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        pasien_id: '{{ $pasien->id }}',
                        odontogram_data: JSON.stringify(odontogramData)
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Odontogram berhasil disimpan');
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
                var newCondition = prompt("Masukkan kondisi gigi baru (_, ∑, Ο, X, V, ⚫):",
                    currentCondition);

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

            // Inisialisasi tampilan awal
            updateOdontogramDisplay();
        });
    </script>
@endsection
