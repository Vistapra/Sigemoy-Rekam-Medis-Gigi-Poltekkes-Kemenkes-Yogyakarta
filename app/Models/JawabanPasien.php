<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanPasien extends Model
{
    use HasFactory;

    protected $table = 'jawaban_pasien';
    protected $guard = 'jawaban_pasien';

    protected $fillable = ['pasien_id', 'pertanyaan_id', 'opsi_jawaban_id', 'keterangan'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'pertanyaan_id');
    }

    public function opsiJawaban()
    {
        return $this->belongsTo(OpsiJawaban::class, 'opsi_jawaban_id');
    }
}
