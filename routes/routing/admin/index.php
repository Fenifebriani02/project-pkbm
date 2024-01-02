<?php

use App\Http\Controllers\admin\Admintelusuri;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Admindashboard;
use App\Http\Controllers\admin\Adminguru;
use App\Http\Controllers\admin\Adminkelas;
use App\Http\Controllers\admin\Adminmapel;
use App\Http\Controllers\admin\Adminsiswa;
use App\Http\Controllers\admin\Adminkuis;
use App\Http\Controllers\admin\Admintugas;
use App\Http\Controllers\admin\Adminujian;

Route::prefix("admin")->middleware('auth:admin')->group(function () {
    Route::controller(Admindashboard::class)->group(function () {
        Route::get('dashboard', 'index');
        Route::get('logout', 'logout');
    });
    Route::controller(Adminguru::class)->group(function () {
        Route::get('guru', 'index');
        Route::post('guru/tambah', 'tambah');
        Route::post('guru/update/{guru}', 'update');
        Route::post('guru/delete/{guru}', 'delete');
    });
    Route::controller(Adminkelas::class)->group(function () {
        Route::get('kelas', 'index');
        Route::post('kelas/tambah', 'tambah');
        Route::post('kelas/update/{kelas}', 'update');
        Route::post('kelas/delete/{kelas}', 'delete');
    });
    Route::controller(Adminsiswa::class)->group(function () {
        Route::get('siswa/{kelas}', 'index');
        Route::post('siswa/tambah/{kelas}', 'tambah');
        Route::post('siswa/update/{siswa}', 'update');
        Route::post('siswa/delete/{siswa}', 'delete');
    });
    Route::controller(Adminmapel::class)->group(function () {
        Route::get('mapel/{kelas}', 'index');
        Route::post('mapel/tambah/{kelas}', 'tambah');
        Route::post('mapel/update/{mapel}', 'update');
        Route::post('mapel/delete/{mapel}', 'delete');
    });
    Route::controller(Adminkuis::class)->group(function () {
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
    Route::controller(Admintugas::class)->group(function () {
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
    Route::controller(Adminujian::class)->group(function () {
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
    Route::controller(Admintelusuri::class)->group(function () {
        Route::get('telusuri', 'index');
        Route::post('telusuri/tambah', 'tambah');
        Route::post('telusuri/update/{telusuri}', 'update');
        Route::post('telusuri/delete/{telusuri}', 'delete');
    });
});
