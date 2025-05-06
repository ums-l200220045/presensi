<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $totalPegawai = Pegawai::count(); // hitung jumlah
        return view('admin.dashboard', compact('totalPegawai')); // kirim ke view
    }
}
