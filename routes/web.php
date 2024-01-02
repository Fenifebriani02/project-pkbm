<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Authcontroller;



include_once(__DIR__ . '/routing/admin/index.php');
include_once(__DIR__ . '/routing/guru/index.php');
include_once(__DIR__ . '/routing/siswa/index.php');


Route::get('/', function () {
    return view('welcome');
});

Route::prefix("auth")->group(function () {
    Route::controller(Authcontroller::class)->group(function () {
        Route::get('login', 'login')->name('login');
        Route::post('login', 'aksilogin');
    });
});
