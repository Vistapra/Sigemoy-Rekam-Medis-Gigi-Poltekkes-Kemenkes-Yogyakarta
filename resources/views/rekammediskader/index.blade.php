@extends('layout.apps')

@section('content')
    <div class="mr-auto">
        <h2 class="text-black font-w600">Nama Kondisi Gigi</h2>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addKondisiGigiModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kondisi Gigi Baru</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('rekammediskader.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="text-black font-w500">Nama Kondisi*</label>
                            <input type="text" name="nama_kondisi" required class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group col-lg-6" style="float: left">
                        <a href="javascript:void(0)" class="btn btn-primary mr-3" data-toggle="modal"
                            data-target="#addKondisiGigiModal">+Tambah Kondisi Gigi</a>
                    </div>
                    <div class="form-group col-lg-6" style="float: right">
                        <form method="get" action="{{ url()->current() }}">
                            <div class="input-group">
                                <input type="text" class="form-control gp-search" name="keyword"
                                    value="{{ request('keyword') }}" placeholder="Cari" autocomplete="off">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default no-border btn-sm gp-search">
                                        <i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kondisi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($namaKondisiGigi as $key => $kondisi)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $kondisi->nama_kondisi }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#editKondisiGigi{{ $kondisi->id }}"
                                                    class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="flaticon-381-edit"></i></a>
                                                <button type="button"
                                                    class="btn btn-danger shadow btn-xs sharp delete-kondisi"
                                                    data-id="{{ $kondisi->id }}" data-name="{{ $kondisi->nama_kondisi }}">
                                                    <i class="flaticon-381-trash"></i>
                                                </button>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editKondisiGigi{{ $kondisi->id }}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Kondisi Gigi</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal"><span>&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('rekammediskader.update', $kondisi->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label class="text-black font-w500">Nama Kondisi*</label>
                                                            <input type="text" name="nama_kondisi"
                                                                value="{{ $kondisi->nama_kondisi }}" required
                                                                class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary">UPDATE</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Belum Ada Data Kondisi Gigi</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Handle delete confirmation
            $('.delete-kondisi').click(function() {
                var id = $(this).data('id');
                var name = $(this).data('name');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan menghapus kondisi gigi: " + name,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('rekammediskader.destroy', '') }}/" + id,
                            type: 'DELETE',
                            success: function(response) {
                                Swal.fire(
                                    'Terhapus!',
                                    'Kondisi gigi telah dihapus.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    'Error!',
                                    'Terjadi kesalahan saat menghapus data.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });

            // Display success message
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                });
            @endif

            // Display error message
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ session('error') }}',
                });
            @endif
        });
    </script>
@endsection
