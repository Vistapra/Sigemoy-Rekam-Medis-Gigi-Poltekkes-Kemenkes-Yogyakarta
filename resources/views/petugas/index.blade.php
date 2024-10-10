    @extends('layout.apps')
    @section('content')
        <div class="mr-auto">
            <h2 class="text-black font-w600">Kader Kesehatan</h2>
        </div>

        <!-- Add -->
        <div class="modal fade" id="addOrderModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Petugas Baru</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ Route('petugas.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label class="text-black font-w500">Nama*</label>
                                <input type="text" name="name" required class="form-control">
                                @error('name')
                                    <div class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-black font-w500">No HP*</label>
                                <input type="text" name="phone" required class="form-control">
                                @error('phone')
                                    <div class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="text-black font-w500">Email(Login)*</label>
                                <input type="email" name="email" required class="form-control">
                                @error('email')
                                    <div class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="text-black font-w500">Password Login*</label>
                                <input type="password" name="password" required class="form-control" minlength="9">
                                <small class="text-muted">Password harus minimal 9 karakter, mengandung huruf besar, huruf
                                    kecil, angka, dan karakter khusus.</small>
                                @error('password')
                                    <div class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <input type="hidden" name="role" value="2">
                            @error('role')
                                <div class="invalid-feedback animated fadeInUp" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">BUAT</button>
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
                                data-target="#addOrderModal">+Tambah Petugas</a>
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No. HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $key => $row)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->phone }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="javascript:void(0)" data-toggle="modal"
                                                        data-target="#key{{ $row->id }}"
                                                        class="btn btn-warning shadow btn-xs sharp mr-1"><i
                                                            class="fa fa-key"></i></a>

                                                    <a href="javascript:void(0)" data-toggle="modal"
                                                        data-target="#edit{{ $row->id }}"
                                                        class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                            class="flaticon-381-edit"></i></a>

                                                    <!-- Form Delete -->
                                                    <form id="delete-form-{{ $row->id }}"
                                                        action="{{ Route('petugas.delete', $row->id) }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-danger shadow btn-xs sharp delete"
                                                        data-id="{{ $row->id }}" data-name="{{ $row->name }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>

                                                    <!-- Ganti Password Modal -->
                                                    <div class="modal fade" id="key{{ $row->id }}">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Ganti Password</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal"><span>&times;</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ Route('gantipassword', $row->id) }}"
                                                                        method="POST">
                                                                        @csrf

                                                                        <div class="form-group">
                                                                            <label class="text-black font-w500">Password
                                                                                Baru*</label>
                                                                            <input type="password" name="password"
                                                                                required class="form-control"
                                                                                minlength="9">
                                                                            <small class="text-muted">Password harus
                                                                                minimal 9 karakter, mengandung huruf besar,
                                                                                huruf kecil, angka, dan karakter
                                                                                khusus.</small>
                                                                            @error('password')
                                                                                <div class="invalid-feedback animated fadeInUp"
                                                                                    style="display: block;">
                                                                                    {{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="text-black font-w500">Password
                                                                                Konfirmasi*</label>
                                                                            <input type="password" name="password_konfirm"
                                                                                required class="form-control">
                                                                            @error('password_konfirm')
                                                                                <div class="invalid-feedback animated fadeInUp"
                                                                                    style="display: block;">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">GANTI
                                                                                PASSWORD</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Edit Modal -->
                                                    <div class="modal fade" id="edit{{ $row->id }}">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit Petugas</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal"><span>&times;</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ Route('petugas.update', $row->id) }}"
                                                                        method="POST">
                                                                        @csrf

                                                                        <div class="form-group">
                                                                            <label
                                                                                class="text-black font-w500">Nama*</label>
                                                                            <input type="text" name="name"
                                                                                value="{{ $row->name }}" required
                                                                                class="form-control">
                                                                            @error('name')
                                                                                <div class="invalid-feedback animated fadeInUp"
                                                                                    style="display: block;">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="text-black font-w500">No HP
                                                                                (Login)
                                                                                *</label>
                                                                            <input type="text" name="phone" required
                                                                                class="form-control"
                                                                                value="{{ $row->phone }}">
                                                                            @error('phone')
                                                                                <div class="invalid-feedback animated fadeInUp"
                                                                                    style="display: block;">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label
                                                                                class="text-black font-w500">Email</label>
                                                                            <input type="email" name="email" required
                                                                                class="form-control"
                                                                                value="{{ $row->email }}">
                                                                            @error('email')
                                                                                <div class="invalid-feedback animated fadeInUp"
                                                                                    style="display: block;">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>

                                                                        <input type="hidden" name="role"
                                                                            value="2">
                                                                        @error('role')
                                                                            <div class="invalid-feedback animated fadeInUp"
                                                                                style="display: block;">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror

                                                                        <div class="form-group">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">UPDATE</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
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
            $().ready(function() {
                $(".delete").click(function() {
                    var id = $(this).data('id');
                    var name = $(this).data('name');
                    var form = $('#delete-form-' + id);

                    Swal.fire({
                        title: 'Ingin Menghapus?',
                        text: "Yakin ingin menghapus data  : " + name + " ini ?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, hapus !'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        </script>
    @endsection
