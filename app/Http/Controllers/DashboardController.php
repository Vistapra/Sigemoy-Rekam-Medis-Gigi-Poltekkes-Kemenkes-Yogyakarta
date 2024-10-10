<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DashboardQuery;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $query = new DashboardQuery();

        switch (auth()->user()->role_display()) {
            case "Admin":
                $rekamMedis = $query->rekam_day($search);
                return view('dashboard.admin', compact('rekamMedis', 'search'));
            case "KaderKesehatan":
                $rekamMedis = $query->rekam_day($search);
                return view('dashboard.kaderkesehatan', compact('rekamMedis', 'search'));
            case "Dokter":
                $rekamMedis = $query->rekam_day($search);
                return view('dashboard.dokter', compact('rekamMedis', 'search'));
            case "Apotek":
                return view('dashboard.obat', compact('search'));
            default:
                return redirect()->route('login');
        }
    }
}
