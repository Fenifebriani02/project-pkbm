<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use Illuminate\Support\Facades\Auth;


class Admindashboard extends Controller
{


    public function index()
    {

        return view("admin.dashboard");
    }

    function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/auth/login')->with('success', 'Anda telah logout dari system');
    }

}
