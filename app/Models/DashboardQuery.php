<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class DashboardQuery
{
    protected $user;
    protected $role;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->role = $this->user->role_display();
    }

    protected function scopeForUserRole($query)
    {
        if ($this->role === "Admin") {
            return $query;
        } elseif ($this->role === "Dokter" || $this->role === "KaderKesehatan") {
            return $query->where('user_id', $this->user->id);
        }
    }

    public function totalObat()
    {
        return $this->role === "Admin" ? Obat::count() : 0;
    }

    public function totalObatKeluar()
    {
        return $this->role === "Admin" ? PengeluaranObat::count() : 0;
    }

    public function totalObatKeluarSum()
    {
        return $this->role === "Admin" ? PengeluaranObat::sum('jumlah') : 0;
    }

    public function obatHariini()
    {
        return $this->role === "Admin" ? PengeluaranObat::whereDate('created_at', date('Y-m-d'))->count() : 0;
    }

    public function pasienHariini()
    {
        return Rekam::whereDate('tgl_rekam', date('Y-m-d'))
            ->when($this->role !== "Admin", function ($query) {
                return $query->where('user_id', $this->user->id);
            })
            ->count();
    }

    public function pasienAntri()
    {
        return $this->pasienHariini();
    }

    public function perikaBulanini()
    {
        return Rekam::whereMonth('tgl_rekam', date('m'))
            ->whereYear('tgl_rekam', date('Y'))
            ->when($this->role !== "Admin", function ($query) {
                return $query->where('user_id', $this->user->id);
            })
            ->count();
    }

    public function perikaTahunini()
    {
        return Rekam::whereYear('tgl_rekam', date('Y'))
            ->when($this->role !== "Admin", function ($query) {
                return $query->where('user_id', $this->user->id);
            })
            ->count();
    }

    public function totalPeriksa()
    {
        return Rekam::when($this->role !== "Admin", function ($query) {
            return $query->where('user_id', $this->user->id);
        })->count();
    }

    public function totalPasien()
    {
        if ($this->role === "Admin") {
            return Pasien::count();
        } elseif ($this->role === "Dokter" || $this->role === "KaderKesehatan") {
            return Rekam::where('user_id', $this->user->id)->distinct('pasien_id')->count('pasien_id');
        }
        return 0;
    }

    public function totalDoktor()
    {
        return $this->role === "Admin" ? User::where('role', 'Dokter')->count() : 0;
    }
    public function semuadokter()
    {
        return User::all()->count();
    }

    public function user()
    {
        return $this->role === "Admin" ? User::count() : 0;
    }

    public function diagnosaBulanan()
    {
        if ($this->role === "KaderKesehatan") {
            return collect();
        }

        $filterBulan = date('Y-m');
        $query = DB::table(DB::raw("(
            select a.diagnosa as diagnosa
            from rekam_diagnosa a
            LEFT JOIN rekam r ON r.id = a.rekam_id
            where a.diagnosa is not null
            and r.tgl_rekam LIKE '{$filterBulan}%'
            " . ($this->role !== "Admin" ? "and r.user_id = {$this->user->id}" : "") . "

            union all

            select diagnosa
            from rekam_gigi
            where created_at LIKE '{$filterBulan}%'
            " . ($this->role !== "Admin" ? "and user_id = {$this->user->id}" : "") . "
        ) sc"))
            ->select('sc.diagnosa', DB::raw('count(*) as total'), 'ic.name_id')
            ->leftJoin('icds as ic', 'ic.code', '=', 'sc.diagnosa')
            ->groupBy('sc.diagnosa', 'ic.name_id')
            ->orderByDesc(DB::raw('count(*)'))
            ->limit(10);

        return $query->get();
    }

    public function diagnosaYearly()
    {
        if ($this->role === "KaderKesehatan") {
            return collect();
        }

        $filter = date('Y-');
        $query = DB::table(DB::raw("(
            select a.diagnosa as diagnosa
            from rekam_diagnosa a
            LEFT JOIN rekam r ON r.id = a.rekam_id
            where a.diagnosa is not null
            and r.tgl_rekam LIKE '{$filter}%'
            " . ($this->role !== "Admin" ? "and r.user_id = {$this->user->id}" : "") . "

            union all

            select diagnosa
            from rekam_gigi
            where created_at LIKE '{$filter}%'
            " . ($this->role !== "Admin" ? "and user_id = {$this->user->id}" : "") . "
        ) sc"))
            ->select('sc.diagnosa', DB::raw('count(*) as total'), 'ic.name_id')
            ->leftJoin('icds as ic', 'ic.code', '=', 'sc.diagnosa')
            ->groupBy('sc.diagnosa', 'ic.name_id')
            ->orderByDesc(DB::raw('count(*)'))
            ->limit(10);

        return $query->get();
    }

    public function rekam_day($search = null, $perPage = 5)
{

    $query = Rekam::latest()
        ->when($this->role !== "Admin", function ($query) {
            return $query->where('user_id', $this->user->id);
        });

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->whereHas('pasien', function ($subQ) use ($search) {
                $subQ->where('nama', 'like', "%{$search}%");
            })->orWhere('keluhan', 'like', "%{$search}%");
        });
    }

    $results = $query->paginate($perPage);

    return $results;
}

    public function rekam_day2()
    {
        return Rekam::orderBy('id', 'asc')
            ->when($this->role !== "Admin", function ($query) {
                return $query->where('user_id', $this->user->id);
            })
            ->get();
    }

    public function rekam_antrian()
    {
        return Rekam::orderBy('id', 'desc')
            ->when($this->role !== "Admin", function ($query) {
                return $query->where('user_id', $this->user->id);
            })
            ->get();
    }
}
