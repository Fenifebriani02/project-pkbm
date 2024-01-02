<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;


class Kelas extends Model
{
    use HasFactory;
    protected $table = "kelas";
    protected $fillable = [
        'id_guru',
        'nama_kelas',
    ];


    static $field = [
        'id_guru' => 'required',
        'nama_kelas' => 'required',
    ];
    static $pesan = [
        'id_guru.required' => "Harus diisi tidak boleh kosong !",
        'nama_kelas.required' => "Harus diisi tidak boleh kosong !",
        'nip.required' => "Harus diisi tidak boleh kosong !",
    ];
    function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id');
    }
    function mapel()
    {
        return $this->hasMany(Mapel::class);
    }
    function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_kelas', 'id');
    }
    function ujian()
    {
        return $this->hasMany(Ujian::class, 'kelas_id', 'id');
    }
}
