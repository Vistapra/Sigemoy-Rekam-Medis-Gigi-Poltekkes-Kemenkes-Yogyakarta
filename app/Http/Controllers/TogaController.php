<?php

namespace App\Http\Controllers;

use App\Models\Toga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TogaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Toga::query();

        if ($search) {
            $query->where('judul', 'LIKE', "%{$search}%")
                ->orWhere('deskripsi', 'LIKE', "%{$search}%");
        }

        $toga = $query->latest()->paginate(12);

        return view('toga.index', compact('toga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        DB::beginTransaction();

        try {
            $toga = new Toga();
            $toga->judul = $request->judul;
            $toga->deskripsi = $request->deskripsi;

            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('public/toga');
                $toga->foto = str_replace('public/', '', $fotoPath);
            }

            $toga->save();

            DB::commit();
            return redirect()->route('toga.index')->with('success', 'Toga berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function show(Toga $toga)
    {
        return view('toga.show', compact('toga'));
    }

    public function edit(Toga $toga)
    {
        return view('toga.edit', compact('toga'));
    }

    public function update(Request $request, Toga $toga)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        DB::beginTransaction();

        try {
            $toga->judul = $request->judul;
            $toga->deskripsi = $request->deskripsi;

            if ($request->hasFile('foto')) {
                if ($toga->foto) {
                    Storage::delete('public/' . $toga->foto);
                }

                $fotoPath = $request->file('foto')->store('public/toga');
                $toga->foto = str_replace('public/', '', $fotoPath);
            }

            $toga->save();

            DB::commit();
            return redirect()->route('toga.index')->with('success', 'Toga berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(Toga $toga)
    {
        DB::beginTransaction();

        try {
            if ($toga->foto) {
                Storage::delete('public/' . $toga->foto);
            }

            $toga->delete();

            DB::commit();
            return redirect()->route('toga.index')->with('success', 'Toga berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
