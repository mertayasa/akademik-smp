<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiGuru extends Model
{
    use HasFactory;

    public $table = 'absensi_guru';

    protected $fillable = [
        'id_guru',
        'tanggal',
        'status',
    ];

    static $status = [
        'Hadir' => 'Hadir', 
        'Sakit' => 'Sakit', 
        'Izin' => 'Izin', 
        'Bertugas Keluar' => 'Bertugas Keluar', 
        'Terlambat' => 'Terlambat', 
        'Tanpa Keterangan' => 'Tanpa Keterangan'
    ];

    public function guru()
    {
        return $this->belongsTo('App\Models\Users', 'id_guru');
    }
}
