@extends('layout.apps')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-gradient-primary py-3 d-flex justify-content-between align-items-center">
                        <h2 class="text-primary m-0 font-weight-bold">Edukasi</h2>
                        @if (auth()->user()->role_display() == 'Admin')
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEdukasiModal">
                                <i class="fas fa-plus-circle mr-2"></i>Tambah Konten
                            </button>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <form method="GET" action="{{ route('edukasi.index') }}" class="search-form">
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
                                <a href="{{ route('edukasi.index') }}" class="float-right">Reset</a>
                            </div>
                        @endif

                        <div class="row" id="edukasiContent">
                            @forelse ($edukasi as $konten)
                                <div class="col-md-4 col-lg-3 mb-4">
                                    <div class="card h-100 edukasi-card">
                                        <div class="edukasi-media">
                                            <a href="{{ route('edukasi.show', $konten->id) }}" class="d-block h-100">
                                                @if ($konten->media_type === 'foto')
                                                    <img src="{{ Storage::url($konten->media_path) }}"
                                                        alt="{{ $konten->judul }}" class="card-img-top lazy"
                                                        data-src="{{ Storage::url($konten->media_path) }}">
                                                @elseif($konten->media_type === 'video_upload')
                                                    <video class="card-img-top lazy video-js" controls preload="none"
                                                        data-setup='{}'>
                                                        <source src="{{ Storage::url($konten->media_path) }}"
                                                            type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                    <div class="play-icon">
                                                        <i class="fas fa-play-circle"></i>
                                                    </div>
                                                @elseif($konten->media_type === 'video_url')
                                                    <div class="video-thumbnail">
                                                        <img src="{{ 'https://img.youtube.com/vi/' . $konten->getYouTubeId($konten->video_url) . '/0.jpg' }}"
                                                            alt="{{ $konten->judul }}" class="card-img-top lazy"
                                                            data-src="{{ 'https://img.youtube.com/vi/' . $konten->getYouTubeId($konten->video_url) . '/0.jpg' }}">
                                                        <div class="play-icon">
                                                            <i class="fas fa-play-circle"></i>
                                                        </div>
                                                    </div>
                                                @endif
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ route('edukasi.show', $konten->id) }}"
                                                class="text-decoration-none">
                                                <h5 class="text-primary card-title">{{ Str::limit($konten->judul, 30) }}
                                                </h5>
                                            </a>
                                            <p class="card-text">{{ Str::limit($konten->deskripsi, 50) }}</p>
                                        </div>
                                        @if (auth()->user()->role_display() == 'Admin')
                                            <div
                                                class="card-footer bg-transparent d-flex justify-content-between align-items-center">
                                                <span class="badge badge-primary">{{ ucfirst($konten->media_type) }}</span>
                                                <div>
                                                    <a href="{{ route('edukasi.edit', $konten->id) }}"
                                                        class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('edukasi.destroy', $konten->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-outline-danger delete-btn"
                                                            data-name="{{ $konten->judul }}">
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
                                            Belum ada konten edukasi.
                                        @endif
                                    </div>
                                </div>
                            @endforelse
                        </div>

                        <div class="d-flex justify-content-center my-4">
                            {{ $edukasi->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                <form id="addEdukasiForm" enctype="multipart/form-data">
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
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('edukasi/css/edukasiindex.css') }}">
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('vendor/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('edukasi/js/edukasiindex.js') }}"></script>
@endsection
