<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Telusuri;


class Admintelusuri extends Controller
{


    public function index()
    {
        $data['list'] = Telusuri::get();



        return view("admin.telusuri.index", $data);
    }
    public function tambah(Request $request)
    {
        $telusuri = new Telusuri;
        $telusuri->judul = $request->judul;
        $telusuri->link = $request->link;


        $simpan = $telusuri->save();
        if ($simpan == 1) {
            return back()->with("success", "Data berhasil ditambahkan !");
        } else {
            return back()->with("danger", "Data gagal ditambahkan !");
        }
    }


}
