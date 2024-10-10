@extends('layout.apps')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h1 class="text-white text-bold h4 mb-0">Edit Konten Edukasi</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('edukasi.update', $edukasi) }}" method="POST" enctype="multipart/form-data"
                            id="editEdukasiForm">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                    id="judul" name="judul" value="{{ old('judul', $edukasi->judul) }}" required>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3"
                                    required>{{ old('deskripsi', $edukasi->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Ubah Media</label>
                                <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                    <label class="btn btn-outline-primary @if (old('media_type', $edukasi->media_type) == 'foto') active @endif">
                                        <input type="radio" name="media_type" id="media_type_foto" value="foto"
                                            {{ old('media_type', $edukasi->media_type) == 'foto' ? 'checked' : '' }}
                                            required> Foto
                                    </label>
                                    <label class="btn btn-outline-primary @if (old('media_type', $edukasi->media_type) == 'video_upload') active @endif">
                                        <input type="radio" name="media_type" id="media_type_video_upload"
                                            value="video_upload"
                                            {{ old('media_type', $edukasi->media_type) == 'video_upload' ? 'checked' : '' }}
                                            required> Upload Video
                                    </label>
                                    <label class="btn btn-outline-primary @if (old('media_type', $edukasi->media_type) == 'video_url') active @endif">
                                        <input type="radio" name="media_type" id="media_type_video_url" value="video_url"
                                            {{ old('media_type', $edukasi->media_type) == 'video_url' ? 'checked' : '' }}
                                            required> URL Video
                                    </label>
                                </div>
                                @error('media_type')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div id="media_input_container">
                                <div class="form-group media-input" id="foto_group">
                                    <label for="foto">Upload Foto</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('foto') is-invalid @enderror"
                                            id="foto" name="foto" accept="image/*">
                                        <label class="custom-file-label" for="foto">Pilih file</label>
                                    </div>
                                    @error('foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group media-input" id="video_upload_group">
                                    <label for="video">Upload Video</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('video') is-invalid @enderror"
                                            id="video" name="video" accept="video/*">
                                        <label class="custom-file-label" for="video">Pilih file</label>
                                    </div>
                                    @error('video')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group media-input" id="video_url_group">
                                    <label for="video_url">URL Video</label>
                                    <input type="url" class="form-control @error('video_url') is-invalid @enderror"
                                        id="video_url" name="video_url"
                                        value="{{ old('video_url', $edukasi->media_type == 'video_url' ? $edukasi->media_path : '') }}">
                                    @error('video_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div id="current_media_preview" class="mt-3">
                                @if ($edukasi->media_type === 'foto' && $edukasi->media_path)
                                    <div class="current-media current-foto">
                                        <img src="{{ asset('storage/' . $edukasi->media_path) }}" alt="Current Photo"
                                            class="img-thumbnail" style="max-height: 200px;">
                                    </div>
                                @elseif ($edukasi->media_type === 'video_upload' && $edukasi->media_path)
                                    <div class="current-media current-video">
                                        <video controls class="img-thumbnail" style="max-height: 200px;">
                                            <source src="{{ asset('storage/' . $edukasi->media_path) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                        <p class="mt-1">Video saat ini: {{ basename($edukasi->media_path) }}</p>
                                    </div>
                                @elseif ($edukasi->media_type === 'video_url' && $edukasi->media_path)
                                    <div class="current-media current-video-url">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="{{ $edukasi->media_path }}"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">Perbarui</button>
                                <a href="{{ route('edukasi.index') }}" class="btn btn-secondary ml-2">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        .custom-file-label::after {
            content: "Pilih";
        }
    </style>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            function toggleMediaInputs() {
                const mediaType = $('input[name="media_type"]:checked').val();
                console.log('Toggling media inputs for:', mediaType);
                $('.media-input').hide();
                $('.current-media').hide();
                if (mediaType === 'foto') {
                    $('#foto_group').show();
                    $('.current-foto').show();
                } else if (mediaType === 'video_upload') {
                    $('#video_upload_group').show();
                    $('.current-video').show();
                } else if (mediaType === 'video_url') {
                    $('#video_url_group').show();
                    $('.current-video-url').show();
                }
            }

            $('input[name="media_type"]').change(function() {
                console.log('Media type changed:', $(this).val());
                toggleMediaInputs();
            });

            toggleMediaInputs(); // Call on page load

            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });

            $('#editEdukasiForm').submit(function(e) {
                const mediaType = $('input[name="media_type"]:checked').val();
                let isValid = true;

                if (mediaType === 'foto') {
                    if ($('#foto').val() === '' && !$('.current-foto img').length) {
                        alert('Silakan pilih foto.');
                        isValid = false;
                    }
                } else if (mediaType === 'video_upload') {
                    if ($('#video').val() === '' && !$('.current-video video').length) {
                        alert('Silakan pilih video.');
                        isValid = false;
                    }
                } else if (mediaType === 'video_url') {
                    if ($('#video_url').val() === '') {
                        alert('Silakan masukkan URL video.');
                        isValid = false;
                    }
                }

                if (!isValid) {
                    e.preventDefault();
                }
            });
        });
    </script>
