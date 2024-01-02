<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Carbon\Carbon;


class Kuis extends Model
{
    use HasFactory;
    protected $table = "kuis";
    protected $fillable = [
        'mapel_id',
        'nama_kuis',
        'soal_kuis',
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
        'nama_kuis' => ['required'],
        'soal_kuis' => ['required'],
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
        'nama_kuis.required' => "Harus diisi tidak boleh kosong !",
        'soal_kuis.required' => "Harus diisi tidak boleh kosong !",
        'opsi_a.required' => "Harus diisi tidak boleh kosong !",
        'opsi_b.required' => "Harus diisi tidak boleh kosong !",
        'opsi_c.required' => "Harus diisi tidak boleh kosong !",
        'opsi_d.required' => "Harus diisi tidak boleh kosong !",
        'kunci_jawaban.required' => "Harus diisi tidak boleh kosong !",
        'tenggat.required' => "Harus diisi tidak boleh kosong !",
        'deskripsi.required' => "Harus diisi tidak boleh kosong !",
    ];



    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'kuis_id', 'id');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id', 'id');
    }

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class, 'nilai', 'kuis_id', 'siswa_id');
    }


    // Mutator

    function selisihTanggal()
    {
        $tenggat = Carbon::parse($this->tenggat);
        $sekarang = Carbon::now();

        // Hanya tampilkan selisih waktu jika waktu tenggat lebih kecil dari waktu sekarang
        if ($tenggat->lt($sekarang)) {
            $diff = $tenggat->diff($sekarang);
            $days = $diff->days;
            $hours = $diff->h;
            $minutes = $diff->i;

            // Format string untuk menampilkan selisih waktu
            $result = '';

            if ($days > 0) {
                $result .= $days . ' hari ';
            }

            if ($hours > 0) {
                $result .= $hours . ' jam ';
            }

            if ($minutes > 0) {
                $result .= $minutes . ' menit';
            }

            return 'Kuis sudah berakhir';
        } else {
            return $tenggat;
        }
    }

}
