<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kelas',
        'id_siswa',
        'id_tahun_ajar',
        'status'
    ];

    use HasFactory;
    public $with = [
        'kelas', 'tahun_ajar', 'siswa'
    ];

    public function scopeByKelasAndTahun($query, $id_kelas, $id_tahun_ajar)
    {
        $id_kelas = is_array($id_kelas) ? $id_kelas : array($id_kelas);
        return $query->whereIn('id_kelas', $id_kelas)->where('id_tahun_ajar', $id_tahun_ajar);
    }

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'id_kelas');
    }

    public function getNamaSiswaAttribute()
    {
        return $this->siswa->nama;
    }

    public function tahun_ajar()
    {
        return $this->belongsTo('App\Models\TahunAjar', 'id_tahun_ajar');
    }
    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa', 'id_siswa');
    }

    public function absensi()
    {
        return $this->hasMany('App\Models\Absensi', 'id_anggota_kelas');
    }

    public function nilai()
    {
        return $this->hasMany('App\Models\Nilai', 'id_anggota_kelas');
    }

    public function nilai_ekskul()
    {
        return $this->hasMany('App\Models\NilaiEkskul', 'id_anggota_kelas');
    }

    public function nilai_kesehatan()
    {
        return $this->hasMany('App\Models\NilaiKesehatan', 'id_anggota_kelas');
    }

    public function nilai_proporsi()
    {
        return $this->hasMany('App\Models\NilaiProporsi', 'id_anggota_kelas');
    }

    public function nilai_sikap()
    {
        return $this->hasMany('App\Models\NilaiSikap', 'id_anggota_kelas');
    }

    public function saran()
    {
        return $this->hasMany('App\Models\Saran', 'id_anggota_kelas');
    }

    public function getAbsensiByDate($tgl, $return_full_status = false)
    {
        $absensi = $this->absensi->where('tgl_absensi', $tgl)->first();
        if($return_full_status){
            return isset($absensi) ? $absensi->kehadiran : '-';
        }

        return isset($absensi) ? ucfirst(substr($absensi->kehadiran, 0, 1)) : '-';
    }

    public function getNilaiValue($type, $id_mapel, $semester)
    {
        $nilai = $this->nilai->where('semester', $semester)->where('id_mapel', $id_mapel)->first();
        if(isset($nilai)){
            return $nilai->$type;
        }

        return null;
    }

    public function getNilaiEkskulValue($id_ekskul, $semester)
    {
        $nilai = $this->nilai_ekskul->where('semester', $semester)->where('id_ekskul', $id_ekskul)->first();
        if(isset($nilai)){
            return $nilai->keterangan;
        }

        return null;
    }

    public function getNilaiSikapValue($jenis_sikap, $semester)
    {
        $nilai = $this->nilai_sikap->where('semester', $semester)->where('jenis_sikap', $jenis_sikap)->first();
        if(isset($nilai)){
            return $nilai->keterangan;
        }

        return null;
    }

    public function getNilaiProporsiValue($jenis_proporsi, $semester)
    {
        $nilai = $this->nilai_proporsi->where('semester', $semester)->where('jenis_proporsi', $jenis_proporsi)->first();
        if(isset($nilai)){
            return $nilai->keterangan;
        }

        return null;
    }

    public function getNilaiKesehatanValue($jenis_kesehatan, $semester)
    {
        $nilai = $this->nilai_kesehatan->where('semester', $semester)->where('jenis_kesehatan', $jenis_kesehatan)->first();
        if(isset($nilai)){
            return $nilai->keterangan;
        }

        return null;
    }

    public function getSaranValue($semester)
    {
        $nilai = $this->saran->where('semester', $semester)->first();
        if(isset($nilai)){
            return $nilai->keterangan;
        }

        return null;
    }

    public function rataNilaiPengetahuan($semester, $id_mapel)
    {
        $nilai = $this->nilai->where('semester', $semester)->where('id_mapel', $id_mapel)->first();
        if($nilai){
            // return round(($nilai->ulha1_p + $nilai->ulha2_p + $nilai->ulha3_p + $nilai->ulha4_p + $nilai->pts + $nilai->pas)/6, 2);
            return round(($nilai->ulha1_p + $nilai->ulha2_p + $nilai->ulha3_p + $nilai->pts + $nilai->pas)/5, 2);
        }

        return 0;
    }

    public function rataNilaiKeterampilan($semester, $id_mapel)
    {
        $nilai = $this->nilai->where('semester', $semester)->where('id_mapel', $id_mapel)->first();
        if($nilai){
            return round(($nilai->ulha1_k + $nilai->ulha2_k + $nilai->ulha3_k)/3, 2);
            // return round(($nilai->ulha1_k + $nilai->ulha2_k + $nilai->ulha3_k + $nilai->ulha4_k)/4, 2);
        }

        return 0;
    }

    public function nilaiUlhaP_1($semester, $id_mapel)
    {
        $nilai = $this->nilai->where('semester', $semester)->where('id_mapel', $id_mapel)->first();
        if($nilai){
            return round(($nilai->ulha1_p));
        }

        return 0;
    }

    public function nilaiUlhaP_2($semester, $id_mapel)
    {
        $nilai = $this->nilai->where('semester', $semester)->where('id_mapel', $id_mapel)->first();
        if($nilai){
            return round(($nilai->ulha2_p));
        }

        return 0;
    }
    
    public function nilaiUlhaP_3($semester, $id_mapel)
    {
        $nilai = $this->nilai->where('semester', $semester)->where('id_mapel', $id_mapel)->first();
        if($nilai){
            return round(($nilai->ulha3_p));
        }

        return 0;
    }

        public function nilaiUlhaK_1($semester, $id_mapel)
    {
        $nilai = $this->nilai->where('semester', $semester)->where('id_mapel', $id_mapel)->first();
        if($nilai){
            return round(($nilai->ulha1_k));
        }

        return 0;
    }

    public function nilaiUlhaK_2($semester, $id_mapel)
    {
        $nilai = $this->nilai->where('semester', $semester)->where('id_mapel', $id_mapel)->first();
        if($nilai){
            return round(($nilai->ulha2_k));
        }

        return 0;
    }
    
    public function nilaiUlhaK_3($semester, $id_mapel)
    {
        $nilai = $this->nilai->where('semester', $semester)->where('id_mapel', $id_mapel)->first();
        if($nilai){
            return round(($nilai->ulha3_k));
        }

        return 0;
    }

        public function nilaiPts($semester, $id_mapel)
    {
        $nilai = $this->nilai->where('semester', $semester)->where('id_mapel', $id_mapel)->first();
        if($nilai){
            return round(($nilai->pts));
        }

        return 0;
    }

        public function nilaiPas($semester, $id_mapel)
    {
        $nilai = $this->nilai->where('semester', $semester)->where('id_mapel', $id_mapel)->first();
        if($nilai){
            return round(($nilai->pas));
        }

        return 0;
    }
}
