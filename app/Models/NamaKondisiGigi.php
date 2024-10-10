<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaKondisiGigi extends Model
{
    use HasFactory;

    protected $table = 'namakondisigigi';
    protected $fillable = ['nama_kondisi'];

    public function rekamMedisKader()
    {
        return $this->hasMany(RekamMedisKader::class);
    }
}