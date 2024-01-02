<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;


class SoalUjian extends Model
{
    use HasFactory;
    protected $table = "soal_ujian";
    protected $fillable = [
        'ujian_id',
        'soal',
        'opsi_a',
        'opsi_b',
        'opsi_c',
        'opsi_d',
        'kunci_jawaban',
    ];

    static $field = [
        'ujian' => ['required'],
    ];

    static $pesan = [

    ];

    function ujian()
    {
        return $this->belongsTo(Ujian::class, 'ujian_id', 'id');
    }
    function mapel()
    {
        return $this->belongsTo(Mapel::class, 'ujian_id', 'id');
    }
    function nilai()
    {
        return $this->hasMany(Nilai::class, 'ujian_id', 'id');
    }
}
