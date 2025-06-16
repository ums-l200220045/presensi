<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Jika Anda menggunakan Pegawai untuk otentikasi
use Illuminate\Notifications\Notifiable;

class Pegawai extends Authenticatable // Atau hanya 'Model' jika tidak untuk otentikasi login
{
    use HasFactory, Notifiable;

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password', // <<< Pastikan 'password' ada di sini!
        'jabatan',
        'bidang',
    ];

    /**
     * Atribut yang harus disembunyikan untuk serialisasi.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token', // Jika Anda menggunakannya untuk fitur "ingat saya"
    ];

    /**
     * Atribut yang harus di-cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}