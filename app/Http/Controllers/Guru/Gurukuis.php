<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Kuis;


class Gurukuis extends Controller {


    public function index() {

        $data['list'] = Kuis::with('mapel.kelas.guru')->get();
        // return $data;
        return view("guru.kuis.index", $data);
    }

    function tambah() {
        $data['list'] = Mapel::with('kelas.guru')->get();
        return view("guru.kuis.tambah", $data);
    }

    function aksitambah(Request $request) {
        $request->validate(Kuis::$field, Kuis::$pesan);

        $kuis = new Kuis();
        $kuis->mapel_id = $request->mapel_id;
        $kuis->nama_kuis = $request->nama_kuis;
        $kuis->soal_kuis = $request->soal_kuis;
        $kuis->opsi_a = $request->opsi_a;
        $kuis->opsi_b = $request->opsi_b;
        $kuis->opsi_c = $request->opsi_c;
        $kuis->opsi_d = $request->opsi_d;
        $kuis->kunci_jawaban = $request->kunci_jawaban;
        $kuis->tenggat = $request->tenggat;
        $kuis->deskripsi = $request->deskripsi;

        $simpan = $kuis->save();
        if($simpan == 1) {
            return redirect('guru/kuis')->with("success", "Data berhasil ditambahkan !");
        } else {
            return back()->with("danger", "Data gagal ditambahkan !");
        }
    }

    function detail($kuis) {
        $data['list'] = Kuis::with('mapel.kelas.guru')
            ->with('nilai.siswa')
            ->findOrFail($kuis);
        return view("guru.kuis.detail", $data);
    }

    function update($kuis) {
        $data['mapel'] = Mapel::with('kelas.guru')->get();
        $data['list'] = Kuis::with('mapel')->findOrFail($kuis);

        return view("guru.kuis.update", $data);
    }

    function aksiupdate(Kuis $kuis, Request $request) {
        $kuis->mapel_id = $request->mapel_id;
        $kuis->nama_kuis = $request->nama_kuis;
        $kuis->soal_kuis = $request->soal_kuis;
        $kuis->opsi_a = $request->opsi_a;
        $kuis->opsi_b = $request->opsi_b;
        $kuis->opsi_c = $request->opsi_c;
        $kuis->opsi_d = $request->opsi_d;
        $kuis->kunci_jawaban = $request->kunci_jawaban;
        $kuis->tenggat = $request->tenggat;
        $kuis->deskripsi = $request->deskripsi;

        $update = $kuis->update();
        if($update == 1) {
            return redirect('guru/kuis')->with("success", "Data berhasil diupdate !");
        } else {
            return back()->with("danger", "Data gagal diupdate !");
        }
    }

    function delete(Kuis $kuis) {

        $nilai = Nilai::where('kuis_id', $kuis->id)->delete();
        $delete = $kuis->delete();
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
