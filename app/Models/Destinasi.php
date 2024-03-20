<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_destinasi'
    ];

    public function TempatWisata()
    {
        return $this->hasMany(TempatWisata::class);
    }
}
