<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use Illuminate\Support\Facades\Auth;


class Gurudashboard extends Controller
{


    public function index()
    {

        return view("guru.dashboard");
    }

    function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/auth/login')->with('success', 'Anda telah logout dari system');
    }

}
