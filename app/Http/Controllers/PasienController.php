<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Rekam;
use App\Models\RekamGigi;
use App\Models\PengeluaranObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class PasienController extends Controller
{
    public function json()
    {
        $query = Pasien::query();

        return DataTables::of($query)
            ->addColumn('action', function ($data) {
                return '<a href="javascript:void(0)"
                    data-id="' . $data->id . '"
                    data-nama="' . $data->nama . '"
                    class="btn btn-primary shadow btn-xs pilihPasien">
                    Pilih</a>';
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function index(Request $request)
    {
        $datas = Pasien::when($request->keyword, function ($query, $keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('nama', 'LIKE', "%{$keyword}%")
                    ->orWhere('no_hp', 'LIKE', "%{$keyword}%")
                    ->orWhere('alamat_lengkap', 'LIKE', "%{$keyword}%");
            });
        })
            ->paginate(10);
        return view('pasien.index', compact('datas'));
    }

    public function add()
    {
        return view('pasien.add');
    }

    public function edit($id)
    {
        $data = Pasien::findOrFail($id);
        return view('pasien.edit', compact('data'));
    }

    public function file($id)
    {
        $data = Pasien::findOrFail($id);
        return view('pasien.file', compact('data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'tmp_lahir' => 'nullable',
            'tgl_lahir' => 'nullable|date',
            'jk' => 'nullable',
            'status_menikah' => 'nullable',
            'agama' => 'nullable',
            'pendidikan' => 'nullable',
            'pekerjaan' => 'nullable',
            'alamat_lengkap' => 'nullable',
            'kelurahan' => 'nullable',
            'kecamatan' => 'nullable',
            'kabupaten' => 'nullable',
            'kodepos' => 'nullable',
            'no_hp' => 'nullable',
            'kewarganegaraan' => 'nullable',
            'alergi' => 'nullable',
        ]);

        try {
            $pasien = Pasien::create($validatedData);
            return redirect()->route('kuisioner.jawabKuisioner', ['pasien_id' => $pasien->id])
                ->with('success', 'Data pasien berhasil ditambahkan. Silakan isi kuisioner.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data pasien. Silakan coba lagi.');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'tmp_lahir' => 'nullable',
            'tgl_lahir' => 'nullable|date',
            'jk' => 'nullable',
            'status_menikah' => 'nullable',
            'agama' => 'nullable',
            'pendidikan' => 'nullable',
            'pekerjaan' => 'nullable',
            'alamat_lengkap' => 'nullable',
            'kelurahan' => 'nullable',
            'kecamatan' => 'nullable',
            'kabupaten' => 'nullable',
            'kodepos' => 'nullable',
            'no_hp' => 'nullable',
            'kewarganegaraan' => 'nullable',
            'alergi' => 'nullable',
        ]);

        try {
            $pasien = Pasien::findOrFail($id);
            $pasien->update($validatedData);
            return redirect()->route('rekam.detail', ['id' => $id])->with('sukses', 'Data berhasil diperbaharui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data pasien. Silakan coba lagi.');
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {
            $pasien = Pasien::findOrFail($id);
            $pasien->delete();

            // Delete related records
            Rekam::where('pasien_id', $id)->delete();
            RekamGigi::where('pasien_id', $id)->delete();
            PengeluaranObat::where('pasien_id', $id)->delete();

            DB::commit();
            return redirect()->route('pasien')->with('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus data pasien. Silakan coba lagi.');
        }
    }
}
