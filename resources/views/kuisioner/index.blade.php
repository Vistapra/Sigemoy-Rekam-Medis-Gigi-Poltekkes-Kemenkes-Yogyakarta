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
                                        onclick="showModal('editKategoriModal', {id: {{ $k->id }}, nama_kategori: '{{ addslashes($k->nama_kategori) }}'})"
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
                                                    <th style="width: 45%;">Pertanyaan</th>
                                                    <th style="width: 10%;">Jenis Jawaban</th>
                                                    <th style="width: 45%;">Opsi Jawaban</th>
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
                                                                        onclick="showModal('editPertanyaanModal', {id: {{ $p->id }}, teks_pertanyaan: '{{ addslashes($p->teks_pertanyaan) }}', jenis_jawaban: '{{ $p->jenis_jawaban }}'})"
                                                                        class="btn btn-sm btn-warning">Edit</button>
                                                                    <button class="btn btn-sm btn-danger"
                                                                        onclick="confirmDelete('pertanyaan', {{ $p->id }})">Hapus</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @if($p->jenis_jawaban == 'single_choice')
                                                                <span class="badge badge-primary">Pilih Satu</span>
                                                            @else
                                                                <span class="badge badge-success">Pilih Banyak</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @forelse($p->opsiJawaban as $o)
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center mb-1">
                                                                    <span>{{ $loop->iteration }}.
                                                                        {{ $o->teks_opsi }}</span>
                                                                    <div>
                                                                        <button
                                                                            onclick="showModal('editOpsiJawabanModal', {id: {{ $o->id }}, teks_opsi: '{{ addslashes($o->teks_opsi) }}'})"
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
                                                        <td colspan="3" class="text-center">Tidak ada pertanyaan untuk
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
                        <div class="form-group">
                            <label for="jenis_jawaban">Jenis Jawaban</label>
                            <select class="form-control" id="jenis_jawaban" name="jenis_jawaban" required>
                                <option value="">Pilih Jenis Jawaban</option>
                                <option value="single_choice">Pilihan Tunggal (Radio Button)</option>
                                <option value="multiple_choice">Pilihan Ganda (Checkbox)</option>
                            </select>
                            <small class="form-text text-muted">
                                Pilihan Tunggal: Responden hanya bisa memilih satu jawaban<br>
                                Pilihan Ganda: Responden bisa memilih lebih dari satu jawaban
                            </small>
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
                        <div class="form-group">
                            <label for="edit_jenis_jawaban">Jenis Jawaban</label>
                            <select class="form-control" id="edit_jenis_jawaban" name="jenis_jawaban" required>
                                <option value="single_choice">Pilihan Tunggal (Radio Button)</option>
                                <option value="multiple_choice">Pilihan Ganda (Checkbox)</option>
                            </select>
                            <small class="form-text text-muted">
                                Pilihan Tunggal: Responden hanya bisa memilih satu jawaban<br>
                                Pilihan Ganda: Responden bisa memilih lebih dari satu jawaban
                            </small>
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
    <script>
        // Global variable to track ongoing submissions
        let submissionInProgress = false;

        function showModal(modalId, data = {}) {
            const modal = $('#' + modalId);
            
            // Reset all form buttons and forms
            modal.find('form')[0].reset();
            modal.find('button[type="submit"]').prop('disabled', false);
            
            if (modalId === 'createKategoriModal') {
                modal.find('#nama_kategori').val('');
                modal.find('button[type="submit"]').text('Simpan');
            } else if (modalId === 'editKategoriModal') {
                modal.find('#editKategoriForm').attr('action', '/kuisioner/kategori/update/' + data.id);
                modal.find('#edit_nama_kategori').val(data.nama_kategori);
                modal.find('button[type="submit"]').text('Update Kategori');
            } else if (modalId === 'createPertanyaanModal') {
                modal.find('#createPertanyaanForm').attr('action', '/kuisioner/' + data.kategori_id + '/store-pertanyaan');
                modal.find('#create_kategori_id').val(data.kategori_id);
                modal.find('#teks_pertanyaan').val('');
                modal.find('#jenis_jawaban').val('');
                modal.find('button[type="submit"]').text('Simpan');
            } else if (modalId === 'editPertanyaanModal') {
                modal.find('#editPertanyaanForm').attr('action', '/kuisioner/pertanyaan/update/' + data.id);
                modal.find('#edit_teks_pertanyaan').val(data.teks_pertanyaan);
                modal.find('#edit_jenis_jawaban').val(data.jenis_jawaban);
                modal.find('button[type="submit"]').text('Update Pertanyaan');
            } else if (modalId === 'createOpsiJawabanModal') {
                modal.find('#createOpsiJawabanForm').attr('action', '/kuisioner/' + data.pertanyaan_id + '/store-opsi-jawaban');
                modal.find('#create_pertanyaan_id').val(data.pertanyaan_id);
                modal.find('#teks_opsi').val('');
                modal.find('button[type="submit"]').text('Simpan');
            } else if (modalId === 'editOpsiJawabanModal') {
                modal.find('#editOpsiJawabanForm').attr('action', '/kuisioner/opsi-jawaban/update/' + data.id);
                modal.find('#edit_teks_opsi').val(data.teks_opsi);
                modal.find('button[type="submit"]').text('Update Opsi Jawaban');
            }
            
            modal.modal('show');
        }

        function confirmDelete(type, id) {
            if (submissionInProgress) {
                return;
            }

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    submissionInProgress = true;
                    
                    let url = '';
                    if (type === 'kategori') {
                        url = '/kuisioner/kategori/delete/' + id;
                    } else if (type === 'pertanyaan') {
                        url = '/kuisioner/pertanyaan/delete/' + id;
                    } else if (type === 'opsi-jawaban') {
                        url = '/kuisioner/opsi-jawaban/delete/' + id;
                    }
                    
                    $.ajax({
                        url: url,
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire('Berhasil!', response.message, 'success').then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            let message = 'Terjadi kesalahan saat menghapus data.';
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                message = xhr.responseJSON.message;
                            }
                            Swal.fire('Error!', message, 'error');
                        },
                        complete: function() {
                            submissionInProgress = false;
                        }
                    });
                }
            });
        }

        function handleFormSubmission(form) {
            if (submissionInProgress) {
                return false;
            }

            const submitButton = form.find('button[type="submit"]');
            const originalText = submitButton.text();
            
            // Disable button and change text
            submitButton.prop('disabled', true).text('Memproses...');
            submissionInProgress = true;
            
            const formData = form.serialize();
            const action = form.attr('action');
            const method = form.find('input[name="_method"]').val() || 'POST';
            
            $.ajax({
                url: action,
                method: method,
                data: formData,
                success: function(response) {
                    Swal.fire('Berhasil!', response.message, 'success').then(() => {
                        $('.modal').modal('hide');
                        location.reload();
                    });
                },
                error: function(xhr) {
                    let message = 'Terjadi kesalahan.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        message = xhr.responseJSON.message;
                    }
                    Swal.fire('Error!', message, 'error');
                },
                complete: function() {
                    // Re-enable button and restore text
                    submitButton.prop('disabled', false).text(originalText);
                    submissionInProgress = false;
                }
            });
            
            return false;
        }

        $(document).ready(function() {
            // Remove all existing event handlers to prevent duplicates
            $(document).off('submit', 'form');
            
            // Reset forms and submission state when modals are hidden
            $('.modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
                $(this).find('button[type="submit"]').prop('disabled', false);
                submissionInProgress = false;
            });

            // Specific form submission handlers with one-time binding
            $('#createKategoriForm').off('submit').on('submit', function(e) {
                e.preventDefault();
                e.stopPropagation();
                return handleFormSubmission($(this));
            });

            $('#editKategoriForm').off('submit').on('submit', function(e) {
                e.preventDefault();
                e.stopPropagation();
                return handleFormSubmission($(this));
            });

            $('#createPertanyaanForm').off('submit').on('submit', function(e) {
                e.preventDefault();
                e.stopPropagation();
                return handleFormSubmission($(this));
            });

            $('#editPertanyaanForm').off('submit').on('submit', function(e) {
                e.preventDefault();
                e.stopPropagation();
                return handleFormSubmission($(this));
            });

            $('#createOpsiJawabanForm').off('submit').on('submit', function(e) {
                e.preventDefault();
                e.stopPropagation();
                return handleFormSubmission($(this));
            });

            $('#editOpsiJawabanForm').off('submit').on('submit', function(e) {
                e.preventDefault();
                e.stopPropagation();
                return handleFormSubmission($(this));
            });
        });
    </script>
@endsection