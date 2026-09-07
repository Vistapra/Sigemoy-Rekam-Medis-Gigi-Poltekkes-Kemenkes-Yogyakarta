<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Edukasi;
use App\Models\Toga;
use App\Models\Tindakan;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function sigemoy()
    {
        $edukasi = Edukasi::latest()->take(6)->get();
        $toga = Toga::latest()->take(6)->get();
        $dokter = Dokter::with('user')->get();
        $tindakan = Tindakan::all();

        return view('Frontend.sigemoy', compact('edukasi', 'toga', 'dokter', 'tindakan'));
    }

    public function edukasiIndex(Request $request)
    {
        $query = Edukasi::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'LIKE', "%{$search}%")
                    ->orWhere('deskripsi', 'LIKE', "%{$search}%");
            });
        }

        $edukasi = $query->latest()->paginate(12);

        return view('Frontend.edukasi-index', compact('edukasi', 'search'));
    }

    public function edukasiDetail($id)
    {
        $edukasi = Edukasi::findOrFail($id);
        $edukasiLainnya = Edukasi::where('id', '!=', $id)->latest()->take(3)->get();

        return view('Frontend.edukasi-detail', compact('edukasi', 'edukasiLainnya'));
    }
}
