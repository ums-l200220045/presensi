<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = ['pegawai_id', 'tanggal', 'jam_masuk', 'jam_pulang'];

    public function pegawai()
    {
        return $this->belongsTo(User::class, 'pegawai_id');
    }
}


