<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPertanyaan extends Model
{
    use HasFactory;

    protected $table = 'kategori_pertanyaan';
    protected $guard = 'kategori_pertanyaan';

    protected $fillable = ['nama_kategori'];

    public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class, 'kategori_id');
    }
}
