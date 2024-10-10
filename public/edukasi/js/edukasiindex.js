$(document).ready(function () {
    // Inisialisasi variabel dan elemen
    const mediaTypeSelect = $('#media_type');
    const addEdukasiForm = $('#addEdukasiForm');
    const submitBtn = $('#submitBtn');
    const mediaInputs = $('.media-input');
    const addEdukasiModal = $('#addEdukasiModal');

    // Logika pemilihan tipe media
    mediaTypeSelect.change(function () {
        const selectedType = $(this).val();
        console.log("Selected media type:", selectedType);
        mediaInputs.hide();
        if (selectedType) {
            $(`#${selectedType}_input`).fadeIn(300);
        }
    });

    // Custom file input
    $('.custom-file-input').on('change', function (e) {
        const fileName = e.target.files[0].name;
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    // Validasi dan pengiriman form
    addEdukasiForm.submit(function (e) {
        e.preventDefault();
        if (validateForm()) {
            showLoadingState();

            let formData = new FormData(this);

            $.ajax({
                url: "/edukasi/store",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    hideLoadingState();
                    showSuccessMessage();
                    resetForm();
                    location.reload();
                },
                error: function (xhr, status, error) {
                    hideLoadingState();
                    showAlert('error', 'Gagal', 'Terjadi kesalahan saat menyimpan data.');
                    console.error(xhr.responseText);
                }
            });
        }
    });

    // Validasi ukuran file
    $('input[type="file"]').change(function () {
        validateFileSize($(this));
    });

    // Animasi modal
    addEdukasiModal.on('show.bs.modal', function (e) {
        console.log("Modal is opening");
        $(this).find('.modal-dialog').attr('class', 'modal-dialog modal-lg animate__animated animate__fadeInDown');
    }).on('hide.bs.modal', function (e) {
        $(this).find('.modal-dialog').attr('class', 'modal-dialog modal-lg animate__animated animate__fadeOutUp');
    });

    // Preview untuk foto dan video
    $('#foto, #video').change(function (e) {
        const file = e.target.files[0];
        const previewContainer = $(this).closest('.form-group').find('.preview-container');
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                let preview;
                if (file.type.startsWith('image/')) {
                    preview = $('<img>').attr('src', e.target.result).addClass('img-fluid mt-2');
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
    $('#video_url').on('input', function () {
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
        addEdukasiForm.find('input[required], textarea[required], select[required]').each(function () {
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
        const fileSizeLimit = 100 * 1024 * 1024; // 100MB
        if (fileInput[0].files.length > 0) {
            const fileSize = fileInput[0].files[0].size;
            if (fileSize > fileSizeLimit) {
                fileInput.val('');
                fileInput.next('.custom-file-label').html('Pilih file');
                showAlert('error', 'File Terlalu Besar', 'Ukuran file melebihi batas maksimum 100MB.');
            }
        }
    }

    // Fungsi untuk menampilkan loading state
    function showLoadingState() {
        submitBtn.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...');
        submitBtn.prop('disabled', true);
    }

    // Fungsi untuk menyembunyikan loading state
    function hideLoadingState() {
        submitBtn.html('Simpan');
        submitBtn.prop('disabled', false);
    }

    // Fungsi untuk menampilkan pesan sukses
    function showSuccessMessage() {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Konten edukasi berhasil ditambahkan.',
            timer: 2000,
            timerProgressBar: true
        });
    }

    // Fungsi untuk mereset form
    function resetForm() {
        addEdukasiForm[0].reset();
        $('.custom-file-label').html('Pilih file');
        $('.preview-container').empty();
        mediaInputs.hide();
        addEdukasiModal.modal('hide');
    }

    // Fungsi untuk mendapatkan ID video YouTube
    function getYouTubeId(url) {
        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
        const match = url.match(regExp);
        return (match && match[2].length === 11) ? match[2] : null;
    }

    // Fungsi untuk menampilkan alert
    function showAlert(icon, title, text) {
        Swal.fire({
            icon: icon,
            title: title,
            text: text
        });
    }
});