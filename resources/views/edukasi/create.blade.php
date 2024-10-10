@extends('layout.apps')

@section('content')
<div class="container">
    <h1>Buat Konten Edukasi</h1>

    <form action="{{ route('edukasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" required>
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Tipe Media</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="media_type" id="media_type_foto" value="foto" {{ old('media_type') == 'foto' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="media_type_foto">Foto</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="media_type" id="media_type_video_upload" value="video_upload" {{ old('media_type') == 'video_upload' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="media_type_video_upload">Upload Video</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="media_type" id="media_type_video_url" value="video_url" {{ old('media_type') == 'video_url' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="media_type_video_url">URL Video</label>
                </div>
            </div>
            @error('media_type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group" id="foto_group">
            <label for="foto">Upload Foto</label>
            <input type="file" class="form-control-file @error('foto') is-invalid @enderror" id="foto" name="foto">
            @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group" id="video_upload_group">
            <label for="video">Upload Video</label>
            <input type="file" class="form-control-file @error('video') is-invalid @enderror" id="video" name="video">
            @error('video')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group" id="video_url_group">
            <label for="video_url">URL Video</label>
            <input type="url" class="form-control @error('video_url') is-invalid @enderror" id="video_url" name="video_url" value="{{ old('video_url') }}">
            @error('video_url')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        function toggleMediaInputs() {
            const mediaType = $('input[name="media_type"]:checked').val();
            $('#foto_group, #video_upload_group, #video_url_group').hide();
            if (mediaType === 'foto') {
                $('#foto_group').show();
            } else if (mediaType === 'video_upload') {
                $('#video_upload_group').show();
            } else if (mediaType === 'video_url') {
                $('#video_url_group').show();
            }
        }
F
        $('input[name="media_type"]').change(toggleMediaInputs);
        toggleMediaInputs(); // Run on page load
    });
</script>
@endpush
@endsection
