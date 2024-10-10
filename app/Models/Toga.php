<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toga extends Model
{
    use HasFactory;

    protected $table = 'toga';
    protected $guard = 'toga';

    protected $fillable = [
        'judul',
        'deskripsi',
        'foto',
    ];
}

