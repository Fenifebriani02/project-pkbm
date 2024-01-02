<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Kelas;


class Adminkelas extends Controller
{
    public function index()
    {
        $data['list'] = Kelas::with('guru')->with('siswa')
            ->orderBy('updated_at', 'desc')
            ->get();

        $data['dataGuru'] = Guru::orderBy('updated_at', 'desc')->get();
        return view("admin.kelas.index", $data);
    }

    function tambah(Request $request)
    {
        $request->validate(Kelas::$field, Kelas::$pesan);
        // $validated = $request->validate([
        //     'id_guru' => 'required',
        //     'nama_kelas' => 'required',
        // ]);

        $kelas = new Kelas();
        $kelas->id_guru = $request->id_guru;
        $kelas->nama_kelas = $request->nama_kelas;
        $simpan = $kelas->save();
        if ($simpan == 1) {
            return back()->with("success", "Data berhasil ditambahkan !");
        } else {
            return back()->with("danger", "Data gagal ditambahkan !");
        }

    }

    public function update(Request $request, Kelas $kelas)
    {
        $kelas->id_guru = $request->id_guru;
        $kelas->nama_kelas = $request->nama_kelas;


        $simpan = $kelas->update();
        if ($simpan == 1) {
            return back()->with("success", "Data berhasil diupdate !");
        } else {
            return back()->with("danger", "Data gagal diupdate !");
        }
    }

    function delete(Kelas $kelas)
    {
        $idKelas = $kelas->id;

        $dataMapel = $kelas::with('ujian.mapel.tugas')
            ->get()
            ->map(function ($tugas) {
                $isiMapel = $tugas->ujian->map(function ($d) {
                    return $d->mapel;
                });

                return ([
                    'Tugas' => $tugas,
                    'Mapel' => $isiMapel,
                ]);
            });
        return $dataMapel;
        // $simpan = $kelas->delete();
        // if ($simpan == 1) {
        //     return back()->with("success", "Data berhasil dihapus !");
        // } else {
        //     return back()->with("danger", "Data gagal dihapus !");

        // }
    }


}
