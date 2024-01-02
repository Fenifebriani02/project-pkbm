<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use App\Models\Tugas;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Kelas;

class Adminguru extends Controller
{


    public function index()
    {
        $data['list'] = Guru::orderBy('updated_at', 'desc')->get();
        return view("admin.guru.index", $data);
    }

    function tambah(Request $request)
    {


        $request->validate(Guru::$field, Guru::$pesan);
        $guru = new Guru();
        $guru->username = $request->username;
        $guru->nama = $request->nama;
        $guru->nip = $request->nip;
        $guru->alamat = $request->alamat;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->password = bcrypt($request->password);

        $simpan = $guru->save();
        if ($simpan == 1) {
            return back()->with("success", "Data berhasil ditambahkan !");
        } else {
            return back()->with("danger", "Data gagal ditambahkan !");
        }
    }

    public function update(Request $request, Guru $guru)
    {

        if ($request->password != null) {
            $guru->username = $request->username;
            $guru->nama = $request->nama;
            $guru->nip = $request->nip;
            $guru->alamat = $request->alamat;
            $guru->jenis_kelamin = $request->jenis_kelamin;
            $guru->password = bcrypt($request->password);

            $simpan = $guru->update();
            if ($simpan == 1) {
                return back()->with("success", "Data berhasil diupdate !");
            } else {
                return back()->with("danger", "Data gagal diupdate !");
            }
        } else {
            $guru->username = $request->username;
            $guru->nama = $request->nama;
            $guru->nip = $request->nip;
            $guru->alamat = $request->alamat;
            $guru->jenis_kelamin = $request->jenis_kelamin;

            $simpan = $guru->update();
            if ($simpan == 1) {
                return back()->with("success", "Data berhasil diupdate !");
            } else {
                return back()->with("danger", "Data gagal diupdate !");
            }
        }

    }

    function delete(Guru $guru)
    {

        $simpan = $guru->delete();
        if ($simpan == 1) {
            return back()->with("success", "Data berhasil dihapus !");
        } else {
            return back()->with("danger", "Data gagal dihapus !");

        }
    }


}
