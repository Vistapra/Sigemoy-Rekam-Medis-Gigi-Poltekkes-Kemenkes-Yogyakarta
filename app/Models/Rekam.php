<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rekam extends Model
{
    protected $table = "rekam";
    protected $fillable = [
        "tgl_rekam",
        "pasien_id",
        "keluhan",
        "user_id",
        "pemeriksaan",
        "no_rekam",
        "tindakan",
        "petugas_id",
        "biaya_pemeriksaan",
        "biaya_tindakan",
        "biaya_obat",
        "total_biaya",
        "resep_obat",
        "pemeriksaan_file",
        "tindakan_file"
    ];

    function getFilePemeriksaan()
    {
        return $this->pemeriksaan_file != null ? asset('images/pemeriksaan/' . $this->pemeriksaan_file) : null;
    }

    function getFileTindakan()
    {
        return $this->tindakan_file != null ? asset('images/pemeriksaan/' . $this->tindakan_file) : null;
    }

    function gigi()
    {
        return  RekamGigi::where('rekam_id', $this->id)->get();
    }

    function diagnosa()
    {
        return  RekamDiagnosa::where('rekam_id', $this->id)->get();
    }

    function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    // function diagnosis(){
    //     return $this->belongsTo(Icd::class,'diagnosa','code');
    // }

    function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rekamGigi()
    {
        return $this->hasMany(RekamGigi::class, 'rekam_id');
    }
}
