<?php

namespace App\Http\Controllers;

use App\Models\Tindakan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TindakanController extends Controller
{
    public function index()
    {
        return view('tindakan.index');
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            try {
                $query = Tindakan::query();

                return DataTables::of($query)
                    ->addIndexColumn()
                    ->addColumn('harga_formatted', function ($row) {
                        return 'Rp ' . number_format($row->harga, 0, ',', '.');
                    })
                    ->addColumn('action', function ($row) {
                        return '
                            <button class="btn btn-primary btn-sm edit-tindakan" data-id="' . $row->id . '">Edit</button>
                            <button class="btn btn-danger btn-sm delete-tindakan" data-id="' . $row->id . '">Delete</button>
                        ';
                    })
                    ->rawColumns(['action'])
                    ->toJson();
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
        return response()->json(['error' => 'Invalid request'], 400);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required|unique:tindakan',
            'nama' => 'required'
        ]);

        try {
            $tindakan = Tindakan::create($validatedData);
            return response()->json(['success' => true, 'message' => 'Tindakan berhasil ditambahkan']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menambahkan Tindakan'], 500);
        }
    }

    public function edit($id)
    {
        try {
            $tindakan = Tindakan::findOrFail($id);
            return response()->json($tindakan);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Tindakan tidak ditemukan'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode' => 'required|unique:tindakan,kode,' . $id,
            'nama' => 'required'
        ]);

        try {
            $tindakan = Tindakan::findOrFail($id);
            $tindakan->update($validatedData);
            return response()->json(['success' => true, 'message' => 'Tindakan berhasil diperbaharui']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal memperbarui Tindakan'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $tindakan = Tindakan::findOrFail($id);
            $tindakan->delete();
            return response()->json(['success' => true, 'message' => 'Tindakan berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus Tindakan'], 500);
        }
    }
}
