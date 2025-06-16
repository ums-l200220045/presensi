<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('pegawai.home');
    }

    public function list()
    {
        $pegawais = Pegawai::all();
        return view('admin.daftarpegawai', compact('pegawais'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:pegawais,email',
            'password' => 'required|string|min:8|confirmed',
            'jabatan' => 'required|string',
            'bidang' => 'required|string',
        ]);

        $pegawai = Pegawai::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'jabatan' => $validated['jabatan'],
            'bidang' => $validated['bidang'],
        ]);

        // Login otomatis setelah registrasi
        Auth::guard('pegawai')->login($pegawai);

        return redirect()->route('pegawai.home')->with('success', 'Pendaftaran berhasil, Anda telah login.');
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        return redirect()->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil dihapus');
    }

    public function edit(Pegawai $pegawai)
    {
        return view('admin.editpegawai', compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:pegawais,email,' . $pegawai->id,
            'password' => 'nullable|string|min:8|confirmed',
            'jabatan' => 'required|string',
            'bidang' => 'required|string'
        ]);

        $updateData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'jabatan' => $validated['jabatan'],
            'bidang' => $validated['bidang']
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($validated['password']);
        }

        $pegawai->update($updateData);

        return redirect()->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil diperbarui');
    }
}
