<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Siswa\Siswadashboard;
use App\Http\Controllers\Siswa\Siswakuis;
use App\Http\Controllers\Siswa\Siswatugas;
use App\Http\Controllers\Siswa\Siswaujian;

Route::prefix("siswa")->middleware('auth:siswa')->group(function () {
    Route::controller(Siswadashboard::class)->group(function () {
        Route::get('dashboard', 'index');
        Route::get('logout', 'logout');
    });
    Route::controller(Siswakuis::class)->group(function () {
        Route::get('kuis', 'index');
        Route::post('kuis/kirimjawaban', 'kirimjawaban');
    });
    Route::controller(Siswatugas::class)->group(function () {
        Route::get('tugas', 'index');
        Route::post('tugas/kirimjawaban', 'kirimjawaban');
    });
    Route::controller(Siswaujian::class)->group(function () {
        Route::get('ujian', 'index');
        Route::post('ujian/kirimjawaban', 'kirimjawaban');
    });
});