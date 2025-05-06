<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('pegawai.home'); // Path to your pegawai home view
    }

    public function list()
    {
        $pegawais = \App\Models\Pegawai::all();
        return view('admin/daftarpegawai', compact('pegawais'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pegawais,email',
            'password' => 'required|min:6',
            'jabatan' => 'required|string',
            'bidang' => 'required|string',
        ]);

        Pegawai::create([
            'name' => $validated['nama'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'jabatan' => $validated['jabatan'],
            'bidang' => $validated['bidang'],
        ]);

        return redirect()->back()->with('success', 'Data pegawai berhasil ditambahkan!');
    }
}