<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;


class Mapel extends Model
{
    use HasFactory;
    protected $table = "mapel";
    protected $fillable = [
        'kelas_id',
        'mata_pelajaran',
        'materi',
        'deskripsi',
    ];

    static $field = [

        'mapel' => ['required'],
        'materi' => ['required'],
        'deskripsi' => ['required'],
    ];
    static $pesan = [
        'mapel.required' => "Harus diisi tidak boleh kosong !",
        'materi.required' => "Harus diisi tidak boleh kosong !",
        'deskripsi.required' => "Harus diisi tidak boleh kosong !",
    ];



    function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }
    function kuis()
    {
        return $this->hasMany(Kuis::class);
    }


}
