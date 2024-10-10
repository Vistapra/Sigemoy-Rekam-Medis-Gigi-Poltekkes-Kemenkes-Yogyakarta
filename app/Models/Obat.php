<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = "obat";
    protected $fillable = ["kd_obat", "nama", "satuan", "stok", "foto", "harga",  "deleted_at"];
}
