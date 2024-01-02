<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guru\Gurudashboard;
use App\Http\Controllers\guru\Gurusiswa;
use App\Http\Controllers\guru\Gurukuis;
use App\Http\Controllers\guru\Gurutugas;
use App\Http\Controllers\guru\Guruujian;

Route::prefix("guru")->middleware('auth:guru')->group(function () {
    Route::controller(Gurudashboard::class)->group(function () {
        Route::get('dashboard', 'index');
        Route::get('logout', 'logout');
    });
    Route::controller(Gurusiswa::class)->group(function () {
        Route::get('siswa', 'index');
        Route::post('siswa/tambah/{kelas}', 'tambah');
        Route::post('siswa/update/{siswa}', 'update');
        Route::post('siswa/delete/{siswa}', 'delete');
    });
    Route::controller(Gurukuis::class)->group(function () {
        Route::get('kuis', 'index');
        Route::get('kuis/tambah', 'tambah');
        Route::post('kuis/tambah', 'aksitambah');
        Route::get('kuis/detail/{kuis}', 'detail');
        Route::get('kuis/update/{kuis}', 'update');
        Route::post('kuis/update/{kuis}', 'aksiupdate');
        Route::post('kuis/delete/{kuis}', 'delete');
        Route::post('kuis/update/nilai/{nilai}', 'updatenilai');
        Route::post('kuis/delete/nilai/{nilai}', 'deletenilai');
    });
    Route::controller(Gurutugas::class)->group(function () {
        Route::get('tugas', 'index');
        Route::get('tugas/tambah', 'tambah');
        Route::post('tugas/tambah', 'aksitambah');
        Route::get('tugas/detail/{tugas}', 'detail');
        Route::get('tugas/update/{tugas}', 'update');
        Route::post('tugas/update/{tugas}', 'aksiupdate');
        Route::post('tugas/delete/{tugas}', 'delete');
        Route::post('tugas/update/nilai/{nilai}', 'updatenilai');
        Route::post('tugas/delete/nilai/{nilai}', 'deletenilai');
    });
    Route::controller(Guruujian::class)->group(function () {
        Route::get('ujian', 'index');
        Route::post('ujian/tambah', 'tambah');
        Route::get('ujian/detail/{ujian}', 'detail');
        Route::get('ujian/update/{ujian}', 'update');
        Route::post('ujian/update/{ujian}', 'aksiupdate');
        Route::post('ujian/delete/{ujian}', 'delete');
        Route::post('ujian/update/nilai/{nilai}', 'updatenilai');
        Route::post('ujian/delete/nilai/{nilai}', 'deletenilai');
        Route::post('ujian/uploadSoalUjian', 'uploadSoalUjian');
        Route::post('ujian/hapusMasal', 'hapusMasal');
    });

});