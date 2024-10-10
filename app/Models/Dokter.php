<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $fillable = ['nip', 'nama', 'no_hp', 'alamat', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
