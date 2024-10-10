<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan';
    protected $guard = 'pertanyaan';

    protected $fillable = ['kategori_id', 'teks_pertanyaan'];

    public function kategori()
    {
        return $this->belongsTo(KategoriPertanyaan::class, 'kategori_id');
    }

    public function opsiJawaban()
    {
        return $this->hasMany(OpsiJawaban::class, 'pertanyaan_id');
    }
}
