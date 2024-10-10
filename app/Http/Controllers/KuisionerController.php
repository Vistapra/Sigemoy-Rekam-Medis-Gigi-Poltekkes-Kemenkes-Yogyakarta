<?php

namespace App\Http\Controllers;

use App\Models\Rekam;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Pertanyaan;
use App\Models\OpsiJawaban;
use Illuminate\Http\Request;
use App\Models\JawabanPasien;
use App\Models\KategoriPertanyaan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KuisionerController extends Controller
{
    public function index()
    {
        $kategori = KategoriPertanyaan::with('pertanyaan.opsiJawaban')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('kuisioner.index', compact('kategori'));
    }

    // Kategori
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        try {
            KategoriPertanyaan::create($request->all());
            return response()->json(['message' => 'Kategori pertanyaan berhasil ditambahkan.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menambahkan kategori pertanyaan.'], 500);
        }
    }

    public function updateKategori(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        try {
            $kategori = KategoriPertanyaan::findOrFail($id);
            $kategori->update($request->all());
            return response()->json(['message' => 'Kategori berhasil diperbarui.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui kategori.'], 500);
        }
    }

    public function deleteKategori($id)
    {
        try {
            KategoriPertanyaan::destroy($id);
            return response()->json(['message' => 'Kategori berhasil dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus kategori.'], 500);
        }
    }

    // Pertanyaan
    public function storePertanyaan(Request $request, $kategori_id)
    {
        $request->validate([
            'teks_pertanyaan' => 'required'
        ]);

        try {
            $pertanyaan = new Pertanyaan([
                'kategori_id' => $kategori_id,
                'teks_pertanyaan' => $request->teks_pertanyaan
            ]);
            $pertanyaan->save();
            return response()->json(['message' => 'Pertanyaan berhasil ditambahkan.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menambahkan pertanyaan.'], 500);
        }
    }

    public function updatePertanyaan(Request $request, $id)
    {
        $request->validate([
            'teks_pertanyaan' => 'required'
        ]);

        try {
            $pertanyaan = Pertanyaan::findOrFail($id);
            $pertanyaan->update($request->all());
            return response()->json(['message' => 'Pertanyaan berhasil diperbarui.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui pertanyaan.'], 500);
        }
    }

    public function deletePertanyaan($id)
    {
        try {
            Pertanyaan::destroy($id);
            return response()->json(['message' => 'Pertanyaan berhasil dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus pertanyaan.'], 500);
        }
    }

    // Opsi Jawaban
    public function storeOpsiJawaban(Request $request, $pertanyaan_id)
    {
        $request->validate([
            'teks_opsi' => 'required'
        ]);

        try {
            $opsiJawaban = new OpsiJawaban([
                'pertanyaan_id' => $pertanyaan_id,
                'teks_opsi' => $request->teks_opsi
            ]);
            $opsiJawaban->save();
            return response()->json(['message' => 'Opsi jawaban berhasil ditambahkan.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menambahkan opsi jawaban.'], 500);
        }
    }

    public function updateOpsiJawaban(Request $request, $id)
    {
        $request->validate([
            'teks_opsi' => 'required'
        ]);

        try {
            $opsiJawaban = OpsiJawaban::findOrFail($id);
            $opsiJawaban->update($request->all());
            return response()->json(['message' => 'Opsi jawaban berhasil diperbarui.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui opsi jawaban.'], 500);
        }
    }

    public function deleteOpsiJawaban($id)
    {
        try {
            OpsiJawaban::destroy($id);
            return response()->json(['message' => 'Opsi jawaban berhasil dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus opsi jawaban.'], 500);
        }
    }

    // Jawaban Kuisioner
    public function jawabKuisioner($pasien_id)
    {
        $pasien = Pasien::findOrFail($pasien_id);
        $kategori = KategoriPertanyaan::with('pertanyaan.opsiJawaban')->get();
        return view('kuisioner.jawab', compact('pasien', 'kategori'));
    }

    public function simpanJawaban(Request $request, $pasien_id)
{
    $validator = Validator::make($request->all(), [
        'jawaban' => 'nullable|array',
        'jawaban.*' => 'nullable|array',
        'jawaban.*.opsi_jawaban_id' => 'nullable|exists:opsi_jawaban,id',
        'jawaban.*.keterangan' => 'nullable|string|max:1000',
    ]);

    if ($validator->fails()) {
        return response()->json(['message' => 'Validasi gagal', 'errors' => $validator->errors()], 422);
    }

    DB::beginTransaction();

    try {
        $pasien = Pasien::findOrFail($pasien_id);

        JawabanPasien::where('pasien_id', $pasien_id)->delete();

        if ($request->has('jawaban')) {
            foreach ($request->jawaban as $pertanyaan_id => $jawaban) {
                if (isset($jawaban['opsi_jawaban_id'])) {
                    $opsi_jawaban_id = $jawaban['opsi_jawaban_id'];
                    $keterangan = $jawaban['keterangan'] ?? null;

                    Pertanyaan::findOrFail($pertanyaan_id);

                    JawabanPasien::create([
                        'pasien_id' => $pasien_id,
                        'pertanyaan_id' => $pertanyaan_id,
                        'opsi_jawaban_id' => $opsi_jawaban_id,
                        'keterangan' => $keterangan
                    ]);
                }
            }
        }

        DB::commit();

        $user = auth()->user();
        $userRole = $user->role;

        $message = 'Jawaban kuisioner berhasil disimpan.';
        $redirectUrl = route('rekam.add', ['pasien_id' => $pasien_id]);

        if ($userRole == 1 || $userRole == 3) { // Admin atau Dokter
            $message .= ' Silakan buat rekam medis baru.';
        } elseif ($userRole == 2) { // KaderKesehatan
            $message .= ' Silakan buat rekam medis baru.';
        } else {
            return response()->json(['message' => 'Anda tidak memiliki izin untuk mengakses halaman selanjutnya.'], 403);
        }

        return response()->json([
            'message' => $message,
            'redirect_url' => $redirectUrl
        ]);

    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        DB::rollBack();
        return response()->json(['message' => 'Data pasien atau pertanyaan tidak ditemukan.'], 404);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['message' => 'Terjadi kesalahan saat menyimpan jawaban. Silakan coba lagi.'], 500);
    }
}
}