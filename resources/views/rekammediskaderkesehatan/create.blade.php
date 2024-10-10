@extends('layout.apps')

@section('content')
    <div class="card shadow-lg rounded-lg border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="card-title mb-0 text-white">Tambah Rekam Medis Kader Kesehatan</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('rekammediskaderkesehatan.store') }}" method="POST" id="rekamKaderForm"
                class="needs-validation" novalidate>
                @csrf

                <div class="row g-4 mb-4">
                    <div class="col-12 col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="pasienNama" value="{{ $pasien->nama }}" readonly>
                            <label for="pasienNama"><strong>Pasien</strong></label>
                            <input type="hidden" name="pasien_id" value="{{ $pasien->id }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="petugasNama" value="{{ Auth::user()->name }}"
                                readonly>
                            <label for="petugasNama"><strong>Petugas Kesehatan</strong></label>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mt-4">
                    <div class="card-header bg-light">
                        <h5 class="card-subtitle mb-0">Kondisi Gigi</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="kondisiGigiTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>Kondisi Gigi</th>
                                        <th>Total</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select name="kondisi_gigi[]" class="form-select" required>
                                                <option value="">Pilih Kondisi Gigi</option>
                                                @foreach ($kondisiGigi as $kg)
                                                    <option value="{{ $kg->id }}">{{ $kg->nama_kondisi }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Pilih kondisi gigi.
                                            </div>
                                        </td>
                                        <td>
                                            <input type="number" name="total[]" class="form-control" required
                                                min="1">
                                            <div class="invalid-feedback">
                                                Masukkan jumlah yang valid.
                                            </div>
                                        </td>
                                        <td>
                                            <textarea name="keterangan[]" class="form-control" rows="2"></textarea>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-outline-danger btn-sm removeRow">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="button" class="btn btn-outline-success btn-sm mt-3" id="addRow">
                            <i class="fas fa-plus"></i> Tambah Kondisi Gigi
                        </button>
                    </div>
                </div>

                <div class="mt-4 d-flex flex-column flex-md-row gap-3 justify-content-md-end">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save me-2"></i> Simpan
                    </button>
                    <a href="{{ route('rekammediskaderkesehatan.index') }}" class="btn btn-outline-secondary btn-lg">
                        <i class="fas fa-times me-2"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('header')
    <style>
        .form-floating>.form-control:focus~label,
        .form-floating>.form-control:not(:placeholder-shown)~label,
        .form-floating>.form-select~label {
            opacity: .65;
            transform: scale(.85) translateY(-.5rem) translateX(.15rem);
        }

        .table th {
            background-color: #f8f9fa;
        }

        .btn-outline-danger:hover,
        .btn-outline-success:hover {
            color: #fff;
        }

        .card {
            transition: all 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        }

        @media (max-width: 767px) {
            .btn {
                width: 100%;
                margin-bottom: 0.5rem;
            }
        }
    </style>
@endsection

@section('script')
    <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Add new row with animation
            $("#addRow").click(function() {
                var newRow = $("#kondisiGigiTable tbody tr:first").clone();
                newRow.find('input, select, textarea').val('');
                newRow.find('.is-invalid').removeClass('is-invalid');
                newRow.css('display', 'none');
                $("#kondisiGigiTable tbody").append(newRow);
                newRow.slideDown(300);

                Swal.fire({
                    icon: 'success',
                    title: 'Baris baru ditambahkan',
                    showConfirmButton: false,
                    timer: 1000,
                    position: 'top-end',
                    toast: true
                });
            });

            // Remove row with animation
            $(document).on('click', '.removeRow', function() {
                var row = $(this).closest('tr');
                if ($("#kondisiGigiTable tbody tr").length > 1) {
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Baris ini akan dihapus!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            row.slideUp(300, function() {
                                $(this).remove();
                            });
                            Swal.fire({
                                icon: 'success',
                                title: 'Baris telah dihapus',
                                showConfirmButton: false,
                                timer: 1000,
                                position: 'top-end',
                                toast: true
                            });
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Perhatian',
                        text: 'Minimal satu kondisi gigi harus diisi.',
                    });
                }
            });

            // Form validation
            (function() {
                'use strict'
                var forms = document.querySelectorAll('.needs-validation')
                Array.prototype.slice.call(forms)
                    .forEach(function(form) {
                        form.addEventListener('submit', function(event) {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }
                            form.classList.add('was-validated')
                        }, false)
                    })
            })()

            // Form submission with loading animation
            $("#rekamKaderForm").submit(function(e) {
                e.preventDefault();
                if (this.checkValidity()) {
                    Swal.fire({
                        title: 'Menyimpan Data',
                        html: 'Mohon tunggu...',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        willOpen: () => {
                            Swal.showLoading()
                        },
                    });

                    $.ajax({
                        url: $(this).attr('action'),
                        method: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Data berhasil disimpan',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.href =
                                    "{{ route('opsiview.opsiedukasi') }}";
                            });
                        },
                        error: function(xhr) {
                            Swal.fire('Error', xhr.responseJSON.message || 'Terjadi kesalahan',
                                'error');
                        }
                    });
                }
            });
        });
    </script>
@endsection
