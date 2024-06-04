<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class umkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_destinasi',
        'deskripsi',
        'images',
        'kontak',
        'maps',
    ];
}
