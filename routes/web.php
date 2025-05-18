<?php
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;




Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post'); // Fix POST Method
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('input-pegawai', function () {
        return view('admin.inputpegawai');
    })->name('input-pegawai');

    Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');

    Route::get('/pegawai', [PegawaiController::class, 'list'])->name('pegawai.index');
    Route::delete('/pegawai/{pegawai}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy'); 

        // Untuk menampilkan form edit
    Route::get('/pegawai/{pegawai}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');

    // Untuk menyimpan perubahan (update)
    Route::put('/pegawai/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai.update');

});

Route::group(['middleware' => ['auth:pegawai']], function () {
    Route::get('pegawai/home', function () {
        return view('pegawai.home');
    })->name('pegawai.home');

    Route::get('rekap', function() {
        return view('pegawai.rekap');
    })->name('rekap');

    Route::post('/absensi/cek-in', [AbsensiController::class, 'cekIn'])->name('absensi.cekIn');
    Route::post('/absensi/cek-out', [AbsensiController::class, 'cekOut'])->name('absensi.cekOut');

    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');


});