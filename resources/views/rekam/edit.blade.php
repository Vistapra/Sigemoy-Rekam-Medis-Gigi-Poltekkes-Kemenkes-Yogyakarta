@extends('layout.apps')

@section('content')
    <div class="container-fluid">
        <div class="form-head d-flex mb-3 align-items-start">
            <div class="mr-auto d-none d-lg-block">
                <h2 class="text-black font-w600 mb-0">Edit Rekam Medis</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="" class="text-primary">Rekam Medis</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Rekam Medis</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('warning'))
                            <div class="alert alert-warning">
                                {{ session('warning') }}
                            </div>
                        @endif

                        <form action="{{ route('rekam.update', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>No Periksa</label>
                                    <input type="text" class="form-control" value="{{ $data->no_rekam }}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tanggal Periksa</label>
                                    <input type="date" name="tgl_rekam"
                                        class="form-control @error('tgl_rekam') is-invalid @enderror"
                                        value="{{ old('tgl_rekam', $data->tgl_rekam) }}">
                                    @error('tgl_rekam')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Nama Pasien</label>
                                <input type="text" class="form-control" value="{{ $data->pasien->nama }}" readonly>
                                <input type="hidden" name="pasien_id" value="{{ $data->pasien_id }}">
                            </div>

                            <div class="form-group">
                                <label>Keluhan</label>
                                <textarea name="keluhan" class="form-control @error('keluhan') is-invalid @enderror" rows="4">{{ old('keluhan', $data->keluhan) }}</textarea>
                                @error('keluhan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Nama Pemeriksa</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Perbarui Rekam Medis</button>
                                <a href="{{ route('rekam.detail', $data->pasien_id) }}"
                                    class="btn btn-outline-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
