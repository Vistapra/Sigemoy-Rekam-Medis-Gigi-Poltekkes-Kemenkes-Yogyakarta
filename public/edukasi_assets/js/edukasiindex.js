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
        @if (session('success'))
            showAlert('success', 'Berhasil!', '{{ session('success') }}', 3000);
        @endif

        @if ($errors->any())
            showAlert('error', 'Oops...', 'Terjadi kesalahan. Silakan periksa kembali input Anda.');
        @endif
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
            url: "{{ route('edukasi.index') }}?page=" + page + "&search=" + search,
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
