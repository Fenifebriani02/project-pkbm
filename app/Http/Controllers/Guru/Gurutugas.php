<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use Illuminate\Http\Request;
use App\Models\Mapel;
use App\Models\Tugas;


class Gurutugas extends Controller {


    public function index() {

        $data['list'] = Tugas::with('mapel.kelas.guru')->get();

        return view("guru.tugas.index", $data);
    }

    function tambah() {
        $data['list'] = Mapel::with('kelas.guru')->get();
        return view("guru.tugas.tambah", $data);
    }

    function aksitambah(Request $request) {
        $request->validate(Tugas::$field, Tugas::$pesan);

        $tugas = new Tugas();
        $tugas->mapel_id = $request->mapel_id;
        $tugas->nama_tugas = $request->nama_tugas;
        $tugas->soal_tugas = $request->soal_tugas;
        $tugas->opsi_a = $request->opsi_a;
        $tugas->opsi_b = $request->opsi_b;
        $tugas->opsi_c = $request->opsi_c;
        $tugas->opsi_d = $request->opsi_d;
        $tugas->kunci_jawaban = $request->kunci_jawaban;
        $tugas->tenggat = $request->tenggat;
        $tugas->deskripsi = $request->deskripsi;

        $simpan = $tugas->save();
        if($simpan == 1) {
            return redirect('guru/tugas')->with("success", "Data berhasil ditambahkan !");
        } else {
            return back()->with("danger", "Data gagal ditambahkan !");
        }
    }

    function detail($tugas) {
        $data['list'] = Tugas::with('mapel.kelas.guru')
            ->with('nilai.siswa')
            ->findOrFail($tugas);
        return view("guru.tugas.detail", $data);
    }

    function update($tugas) {
        $data['mapel'] = Mapel::with('kelas.guru')->get();
        $data['list'] = Tugas::with('mapel')->findOrFail($tugas);

        return view("guru.tugas.update", $data);
    }

    function aksiupdate(Tugas $tugas, Request $request) {
        $tugas->mapel_id = $request->mapel_id;
        $tugas->nama_kuis = $request->nama_kuis;
        $tugas->soal_kuis = $request->soal_kuis;
        $tugas->opsi_a = $request->opsi_a;
        $tugas->opsi_b = $request->opsi_b;
        $tugas->opsi_c = $request->opsi_c;
        $tugas->opsi_d = $request->opsi_d;
        $tugas->kunci_jawaban = $request->kunci_jawaban;
        $tugas->tenggat = $request->tenggat;
        $tugas->deskripsi = $request->deskripsi;

        $update = $tugas->update();
        if($update == 1) {
            return redirect('guru/tugas')->with("success", "Data berhasil diupdate !");
        } else {
            return back()->with("danger", "Data gagal diupdate !");
        }
    }

    function delete(Tugas $tugas) {

        $nilai = Nilai::where('kuis_id', $tugas->id)->delete();
        $delete = $tugas->delete();
        if($delete == 1) {
            return redirect('guru/kuis')->with("success", "Data berhasil dihapus !");
        } else {
            return back()->with("danger", "Data gagal dihapus !");
        }
    }

    function deletenilai(Nilai $nilai) {
        $hapus = $nilai->delete();
        if($hapus == 1) {
            return back()->with("success", "Data berhasil dihapus !");
        } else {
            return back()->with("danger", "Data gagal dihapus !");
        }
    }

    function updatenilai(Nilai $nilai, Request $request) {
        $nilai->jawaban = $request->jawaban;
        $nilai->nilai = $request->nilai;
        $update = $nilai->update();
        if($update == 1) {
            return back()->with("success", "Data berhasil diupdate !");
        } else {
            return back()->with("danger", "Data gagal diupdate !");
        }
    }


}
