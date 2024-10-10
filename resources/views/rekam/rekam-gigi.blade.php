@extends('layout.apps')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Tambah Rekam Gigi {{ $pasien->nama }}</li>
            </ol>
        </nav>

        @include('rekam.partial.modal-diagnosa-gigi')

        <div class="row">
            <div class="col-xl-9">
                <div class="card shadow">
                    <div class="card-body">
                        {{-- <a href="{{ Route('rekam.gigi.odontogram', $rekam->pasien_id) }}" class="btn btn-info btn-sm mb-3">
                                <i class="fa fa-eye"></i> Lihat Riwayat Odontogram
                            </a> --}}
                        <div class="mb-3">
                            <button id="zoomIn" class="btn btn-sm btn-light"><i class="fas fa-search-plus"></i></button>
                            <button id="zoomOut" class="btn btn-sm btn-light"><i class="fas fa-search-minus"></i></button>
                            <button id="resetZoom" class="btn btn-sm btn-light"><i class="fas fa-sync-alt"></i></button>
                        </div>
                        <div id="odontograma" class="odontogram-container"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Panduan Odontogram</h5>
                        <table class="table table-sm table-hover">
                            <tbody>
                                <tr>
                                    <td><span class="badge bg-secondary">_</span></td>
                                    <td>Gigi belum erupsi</td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-warning">∑</span></td>
                                    <td>Gigi goyah</td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-danger">Ο</span></td>
                                    <td>Karies</td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-dark">X</span></td>
                                    <td>Gigi sudah dicabut/tanggal</td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-info">V</span></td>
                                    <td>Gigi tinggal akar</td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-success">⚫</span></td>
                                    <td>Tumpatan</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <form id="rekamGigiForm" action="{{ Route('rekam.gigi.store', $pasien->id) }}" method="POST">
            @csrf
            <div class="card shadow-sm mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label" for="element_gigi">Element Gigi*</label>
                                <select id="element_gigi" class="form-control">
                                    @php
                                        $toothNumbers = [
                                            range(11, 18),
                                            range(21, 28),
                                            range(31, 38),
                                            range(41, 48),
                                            range(51, 55),
                                            range(61, 65),
                                            range(71, 75),
                                            range(81, 85),
                                        ];
                                        foreach ($toothNumbers as $range) {
                                            foreach ($range as $number) {
                                                echo "<option value='{$number}'>{$number}</option>";
                                            }
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label" for="kondisi_gigi">Kondisi Gigi*</label>
                                <select name="pemeriksaan" id="kondisi_gigi" class="form-control">
                                    @foreach ($kondisi_gigi as $item)
                                        <option value="{{ $item->kode }}">{{ $item->kode }} ||
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label" for="diagnosa">Diagnosa*</label>
                                <div class="input-group">
                                    <input type="text" id="diagnosa" class="form-control" data-toggle="modal"
                                        data-target="#addDiagnosa" readonly name="diagnosa" placeholder="Pilih diagnosa">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#addDiagnosa">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label" for="tindakan">Pilihan Edukasi</label>
                                <select name="tindakan" id="tindakan" class="form-control">
                                    @foreach ($tindakan as $item)
                                        <option value="{{ $item->kode }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <button type="button" onclick="addRekam()" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Tambah
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mt-4">
                <div class="card-body">
                    <h5 class="card-title">Rincian</h5>
                    <div class="table-responsive">
                        <table id="table-tindakan" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Elemen Gigi</th>
                                    <th>Kondisi Gigi</th>
                                    <th>Diagnosa</th>
                                    <th>Pilihan Edukasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pem_gigi as $row)
                                    <tr>
                                        <td>{{ $row->elemen_gigi }}<input type="hidden" name="element_gigi[]"
                                                value="{{ $row->elemen_gigi }}" />
                                        </td>
                                        <td>{{ $row->pemeriksaan }}<input type="hidden" name="pemeriksaan[]"
                                                value="{{ $row->pemeriksaan }}" />
                                        </td>
                                        <td>{{ $row->diagnosa }}<input type="hidden" name="diagnosa[]"
                                                value="{{ $row->diagnosa }}" /></td>
                                        <td>{{ $row->tindakan }}<input type="hidden" name="tindakan[]"
                                                value="{{ $row->tindakan }}" /></td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm btnEdit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm btnDelete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success btn-lg btn-primary">SIMPAN SEMUA</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('header')
    <link rel="stylesheet" href="{{ asset('odontograma/css/jquery.svg.css') }}">
    <link rel="stylesheet" href="{{ asset('odontograma/css/odontograma.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('rekam/css/rekamgigi.css') }}">
@endsection

@section('script')
    <script src="{{ asset('odontograma/js/modernizr-2.0.6.min.js') }}"></script>
    <script src="{{ asset('odontograma/js/plugins.js') }}"></script>
    <script src="{{ asset('odontograma/js/jquery-ui-1.8.17.custom.min.js') }}"></script>
    <script src="{{ asset('odontograma/js/jquery.tmpl.js') }}"></script>
    <script src="{{ asset('odontograma/js/knockout-2.0.0.js') }}"></script>
    <script src="{{ asset('odontograma/js/jquery.svg.min.js') }}"></script>
    <script src="{{ asset('odontograma/js/jquery.svggraph.min.js') }}"></script>
    <script src="{{ asset('rekam/js/rekamgigi.js') }}"></script>
    <script>
        var itemGigi = {!! $elemen_gigis !!};
        var itemPem = {!! $pemeriksaan_gigi !!};
        var icdDataUrl = "{{ route('icd.data') }}";
        var opsiEdukasiUrl = "{{ route('opsiview.opsiedukasi') }}";
    </script>
@endsection
