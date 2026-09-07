<?php

namespace App\Http\Controllers;

use App\Models\Rekam;
use App\Models\Pasien;
use App\Models\Tindakan;
use App\Models\RekamGigi;
use App\Models\KondisiGigi;
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
        try {
            DB::beginTransaction();

            // Validasi input
            $request->validate([
                'element_gigi' => 'required|array',
                'pemeriksaan' => 'required|array',
                'diagnosa' => 'required|array',
                'tindakan' => 'required|array',
                'catatan_perencanaan' => 'nullable|array',
                'catatan_tindakan' => 'nullable|array',
                'catatan_evaluasi' => 'nullable|array',
                'catatan_diagnosa' => 'nullable|array',
            ]);

            // Create new Rekam record
            $rekam = Rekam::create([
                'tgl_rekam' => date('Y-m-d'),
                'pasien_id' => $pasienId,
                'user_id' => auth()->id(),
                'keluhan' => 'Pemeriksaan Gigi',
                'no_rekam' => $this->generateNoRekam(),
                'petugas_id' => auth()->id(),
            ]);

            // Loop through each tooth data
            $elementGigi = $request->input('element_gigi', []);
            $pemeriksaan = $request->input('pemeriksaan', []);
            $diagnosa = $request->input('diagnosa', []);
            $tindakan = $request->input('tindakan', []);
            $catatanPerencanaan = $request->input('catatan_perencanaan', []);
            $catatanTindakan = $request->input('catatan_tindakan', []);
            $catatanEvaluasi = $request->input('catatan_evaluasi', []);
            $catatanDiagnosa = $request->input('catatan_diagnosa', []);

            for ($i = 0; $i < count($elementGigi); $i++) {
                RekamGigi::create([
                    'rekam_id' => $rekam->id,
                    'pasien_id' => $pasienId,
                    'user_id' => auth()->id(),
                    'elemen_gigi' => $elementGigi[$i] ?? '',
                    'pemeriksaan' => $pemeriksaan[$i] ?? '',
                    'diagnosa' => $diagnosa[$i] ?? '',
                    'tindakan' => $tindakan[$i] ?? '',
                    'catatan_perencanaan' => $catatanPerencanaan[$i] ?? null,
                    'catatan_tindakan' => $catatanTindakan[$i] ?? null,
                    'catatan_evaluasi' => $catatanEvaluasi[$i] ?? null,
                    'catatan_diagnosa' => $catatanDiagnosa[$i] ?? null,
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data rekam gigi berhasil disimpan',
                'redirect_url' => route('opsiview.opsiedukasi')
            ]);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    // Method untuk generate nomor rekam medis
    private function generateNoRekam()
    {
        $lastRekam = Rekam::orderBy('id', 'desc')->first();
        $lastNumber = $lastRekam ? intval(substr($lastRekam->no_rekam, -6)) : 0;
        $newNumber = $lastNumber + 1;

        return 'RM' . date('Ymd') . str_pad($newNumber, 6, '0', STR_PAD_LEFT);
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
            DB::beginTransaction();

            // Validasi input
            $request->validate([
                'element_gigi' => 'required|array',
                'pemeriksaan' => 'required|array',
                'diagnosa' => 'required|array',
                'tindakan' => 'required|array',
                'catatan_perencanaan' => 'nullable|array',
                'catatan_tindakan' => 'nullable|array',
                'catatan_evaluasi' => 'nullable|array',
                'catatan_diagnosa' => 'nullable|array',
            ]);

            // Find existing rekam for this patient (assuming latest one)
            $rekam = Rekam::where('pasien_id', $pasienId)
                ->orderBy('id', 'desc')
                ->first();

            if (!$rekam) {
                throw new \Exception('Rekam medis tidak ditemukan');
            }

            // Delete existing rekam gigi records
            RekamGigi::where('rekam_id', $rekam->id)->delete();

            // Create new records
            $elementGigi = $request->input('element_gigi', []);
            $pemeriksaan = $request->input('pemeriksaan', []);
            $diagnosa = $request->input('diagnosa', []);
            $tindakan = $request->input('tindakan', []);
            $catatanPerencanaan = $request->input('catatan_perencanaan', []);
            $catatanTindakan = $request->input('catatan_tindakan', []);
            $catatanEvaluasi = $request->input('catatan_evaluasi', []);
            $catatanDiagnosa = $request->input('catatan_diagnosa', []);

            for ($i = 0; $i < count($elementGigi); $i++) {
                RekamGigi::create([
                    'rekam_id' => $rekam->id,
                    'pasien_id' => $pasienId,
                    'user_id' => auth()->id(),
                    'elemen_gigi' => $elementGigi[$i] ?? '',
                    'pemeriksaan' => $pemeriksaan[$i] ?? '',
                    'diagnosa' => $diagnosa[$i] ?? '',
                    'tindakan' => $tindakan[$i] ?? '',
                    'catatan_perencanaan' => $catatanPerencanaan[$i] ?? null,
                    'catatan_tindakan' => $catatanTindakan[$i] ?? null,
                    'catatan_evaluasi' => $catatanEvaluasi[$i] ?? null,
                    'catatan_diagnosa' => $catatanDiagnosa[$i] ?? null,
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data rekam gigi berhasil diupdate',
                'redirect_url' => route('opsiview.opsiedukasi')
            ]);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
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
