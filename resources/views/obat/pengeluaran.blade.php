@extends('layout.apps')
@section('content')
    <style>
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
        }

        .table th {
            background-color: #f8f9fa;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .patient-info p {
            margin-bottom: 0.5rem;
        }

        .info-label {
            font-weight: bold;
            color: #495057;
        }

        .breadcrumb {
            background-color: transparent;
            padding-left: 0;
        }

        .main-content {
            padding: 20px;
        }
    </style>

    <div class="container-fluid main-content">
        {{-- BREADCRUMBS --}}
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="text-black font-w600">Detail Pasien</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Pasien</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">RM#{{ $pasien->no_rm }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $rekam->no_rekam }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        {{-- DATA --}}
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Informasi Pasien</h4>
                    </div>
                    <div class="card-body patient-info">
                        <input type="hidden" id="pasien_id" value="{{ $pasien->id }}">
                        <input type="hidden" id="rekam_id" value="{{ $rekam ? $rekam->id : '' }}">

                        <h3 class="mb-3">{{ $pasien->nama }}</h3>
                        <p><span class="info-label">Tanggal Lahir:</span> {{ $pasien->tmp_lahir }}, {{ $pasien->tgl_lahir }}
                        </p>
                        <p><span class="info-label">Agama:</span> {{ $pasien->agama }}</p>
                        <p><span class="info-label">Jenis Kelamin:</span> {{ $pasien->jk }}</p>
                        <p><span class="info-label">Status:</span> {{ $pasien->status_menikah }}</p>
                        <p><span class="info-label">Alamat:</span> {{ $pasien->alamat_lengkap }}</p>
                        <p><span class="info-label">Lokasi:</span> {{ $pasien->kelurahan }}, {{ $pasien->kecamatan }},
                            {{ $pasien->kabupaten }}, {{ $pasien->kewarganegaraan }}</p>
                        <p><span class="info-label">Alergi:</span> {{ $pasien->alergi }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title">Rincian Medis</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="mb-3">Keluhan</h5>
                                <p>{!! $rekam->keluhan !!}</p>
                            </div>
                            <div class="col-md-4">
                                <h5 class="mb-3">Diagnosa</h5>
                                @foreach ($rekam->diagnosa() as $item)
                                    <p><strong>{{ $item->diagnosis->code }}</strong> - {{ $item->diagnosis->name_id }}</p>
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <h5 class="mb-3">Pilihan Edukasi</h5>
                                <p>{!! $rekam->tindakan !!}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-title">Pengeluaran Obat</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <form method="POST">
                                <input type="hidden" class="form-control" id="stok" />
                                <input type="hidden" class="form-control" id="obat_code" />

                                <div class="form-group">
                                    <label class="text-black font-w500">Nama Obat*</label>
                                    <div class="input-group">
                                        <input type="text" id="obat_id" class="form-control" data-toggle="modal" data-target="#modalObat" name="obat_id" placeholder="Pilih Obat..">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#modalObat">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="text-black font-w500">Nama Obat </label>
                                    <input type="text" id="nama_obat" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="text-black font-w500">Jumlah* </label>
                                    <input type="number" name="jumlah" id="jumlah" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="text-black font-w500">Harga* </label>
                                    <input type="number" name="harga" id="harga" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="text-black font-w500">Keterangan </label>
                                    <input type="text" id="keterangan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="button" onclick="addObat()" class="btn btn-info btn-block">+ Tambah Obat</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8">
                            <h5 class="mb-3">Obat Yang Akan Dikeluarkan</h5>
                            <form action="{{Route('obat.pengeluaran.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="rekam_id" value="{{$rekam->id}}">
                                <input type="hidden" name="pasien_id" value="{{$pasien->id}}">
                                <div class="table-responsive">
                                    <table id="table-obat" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Total</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary btn-block">SIMPAN & SELESAIKAN PROSES</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}

                {{-- <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Riwayat Obat</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengeluaran as $item)
                                <tr>
                                    <td>{{$item->obat->kd_obat}}</td>
                                    <td>{{$item->obat->nama}}</td>
                                    <td>{{$item->jumlah}}</td>
                                    <td>{{number_format($item->harga)}}</td>
                                    <td>{{number_format($item->subtotal)}}</td>
                                    <td>{{$item->keterangan}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
            </div>
        </div>
    </div>

    <!-- Modal Obat -->
    {{-- <div class="modal fade" id="modalObat">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Obat</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="display dataTablesCard white-border table-responsive-sm" style="width: 100%" id="obat-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Obat</th>
                                <th>Nama Obat</th>
                                <th>Stok</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@section('script')
    <script>
        function addObat() {
            var obatNama = $("#nama_obat").val();
            var obatId = $("#obat_id").val();
            var obatCode = $("#obat_code").val();

            var harga = $("#harga").val();
            var stok = $("#stok").val();
            var jumlah = $("#jumlah").val();
            var keterangan = $("#keterangan").val();

            if (jumlah == "" || obatId == "" || harga == "") {
                alert("Obat Wajib Dipilih")
            } else {
                if (parseInt(jumlah) > parseInt(stok)) {
                    alert("Jumlah tidak sesuai stok");
                }
                var subtotal = parseInt(harga) * parseInt(jumlah);
                var markup = '<tr>' +
                    '<td>' + obatCode +
                    '<input type="hidden" name="obat_id[]" value="' + obatId + '"/>' +
                    '</td>' +
                    '<td>' + obatNama +
                    '</td>' +
                    '<td>' + jumlah +
                    '<input type="hidden" name="jumlah[]" value="' + jumlah + '"/>' +
                    '</td>' +
                    '<td>' + harga +
                    '<input type="hidden" name="harga[]" value="' + harga + '"/>' +
                    '</td>' +
                    '<td>' + subtotal +
                    '<input type="hidden" name="subtotal[]" value="' + subtotal + '"/>' +
                    '</td>' +
                    '<td>' + keterangan +
                    '<input type="hidden" name="keterangan[]" value="' + keterangan + '"/>' +
                    '</td>' +
                    '<td style="width: 80px">' +
                    // '<button type="button" class="btn btn-danger btnDelete">Hapus</button>'+
                    '<a href="#" class="btn btn-danger shadow btn-xs sharp btnDelete"><i class="fa fa-trash"></i></a>' +
                    '</td>' +
                    '</tr>';

                $("#table-obat tbody").append(markup);


            }

        }
        $(function() {
            var table = $('#obat-table').DataTable({
                processing: true,
                serverSide: true,
                searching: true,
                paging: true,
                select: false,
                pageLength: 5,
                lengthChange: false,
                ajax: "{{ route('obat.data') }}",
                columns: [{
                        data: 'action',
                        name: 'action'
                    },
                    {
                        data: 'kd_obat',
                        name: 'kd_obat'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'stok',
                        name: 'stok'
                    },
                    {
                        data: 'satuan',
                        name: 'satuan'
                    },
                    {
                        data: 'harga',
                        name: 'harga'
                    }
                ]
            });

            $("#table-obat").on('click', '.btnDelete', function() {
                $(this).closest('tr').remove();
            });

        });

        $(document).on("click", ".pilihObat", function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var harga = $(this).data('harga');
            var stok = $(this).data('stok');
            var satuan = $(this).data('satuan');
            var code = $(this).data('code');
            $("#nama_obat").val(nama);
            $("#obat_id").val(id);
            $("#obat_code").val(code);

            $("#harga").val(harga);
            $("#stok").val(stok);

            $("#modalObat").modal('hide');

            // toastr.success("Obat "+nama+" telah dipilih", "Sukses",{timeOut: 3000})
        });
    </script>
@endsection
