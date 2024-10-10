<?php

namespace App\Http\Controllers;

use App\Models\Edukasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class EdukasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Edukasi::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'LIKE', "%{$search}%")
                    ->orWhere('deskripsi', 'LIKE', "%{$search}%");
            });
        }

        $edukasi = $query->latest()->paginate(15);

        return view('edukasi.index', compact('edukasi'));
    }

    public function create()
    {
        return view('edukasi.create');
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateEdukasiRequest($request);

        try {
            $edukasi = new Edukasi($validatedData);
            $this->handleMediaUpload($request, $edukasi);
            $edukasi->save();

            Cache::forget('edukasi_list');

            return redirect()->route('edukasi.index')->with('success', 'Konten edukasi berhasil dibuat.');
        } catch (\Exception $e) {
            return redirect()->route('edukasi.index')->with('error', 'Terjadi kesalahan saat membuat konten edukasi: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $edukasi = Cache::remember("edukasi_{$id}", 3600, function () use ($id) {
            return Edukasi::findOrFail($id);
        });

        return view('edukasi.show', compact('edukasi'));
    }

    public function edit(Edukasi $edukasi)
    {
        return view('edukasi.edit', compact('edukasi'));
    }

    public function update(Request $request, Edukasi $edukasi)
    {
        $validatedData = $this->validateEdukasiRequest($request);

        try {
            $this->handleMediaDeletion($edukasi, $request->media_type);
            $this->handleMediaUpload($request, $edukasi);
            $edukasi->update($validatedData);

            Cache::forget("edukasi_{$edukasi->id}");
            Cache::forget('edukasi_list');

            return redirect()->route('edukasi.index')->with('success', 'Konten edukasi berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('edukasi.index')->with('error', 'Terjadi kesalahan saat memperbarui konten edukasi: ' . $e->getMessage());
        }
    }

    public function destroy(Edukasi $edukasi)
    {
        DB::beginTransaction();

        try {
            // Hapus file dari storage jika ada
            if ($edukasi->media_path) {
                Storage::delete('public/' . $edukasi->media_path);
            }

            // Hapus record dari database
            $edukasi->delete();

            // Hapus cache
            Cache::forget("edukasi_{$edukasi->id}");
            Cache::forget('edukasi_list');

            DB::commit();
            return redirect()->route('edukasi.index')->with('success', 'Konten edukasi berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus konten edukasi: ' . $e->getMessage());
        }
    }

    private function validateEdukasiRequest(Request $request)
    {
        return $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'media_type' => 'required|in:foto,video_upload,video_url',
            'foto' => 'nullable|image|max:5120', // max 5MB
            'video' => 'nullable|file|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:102400', // max 100MB
            'video_url' => 'nullable|url',
        ]);
    }

    private function handleMediaUpload(Request $request, Edukasi $edukasi)
    {
        switch ($request->media_type) {
            case 'foto':
                if ($request->hasFile('foto')) {
                    $edukasi->media_path = $request->file('foto')->store('fotos', 'public');
                }
                break;
            case 'video_upload':
                if ($request->hasFile('video')) {
                    $edukasi->media_path = $request->file('video')->store('videos', 'public');
                }
                break;
            case 'video_url':
                $edukasi->video_url = $request->video_url;
                break;
        }
    }

    protected function handleMediaDeletion(Edukasi $edukasi, ?string $newMediaType = null)
    {
        if ($edukasi->media_path) {
            if (!$newMediaType || $edukasi->media_type !== $newMediaType) {
                // Hapus file dari storage
                Storage::disk('public')->delete($edukasi->media_path);

                // Reset media_path di model
                $edukasi->media_path = null;
                $edukasi->save();
            }
        }

        // Jika ada video_url, hapus juga
        if ($edukasi->video_url && $newMediaType !== 'video_url') {
            $edukasi->video_url = null;
            $edukasi->save();
        }
    }

    // Metode tambahan untuk mengambil daftar edukasi dengan caching
    public function getEdukasiList()
    {
        return Cache::remember('edukasi_list', 3600, function () {
            return Edukasi::latest()->get();
        });
    }
}