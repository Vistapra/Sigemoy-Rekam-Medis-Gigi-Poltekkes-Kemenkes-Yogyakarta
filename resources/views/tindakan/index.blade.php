@extends('layout.apps')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Manajemen Pilihan Edukasi</h4>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-success mb-3" data-toggle="modal"
                            data-target="#addTindakanModal">
                            <i class="fas fa-plus-circle mr-1"></i> Tambah Pilihan Edukasi
                        </button>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="tindakanTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Pilihan Edukasi</th>
                                        {{-- <th>Harga</th> --}}
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Tindakan -->
    <div class="modal fade" id="addTindakanModal" tabindex="-1" role="dialog" aria-labelledby="addTindakanModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="addTindakanModalLabel">Tambah Pilihan Edukasi Baru</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addTindakanForm">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="kode">Kode Pilihan Edukasi</label>
                            <input type="text" class="form-control" id="kode" name="kode" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Pilihan Edukasi</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        {{-- <div class="form-group">
                            <label for="harga">Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="number" class="form-control" id="harga" name="harga" required
                                    min="0" value="0" oninput="this.value = this.value || '0'">
                            </div>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Tindakan -->
    <div class="modal fade" id="editTindakanModal" tabindex="-1" role="dialog" aria-labelledby="editTindakanModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editTindakanModalLabel">Edit Pilihan Edukasi</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editTindakanForm">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_id" name="id">
                        <div class="form-group">
                            <label for="edit_kode">Kode Pilihan Edukasi</label>
                            <input type="text" class="form-control" id="edit_kode" name="kode" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_nama">Nama Pilihan Edukasi</label>
                            <input type="text" class="form-control" id="edit_nama" name="nama" required>
                        </div>
                        {{-- <div class="form-group">
                            <label for="edit_harga">Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="number" class="form-control" id="edit_harga" name="harga" required
                                    min="0">
                            </div>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('header')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .table th,
        .table td {
            vertical-align: middle;
        }
    </style>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            var table = $('#tindakanTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('tindakan.data') }}",
                    type: 'GET',
                    error: function(xhr, error, thrown) {},
                    dataSrc: function(json) {
                        if (!json.data) {
                            console.error('No data property in response');
                            return [];
                        }
                        return json.data;
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'kode',
                        name: 'kode'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    // {
                    //     data: 'harga_formatted',
                    //     name: 'harga'
                    // },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                order: [
                    [1, 'asc']
                ],
                language: {
                    "emptyTable": "Tidak ada data yang tersedia pada tabel ini",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                    "infoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                    "lengthMenu": "Tampilkan _MENU_ entri",
                    "loadingRecords": "Sedang memuat...",
                    "processing": "Sedang memproses...",
                    "search": "Cari:",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    }
                }
            });

            $('#addTindakanForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('tindakan.store') }}",
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#addTindakanModal').modal('hide');
                        table.ajax.reload();
                        Swal.fire('Sukses', response.message, 'success');
                    },
                    error: function(xhr) {
                        console.error('Add error:', xhr);
                        Swal.fire('Error', xhr.responseJSON.message, 'error');
                    }
                });
            });

            $('#tindakanTable').on('click', '.edit-tindakan', function() {
                var id = $(this).data('id');
                $.get("{{ url('tindakan') }}/" + id + "/edit", function(data) {
                    $('#edit_id').val(data.id);
                    $('#edit_kode').val(data.kode);
                    $('#edit_nama').val(data.nama);
                    // $('#edit_harga').val(data.harga);
                    $('#editTindakanModal').modal('show');
                }).fail(function(xhr) {
                    console.error('Edit data fetch error:', xhr);
                    Swal.fire('Error', 'Gagal mengambil data untuk edit', 'error');
                });
            });

            $('#editTindakanForm').on('submit', function(e) {
                e.preventDefault();
                var id = $('#edit_id').val();
                $.ajax({
                    url: "{{ url('tindakan') }}/" + id,
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#editTindakanModal').modal('hide');
                        table.ajax.reload();
                        Swal.fire('Sukses', response.message, 'success');
                    },
                    error: function(xhr) {
                        console.error('Edit error:', xhr);
                        Swal.fire('Error', xhr.responseJSON.message, 'error');
                    }
                });
            });

            $('#tindakanTable').on('click', '.delete-tindakan', function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Pilihan Edukasi ini akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('tindakan') }}/" + id,
                            method: 'DELETE',
                            success: function(response) {
                                table.ajax.reload();
                                Swal.fire('Terhapus!', response.message, 'success');
                            },
                            error: function(xhr) {
                                console.error('Delete error:', xhr);
                                Swal.fire('Error', xhr.responseJSON.message, 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
