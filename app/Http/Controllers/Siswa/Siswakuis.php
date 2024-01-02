<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kuis;
use App\Models\Nilai;
use Illuminate\Support\Facades\Auth;



class Siswakuis extends Controller
{


    public function index()
    {
        $idKelas = Auth::guard('siswa')->user()->id_kelas;
        $siswaId = Auth::guard('siswa')->user()->id;

        $data['list'] = Kuis::with(['mapel.kelas.guru', 'nilai'])
            ->whereHas('mapel.kelas', function ($query) use ($idKelas) {
                $query->where('id', $idKelas);
            })
            ->whereDoesntHave('nilai', function ($query) use ($siswaId) {
                $query->where('siswa_id', $siswaId);
            })
            ->get();
        return view("siswa.kuis.index", $data);
    }

    function kirimjawaban(Request $request)
    {
        $siswaId = Auth::guard('siswa')->user()->id;
        $data = $request->kuis_id;
        for ($i = 0; $i < count($data); $i++) {

            $jawaban = $request->jawaban[$i];
            $kuncijawaban = $request->kunci_jawaban[$i];
            $nilai = 0;
            if ($kuncijawaban == $jawaban) {
                $nilai = 100;
            } else {
                $nilai = 0;
            }

            $nilais = new Nilai;
            $nilais->siswa_id = $siswaId;
            $nilais->kuis_id = $data[$i];
            $nilais->jawaban = $jawaban;
            $nilais->nilai = $nilai;
            $simpan = $nilais->save();

        }

        if ($simpan == 1) {
            return redirect('siswa/kuis')->with("success", "Jawaban kuis berhasil dikirim");
        } else {
            return redirect('siswa/kuis')->with("danger", "Jawaban kuis gagal dikirm, coba ulangi kembali.");
        }
    }

}
