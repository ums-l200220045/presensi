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
   public function destroy($id)
    {
        // Cari pegawai berdasarkan ID
        $pegawai = Pegawai::findOrFail($id);
        
        // Hapus data
        $pegawai->delete();
        
        // Redirect dengan pesan sukses
        return redirect()->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil dihapus');
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:8',
            'jabatan' => 'required',
            'bidang' => 'required'
        ]);
        
        // Update data dengan mapping field yang benar
        $updateData = [
            'name' => $validated['nama'],
            'email' => $validated['email'],
            'jabatan' => $validated['jabatan'],
            'bidang' => $validated['bidang']
        ];
        
        if ($request->filled('password')) {
            $updateData['password'] = bcrypt($validated['password']);
        }
        
        $pegawai->update($updateData);
        
        return redirect()->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil diperbarui');
    }

    public function edit(Pegawai $pegawai)
    {
        return view('admin/editpegawai', compact('pegawai'));
    }
}