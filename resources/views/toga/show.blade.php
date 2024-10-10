@extends('layout.apps')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <link rel="stylesheet" href="{{ asset('css/toga-show.css') }}">
@endsection

@section('content')
    <div class="container-fluid toga-show">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        @if (isset($toga))
                            <div class="toga-content">
                                <div class="toga-media">
                                    @if ($toga->foto)
                                        <a href="{{ asset('storage/' . $toga->foto) }}" data-lightbox="toga-image"
                                            data-title="{{ $toga->judul }}">
                                            <img src="{{ asset('storage/' . $toga->foto) }}" alt="{{ $toga->judul }}"
                                                class="img-fluid">
                                        </a>
                                    @else
                                        <div class="no-image">
                                            <i class="fa fa-leaf fa-5x"></i>
                                            <p>Tidak ada foto</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="toga-details">
                                    <h2 class="toga-title">{{ $toga->judul }}</h2>
                                    <div class="toga-meta">
                                        <span class="toga-type">Tanaman Obat Keluarga</span>
                                    </div>
                                    <p class="toga-description">{{ $toga->deskripsi }}</p>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-danger">
                                Data toga tidak ditemukan.
                            </div>
                        @endif
                    </div>
                    @if (isset($toga))
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="created-date">
                                    <p class="date">{{ $toga->created_at->format('d M Y') }}</p>
                                </div>
                                @if (auth()->user()->role_display() == 'Admin')
                                    <div class="action-buttons">
                                        <button type="button" class="btn btn-warning edit-btn" data-toggle="modal"
                                            data-target="#editTogaModal">Edit</button>
                                        <form action="{{ route('toga.destroy', $toga->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger delete"
                                                data-name="{{ $toga->judul }}">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for editing toga -->
    <div class="modal fade" id="editTogaModal" tabindex="-1" role="dialog" aria-labelledby="editTogaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary text-white">
                    <h5 class="modal-title" id="editTogaModalLabel">Edit Toga</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editTogaForm" method="POST" enctype="multipart/form-data"
                    action="{{ route('toga.update', $toga->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_judul">Judul</label>
                            <input type="text" class="form-control" id="edit_judul" name="judul" required
                                value="{{ $toga->judul }}">
                        </div>
                        <div class="form-group">
                            <label for="edit_deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3" required>{{ $toga->deskripsi }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_foto">Upload Foto Baru (Opsional)</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="edit_foto" name="foto"
                                    accept="image/*">
                                <label class="custom-file-label" for="edit_foto">Pilih file</label>
                            </div>
                        </div>
                        <div id="current_foto_preview" class="mt-2">
                            @if ($toga->foto)
                                <img src="{{ asset('storage/' . $toga->foto) }}" alt="Current foto" class="img-fluid mt-2">
                            @else
                                <p>No current photo</p>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="updateBtn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('header')
    <style>
        .toga-show .card {
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .toga-content {
            display: flex;
            gap: 20px;
        }

        .toga-media {
            flex: 1;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }

        .toga-media img {
            width: 100%;
            height: auto;
            max-height: 400px;
            object-fit: contain;
            cursor: pointer;
        }

        .toga-details {
            flex: 1;
            padding: 20px;
        }

        .toga-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .toga-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .toga-type {
            background-color: #f0f0f0;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 14px;
        }

        .toga-description {
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .no-image {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }

        .no-image i {
            margin-bottom: 10px;
            color: #6c757d;
        }

        .card-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }

        .created-date .date {
            font-size: 18px;
            font-weight: bold;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            border-radius: 20px;
            padding: 8px 20px;
        }

        @media (max-width: 768px) {
            .toga-content {
                flex-direction: column;
            }

            .toga-media,
            .toga-details {
                flex: none;
                width: 100%;
            }
        }
    </style>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.delete').on('click', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                var name = $(this).data('name');

                Swal.fire({
                    title: 'Ingin Menghapus?',
                    text: "Kamu akan menghapus data " + name + "!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            $('#editTogaForm').submit(function(e) {
                e.preventDefault();
                if (validateForm($(this))) {
                    showLoadingState($('#updateBtn'));
                    this.submit();
                }
            });

            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });

            function validateForm(form) {
                let isValid = true;
                form.find('.is-invalid').removeClass('is-invalid');
                form.find('.invalid-feedback').remove();

                form.find('input[required], textarea[required]').each(function() {
                    if ($(this).val().trim() === '') {
                        showFieldError($(this), 'Field ini wajib diisi.');
                        isValid = false;
                    }
                });

                return isValid;
            }

            function showFieldError(field, message) {
                field.addClass('is-invalid');
                field.after(`<div class="invalid-feedback">${message}</div>`);
            }

            function showLoadingState(button) {
                button.html(
                        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...'
                        )
                    .prop('disabled', true);
            }

            $('#edit_foto').change(function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#current_foto_preview').html(
                            `<img src="${e.target.result}" class="img-fluid mt-2" alt="Preview">`);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
