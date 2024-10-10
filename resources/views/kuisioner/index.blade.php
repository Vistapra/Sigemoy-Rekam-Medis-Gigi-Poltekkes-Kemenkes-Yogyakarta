@extends('layout.apps')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h2 class="text-black font-w600">Manajemen Kuisioner</h2>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <button onclick="showModal('createKategoriModal')" class="btn btn-primary">Tambah Kategori Baru</button>
            </div>
        </div>

        <div id="kuisionerTables">
            @forelse($kategori as $k)
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Kategori: {{ $k->nama_kategori }}</h4>
                                <div>
                                    <button onclick="$('#pertanyaan-{{ $k->id }}').collapse('toggle')"
                                        class="btn btn-info">Lihat Pertanyaan</button>
                                    <button
                                        onclick="showModal('editKategoriModal', {id: {{ $k->id }}, nama_kategori: '{{ $k->nama_kategori }}'})"
                                        class="btn btn-warning">Edit Kategori</button>
                                    <button class="btn btn-danger"
                                        onclick="confirmDelete('kategori', {{ $k->id }})">Hapus Kategori</button>
                                </div>
                            </div>
                            <div id="pertanyaan-{{ $k->id }}" class="collapse">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 50%;">Pertanyaan</th>
                                                    <th style="width: 50%;">Opsi Jawaban</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($k->pertanyaan as $index => $p)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <span>{{ $index + 1 }}. {{ $p->teks_pertanyaan }}</span>
                                                                <div>
                                                                    <button
                                                                        onclick="showModal('editPertanyaanModal', {id: {{ $p->id }}, teks_pertanyaan: '{{ $p->teks_pertanyaan }}'})"
                                                                        class="btn btn-sm btn-warning">Edit</button>
                                                                    <button class="btn btn-sm btn-danger"
                                                                        onclick="confirmDelete('pertanyaan', {{ $p->id }})">Hapus</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @forelse($p->opsiJawaban as $o)
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center mb-1">
                                                                    <span>{{ $loop->iteration }}.
                                                                        {{ $o->teks_opsi }}</span>
                                                                    <div>
                                                                        <button
                                                                            onclick="showModal('editOpsiJawabanModal', {id: {{ $o->id }}, teks_opsi: '{{ $o->teks_opsi }}'})"
                                                                            class="btn btn-sm btn-warning">Edit</button>
                                                                        <button class="btn btn-sm btn-danger"
                                                                            onclick="confirmDelete('opsi-jawaban', {{ $o->id }})">Hapus</button>
                                                                    </div>
                                                                </div>
                                                            @empty
                                                                <span class="text-muted">Tidak ada opsi jawaban</span>
                                                            @endforelse
                                                            <button
                                                                onclick="showModal('createOpsiJawabanModal', {pertanyaan_id: {{ $p->id }}})"
                                                                class="btn btn-sm btn-info mt-2">Tambah Opsi</button>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="2" class="text-center">Tidak ada pertanyaan untuk
                                                            kategori ini</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-3">
                                        <button
                                            onclick="showModal('createPertanyaanModal', {kategori_id: {{ $k->id }}})"
                                            class="btn btn-primary">Tambah Pertanyaan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="alert alert-info">
                            Belum Ada Survey Yang Tersedia.
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Modal untuk Tambah Kategori -->
    <div class="modal fade" id="createKategoriModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buat Kategori Pertanyaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="createKategoriForm" action="{{ route('kuisioner.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Edit Kategori -->
    <div class="modal fade" id="editKategoriModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editKategoriForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="edit_nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="edit_nama_kategori" name="nama_kategori"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Kategori</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Tambah Pertanyaan -->
    <div class="modal fade" id="createPertanyaanModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buat Pertanyaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="createPertanyaanForm" method="POST">
                        @csrf
                        <input type="hidden" name="kategori_id" id="create_kategori_id">
                        <div class="form-group">
                            <label for="teks_pertanyaan">Teks Pertanyaan</label>
                            <textarea class="form-control" id="teks_pertanyaan" name="teks_pertanyaan" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Edit Pertanyaan -->
    <div class="modal fade" id="editPertanyaanModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Pertanyaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editPertanyaanForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="edit_teks_pertanyaan">Teks Pertanyaan</label>
                            <textarea class="form-control" id="edit_teks_pertanyaan" name="teks_pertanyaan" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Pertanyaan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Tambah Opsi Jawaban -->
    <div class="modal fade" id="createOpsiJawabanModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buat Opsi Jawaban</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="createOpsiJawabanForm" method="POST">
                        @csrf
                        <input type="hidden" name="pertanyaan_id" id="create_pertanyaan_id">
                        <div class="form-group">
                            <label for="teks_opsi">Teks Opsi</label>
                            <input type="text" class="form-control" id="teks_opsi" name="teks_opsi" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Edit Opsi Jawaban -->
    <div class="modal fade" id="editOpsiJawabanModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Opsi Jawaban</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editOpsiJawabanForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="edit_teks_opsi">Teks Opsi Jawaban</label>
                            <input type="text" class="form-control" id="edit_teks_opsi" name="teks_opsi" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Opsi Jawaban</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
