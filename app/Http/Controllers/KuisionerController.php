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
use Illuminate\Support\Facades\Log;
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
        // Log untuk debugging
        Log::info('Store Kategori Request', $request->all());
        
        $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);

        DB::beginTransaction();
        try {
            // Cek apakah kategori dengan nama yang sama sudah ada (dalam waktu 5 detik terakhir)
            $existingCategory = KategoriPertanyaan::where('nama_kategori', $request->nama_kategori)
                ->where('created_at', '>=', now()->subSeconds(5))
                ->first();
                
            if ($existingCategory) {
                DB::rollback();
                return response()->json(['message' => 'Kategori dengan nama yang sama baru saja dibuat.'], 409);
            }

            $kategori = KategoriPertanyaan::create([
                'nama_kategori' => $request->nama_kategori
            ]);
            
            DB::commit();
            Log::info('Kategori berhasil dibuat', ['id' => $kategori->id]);
            
            return response()->json(['message' => 'Kategori pertanyaan berhasil ditambahkan.']);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error creating kategori', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal menambahkan kategori pertanyaan.'], 500);
        }
    }

    public function updateKategori(Request $request, $id)
    {
        Log::info('Update Kategori Request', ['id' => $id, 'data' => $request->all()]);
        
        $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);

        DB::beginTransaction();
        try {
            $kategori = KategoriPertanyaan::findOrFail($id);
            $kategori->update([
                'nama_kategori' => $request->nama_kategori
            ]);
            
            DB::commit();
            Log::info('Kategori berhasil diupdate', ['id' => $id]);
            
            return response()->json(['message' => 'Kategori berhasil diperbarui.']);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error updating kategori', ['id' => $id, 'error' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal memperbarui kategori.'], 500);
        }
    }

    public function deleteKategori($id)
    {
        Log::info('Delete Kategori Request', ['id' => $id]);
        
        DB::beginTransaction();
        try {
            $kategori = KategoriPertanyaan::findOrFail($id);
            $kategori->delete();
            
            DB::commit();
            Log::info('Kategori berhasil dihapus', ['id' => $id]);
            
            return response()->json(['message' => 'Kategori berhasil dihapus.']);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error deleting kategori', ['id' => $id, 'error' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal menghapus kategori.'], 500);
        }
    }

    // Pertanyaan
    public function storePertanyaan(Request $request, $kategori_id)
    {
        Log::info('Store Pertanyaan Request', ['kategori_id' => $kategori_id, 'data' => $request->all()]);
        
        $request->validate([
            'teks_pertanyaan' => 'required|string',
            'jenis_jawaban' => 'required|in:single_choice,multiple_choice'
        ]);

        DB::beginTransaction();
        try {
            // Cek duplikasi pertanyaan
            $existingQuestion = Pertanyaan::where('kategori_id', $kategori_id)
                ->where('teks_pertanyaan', $request->teks_pertanyaan)
                ->where('created_at', '>=', now()->subSeconds(5))
                ->first();
                
            if ($existingQuestion) {
                DB::rollback();
                return response()->json(['message' => 'Pertanyaan dengan teks yang sama baru saja dibuat.'], 409);
            }

            $pertanyaan = Pertanyaan::create([
                'kategori_id' => $kategori_id,
                'teks_pertanyaan' => $request->teks_pertanyaan,
                'jenis_jawaban' => $request->jenis_jawaban
            ]);
            
            DB::commit();
            Log::info('Pertanyaan berhasil dibuat', ['id' => $pertanyaan->id]);
            
            return response()->json(['message' => 'Pertanyaan berhasil ditambahkan.']);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error creating pertanyaan', ['kategori_id' => $kategori_id, 'error' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal menambahkan pertanyaan.'], 500);
        }
    }

    public function updatePertanyaan(Request $request, $id)
    {
        Log::info('Update Pertanyaan Request', ['id' => $id, 'data' => $request->all()]);
        
        $request->validate([
            'teks_pertanyaan' => 'required|string',
            'jenis_jawaban' => 'required|in:single_choice,multiple_choice'
        ]);

        DB::beginTransaction();
        try {
            $pertanyaan = Pertanyaan::findOrFail($id);
            $pertanyaan->update([
                'teks_pertanyaan' => $request->teks_pertanyaan,
                'jenis_jawaban' => $request->jenis_jawaban
            ]);
            
            DB::commit();
            Log::info('Pertanyaan berhasil diupdate', ['id' => $id]);
            
            return response()->json(['message' => 'Pertanyaan berhasil diperbarui.']);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error updating pertanyaan', ['id' => $id, 'error' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal memperbarui pertanyaan.'], 500);
        }
    }

    public function deletePertanyaan($id)
    {
        Log::info('Delete Pertanyaan Request', ['id' => $id]);
        
        DB::beginTransaction();
        try {
            $pertanyaan = Pertanyaan::findOrFail($id);
            $pertanyaan->delete();
            
            DB::commit();
            Log::info('Pertanyaan berhasil dihapus', ['id' => $id]);
            
            return response()->json(['message' => 'Pertanyaan berhasil dihapus.']);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error deleting pertanyaan', ['id' => $id, 'error' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal menghapus pertanyaan.'], 500);
        }
    }

    // Opsi Jawaban
    public function storeOpsiJawaban(Request $request, $pertanyaan_id)
    {
        Log::info('Store Opsi Jawaban Request', ['pertanyaan_id' => $pertanyaan_id, 'data' => $request->all()]);
        
        $request->validate([
            'teks_opsi' => 'required|string|max:255'
        ]);

        DB::beginTransaction();
        try {
            // Cek duplikasi opsi jawaban
            $existingOption = OpsiJawaban::where('pertanyaan_id', $pertanyaan_id)
                ->where('teks_opsi', $request->teks_opsi)
                ->where('created_at', '>=', now()->subSeconds(5))
                ->first();
                
            if ($existingOption) {
                DB::rollback();
                return response()->json(['message' => 'Opsi jawaban dengan teks yang sama baru saja dibuat.'], 409);
            }

            $opsiJawaban = OpsiJawaban::create([
                'pertanyaan_id' => $pertanyaan_id,
                'teks_opsi' => $request->teks_opsi
            ]);
            
            DB::commit();
            Log::info('Opsi jawaban berhasil dibuat', ['id' => $opsiJawaban->id]);
            
            return response()->json(['message' => 'Opsi jawaban berhasil ditambahkan.']);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error creating opsi jawaban', ['pertanyaan_id' => $pertanyaan_id, 'error' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal menambahkan opsi jawaban.'], 500);
        }
    }

    public function updateOpsiJawaban(Request $request, $id)
    {
        Log::info('Update Opsi Jawaban Request', ['id' => $id, 'data' => $request->all()]);
        
        $request->validate([
            'teks_opsi' => 'required|string|max:255'
        ]);

        DB::beginTransaction();
        try {
            $opsiJawaban = OpsiJawaban::findOrFail($id);
            $opsiJawaban->update([
                'teks_opsi' => $request->teks_opsi
            ]);
            
            DB::commit();
            Log::info('Opsi jawaban berhasil diupdate', ['id' => $id]);
            
            return response()->json(['message' => 'Opsi jawaban berhasil diperbarui.']);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error updating opsi jawaban', ['id' => $id, 'error' => $e->getMessage()]);
            return response()->json(['message' => 'Gagal memperbarui opsi jawaban.'], 500);
        }
    }

    public function deleteOpsiJawaban($id)
    {
        Log::info('Delete Opsi Jawaban Request', ['id' => $id]);
        
        DB::beginTransaction();
        try {
            $opsiJawaban = OpsiJawaban::findOrFail($id);
            $opsiJawaban->delete();
            
            DB::commit();
            Log::info('Opsi jawaban berhasil dihapus', ['id' => $id]);
            
            return response()->json(['message' => 'Opsi jawaban berhasil dihapus.']);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error deleting opsi jawaban', ['id' => $id, 'error' => $e->getMessage()]);
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
        // Log data yang diterima untuk debugging
        Log::info('Data jawaban yang diterima:', $request->all());

        // Custom validation untuk menangani perbedaan struktur single choice dan multiple choice
        $validator = Validator::make($request->all(), [
            'jawaban' => 'nullable|array',
            'jawaban.*' => 'nullable|array',
            'jawaban.*.keterangan' => 'nullable|string|max:1000',
        ]);

        // Validasi khusus untuk opsi jawaban
        $validator->after(function ($validator) use ($request) {
            if ($request->has('jawaban')) {
                foreach ($request->jawaban as $pertanyaan_id => $jawaban) {
                    // Cek apakah pertanyaan ada
                    $pertanyaan = Pertanyaan::find($pertanyaan_id);
                    if (!$pertanyaan) {
                        $validator->errors()->add("jawaban.{$pertanyaan_id}", 'Pertanyaan tidak ditemukan.');
                        continue;
                    }

                    // Validasi opsi jawaban jika ada
                    if (isset($jawaban['opsi_jawaban_id'])) {
                        if ($pertanyaan->jenis_jawaban == 'single_choice') {
                            // Single choice: harus berupa string/integer
                            if (is_array($jawaban['opsi_jawaban_id'])) {
                                $validator->errors()->add("jawaban.{$pertanyaan_id}.opsi_jawaban_id", 'Single choice tidak boleh berupa array.');
                            } else {
                                // Validasi apakah opsi jawaban ada
                                $opsi = OpsiJawaban::where('id', $jawaban['opsi_jawaban_id'])
                                    ->where('pertanyaan_id', $pertanyaan_id)
                                    ->first();
                                if (!$opsi) {
                                    $validator->errors()->add("jawaban.{$pertanyaan_id}.opsi_jawaban_id", 'Opsi jawaban tidak valid.');
                                }
                            }
                        } else {
                            // Multiple choice: harus berupa array
                            if (!is_array($jawaban['opsi_jawaban_id'])) {
                                $validator->errors()->add("jawaban.{$pertanyaan_id}.opsi_jawaban_id", 'Multiple choice harus berupa array.');
                            } else {
                                // Validasi setiap opsi jawaban
                                foreach ($jawaban['opsi_jawaban_id'] as $opsi_id) {
                                    if (!empty($opsi_id)) {
                                        $opsi = OpsiJawaban::where('id', $opsi_id)
                                            ->where('pertanyaan_id', $pertanyaan_id)
                                            ->first();
                                        if (!$opsi) {
                                            $validator->errors()->add("jawaban.{$pertanyaan_id}.opsi_jawaban_id", "Opsi jawaban {$opsi_id} tidak valid.");
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        });

        if ($validator->fails()) {
            Log::error('Validasi gagal:', $validator->errors()->toArray());
            return response()->json(['message' => 'Validasi gagal', 'errors' => $validator->errors()], 422);
        }

        DB::beginTransaction();

        try {
            $pasien = Pasien::findOrFail($pasien_id);

            // Hapus jawaban sebelumnya
            JawabanPasien::where('pasien_id', $pasien_id)->delete();

            if ($request->has('jawaban')) {
                foreach ($request->jawaban as $pertanyaan_id => $jawaban) {
                    if (isset($jawaban['opsi_jawaban_id'])) {
                        $pertanyaan = Pertanyaan::findOrFail($pertanyaan_id);
                        $keterangan = $jawaban['keterangan'] ?? null;
                        
                        Log::info("Memproses pertanyaan {$pertanyaan_id}", [
                            'jenis' => $pertanyaan->jenis_jawaban,
                            'opsi_jawaban_id' => $jawaban['opsi_jawaban_id'],
                            'keterangan' => $keterangan
                        ]);
                        
                        if ($pertanyaan->jenis_jawaban == 'multiple_choice') {
                            // Multiple choice - jawaban harus berupa array
                            if (is_array($jawaban['opsi_jawaban_id'])) {
                                foreach ($jawaban['opsi_jawaban_id'] as $opsi_jawaban_id) {
                                    if (!empty($opsi_jawaban_id)) {
                                        JawabanPasien::create([
                                            'pasien_id' => $pasien_id,
                                            'pertanyaan_id' => $pertanyaan_id,
                                            'opsi_jawaban_id' => $opsi_jawaban_id,
                                            'keterangan' => $keterangan
                                        ]);
                                        Log::info("Jawaban multiple choice disimpan: {$opsi_jawaban_id}");
                                    }
                                }
                            }
                        } else {
                            // Single choice - jawaban berupa string/integer
                            if (!is_array($jawaban['opsi_jawaban_id']) && !empty($jawaban['opsi_jawaban_id'])) {
                                JawabanPasien::create([
                                    'pasien_id' => $pasien_id,
                                    'pertanyaan_id' => $pertanyaan_id,
                                    'opsi_jawaban_id' => $jawaban['opsi_jawaban_id'],
                                    'keterangan' => $keterangan
                                ]);
                                Log::info("Jawaban single choice disimpan: {$jawaban['opsi_jawaban_id']}");
                            }
                        }
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
            Log::error('Model tidak ditemukan:', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Data pasien atau pertanyaan tidak ditemukan.'], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error saat menyimpan jawaban:', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan jawaban. Silakan coba lagi.'], 500);
        }
    }
}