<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedisKader extends Model
{
    use HasFactory;

    protected $table = 'rekammediskader';
    protected $fillable = ['pasien_id', 'user_id', 'namakondisigigi_id', 'total', 'keterangan'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function namaKondisiGigi()
    {
        return $this->belongsTo(NamaKondisiGigi::class, 'namakondisigigi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
