<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    public $table = 'mapel';

    protected $fillable = [
        'nama',
        'kelompok',
        'paket'
    ];

    static $paket = [
        'Pelajaran Umum' => 'Pelajaran Umum', 
        'Ekstrakurikuler' => 'Ekstrakurikuler'
    ];

    static $kelompok = [
        'Pagi' => 'Pagi', 
        'Siang' => 'Siang'
    ];
}
