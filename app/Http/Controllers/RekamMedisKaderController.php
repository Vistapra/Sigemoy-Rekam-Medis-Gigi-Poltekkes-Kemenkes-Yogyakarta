<?php

namespace App\Http\Controllers;

use App\Models\RekamMedisKader;
use App\Models\Pasien;
use App\Models\NamaKondisiGigi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RekamMedisKaderController extends Controller
{
    public function index(Request $request)
    {
        $query = RekamMedisKader::with(['pasien', 'namaKondisiGigi', 'user']);

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('pasien', function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%");
                })->orWhereHas('namaKondisiGigi', function ($q) use ($search) {
                    $q->where('nama_kondisi', 'like', "%{$search}%");
                })->orWhereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            });
        }

        $rekamMedisKader = $query->latest()->paginate(10);
        $pasien = Pasien::all();

        return view('rekammediskaderkesehatan.index', compact('rekamMedisKader', 'pasien'));
    }

    public function create($pasien_id)
    {
        $pasien = Pasien::findOrFail($pasien_id);
        $kondisiGigi = NamaKondisiGigi::all();

        return view('rekammediskaderkesehatan.create', compact('pasien', 'kondisiGigi'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pasien_id' => 'required|exists:pasien,id',
            'kondisi_gigi' => 'required|array',
            'kondisi_gigi.*' => 'exists:namakondisigigi,id',
            'total' => 'required|array',
            'total.*' => 'numeric',
            'keterangan' => 'nullable|array',
            'keterangan.*' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $rekamMedisData = array_map(function ($index) use ($request, $validatedData) {
                return [
                    'pasien_id' => $validatedData['pasien_id'],
                    'user_id' => Auth::id(),
                    'namakondisigigi_id' => $validatedData['kondisi_gigi'][$index],
                    'total' => $validatedData['total'][$index],
                    'keterangan' => $validatedData['keterangan'][$index] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }, array_keys($validatedData['kondisi_gigi']));

            RekamMedisKader::insert($rekamMedisData);

            DB::commit();

            return redirect()->route('opsiview.opsiedukasi')->with('success', 'Rekam medis kader berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(RekamMedisKader $rekamMedisKader)
    {
        $kondisiGigi = NamaKondisiGigi::all();
        return view('rekammediskaderkesehatan.edit', compact('rekamMedisKader', 'kondisiGigi'));
    }

    public function update(Request $request, RekamMedisKader $rekamMedisKader)
    {
        $validatedData = $request->validate([
            'namakondisigigi_id' => 'required|exists:namakondisigigi,id',
            'total' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        try {
            $rekamMedisKader->update($validatedData);
            return redirect()->route('rekam.detail', ['id' => $rekamMedisKader->pasien_id])
                ->with('success', 'Rekam medis kader berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $rekamMedisKader = RekamMedisKader::findOrFail($id);
        $rekamMedisKader->delete();
        return redirect()->route('rekammediskaderkesehatan.index')
            ->with('success', 'Kondisi gigi berhasil dihapus.');
    }

    public function show(RekamMedisKader $rekamMedisKader)
    {
        return view('rekammediskaderkesehatan.show', compact('rekamMedisKader'));
    }
}
