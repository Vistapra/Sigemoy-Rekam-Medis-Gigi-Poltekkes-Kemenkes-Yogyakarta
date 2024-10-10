@extends('layout.apps')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <div class="form-group col-lg-6" style="float: left">
                            <a class="btn btn-primary mr-3">Rekam Medis Kader Kesehatan</a>
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
                    </ul>

                    <div class="table-responsive card-table">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Pasien</th>
                                    <th>Dokter</th>
                                    <th>Kondisi Gigi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rekamMedisKader as $key => $row)
                                    <tr>
                                        <td align="center">{{ $rekamMedisKader->firstItem() + $key }}</td>
                                        <td>{{ $row->created_at->format('Y-m-d') }}</td>
                                        <td><a
                                                href="{{ route('rekammediskaderkesehatan.show', $row->id) }}">{{ $row->pasien->nama }}</a>
                                        </td>
                                        <td>{{ $row->user->name }}</td>
                                        <td>{{ $row->namaKondisiGigi->nama_kondisi }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('rekammediskaderkesehatan.show', $row->id) }}"
                                                    class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-eye"></i></a>
                                                <a href="{{ route('rekammediskaderkesehatan.edit', $row->id) }}"
                                                    class="btn btn-info shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="javascript:void(0);"
                                                    class="btn btn-danger shadow btn-xs sharp delete"
                                                    data-id="{{ $row->id }}" data-name="{{ $row->pasien->nama }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <form id="delete-form-{{ $row->id }}"
                                                    action="{{ route('rekammediskaderkesehatan.destroy', $row->id) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $rekamMedisKader->appends(request()->except('page'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const id = this.getAttribute('data-id');
                    const name = this.getAttribute('data-name');

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: `Anda akan menghapus rekam medis untuk ${name}`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById(`delete-form-${id}`).submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
