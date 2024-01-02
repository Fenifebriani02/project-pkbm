<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class Siswadashboard extends Controller
{


    public function index()
    {
        $id = Auth::guard('siswa')->user()->id;
        $data['list'] = Siswa::with('kelas.guru')->findOrFail($id);

        return view("siswa.dashboard");
    }

    function logout()
    {
        Auth::guard('siswa')->logout();
        return redirect('/auth/login')->with('success', 'Anda telah logout dari system');
    }

}
