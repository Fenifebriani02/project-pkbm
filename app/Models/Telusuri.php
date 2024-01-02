<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Telusuri extends Model
{
    use HasFactory;
    protected $table = "telusuri";
    protected $fillable = [
        'judul',
        'link',
    ];
}
