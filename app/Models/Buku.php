<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'judul',
        'penulis',
        'harga',
        'tgl_terbit',
    ];

    protected function casts(): array
    {
        return [
            'harga' => 'integer',
            'tgl_terbit' => 'date',
        ];
    }
}
