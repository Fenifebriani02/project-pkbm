<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;


class Authcontroller extends Controller
{
    function login()
    {
        return view('login');
    }
    function aksilogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('admin/dashboard')->with('success', 'Selamat datang admin !');
        } elseif (Auth::guard('guru')->attempt($credentials)) {
            return redirect('guru/dashboard')->with('success', 'Selamat datang guru !');
        } elseif (Auth::guard('siswa')->attempt($credentials)) {
            return redirect('siswa/dashboard')->with('success', 'Selamat datang siswa !');
        } else {
            return back()->with('danger', 'Login gagal, coba ulangi kembali.');
        }
    }
}
