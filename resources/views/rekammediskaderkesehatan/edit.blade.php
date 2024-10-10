@extends('layout.apps')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Rekam Medis Kader</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('rekammediskaderkesehatan.update', $rekamMedisKader->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="pasien_id">Nama Pasien</label>
                            <input type="text" class="form-control" value="{{ $rekamMedisKader->pasien->nama }}"
                                disabled>
                        </div>

                        <div class="form-group">
                            <label for="namakondisigigi_id">Kondisi Gigi</label>
                            <select name="namakondisigigi_id" id="namakondisigigi_id" class="form-control" required>
                                @foreach ($kondisiGigi as $kondisi)
                                    <option value="{{ $kondisi->id }}"
                                        {{ $rekamMedisKader->namakondisigigi_id == $kondisi->id ? 'selected' : '' }}>
                                        {{ $kondisi->nama_kondisi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="number" name="total" id="total" class="form-control"
                                value="{{ $rekamMedisKader->total }}" required>
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" rows="3">{{ $rekamMedisKader->keterangan }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Rekam Medis</button>
                            <a href="{{ route('rekammediskaderkesehatan.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
