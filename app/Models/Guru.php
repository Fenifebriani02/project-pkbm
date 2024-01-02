<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class Guru extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "guru";
    protected $fillable = [
        'username',
        'nama',
        'nip',
        'alamat',
        'jenis_kelamin',
        'password',
    ];

    static $field = [
        'username' => ['required'],
        'nama' => ['required'],
        'nip' => ['required'],
        'alamat' => ['required'],
        'jenis_kelamin' => ['required'],
        'password' => ['required'],
    ];
    static $pesan = [
        'username.required' => "Harus diisi tidak boleh kosong !",
        'nama.required' => "Harus diisi tidak boleh kosong !",
        'nip.required' => "Harus diisi tidak boleh kosong !",
        'alamat.required' => "Harus diisi tidak boleh kosong !",
        'jenis_kelamin.required' => "Harus diisi tidak boleh kosong !",
        'password.required' => "Harus diisi tidak boleh kosong !",
    ];


    public function kelas() {
        return $this->hasMany(Kelas::class);
    }

}
