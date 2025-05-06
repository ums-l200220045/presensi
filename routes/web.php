<?php
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post'); // Fix POST Method
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('input-pegawai', function () {
        return view('admin.inputpegawai');
    })->name('input-pegawai');
});

Route::group(['middleware' => ['auth:pegawai']], function () {
    Route::get('pegawai/home', function () {
        return view('pegawai.home');
    })->name('pegawai.home');

    Route::get('rekap', function() {
        return view('pegawai.rekap');
    })->name('rekap');

});