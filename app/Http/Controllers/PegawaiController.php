<?php

namespace App\Http\Controllers;

use App\Models\Pegawai; // Pastikan Anda mengimpor model Pegawai Anda
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // PENTING: Import kelas Hash

class PegawaiController extends Controller
{
    /**
     * Menampilkan halaman utama pegawai.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Pastikan 'pegawai.home' adalah path yang benar ke view Anda
        return view('pegawai.home');
    }

    /**
     * Menampilkan daftar semua pegawai untuk admin.
     *
     * @return \Illuminate\View\View
     */
    public function list()
    {
        $pegawais = Pegawai::all(); // Menggunakan model yang sudah di-import
        return view('admin.daftarpegawai', compact('pegawais'));
    }

    /**
     * Menyimpan data pegawai baru dari form web.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // Gunakan 'name' sesuai dengan nama kolom di database Anda (dari migration)
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:pegawais,email',
            'password' => 'required|string|min:8|confirmed', // Disarankan minimal 8 dan gunakan 'confirmed'
            'jabatan' => 'required|string',
            'bidang' => 'required|string',
        ]);

        Pegawai::create([
            'name' => $validated['name'], // Menggunakan 'name' dari validasi
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // Menggunakan Hash::make() untuk hashing password
            'jabatan' => $validated['jabatan'],
            'bidang' => $validated['bidang'],
        ]);

        return redirect()->back()->with('success', 'Data pegawai berhasil ditambahkan!');
    }

    /**
     * Menghapus data pegawai berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Cari pegawai berdasarkan ID, atau lempar 404 jika tidak ditemukan
        $pegawai = Pegawai::findOrFail($id);

        // Hapus data
        $pegawai->delete();

        // Redirect dengan pesan sukses. Pastikan 'pegawai.index' adalah route yang benar
        return redirect()->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil dihapus');
    }

    /**
     * Menampilkan form untuk mengedit data pegawai.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\View\View
     */
    public function edit(Pegawai $pegawai)
    {
        return view('admin.editpegawai', compact('pegawai'));
    }

    /**
     * Memperbarui data pegawai yang sudah ada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255', // Sesuaikan dengan 'name' di database
            // Email harus unik kecuali untuk email pegawai yang sedang diupdate
            'email' => 'required|email|unique:pegawais,email,' . $pegawai->id,
            'password' => 'nullable|string|min:8|confirmed', // Tambahkan 'confirmed' dan 'string'
            'jabatan' => 'required|string',
            'bidang' => 'required|string'
        ]);

        // Siapkan data untuk diupdate
        $updateData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'jabatan' => $validated['jabatan'],
            'bidang' => $validated['bidang']
        ];

        // Hanya update password jika ada input password baru dan tidak kosong
        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($validated['password']); // Gunakan Hash::make() untuk konsistensi
        }

        // Perbarui data pegawai
        $pegawai->update($updateData);

        // Redirect dengan pesan sukses. Pastikan 'pegawai.index' adalah route yang benar
        return redirect()->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil diperbarui');
    }
}