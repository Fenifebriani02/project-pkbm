<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Imports\Soalujianimports;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Ujian;
use App\Models\SoalUjian;



class Adminujian extends Controller
{


    function index()
    {
        $data['list'] = Ujian::with('mapel.kelas')->get();
        $data['mapel'] = Mapel::with('kelas.guru')->get();

        return view("admin.ujian.index", $data);
    }

    function tambah(Request $request)
    {
        $request->validate(Ujian::$field, Ujian::$pesan);

        $ujian = new Ujian;
        $ujian->mapel_id = $request->mapel_id;
        $ujian->nama_ujian = $request->nama_ujian;
        $ujian->tenggat = $request->tenggat;
        $ujian->deskripsi = $request->deskripsi;

        $simpan = $ujian->save();
        if ($simpan == 1) {
            return back()->with("success", "Data berhasil ditambahkan !");
        } else {
            return back()->with("danger", "Data gagal ditambahkan !");
        }
    }

    function detail($ujian)
    {
        $data['list'] = Ujian::with('soalujian.nilai')->with('mapel')->findOrFail($ujian);
        // return $data;
        return view('admin.ujian.detail', $data);
    }

    function uploadSoalUjian(Request $request)
    {


        $request->validate([
            'ujian_id' => 'required',
            'file' => 'required|mimes:xlsx,xls',
        ], [
            'file.mimes' => 'Format file tidak didukung sistem !',
            'file.required' => 'File belum dipilih !',
        ]);

        $ujian_id = $request->ujian_id;
        $file = $request->file('file');

        Excel::import(new Soalujianimports($ujian_id), $file, null, \Maatwebsite\Excel\Excel::XLSX);
        return back()->with("success", "Data berhasil diimport !");
    }

    function delete(Ujian $ujian) {

        $nilai = Nilai::where('ujian_id', $ujian->id)->delete();
        $delete = $ujian->delete();
        if($delete == 1) {
            return redirect('admin/ujian')->with("success", "Data berhasil dihapus !");
        } else {
            return back()->with("danger", "Data gagal dihapus !");
        }
    }

    function hapusMasal(Request $request)
    {
        // $request->validate([
        //     'id' => 'required|integer',
        // ]);
        $myArray = [$request->id];

        // Mengambil nilai dari array
        if (!empty($myArray)) {
            // Menggunakan explode untuk memecah string menjadi array
            $nilaiArray = explode(',', $myArray[0]);

            // Menghapus elemen terakhir yang mungkin kosong
            array_pop($nilaiArray);

            // Menampilkan hasil
            print_r($nilaiArray);
        } else {
            echo "Array kosong";
        }

        // Menghapus data berdasarkan id yang diterima
        // $deleted = SoalUjian::destroy($request->id);
        // if ($deleted == 1) {
        //     return back()->with("success", "Data berhasil dihapus !");
        // } else {
        //     return back()->with("danger", "Data gagal dihapus !");
        // }
    }

}
