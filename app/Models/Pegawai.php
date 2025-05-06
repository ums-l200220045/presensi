<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Pegawai extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $fillable = ['name', 'email', 'password', 'jabatan', 'bidang'];

    protected $hidden = ['password'];
}