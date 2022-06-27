<?php

namespace App\Rules;

use App\Models\AnggotaKelas;
use Illuminate\Contracts\Validation\Rule;

class UniqueAnggota implements Rule
{

    protected $id_kelas;
    protected $id_tahun_ajar;
    protected $error_message;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id_kelas, $id_tahun_ajar)
    {
        $this->id_kelas = $id_kelas;
        $this->id_tahun_ajar = $id_tahun_ajar;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($this->id_kelas == '' or $this->id_tahun_ajar == ''){
            return false;
        }

        $anggota_kelas = AnggotaKelas::where('id_tahun_ajar', $this->id_tahun_ajar)->where('id_siswa', $value)->first();
        if($anggota_kelas != null){
            $this->error_message = 'Siswa sudah menjadi anggota '.$anggota_kelas->kelas->kode;
            return false;
        }

        $anggota_kelas = AnggotaKelas::where('id_kelas', $this->id_kelas)->where('id_tahun_ajar', $this->id_tahun_ajar)->where('id_siswa', $value)->count();
        if($anggota_kelas > 0){
            $this->error_message = 'Siswa sudah ada di kelas ini';
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->error_message;
        return 'Siswa sudah ada di kelas ini';
    }
}
