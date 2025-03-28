<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        dd("Pegawai Middleware Berjalan"); // Tambahkan ini untuk debug

        if (Auth::guard('pegawai')->check()) {
            return redirect()->route('pegawai.home');
        }

        return redirect('/')->with('error', 'Akses ditolak');
    }
}
