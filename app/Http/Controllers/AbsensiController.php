<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function index()
    {
        $pegawaiId = Auth::id();
        $today = now()->toDateString();

        $absensi = Absensi::where('pegawai_id', $pegawaiId)
            ->where('tanggal', $today)
            ->first();

        // Mengatur sesi berdasarkan keberadaan absensi dan status jam_pulang
        if ($absensi && $absensi->jam_masuk && !$absensi->jam_pulang) {
            session(['absen_today' => true]);
        } else {
            session()->forget('absen_today');
        }

        return view('pegawai.home', compact('absensi'));
    }

    public function cekIn(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $pegawaiId = Auth::id();
        $tanggal = now()->toDateString();

        if (!$pegawaiId) {
            return response()->json(['success' => false, 'message' => 'ID pegawai tidak ditemukan.'], 400);
        }

        // Cek apakah sudah ada absensi masuk untuk hari ini
        $existingAbsensi = Absensi::where('pegawai_id', $pegawaiId)
                                  ->where('tanggal', $tanggal)
                                  ->first();

        if ($existingAbsensi && $existingAbsensi->jam_masuk) {
            // Jika sudah ada jam_masuk, tidak perlu melakukan check-in lagi
            return response()->json(['success' => false, 'message' => 'Anda sudah melakukan Check In hari ini.'], 400);
        }

        // Jika belum ada absensi masuk atau belum ada data absensi sama sekali
        $absensi = Absensi::firstOrCreate(
            ['pegawai_id' => $pegawaiId, 'tanggal' => $tanggal],
            ['jam_masuk' => now()->toTimeString()]
        );

        // Jika absensi baru dibuat atau jam_masuk baru diisi
        if ($absensi->wasRecentlyCreated || $absensi->wasChanged('jam_masuk')) {
            session(['absen_today' => true]);
            return response()->json(['success' => true, 'message' => 'Check In berhasil']);
        } else {
            // Kasus ketika record sudah ada tetapi jam_masuk sudah terisi
            return response()->json(['success' => false, 'message' => 'Anda sudah melakukan Check In hari ini.'], 400);
        }
    }

    public function cekOut(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $pegawaiId = Auth::id();
        $tanggal = now()->toDateString();

        $absensi = Absensi::where('pegawai_id', $pegawaiId)
            ->where('tanggal', $tanggal)
            ->first();

        if ($absensi && $absensi->jam_masuk && !$absensi->jam_pulang) {
            $absensi->update(['jam_pulang' => now()->toTimeString()]);
            session()->forget('absen_today');

            return response()->json(['success' => true, 'message' => 'Check Out berhasil']);
        } elseif (!$absensi || !$absensi->jam_masuk) {
            return response()->json(['success' => false, 'message' => 'Anda belum melakukan Check In hari ini.'], 400);
        } else {
            return response()->json(['success' => false, 'message' => 'Anda sudah Check Out hari ini.'], 400);
        }
    }
}