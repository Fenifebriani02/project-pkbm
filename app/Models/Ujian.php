<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Carbon\Carbon;


class Ujian extends Model
{
    use HasFactory;
    protected $table = "ujian";
    protected $fillable = [
        'mapel_id',
        'nama_ujian',
        'tenggat',
        'deskripsi',
    ];

    static $field = [
        'nama_ujian' => ['required'],
        'tenggat' => ['required'],
        'deskripsi' => ['required'],
    ];
    static $pesan = [
        'nama_ujian.required' => "Harus diisi tidak boleh kosong !",
        'tenggat.required' => "Harus diisi tidak boleh kosong !",
        'deskripsi.required' => "Harus diisi tidak boleh kosong !",
    ];

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

            return 'Ujian sudah berakhir';
        } else {
            return $tenggat;
        }
    }

    function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
    function soalujian()
    {
        return $this->hasMany(SoalUjian::class, 'ujian_id', 'id');
    }
    function nilai()
    {
        return $this->hasMany(Nilai::class, 'ujian_id', 'id');
    }
}
