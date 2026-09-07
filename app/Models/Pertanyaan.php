<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan';
    protected $guard = 'pertanyaan';

    protected $fillable = ['kategori_id', 'teks_pertanyaan', 'jenis_jawaban'];

    public function kategori()
    {
        return $this->belongsTo(KategoriPertanyaan::class, 'kategori_id');
    }

    public function opsiJawaban()
    {
        return $this->hasMany(OpsiJawaban::class, 'pertanyaan_id');
    }

    public function jawabanPasien()
    {
        return $this->hasMany(JawabanPasien::class, 'pertanyaan_id');
    }

    // Method untuk mengecek apakah pertanyaan multiple choice
    public function isMultipleChoice()
    {
        return $this->jenis_jawaban === 'multiple_choice';
    }

    // Method untuk mengecek apakah pertanyaan single choice
    public function isSingleChoice()
    {
        return $this->jenis_jawaban === 'single_choice';
    }
}