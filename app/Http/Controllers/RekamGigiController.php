<?php

namespace App\Http\Controllers;

use App\Models\KondisiGigi;
use App\Models\Rekam;
use App\Models\RekamGigi;
use App\Models\Tindakan;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekamGigiController extends Controller
{
    public function index($pasienId)
    {
        $pasien = Pasien::findOrFail($pasienId);
        $tindakan = Tindakan::all();
        $kondisi_gigi = KondisiGigi::all();
        $pem_gigi = RekamGigi::where('pasien_id', $pasienId)->get();
        $elemen_gigis = $pem_gigi->pluck('elemen_gigi')->toJson(); // Ubah ini
        $pemeriksaan_gigi = $pem_gigi->pluck('pemeriksaan')->toJson(); // Dan ini

        return view('rekam.rekam-gigi', compact('pasien', 'tindakan', 'kondisi_gigi', 'elemen_gigis', 'pemeriksaan_gigi', 'pem_gigi'));
    }

    public function store(Request $request, $pasienId)
    {
        if (!$request->has('element_gigi') || empty($request->element_gigi)) {
            return redirect()->back()->with('gagal', 'Tambahkan dulu rincian pemeriksaan baru menyimpan data');
        }

        try {
            DB::transaction(function () use ($request, $pasienId) {
                RekamGigi::where('pasien_id', $pasienId)->delete();

                $userId = auth()->id();
                $rekam = Rekam::firstOrCreate(
                    ['pasien_id' => $pasienId],
                    [
                        'tgl_rekam' => now(),
                        'user_id' => $userId,
                        'keluhan' => $request->keluhan ?? 'Tidak ada keluhan',
                    ]
                );

                $rekamGigiData = array_map(function ($elementId, $pemeriksaan, $diagnosa, $tindakan) use ($pasienId, $userId, $rekam) {
                    return [
                        'pasien_id' => $pasienId,
                        'user_id' => $userId,
                        'rekam_id' => $rekam->id,
                        'elemen_gigi' => $elementId,
                        'pemeriksaan' => $pemeriksaan ?? null,
                        'diagnosa' => $diagnosa ?? null,
                        'tindakan' => $tindakan ?? null,
                    ];
                }, $request->element_gigi, $request->pemeriksaan ?? [], $request->diagnosa ?? [], $request->tindakan ?? []);

                RekamGigi::insert($rekamGigiData);
            });

            return redirect()->route('opsiview.opsiedukasi')->with('sukses', 'Rekam Gigi Berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('rekam.gigi.add', $pasienId)->with('gagal', 'Data Gagal ditambahkan. Error: ' . $e->getMessage());
        }
    }

    public function edit($pasienId)
    {
        $pasien = Pasien::findOrFail($pasienId);

        $rekam = Rekam::where('pasien_id', $pasienId)->latest()->first();

        if (!$rekam) {
            return redirect()->route('rekam.tambah', ['pasienid' => $pasienId])
                ->with('info', 'Belum ada rekam medis untuk pasien ini. Silakan tambahkan rekam baru.');
        }


        $tindakan = Tindakan::all();
        $kondisi_gigi = KondisiGigi::all();
        $pem_gigi = RekamGigi::where('pasien_id', $pasienId)->get();
        $elemen_gigis = $pem_gigi->pluck('elemen_gigi')->implode(',');
        $pemeriksaan_gigi = $pem_gigi->pluck('pemeriksaan')->implode(',');

        return view('rekam.edit-rekam-gigi', compact('pasien', 'tindakan', 'kondisi_gigi', 'pem_gigi', 'elemen_gigis', 'pemeriksaan_gigi'));
    }

    public function update(Request $request, $pasienId)
    {
        try {
            DB::transaction(function () use ($request, $pasienId) {
                RekamGigi::where('pasien_id', $pasienId)->delete();

                $userId = auth()->id();
                $rekam = Rekam::updateOrCreate(
                    ['pasien_id' => $pasienId],
                    [
                        'tgl_rekam' => now(),
                        'user_id' => $userId,
                        'keluhan' => $request->keluhan ?? 'Tidak ada keluhan',
                    ]
                );

                $rekamGigiData = array_map(function ($elementId, $pemeriksaan, $diagnosa, $tindakan) use ($pasienId, $userId, $rekam) {
                    return [
                        'pasien_id' => $pasienId,
                        'user_id' => $userId,
                        'rekam_id' => $rekam->id,
                        'elemen_gigi' => $elementId,
                        'pemeriksaan' => $pemeriksaan ?? null,
                        'diagnosa' => $diagnosa ?? null,
                        'tindakan' => $tindakan ?? null,
                    ];
                }, $request->element_gigi, $request->pemeriksaan ?? [], $request->diagnosa ?? [], $request->tindakan ?? []);

                RekamGigi::insert($rekamGigiData);
            });

            return redirect()->route('rekam.detail-rekam', $pasienId)->with('sukses', 'Data Rekam Gigi berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->route('rekam.gigi.edit', $pasienId)->with('gagal', 'Data Gagal diperbarui. Error: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        $data = RekamGigi::findOrFail($id);
        $pasienId = $data->pasien_id;
        $data->delete();
        return redirect()->route('rekam.gigi.add', $pasienId)->with('sukses', 'Data berhasil dihapus');
    }

    protected function getColorForCondition($condition)
    {
        $colors = [
            "_" => "#bda25c",
            "∑" => "#fe8024",
            "Ο" => "#ff2e2e",
            "X" => "#b1b1b1",
            "V" => "#2d28ff",
            "⚫" => "#2bc155"
        ];
        return $colors[$condition] ?? "#FFFFFF";
    }
}
