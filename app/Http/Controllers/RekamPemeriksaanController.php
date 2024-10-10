<?php

namespace App\Http\Controllers;

use App\Models\Rekam;
use App\Models\RekamDiagnosa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekamPemeriksaanController extends Controller
{
    public function pemeriksaan(Request $request)
    {
        $validatedData = $request->validate([
            'rekam_id' => 'required',
            'pasien_id' => 'required',
            'pemeriksaan' => 'required',
        ]);

        try {
            $rekam = Rekam::findOrFail($validatedData['rekam_id']);
            $rekam->update(['pemeriksaan' => $validatedData['pemeriksaan']]);

            return redirect()->route('rekam.detail', $validatedData['pasien_id'])
                ->with('sukses', 'Pemeriksaan berhasil diperbaharui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui pemeriksaan. Silakan coba lagi.');
        }
    }

    public function diagnosa_delete($id)
    {
        try {
            $rekam = RekamDiagnosa::findOrFail($id);
            $pasien_id = $rekam->pasien_id;
            $rekam->delete();

            return redirect()->route('rekam.detail', $pasien_id)
                ->with('sukses', 'Diagnosa berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus diagnosa. Silakan coba lagi.');
        }
    }

    public function diagnosa(Request $request)
    {
        $validatedData = $request->validate([
            'rekam_id' => 'required',
            'pasien_id' => 'required',
            'diagnosa' => 'required',
        ]);

        try {
            RekamDiagnosa::updateOrCreate(
                ['pasien_id' => $validatedData['pasien_id'], 'rekam_id' => $validatedData['rekam_id']],
                ['diagnosa' => $validatedData['diagnosa']]
            );

            return redirect()->route('rekam.detail', $validatedData['pasien_id'])
                ->with('sukses', 'Diagnosa berhasil diperbaharui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui diagnosa. Silakan coba lagi.');
        }
    }

    public function tindakan(Request $request)
    {
        $validatedData = $request->validate([
            'rekam_id' => 'required',
            'pasien_id' => 'required',
            'tindakan' => 'required',
        ]);

        try {
            $rekam = Rekam::findOrFail($validatedData['rekam_id']);
            $rekam->update(['tindakan' => $validatedData['tindakan']]);

            return redirect()->route('rekam.detail', $validatedData['pasien_id'])
                ->with('sukses', 'Tindakan berhasil diperbaharui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui tindakan. Silakan coba lagi.');
        }
    }

    public function resep(Request $request)
    {
        $validatedData = $request->validate([
            'rekam_id' => 'required',
            'pasien_id' => 'required',
            'resep_obat' => 'required',
        ]);

        try {
            $rekam = Rekam::findOrFail($validatedData['rekam_id']);
            $rekam->update(['resep_obat' => $validatedData['resep_obat']]);

            return redirect()->route('rekam.detail', $validatedData['pasien_id'])
                ->with('sukses', 'Resep Obat berhasil diperbaharui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui resep obat. Silakan coba lagi.');
        }
    }

    public function file($id, $type)
    {
        $data = Rekam::findOrFail($id);
        return view('rekam.file', compact('data', 'type'));
    }

    public function insertToTableNew()
    {
        try {
            DB::transaction(function () {
                Rekam::whereNotNull('diagnosa')->chunk(100, function ($rekams) {
                    foreach ($rekams as $rekam) {
                        RekamDiagnosa::updateOrCreate(
                            ['pasien_id' => $rekam->pasien_id, 'rekam_id' => $rekam->id],
                            ['diagnosa' => $rekam->diagnosa]
                        );
                    }
                });
            });

            return redirect()->back()->with('sukses', 'Data diagnosa berhasil dimigrasi.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal melakukan migrasi data diagnosa. Silakan coba lagi.');
        }
    }
}
