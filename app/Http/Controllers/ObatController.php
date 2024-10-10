<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\PengeluaranObat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;

class ObatController extends Controller
{
    public function data(Request $request)
    {
        $query = Obat::query();

        return DataTables::of($query)
            ->addColumn('action', function ($data) {
                return '<a href="javascript:void(0)" 
                    data-id="' . $data->id . '"
                    data-code="' . $data->kd_obat . '"
                    data-nama="' . $data->nama . '"
                    data-stok="' . $data->stok . '"
                    data-harga="' . $data->harga . '"
                    data-satuan="' . $data->satuan . '"
                    class="btn btn-primary shadow btn-xs pilihObat">
                    Pilih</a>';
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function index()
    {
        $datas = Obat::whereNull('deleted_at')->paginate(10);
        return view('obat.index', compact('datas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kd_obat' => 'required|unique:obat',
            'nama' => 'required|unique:obat',
            'satuan' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        Obat::create($validatedData);
        return redirect()->route('obat')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'satuan' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        $obat = Obat::findOrFail($id);
        $obat->update($validatedData);
        return redirect()->route('obat')->with('sukses', 'Data berhasil diperbaharui');
    }

    public function delete($id)
    {
        $obat = Obat::findOrFail($id);

        if (PengeluaranObat::where('obat_id', $id)->exists()) {
            $obat->update(['deleted_at' => Carbon::now()]);
        } else {
            $obat->delete();
        }

        return redirect()->route('obat')->with('sukses', 'Data berhasil dihapus');
    }
}
