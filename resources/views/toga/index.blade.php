@extends('layout.apps')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-gradient-primary py-3 d-flex justify-content-between align-items-center">
                        <h2 class="text-primary m-0 font-weight-bold">Toga</h2>
                        @if (auth()->user()->role_display() == 'Admin')
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTogaModal">
                                <i class="fas fa-plus-circle mr-2"></i>Tambah Toga
                            </button>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <form method="GET" action="{{ route('toga.index') }}" class="search-form">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search"
                                        value="{{ request('search') }}"
                                        placeholder="Cari berdasarkan judul atau deskripsi...">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @if (request('search'))
                            <div class="alert alert-info">
                                Menampilkan hasil pencarian untuk: <strong>{{ request('search') }}</strong>
                                <a href="{{ route('toga.index') }}" class="float-right">Reset</a>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="row" id="togaContent">
                            @forelse ($toga as $item)
                                <div class="col-md-4 col-lg-3 mb-4">
                                    <div class="card h-100 toga-card">
                                        <div class="toga-media">
                                            <a href="{{ route('toga.show', $item->id) }}" class="d-block h-100">
                                                @if ($item->foto)
                                                    <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->judul }}"
                                                        class="card-img-top lazy"
                                                        data-src="{{ Storage::url($item->foto) }}">
                                                @else
                                                    <div class="no-image-placeholder">
                                                        <i class="fas fa-image fa-3x"></i>
                                                        <p>Tidak ada foto</p>
                                                    </div>
                                                @endif
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ route('toga.show', $item->id) }}" class="text-decoration-none">
                                                <h5 class="text-primary card-title">{{ Str::limit($item->judul, 30) }}</h5>
                                            </a>
                                            <p class="card-text">{{ Str::limit($item->deskripsi, 50) }}</p>
                                        </div>
                                        @if (auth()->user()->role_display() == 'Admin')
                                            <div
                                                class="card-footer bg-transparent d-flex justify-content-between align-items-center">
                                                <div>
                                                    <button type="button" class="btn btn-sm btn-outline-primary edit-btn"
                                                        data-id="{{ $item->id }}" data-judul="{{ $item->judul }}"
                                                        data-deskripsi="{{ $item->deskripsi }}"
                                                        data-foto="{{ $item->foto ? Storage::url($item->foto) : '' }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <form action="{{ route('toga.destroy', $item->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-outline-danger delete-btn"
                                                            data-name="{{ $item->judul }}">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="alert alert-info">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        @if (request('search'))
                                            Tidak ada hasil yang ditemukan untuk pencarian "{{ request('search') }}".
                                        @else
                                            Belum ada konten toga.
                                        @endif
                                    </div>
                                </div>
                            @endforelse
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            {{ $toga->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for adding new toga -->
    <div class="modal fade" id="addTogaModal" tabindex="-1" role="dialog" aria-labelledby="addTogaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary text-white">
                    <h5 class="modal-title" id="addTogaModalLabel">Tambah Toga</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('toga.store') }}" method="POST" enctype="multipart/form-data" id="addTogaForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="foto">Upload Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto"
                                    accept="image/*">
                                <label class="custom-file-label" for="foto">Pilih file</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="submitBtn">Simpan</button>
                    </div>
                </form>
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
                <form id="editTogaForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_judul">Judul</label>
                            <input type="text" class="form-control" id="edit_judul" name="judul" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_foto">Upload Foto Baru (Opsional)</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="edit_foto" name="foto"
                                    accept="image/*">
                                <label class="custom-file-label" for="edit_foto">Pilih file</label>
                            </div>
                        </div>
                        <div id="current_foto_preview" class="mt-2"></div>
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

@section('style')
    <style>
        .card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            border-bottom: none;
            padding: 1.5rem;
        }

        .toga-media {
            height: 200px;
            overflow: hidden;
            position: relative;
            background-color: #f8f9fa;
            border-radius: 15px 15px 0 0;
        }

        .toga-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .toga-card:hover .toga-media img {
            transform: scale(1.05);
        }

        .no-image-placeholder {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            color: #6c757d;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .card-text {
            font-size: 0.9rem;
            color: #666;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            border-radius: 0.2rem;
            transition: all 0.2s ease;
        }

        .btn-sm:hover {
            transform: translateY(-2px);
        }

        .search-form .form-control {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .search-form .btn {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
    </style>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('vendor/metismenu/js/metisMenu.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            initializeComponents();
            setupEventListeners();
            displayMessages();
        });

        function initializeComponents() {
            $(".metismenu").metisMenu();
            $('[data-toggle="tooltip"]').tooltip();
            initLazyLoading();
        }

        function setupEventListeners() {
            $('.custom-file-input').on('change', handleFileInputChange);
            $('.delete-btn').click(handleDelete);
            $('#addTogaForm').submit(handleFormSubmit);
            $('.edit-btn').click(handleEdit);
            $('#editTogaForm').submit(handleEditSubmit);
            $('input[type="file"]').change(function() {
                validateFileSize($(this));
            });
            $('#addTogaModal, #editTogaModal').on('show.bs.modal', function(e) {
                animateModal($(this), 'fadeInDown');
            }).on('hide.bs.modal', function(e) {
                animateModal($(this), 'fadeOutUp');
            });
            $('#foto, #edit_foto').change(function(e) {
                previewImage(this);
            });
        }

        function handleFileInputChange(e) {
            const fileName = e.target.files[0].name;
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        }

        function handleDelete(e) {
            e.preventDefault();
            const form = $(this).closest('form');
            const name = $(this).data('name');

            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: `Apakah Anda yakin ingin menghapus toga "${name}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }

        function handleFormSubmit(e) {
            e.preventDefault();
            if (validateForm($(this))) {
                showLoadingState($(this).find('[type="submit"]'));
                this.submit();
            }
        }

        function handleEdit(e) {
            e.preventDefault();
            const togaId = $(this).data('id');
            const toga = {
                id: togaId,
                judul: $(this).data('judul'),
                deskripsi: $(this).data('deskripsi'),
                foto: $(this).data('foto')
            };
            populateEditForm(toga);
            $('#editTogaModal').modal('show');
        }

        function populateEditForm(toga) {
            $('#editTogaForm').attr('action', `/toga/${toga.id}`);
            $('#edit_judul').val(toga.judul);
            $('#edit_deskripsi').val(toga.deskripsi);
            $('#current_foto_preview').html(toga.foto ?
                `<img src="${toga.foto}" alt="Current foto" class="img-fluid mt-2">` : 'No current photo');
        }

        function handleEditSubmit(e) {
            e.preventDefault();
            if (validateForm($(this))) {
                showLoadingState($('#updateBtn'));
                this.submit();
            }
        }

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

        function validateFileSize(fileInput) {
            const fileSize = fileInput[0].files[0]?.size;
            const maxSize = 5 * 1024 * 1024; // 5MB

            if (fileSize && fileSize > maxSize) {
                fileInput.val('');
                fileInput.next('.custom-file-label').html('Pilih file');
                showAlert('error', 'File Terlalu Besar', 'Ukuran file maksimum adalah 5MB.');
            }
        }

        function showLoadingState(button) {
            button.html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...')
                .prop('disabled', true);
        }

        function animateModal(modal, animation) {
            modal.find('.modal-dialog').attr('class', `modal-dialog modal-lg animate__animated animate__${animation}`);
        }

        function initLazyLoading() {
            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const image = entry.target;
                            image.src = image.dataset.src;
                            image.classList.remove('lazy');
                            imageObserver.unobserve(image);
                        }
                    });
                });

                document.querySelectorAll('img.lazy').forEach(img => imageObserver.observe(img));
            } else {
                document.querySelectorAll('img.lazy').forEach(img => {
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                });
            }
        }

        function showAlert(icon, title, text, timer = null) {
            const alertConfig = {
                icon: icon,
                title: title,
                text: text,
            };

            if (timer) {
                alertConfig.timer = timer;
                alertConfig.timerProgressBar = true;
            }

            Swal.fire(alertConfig);
        }

        function displayMessages() {
            if ($('.alert-success').length) {
                showAlert('success', 'Berhasil!', $('.alert-success').text(), 3000);
            }
            if ($('.alert-danger').length) {
                showAlert('error', 'Oops...', $('.alert-danger').text());
            }
        }

        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = $('<img>').attr('src', e.target.result).addClass('img-fluid mt-2');
                    $(input).closest('.form-group').find('img').remove();
                    $(input).closest('.form-group').append(preview);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
