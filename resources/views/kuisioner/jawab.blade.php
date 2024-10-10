@extends('layout.apps')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-12 p-md-0 d-flex justify-content-center" style="background-color: #ffffff; padding: 20px;">
                <div class="welcome-text text-center">
                    <h4 class="text-black font-w600">Survey Pasien {{ $pasien->nama }}</h4>
                </div>
            </div>
        </div>

        <form action="{{ route('kuisioner.simpanJawaban', $pasien->id) }}" method="POST" id="kuisionerForm">
            @csrf
            @foreach ($kategori as $kat)
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">{{ $kat->nama_kategori }}</h5>
                            </div>
                            <div class="card-body">
                                @foreach ($kat->pertanyaan as $pertanyaan)
                                    <div class="form-group" id="question_{{ $pertanyaan->id }}">
                                        <label class="font-weight-bold">{{ $loop->iteration }}.
                                            {{ $pertanyaan->teks_pertanyaan }}</label>
                                        @foreach ($pertanyaan->opsiJawaban as $opsi)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="jawaban[{{ $pertanyaan->id }}][opsi_jawaban_id]"
                                                    value="{{ $opsi->id }}" id="opsi_{{ $opsi->id }}">
                                                <label class="form-check-label" for="opsi_{{ $opsi->id }}">
                                                    {{ $opsi->teks_opsi }}
                                                </label>
                                            </div>
                                        @endforeach
                                        <textarea class="form-control mt-2" name="jawaban[{{ $pertanyaan->id }}][keterangan]" rows="2"
                                            placeholder="Keterangan (opsional)"></textarea>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan Jawaban</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}">
<style>
    .unanswered-question {
        border: 2px solid #ff0000;
        padding: 10px;
        border-radius: 5px;
        background-color: #ffe6e6;
    }
</style>
@endsection

@section('script')
<script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#kuisionerForm').submit(function(e) {
            e.preventDefault();

            $('.form-group').removeClass('unanswered-question');

            let answeredQuestions = 0;
            let totalQuestions = $('.form-group').length;

            $('.form-group').each(function() {
                const $radioInputs = $(this).find('input[type="radio"]');
                if ($radioInputs.filter(':checked').length) {
                    answeredQuestions++;
                }
            });

            let confirmationMessage = `Anda telah menjawab ${answeredQuestions} dari ${totalQuestions} pertanyaan.`;
            if (answeredQuestions < totalQuestions) {
                confirmationMessage += ' Beberapa pertanyaan belum dijawab. Apakah Anda yakin ingin menyimpan?';
            } else {
                confirmationMessage += ' Apakah Anda yakin ingin menyimpan semua jawaban?';
            }

            Swal.fire({
                title: 'Konfirmasi Penyimpanan',
                text: confirmationMessage,
                type: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Simpan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    submitForm();
                }
            });
        });

        function submitForm() {
            Swal.fire({
                title: 'Menyimpan Jawaban',
                text: 'Mohon tunggu...',
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: $('#kuisionerForm').attr('action'),
                method: 'POST',
                data: $('#kuisionerForm').serialize(),
                dataType: 'json',
                success: function(response) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: response.message || 'Jawaban berhasil disimpan',
                        type: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (response.redirect_url) {
                            window.location.href = response.redirect_url;
                        } else {
                            window.location.href = '{{ route('rekam.add', ['pasien_id' => $pasien->id]) }}';
                        }
                    });
                },
                error: function(xhr, status, error) {
                    let errorMessage = 'Gagal menyimpan jawaban. Silakan coba lagi.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    } else if (xhr.status === 500) {
                        errorMessage = 'Terjadi kesalahan di server. Mohon coba lagi nanti.';
                    }
                    Swal.fire({
                        title: 'Error!',
                        text: errorMessage,
                        type: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }

        $('input[type="radio"]').change(function() {
            $(this).closest('.form-group').removeClass('unanswered-question');
        });
    });
</script>
@endsection