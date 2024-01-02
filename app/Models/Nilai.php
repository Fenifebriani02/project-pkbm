<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;


class Nilai extends Model
{
    use HasFactory;
    protected $table = "nilai";
    protected $fillable = [
        'siswa_id',
        'kuis_id',
        'tugas_id',
        'ujian_id',
        'nilai',
    ];



    function tugas()
    {
        return $this->belongsTo(Tugas::class, 'tugas_id', 'id');
    }

    function ujian()
    {
        return $this->belongsTo(Ujian::class, 'ujian_id', 'id');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public function kuis()
    {
        return $this->belongsTo(Kuis::class, 'kuis_id', 'id');
    }

}
