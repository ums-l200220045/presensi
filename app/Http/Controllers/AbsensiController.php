<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use id;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function cekIn(Request $request)
    {
        $pegawaiId = Auth::id();
        $tanggal = now()->toDateString();

        $absensi = Absensi::firstOrCreate(
            ['pegawai_id' => $pegawaiId, 'tanggal' => $tanggal],
            ['jam_masuk' => now()->toTimeString()]
        );

        session(['absen_today' => true]);

        return response()->json(['message' => 'Check In berhasil']);
    }

    public function cekOut(Request $request)
    {
        $pegawaiId = Auth::id();
        $tanggal = now()->toDateString();

        $absensi = Absensi::where('pegawai_id', $pegawaiId)->where('tanggal', $tanggal)->first();

        if ($absensi && !$absensi->jam_pulang) {
            $absensi->update(['jam_pulang' => now()->toTimeString()]);
            session()->forget('absen_today');
            return response()->json(['message' => 'Check Out berhasil']);
        }

        return response()->json(['message' => 'Sudah Check Out atau belum Check In'], 400);
    }

    public function index()
    {
        $pegawaiId = auth()->id();
        $today = now()->toDateString();

        $absensi = \App\Models\Absensi::where('pegawai_id', $pegawaiId)
            ->where('tanggal', $today)
            ->first();

        return view('pegawai.home', compact('absensi'));
    }

}
