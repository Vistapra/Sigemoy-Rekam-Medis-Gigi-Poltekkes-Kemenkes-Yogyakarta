

<?php $__env->startSection('content'); ?>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-gradient-primary py-3 d-flex justify-content-between align-items-center">
                        <h2 class="text-primary m-0 font-weight-bold">Edukasi</h2>
                        <?php if(auth()->user()->role_display() == 'Admin'): ?>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEdukasiModal">
                                <i class="fas fa-plus-circle mr-2"></i>Tambah Konten
                            </button>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <form method="GET" action="<?php echo e(route('edukasi.index')); ?>" class="search-form">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search"
                                        value="<?php echo e(request('search')); ?>"
                                        placeholder="Cari berdasarkan judul atau deskripsi...">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <?php if(request('search')): ?>
                            <div class="alert alert-info">
                                Menampilkan hasil pencarian untuk: <strong><?php echo e(request('search')); ?></strong>
                                <a href="<?php echo e(route('edukasi.index')); ?>" class="float-right">Reset</a>
                            </div>
                        <?php endif; ?>

                        <div class="row" id="edukasiContent">
                            <?php $__empty_1 = true; $__currentLoopData = $edukasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $konten): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="col-md-4 col-lg-3 mb-4">
                                    <div class="card h-100 edukasi-card">
                                        <div class="edukasi-media">
                                            <a href="<?php echo e(route('edukasi.show', $konten->id)); ?>" class="d-block h-100">
                                                <?php if($konten->media_type === 'foto'): ?>
                                                    <img src="<?php echo e(Storage::url($konten->media_path)); ?>"
                                                        alt="<?php echo e($konten->judul); ?>" class="card-img-top lazy"
                                                        data-src="<?php echo e(Storage::url($konten->media_path)); ?>">
                                                <?php elseif($konten->media_type === 'video_upload'): ?>
                                                    <video class="card-img-top lazy video-js" controls preload="none"
                                                        data-setup='{}'>
                                                        <source src="<?php echo e(Storage::url($konten->media_path)); ?>"
                                                            type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                    <div class="play-icon">
                                                        <i class="fas fa-play-circle"></i>
                                                    </div>
                                                <?php elseif($konten->media_type === 'video_url'): ?>
                                                    <div class="video-thumbnail">
                                                        <img src="<?php echo e('https://img.youtube.com/vi/' . $konten->getYouTubeId($konten->video_url) . '/0.jpg'); ?>"
                                                            alt="<?php echo e($konten->judul); ?>" class="card-img-top lazy"
                                                            data-src="<?php echo e('https://img.youtube.com/vi/' . $konten->getYouTubeId($konten->video_url) . '/0.jpg'); ?>">
                                                        <div class="play-icon">
                                                            <i class="fas fa-play-circle"></i>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <a href="<?php echo e(route('edukasi.show', $konten->id)); ?>"
                                                class="text-decoration-none">
                                                <h5 class="text-primary card-title"><?php echo e(Str::limit($konten->judul, 30)); ?>

                                                </h5>
                                            </a>
                                            <p class="card-text"><?php echo e(Str::limit($konten->deskripsi, 50)); ?></p>
                                        </div>
                                        <?php if(auth()->user()->role_display() == 'Admin'): ?>
                                            <div
                                                class="card-footer bg-transparent d-flex justify-content-between align-items-center">
                                                <span class="badge badge-primary"><?php echo e(ucfirst($konten->media_type)); ?></span>
                                                <div>
                                                    <a href="<?php echo e(route('edukasi.edit', $konten->id)); ?>"
                                                        class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="<?php echo e(route('edukasi.destroy', $konten->id)); ?>"
                                                        method="POST" class="d-inline">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit"
                                                            class="btn btn-sm btn-outline-danger delete-btn"
                                                            data-name="<?php echo e($konten->judul); ?>">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="col-12">
                                    <div class="alert alert-info">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        <?php if(request('search')): ?>
                                            Tidak ada hasil yang ditemukan untuk pencarian "<?php echo e(request('search')); ?>".
                                        <?php else: ?>
                                            Belum ada konten edukasi.
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="d-flex justify-content-center my-4">
                            <?php echo e($edukasi->appends(request()->query())->links('pagination::bootstrap-4')); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for adding new educational content -->
    <div class="modal fade" id="addEdukasiModal" tabindex="-1" role="dialog" aria-labelledby="addEdukasiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary text-white">
                    <h5 class="modal-title" id="addEdukasiModalLabel">Tambah Konten Edukasi</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo e(route('edukasi.store')); ?>" method="POST" enctype="multipart/form-data"
                    id="addEdukasiForm">
                    <?php echo csrf_field(); ?>
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
                            <label for="media_type">Tipe Media</label>
                            <select class="form-control" id="media_type" name="media_type" required>
                                <option value="">Pilih Tipe Media</option>
                                <option value="foto">Foto</option>
                                <option value="video_upload">Upload Video</option>
                                <option value="video_url">URL Video</option>
                            </select>
                        </div>
                        <div class="form-group media-input" id="foto_input" style="display: none;">
                            <label for="foto">Upload Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto"
                                    accept="image/*">
                                <label class="custom-file-label" for="foto">Pilih file</label>
                            </div>
                            <div class="preview-container mt-2"></div>
                        </div>
                        <div class="form-group media-input" id="video_upload_input" style="display: none;">
                            <label for="video">Upload Video</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="video" name="video"
                                    accept="video/*">
                                <label class="custom-file-label" for="video">Pilih file</label>
                            </div>
                            <div class="preview-container mt-2"></div>
                        </div>
                        <div class="form-group media-input" id="video_url_input" style="display: none;">
                            <label for="video_url">URL Video</label>
                            <input type="url" class="form-control" id="video_url" name="video_url"
                                placeholder="https://www.youtube.com/watch?v=...">
                            <div class="preview-container mt-2"></div>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
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

        .edukasi-media {
            height: 200px;
            overflow: hidden;
            position: relative;
            background-color: #f8f9fa;
            border-radius: 15px 15px 0 0;
        }

        .edukasi-media img,
        .edukasi-media .video-thumbnail img,
        .edukasi-media video {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .edukasi-card:hover .edukasi-media img,
        .edukasi-card:hover .edukasi-media .video-thumbnail img,
        .edukasi-card:hover .edukasi-media video {
            transform: scale(1.05);
        }

        .video-thumbnail {
            position: relative;
        }

        .play-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 3rem;
            color: #fff;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }

        .edukasi-card:hover .play-icon {
            opacity: 1;
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

        .badge {
            font-size: 0.8rem;
            padding: 0.4em 0.8em;
            border-radius: 20px;
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

        .custom-file-label::after {
            content: "Browse";
        }

        @keyframes  fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 40px, 0);
            }

            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        .edukasi-card {
            animation: fadeInUp 0.5s ease-out;
            animation-fill-mode: both;
        }

        .edukasi-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .edukasi-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .edukasi-card:nth-child(3) {
            animation-delay: 0.3s;
        }

        .edukasi-card:nth-child(4) {
            animation-delay: 0.4s;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php echo e(asset('vendor/metismenu/js/metisMenu.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $(".metismenu").metisMenu();

            // Inisialisasi variabel dan elemen
            const mediaTypeSelect = $('#media_type');
            const addEdukasiForm = $('#addEdukasiForm');
            const submitBtn = $('#submitBtn');
            const mediaInputs = $('.media-input');
            const searchForm = $('.search-form');
            const deleteButtons = $('.delete-btn');
            const addEdukasiModal = $('#addEdukasiModal');

            // Logika pemilihan tipe media
            mediaTypeSelect.change(function() {
                const selectedType = $(this).val();
                mediaInputs.hide();
                $(`#${selectedType}_input`).fadeIn(300);
            });

            // Custom file input
            $('.custom-file-input').on('change', function(e) {
                const fileName = e.target.files[0].name;
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });

            // Konfirmasi penghapusan
            deleteButtons.click(function(e) {
                e.preventDefault();
                const form = $(this).closest('form');
                const name = $(this).data('name');

                showDeleteConfirmation(name, () => form.submit());
            });

            // Validasi dan pengiriman form
            addEdukasiForm.submit(function(e) {
                e.preventDefault();
                if (validateForm()) {
                    showLoadingState();
                    this.submit();
                }
            });

            // Validasi ukuran file
            $('input[type="file"]').change(function() {
                validateFileSize($(this));
            });

            // Animasi modal
            addEdukasiModal.on('show.bs.modal', function(e) {
                animateModal($(this), 'fadeInDown');
            }).on('hide.bs.modal', function(e) {
                animateModal($(this), 'fadeOutUp');
            });

            // Inisialisasi tooltips
            $('[data-toggle="tooltip"]').tooltip();

            // Lazy loading gambar
            initLazyLoading();

            // Tampilkan pesan sukses atau error
            displayMessages();

            // Preview untuk foto dan video
            $('#foto, #video').change(function(e) {
                const file = e.target.files[0];
                const previewContainer = $(this).closest('.form-group').find('.preview-container');
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        let preview;
                        if (file.type.startsWith('image/')) {
                            preview = $('<img>').attr('src', e.target.result).addClass(
                                'img-fluid mt-2');
                        } else if (file.type.startsWith('video/')) {
                            preview = $('<video>').attr({
                                'src': e.target.result,
                                'controls': true,
                                'autoplay': false
                            }).addClass('img-fluid mt-2');
                        }
                        previewContainer.html(preview);
                    }
                    reader.readAsDataURL(file);
                }
            });

            // Preview untuk video URL
            $('#video_url').on('input', function() {
                const url = $(this).val();
                const previewContainer = $(this).closest('.form-group').find('.preview-container');
                if (url) {
                    const videoId = getYouTubeId(url);
                    if (videoId) {
                        const embedUrl = `https://www.youtube.com/embed/${videoId}`;
                        const preview = $('<iframe>').attr({
                            src: embedUrl,
                            width: '100%',
                            height: '315',
                            frameborder: '0',
                            allowfullscreen: ''
                        });
                        previewContainer.html(preview);
                    } else {
                        previewContainer.html('<p class="text-danger">URL video tidak valid</p>');
                    }
                } else {
                    previewContainer.empty();
                }
            });

            // Fungsi validasi form
            function validateForm() {
                let isValid = true;
                const mediaType = mediaTypeSelect.val();

                // Reset pesan error sebelumnya
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').remove();

                // Validasi field yang wajib diisi
                addEdukasiForm.find('input[required], textarea[required], select[required]').each(function() {
                    if ($(this).val().trim() === '') {
                        showFieldError($(this), 'Field ini wajib diisi.');
                        isValid = false;
                    }
                });

                // Validasi media berdasarkan tipe
                if (mediaType === 'foto' && $('#foto')[0].files.length === 0) {
                    showFieldError($('#foto'), 'Silakan pilih foto.');
                    isValid = false;
                } else if (mediaType === 'video_upload' && $('#video')[0].files.length === 0) {
                    showFieldError($('#video'), 'Silakan pilih file video.');
                    isValid = false;
                } else if (mediaType === 'video_url' && !isValidUrl($('#video_url').val())) {
                    showFieldError($('#video_url'), 'Silakan masukkan URL yang valid.');
                    isValid = false;
                }

                return isValid;
            }

            // Fungsi untuk menampilkan error pada field
            function showFieldError(field, message) {
                field.addClass('is-invalid');
                field.after(`<div class="invalid-feedback">${message}</div>`);
            }

            // Fungsi untuk validasi URL
            function isValidUrl(url) {
                try {
                    new URL(url);
                    return true;
                } catch (_) {
                    return false;
                }
            }

            // Fungsi untuk validasi ukuran file
            function validateFileSize(fileInput) {
                const fileInputElement = fileInput[0];
                const fileSizeLimit = 100 * 1024 * 1024; // 100MB for both photo and video

                if (fileInputElement.files.length > 0) {
                    const fileSize = fileInputElement.files[0].size;
                    if (fileSize > fileSizeLimit) {
                        fileInput.val('');
                        fileInput.next('.custom-file-label').html('Pilih file');
                        showAlert('error', 'File Terlalu Besar',
                            `Ukuran file melebihi batas maksimum 100MB.`);
                    }
                }
            }

            // Fungsi untuk menampilkan loading state
            function showLoadingState() {
                submitBtn.html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...'
                );
                submitBtn.prop('disabled', true);
            }

            // Fungsi untuk menampilkan konfirmasi penghapusan
            function showDeleteConfirmation(name, callback) {
                Swal.fire({
                    title: 'Konfirmasi Hapus',
                    text: `Apakah Anda yakin ingin menghapus konten "${name}"?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        callback();
                    }
                });
            }

            // Fungsi untuk animasi modal
            function animateModal(modal, animation) {
                modal.find('.modal-dialog').attr('class',
                    `modal-dialog modal-lg animate__animated animate__${animation}`);
            }

            // Fungsi untuk inisialisasi lazy loading
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
                    // Fallback untuk browser yang tidak mendukung IntersectionObserver
                    document.querySelectorAll('img.lazy').forEach(img => {
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                    });
                }
            }

            // Fungsi untuk menampilkan alert
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

            // Fungsi untuk menampilkan pesan
            function displayMessages() {
                <?php if(session('success')): ?>
                    showAlert('success', 'Berhasil!', '<?php echo e(session('success')); ?>', 3000);
                <?php endif; ?>

                <?php if($errors->any()): ?>
                    showAlert('error', 'Oops...', 'Terjadi kesalahan. Silakan periksa kembali input Anda.');
                <?php endif; ?>
            }

            // Fungsi untuk mendapatkan ID video YouTube
            function getYouTubeId(url) {
                const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
                const match = url.match(regExp);
                return (match && match[2].length === 11) ? match[2] : null;
            }

            // Tambahan: Pencarian real-time
            let searchTimer;
            searchForm.find('input[name="search"]').on('input', function() {
                clearTimeout(searchTimer);
                searchTimer = setTimeout(() => {
                    searchForm.submit();
                }, 500);
            });

            // Tambahan: Smooth scroll ke top setelah pagination
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                let search = $('input[name="search"]').val();

                fetch_data(page, search);
            });

            function fetch_data(page, search) {
                $.ajax({
                    url: "<?php echo e(route('edukasi.index')); ?>?page=" + page + "&search=" + search,
                    success: function(data) {
                        $('#edukasiContent').html($(data).find('#edukasiContent').html());
                        $('.pagination').html($(data).find('.pagination').html());
                        $('html, body').animate({
                            scrollTop: 0
                        }, 'slow');
                    }
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.apps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT 2024\Sigemoy\Development\sigemoy\resources\views/edukasi/index.blade.php ENDPATH**/ ?>