<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Siswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "siswa";
    protected $fillable = [
        'id_kelas',
        'username',
        'nama',
        'nim',
        'jenis_kelamin',
        'alamat',
        'email',
        'password',
        'tanggal_lahir',
        'no_hp',
    ];

    static $field = [
        'username' => ['required', 'unique:siswa', 'max:255'],
        'nama' => ['required'],
        'nim' => ['required', 'unique:siswa'],
        'jenis_kelamin' => ['required'],
        'alamat' => ['required'],
        'email' => ['required', 'unique:siswa'],
        'password' => ['required'],
        'tanggal_lahir' => ['required'],
        'no_hp' => ['required', 'unique:siswa']
    ];
    static $pesan = [
        'username.required' => "Tidak boleh kosong !",
        'username.unique' => "Username sudah digunakan !",
        'username.max' => "Maksimal 100 karakter !",
        'nama.required' => "Tidak boleh kosong !",
        'nim.required' => "Tidak boleh kosong !",
        'nim.unique' => "NIM sudah digunakan !",
        'jenis_kelamin.required' => "Tidak boleh kosong !",
        'alamat.required' => "Tidak boleh kosong !",
        'email.required' => "Tidak boleh kosong !",
        'email.unique' => "Email sudah digunakan !",
        'password.required' => "Tidak boleh kosong !",
        'tanggal_lahir.required' => "Tidak boleh kosong !",
        'no_hp.required' => "Tidak boleh kosong !",
        'no_hp.unique' => "Nomor HP sudah digunakan !",
    ];

    function kelas()
    {

        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }

    function kuis()
    {

        return $this->hasMany(Kuis::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'siswa_id', 'id');
    }

}
