<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = [
        'nama_aparatur',
        'jabatan',
        'nilai',
        'keterangan',
    ];
}
