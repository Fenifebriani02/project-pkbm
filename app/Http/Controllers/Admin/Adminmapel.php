<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Mapel;


class Adminmapel extends Controller {


    public function index($id) {

        $data['list'] = Kelas::with('guru')->with('mapel')->findOrFail($id);
        // return $data;
        return view("admin.mapel.index", $data);
    }

    function tambah(Request $request, Kelas $kelas) {

        $request->validate(Mapel::$field, Mapel::$pesan);

        $mapel = new Mapel();
        $mapel->kelas_id = $kelas->id;
        $mapel->mapel = $request->mapel;
        $mapel->materi = $request->materi;
        $mapel->deskripsi = $request->deskripsi;
        $simpan = $mapel->save();
        if($simpan == 1) {
            return back()->with("success", "Data berhasil ditambahkan !");
        } else {
            return back()->with("danger", "Data gagal ditambahkan !");

        }

    }

    public function update(Request $request, Mapel $mapel) {
        $mapel->mapel = $request->mapel;
        $mapel->materi = $request->materi;
        $mapel->deskripsi = $request->deskripsi;

        $simpan = $mapel->update();
        if($simpan == 1) {
            return back()->with("success", "Data berhasil diupdate !");
        } else {
            return back()->with("danger", "Data gagal diupdate !");

        }
    }

    function delete(Mapel $mapel) {
        $hapus = $mapel->delete();
        if($hapus == 1) {
            return back()->with("success", "Data berhasil dihapus !");
        } else {
            return back()->with("danger", "Data gagal dihapus !");

        }
    }


}
