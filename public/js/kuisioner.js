$(document).ready(function () {
    // Fungsi untuk menampilkan pesan dengan SweetAlert
    function showMessage(message, type = 'success') {
        Swal.fire({
            title: type.charAt(0).toUpperCase() + type.slice(1),
            text: message,
            icon: type,
            confirmButtonText: 'OK'
        });
    }

    // Fungsi untuk me-refresh tabel kuisioner
    function refreshKuisionerTables() {
        $.get('/kuisioner', function (data) {
            $('#kuisionerTables').html($(data).find('#kuisionerTables').html());
        });
    }

    // Fungsi untuk konfirmasi dan menghapus item
    window.confirmDelete = function (type, id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: `Anda akan menghapus ${type} ini.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/kuisioner/${type}/delete/${id}`,
                    method: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        showMessage(`${type} berhasil dihapus`, 'success');
                        refreshKuisionerTables();
                    },
                    error: function (xhr) {
                        showMessage(xhr.responseJSON.message || `Gagal menghapus ${type}`, 'error');
                    }
                });
            }
        });
    }

    // Fungsi untuk menampilkan modal
    window.showModal = function (modalId, data = {}) {
        const modal = $(`#${modalId}`);
        const form = modal.find('form');

        // Reset form
        form[0].reset();

        // Set data ke form
        for (const [key, value] of Object.entries(data)) {
            form.find(`[name="${key}"]`).val(value);
        }

        // Set action URL yang benar untuk form edit
        if (modalId === 'editKategoriModal') {
            form.attr('action', `/kuisioner/kategori/update/${data.id}`);
        } else if (modalId === 'editPertanyaanModal') {
            form.attr('action', `/kuisioner/pertanyaan/update/${data.id}`);
        } else if (modalId === 'editOpsiJawabanModal') {
            form.attr('action', `/kuisioner/opsi-jawaban/update/${data.id}`);
        } else if (modalId === 'createPertanyaanModal') {
            form.attr('action', `/kuisioner/${data.kategori_id}/store-pertanyaan`);
        } else if (modalId === 'createOpsiJawabanModal') {
            form.attr('action', `/kuisioner/${data.pertanyaan_id}/store-opsi-jawaban`);
        }

        modal.modal('show');
    }

    // Event handler untuk form submission
    $(document).on('submit', '#createKategoriForm, #editKategoriForm, #createPertanyaanForm, #editPertanyaanForm, #createOpsiJawabanForm, #editOpsiJawabanForm', function (e) {
        e.preventDefault();
        const form = $(this);
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function (response) {
                form.closest('.modal').modal('hide');
                showMessage(response.message || 'Operasi berhasil');
                refreshKuisionerTables();
            },
            error: function (xhr) {
                showMessage(xhr.responseJSON.message || 'Terjadi kesalahan. Silakan coba lagi.', 'error');
            }
        });
    });

    // Event handler untuk tombol tambah kategori
    $('#addKategoriBtn').click(function () {
        showModal('createKategoriModal');
    });

    // Event handler untuk tombol edit kategori
    $(document).on('click', '.editKategoriBtn', function () {
        const id = $(this).data('id');
        const nama = $(this).data('nama');
        showModal('editKategoriModal', { id: id, nama_kategori: nama });
    });

    // Event handler untuk tombol tambah pertanyaan
    $(document).on('click', '.addPertanyaanBtn', function () {
        const kategoriId = $(this).data('kategori-id');
        showModal('createPertanyaanModal', { kategori_id: kategoriId });
    });

    // Event handler untuk tombol edit pertanyaan
    $(document).on('click', '.editPertanyaanBtn', function () {
        const id = $(this).data('id');
        const teks = $(this).data('teks');
        showModal('editPertanyaanModal', { id: id, teks_pertanyaan: teks });
    });

    // Event handler untuk tombol tambah opsi jawaban
    $(document).on('click', '.addOpsiJawabanBtn', function () {
        const pertanyaanId = $(this).data('pertanyaan-id');
        showModal('createOpsiJawabanModal', { pertanyaan_id: pertanyaanId });
    });

    // Event handler untuk tombol edit opsi jawaban
    $(document).on('click', '.editOpsiJawabanBtn', function () {
        const id = $(this).data('id');
        const teks = $(this).data('teks');
        showModal('editOpsiJawabanModal', { id: id, teks_opsi: teks });
    });

    // Inisialisasi collapse untuk pertanyaan
    $('.collapse').on('show.bs.collapse', function () {
        $(this).prev('.card-header').find('.btn-info').text('Sembunyikan Pertanyaan');
    }).on('hide.bs.collapse', function () {
        $(this).prev('.card-header').find('.btn-info').text('Lihat Pertanyaan');
    });
});