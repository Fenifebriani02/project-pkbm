<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Tugas extends Model {
    use HasFactory;
    protected $table = "tugas";
    protected $fillable = [
        'mapel_id',
        'nama_tugas',
        'soal_tugas',
        'opsi_a',
        'opsi_b',
        'opsi_c',
        'opsi_d',
        'kunci_jawaban',
        'tenggat',
        'deskripsi',
    ];


    static $field = [
        'mapel_id' => ['required'],
        'nama_tugas' => ['required'],
        'soal_tugas' => ['required'],
        'opsi_a' => ['required'],
        'opsi_b' => ['required'],
        'opsi_c' => ['required'],
        'opsi_d' => ['required'],
        'kunci_jawaban' => ['required'],
        'tenggat' => ['required'],
        'deskripsi' => ['required'],
    ];
    static $pesan = [
        'mapel_id.required' => "Harus diisi tidak boleh kosong !",
        'nama_tugas.required' => "Harus diisi tidak boleh kosong !",
        'soal_tugas.required' => "Harus diisi tidak boleh kosong !",
        'opsi_a.required' => "Harus diisi tidak boleh kosong !",
        'opsi_b.required' => "Harus diisi tidak boleh kosong !",
        'opsi_c.required' => "Harus diisi tidak boleh kosong !",
        'opsi_d.required' => "Harus diisi tidak boleh kosong !",
        'kunci_jawaban.required' => "Harus diisi tidak boleh kosong !",
        'tenggat.required' => "Harus diisi tidak boleh kosong !",
        'deskripsi.required' => "Harus diisi tidak boleh kosong !",
    ];



    function mapel() {
        return $this->belongsTo(Mapel::class, 'mapel_id', 'id');
    }
    function nilai() {
        return $this->hasMany(Nilai::class, 'tugas_id', 'id');
    }

    // Mutator

    function selisihTanggal() {
        $tenggat = Carbon::parse($this->tenggat);
        $sekarang = Carbon::now();

        // Hanya tampilkan selisih waktu jika waktu tenggat lebih kecil dari waktu sekarang
        if($tenggat->lt($sekarang)) {
            $diff = $tenggat->diff($sekarang);
            $days = $diff->days;
            $hours = $diff->h;
            $minutes = $diff->i;

            // Format string untuk menampilkan selisih waktu
            $result = '';

            if($days > 0) {
                $result .= $days.' hari ';
            }

            if($hours > 0) {
                $result .= $hours.' jam ';
            }

            if($minutes > 0) {
                $result .= $minutes.' menit';
            }

            return 'Tugas sudah berakhir';
        } else {
            return $tenggat;
        }
    }
}
