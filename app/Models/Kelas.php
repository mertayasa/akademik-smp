<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'kelas';
    protected $fillable = [
        'kode',
        'jenjang',
        'kelompok',
        // 'paket'
    ];

    
    static $kelompok = [
        'Pagi' => 'Pagi', 
        'Siang' => 'Siang'
    ];

    public function anggota_kelas()
    {
        return $this->hasMany('App\Models\AnggotaKelas', 'id_kelas');
    }

    public function wali_kelas()
    {
        return $this->hasMany('App\Models\WaliKelas', 'id_kelas');
    }

    public function getNamaKelasAttribute()
    {
        return 'Kelas '.$this->attributes['jenjang'];
    }

    public function getWaliKelas($id_tahun_ajar)
    {
        return $this->wali_kelas()->where('id_kelas', $this->id)->where('id_tahun_ajar', $id_tahun_ajar)->get();
    }

    public function getAnggotaKelas($id_tahun_ajar, $id_siswa = null)
    {
        $anggota_kelas = $this->anggota_kelas()->where('id_kelas',  $this->id)->where('id_tahun_ajar', $id_tahun_ajar);
        if(isset($id_siswa)){
            return $anggota_kelas->whereIn('id_siswa', $id_siswa)->get();
        }
        return  $anggota_kelas->get();
    }
}
