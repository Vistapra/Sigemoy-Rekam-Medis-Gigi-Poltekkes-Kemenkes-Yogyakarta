@extends('layout.apps')
@section('content')
    <div class="form-head align-items-center d-flex mb-sm-4 mb-3">
        <div class="mr-auto">
            <h2 class="text-black font-w600">Rekam Medis Baru</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ Route('pasien') }}">Rekam Medis</a></li>
                <li class="breadcrumb-item active"><a href="#">Tambah Pasien Periksa</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <form id="rekamForm" action="{{ Route('rekam.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal Periksa*</label>
                                <div class="col-sm-4">
                                    <input type="date" name="tgl_rekam" class="form-control" value="{{ date('Y-m-d') }}">
                                    @error('tgl_rekam')
                                        <div class="invalid-feedback animated fadeInUp" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Pasien</label>
                                <div class="col-sm-5">
                                    <input type="hidden" name="pasien_id" value="{{ $pasien->id }}">
                                    <input type="text" class="form-control" value="{{ $pasien->nama }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Keluhan*</label>
                                <div class="col-sm-10">
                                    <textarea name="keluhan" placeholder="Tuliskan keluhan" class="form-control" rows="4">{{ old('keluhan') }}</textarea>
                                    @error('keluhan')
                                        <div class="invalid-feedback animated fadeInUp" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Pemeriksa</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    @error('user_id')
                                        <div class="invalid-feedback animated fadeInUp" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <hr>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for admin choice -->
    <div class="modal fade" id="adminChoiceModal" tabindex="-1" role="dialog" aria-labelledby="adminChoiceModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminChoiceModalLabel">Pilih Tindakan Selanjutnya</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Data rekam medis berhasil disimpan. Silakan pilih tindakan selanjutnya:</p>
                    <div class="d-flex justify-content-around">
                        <a href="#" id="kaderBtn" class="btn btn-primary">Rekam Gigi Kader</a>
                        <a href="#" id="terapisBtn" class="btn btn-secondary">Rekam Gigi Terapis</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
$(document).ready(function() {
    $('#rekamForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    @if(auth()->user()->role == 1)
                        $('#adminChoiceModal').modal('show');
                        $('#kaderBtn').attr('href', "{{ route('rekammediskaderkesehatan.create', '') }}/" + response.pasien_id);
                        $('#terapisBtn').attr('href', "{{ route('rekam.gigi.add', '') }}/" + response.pasien_id);
                    @else
                        window.location.href = response.redirect;
                    @endif
                } else {
                    alert('Terjadi kesalahan: ' + response.message);
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                alert('Terjadi kesalahan. Silakan coba lagi.');
            }
        });
    });
});
</script>
@endsection