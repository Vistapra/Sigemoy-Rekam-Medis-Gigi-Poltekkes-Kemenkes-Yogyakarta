<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = "pasien";
    protected $fillable = [
        "nama",
        "tmp_lahir",
        "tgl_lahir",
        "jk",
        "alamat_lengkap",
        "kelurahan",
        "kecamatan",
        "kabupaten",
        "kodepos",
        "agama",
        "status_menikah",
        "pendidikan",
        "pekerjaan",
        "kewarganegaraan",
        "no_hp",
        "deleted_at",
        "alergi",
        "general_uncent"
    ];

    function getGeneralUncent()
    {
        return $this->general_uncent != null ? asset('images/pasien/' . $this->general_uncent) : null;
    }

    function rekamGigi()
    {
        return RekamGigi::where('pasien_id', $this->id)->get();
    }


    function isRekamGigi()
    {
        return RekamGigi::where('pasien_id', $this->id)->get()->count() > 0 ? true : false;
    }

    public function rekamMedisKader()
    {
        return $this->hasMany(RekamMedisKader::class);
    }

    public function jawabanPasien()
    {
        return $this->hasMany(JawabanPasien::class);
    }
}
