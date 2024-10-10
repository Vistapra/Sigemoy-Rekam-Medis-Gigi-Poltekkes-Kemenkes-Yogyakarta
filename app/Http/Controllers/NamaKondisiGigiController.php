<?php

namespace App\Http\Controllers;

use App\Models\NamaKondisiGigi;
use Illuminate\Http\Request;

class NamaKondisiGigiController extends Controller
{
    public function index()
    {
        $namaKondisiGigi = NamaKondisiGigi::all();
        return view('rekammediskader.index', compact('namaKondisiGigi'));
    }

    public function create()
    {
        return view('rekammediskader.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kondisi' => 'required|string|max:255|unique:namakondisigigi,nama_kondisi',
        ]);

        try {
            NamaKondisiGigi::create($validatedData);
            return redirect()->route('rekammediskader.index')
                ->with('success', 'Kondisi gigi berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('rekammediskader.index')
                ->with('error', 'Terjadi kesalahan saat menambahkan kondisi gigi.');
        }
    }

    public function edit($id)
    {
        $namaKondisiGigi = NamaKondisiGigi::findOrFail($id);
        return view('namakondisigigi.edit', compact('namaKondisiGigi'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_kondisi' => 'required|string|max:255|unique:namakondisigigi,nama_kondisi,' . $id,
        ]);

        try {
            $namaKondisiGigi = NamaKondisiGigi::findOrFail($id);
            $namaKondisiGigi->update($validatedData);

            return redirect()->route('rekammediskader.index')
                ->with('success', 'Kondisi gigi berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('rekammediskader.index')
                ->with('error', 'Terjadi kesalahan saat memperbarui kondisi gigi.');
        }
    }

    public function destroy($id)
    {
        try {
            NamaKondisiGigi::findOrFail($id)->delete();
            return response()->json(['success' => true, 'message' => 'Kondisi gigi berhasil dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat menghapus kondisi gigi.'], 500);
        }
    }
}
