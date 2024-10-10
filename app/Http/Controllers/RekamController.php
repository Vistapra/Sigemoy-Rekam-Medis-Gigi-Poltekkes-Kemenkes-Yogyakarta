<?php

namespace App\Http\Controllers;

use App\Models\Rekam;
use App\Models\Pasien;
use App\Models\RekamGigi;
use App\Models\KondisiGigi;
use App\Models\PengeluaranObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RekamController extends Controller
{
    public function index(Request $request)
    {
        $query = Rekam::latest()->select('rekam.*')
            ->leftJoin('pasien', 'rekam.pasien_id', '=', 'pasien.id');

        if ($request->keyword) {
            $query->where(function ($q) use ($request) {
                $q->where('rekam.tgl_rekam', 'LIKE', "%{$request->keyword}%")
                    ->orWhere('pasien.nama', 'LIKE', "%{$request->keyword}%")
                    ->orWhere('pasien.no_rm', 'LIKE', "%{$request->keyword}%");
            });
        }

        if (!auth()->user()->is_admin) {
            $query->where('user_id', auth()->id());
        }

        $rekam = $query->paginate(10);
        return view('rekam.index', compact('rekam'));
    }

    public function edit($id)
    {
        $data = Rekam::findOrFail($id);
        $pasien = Pasien::all();
        return view('rekam.edit', compact('data', 'pasien'));
    }

    public function tambah($pasienid)
    {
        $pasien = Pasien::findOrFail($pasienid);
        return view('rekam.add', compact('pasien'));
    }

    public function add(Request $request)
    {
        $pasien = Pasien::findOrFail($request->pasien_id);
        return view('rekam.add', compact('pasien'));
    }

    public function detail(Request $request, $pasienId)
    {
        $pasien = Pasien::with(['jawabanPasien.pertanyaan.kategori', 'jawabanPasien.opsiJawaban'])
            ->findOrFail($pasienId);

        $rekamLatest = Rekam::where('pasien_id', $pasienId)->latest()->first();

        $rekam = Rekam::where('pasien_id', $pasienId)
            ->when($request->keyword, function ($query) use ($request) {
                $query->where('tgl_rekam', 'LIKE', "%{$request->keyword}%");
            })
            ->latest()
            ->paginate(5);

        $riwayattindakan = RekamGigi::with(['diagnosis', 'tindak'])->where('pasien_id', $pasienId)
            ->latest()
            ->get()
            ->map(function ($item) {
                $item->created_at = $item->created_at ?? now();
                return $item;
            });

        if ($rekamLatest) {
            auth()->user()->notifications()->where('data->no_rekam', $rekamLatest->no_rekam)->update(['read_at' => now()]);
        }

        $kondisi_gigi = KondisiGigi::all()->groupBy('kode')->map(function ($group) {
            $first = $group->first();
            $first->color = $this->getColorForCondition($first->kode);
            return $first;
        })->values();

        $odontogram_data = RekamGigi::where('pasien_id', $pasienId)->pluck('pemeriksaan', 'elemen_gigi');

        return view('rekam.detail-rekam', compact('pasien', 'pasienId', 'rekam', 'rekamLatest', 'kondisi_gigi', 'odontogram_data', 'riwayattindakan'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'tgl_rekam' => 'required|date',
                'pasien_id' => 'required|exists:pasien,id',
                'keluhan' => 'nullable|string',
            ]);

            DB::beginTransaction();

            $keluhan = $validatedData['keluhan'] ?? 'Tidak ada keluhan';

            $pasien = Pasien::findOrFail($validatedData['pasien_id']);
            $user = auth()->user();

            // Simpan data rekam medis
            $rekam = Rekam::create([
                'tgl_rekam' => $validatedData['tgl_rekam'],
                'pasien_id' => $pasien->id,
                'rekam_id' => $pasien->id,
                'no_rekam' => "REG#" . now()->format('Ymd') . $pasien->id,
                'petugas_id' => $user->id,
                'user_id' => $user->id,
                'keluhan' => $keluhan,
            ]);

            DB::commit();

            if ($user->role == 1) { // Admin role
                return response()->json([
                    'success' => true,
                    'message' => 'Data rekam medis berhasil disimpan.',
                    'rekam_id' => $rekam->id,
                    'pasien_id' => $pasien->id
                ]);
            } else {
                $route = $user->role == 2 ? 'rekammediskaderkesehatan.create' : 'rekam.gigi.add';
                $params = $user->role == 2 ? ['pasien_id' => $pasien->id] : ['pasienId' => $pasien->id];

                return response()->json([
                    'success' => true,
                    'message' => 'Data rekam medis berhasil disimpan.',
                    'redirect' => route($route, $params)
                ]);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.'
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tgl_rekam' => 'required',
            'pasien_id' => 'required|exists:pasien,id',
        ]);

        $rekam = Rekam::findOrFail($id);
        $rekam->update($validatedData);

        return redirect()->route('rekam.detail', $request->pasien_id)
            ->with('sukses', 'Berhasil diperbaharui, Silakan lakukan pemeriksaan dan teruskan ke dokter terkait');
    }

    public function delete($id)
    {
        DB::transaction(function () use ($id) {
            Rekam::findOrFail($id)->delete();
            PengeluaranObat::where('rekam_id', $id)->update(['deleted_at' => now()]);
        });

        return redirect()->route('rekam')->with('sukses', 'Data berhasil dihapus');
    }

    protected function getColorForCondition($condition)
    {
        return [
            "_" => "#bda25c",
            "∑" => "#fe8024",
            "Ο" => "#ff2e2e",
            "X" => "#b1b1b1",
            "V" => "#2d28ff",
            "⚫" => "#2bc155"
        ][$condition] ?? "#FFFFFF";
    }
}
