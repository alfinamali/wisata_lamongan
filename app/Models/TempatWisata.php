<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatWisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_destinasi',
        'destinasi_id',
        'deskripsi',
        'image',
        'lokasi',
        'harga',
    ];

    public function destinasi()
    {
        return $this->belongsTo(Destinasi::class, 'destinasi_id');
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'user_wisata', 'wisata_id', 'user_id');
    }
}
