<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Nilai;

class Gurusiswa extends Controller
{

    public function index()
    {
        $data['list'] = Kelas::with('guru')->with('siswa')->where('kelas.id')->get();
        return view("guru.siswa.index", $data);
    }

    function tambah(Request $request, Kelas $kelas)
    {

        $request->validate(Siswa::$field, Siswa::$pesan);

        $siswa = new Siswa();
        $siswa->id_kelas = $kelas->id;
        $siswa->username = $request->username;
        $siswa->nama = $request->nama;
        $siswa->nim = $request->nim;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->alamat = $request->alamat;
        $siswa->email = $request->email;
        $siswa->password = bcrypt($request->password);
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->no_hp = $request->no_hp;

        $simpan = $siswa->save();
        if ($simpan == 1) {
            return back()->with("success", "Data berhasil ditambahkan !");
        } else {
            return back()->with("danger", "Data gagal ditambahkan !");
        }

    }

    public function update(Request $request, Siswa $siswa)
    {

        if ($request->password != null) {
            $siswa->username = $request->username;
            $siswa->nama = $request->nama;
            $siswa->nim = $request->nim;
            $siswa->jenis_kelamin = $request->jenis_kelamin;
            $siswa->alamat = $request->alamat;
            $siswa->email = $request->email;
            $siswa->password = bcrypt($request->password);
            $siswa->tanggal_lahir = $request->tanggal_lahir;
            $siswa->no_hp = $request->no_hp;

            $simpan = $siswa->update();
            if ($simpan == 1) {
                return back()->with("success", "Data berhasil diupdate !");
            } else {
                return back()->with("danger", "Data gagal diupdate !");
            }
        } else {

            $siswa->username = $request->username;
            $siswa->nama = $request->nama;
            $siswa->nim = $request->nim;
            $siswa->jenis_kelamin = $request->jenis_kelamin;
            $siswa->alamat = $request->alamat;
            $siswa->email = $request->email;
            $siswa->tanggal_lahir = $request->tanggal_lahir;
            $siswa->no_hp = $request->no_hp;

            $simpan = $siswa->update();
            if ($simpan == 1) {
                return back()->with("success", "Data berhasil diupdate !");
            } else {
                return back()->with("danger", "Data gagal diupdate !");
            }
        }

    }

    function delete(Siswa $siswa)
    {

        $hapus = $siswa->delete();
        if ($hapus == 1) {
            return back()->with("success", "Data berhasil dihapus !");
        } else {
            return back()->with("danger", "Data gagal dihapus !");

        }
    }


}
