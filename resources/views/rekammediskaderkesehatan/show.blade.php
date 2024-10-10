@extends('layout.apps')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Rekam Medis Kader</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Tanggal</th>
                                <td>{{ $rekamMedisKader->created_at->format('Y-m-d') }}</td>
                            </tr>
                            <tr>
                                <th>Nama Pasien</th>
                                <td>{{ $rekamMedisKader->pasien->nama }}</td>
                            </tr>
                            <tr>
                                <th>Kader Kesehatan</th>
                                <td>{{ $rekamMedisKader->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Kondisi Gigi</th>
                                <td>{{ $rekamMedisKader->namaKondisiGigi->nama_kondisi }}</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>{{ $rekamMedisKader->total }}</td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>{{ $rekamMedisKader->keterangan ?? 'Tidak ada keterangan' }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('rekammediskaderkesehatan.edit', $rekamMedisKader->id) }}"
                            class="btn btn-primary">Edit</a>
                        <a href="{{ route('rekammediskaderkesehatan.index') }}" class="btn btn-secondary">Kembali</a>
                        <form action="{{ route('rekammediskaderkesehatan.destroy', $rekamMedisKader->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus rekam medis ini?')">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
