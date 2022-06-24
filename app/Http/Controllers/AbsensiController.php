<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\AnggotaKelas;
use App\Models\Siswa;
use App\Models\TahunAjar;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function indexOrtu(Request $request)
    {
        $id_ortu = Auth::id();
        $siswa = Siswa::where('id_user', $id_ortu)->pluck('nama', 'id');
        $id_siswa = $request->input('id_siswa', null);
        if(isset($id_siswa)){
            $tahun_ajar_active = TahunAjar::where('status', 'aktif')->first();
            $anggota_kelas = AnggotaKelas::where('id_siswa', $id_siswa)->where('id_tahun_ajar', $tahun_ajar_active->id)->first();
            if($anggota_kelas){
                $period_ganjil = Absensi::periodAbsensi($anggota_kelas->id_kelas, $tahun_ajar_active->id, 'ganjil');
                $period_genap = Absensi::periodAbsensi($anggota_kelas->id_kelas, $tahun_ajar_active->id, 'genap');
            }
        }

        $data  =  [
            'anggota_kelas' => [$anggota_kelas ?? null],
            'siswa' => $siswa,
            'id_siswa' => $id_siswa,
            'period_ganjil' => $period_ganjil ?? [],
            'period_genap' => $period_genap ?? [],
        ];

        return view('absensi.index_ortu', $data);
    }

    public function generateForm($id_kelas, $id_tahun_ajar, $tgl)
    {
        try{
            $anggota_kelas = AnggotaKelas::where('id_kelas', $id_kelas)->where('id_tahun_ajar', $id_tahun_ajar)->get();
            $tahun_ajar = TahunAjar::find($id_tahun_ajar);

            $semester = getSemester($tgl, $id_tahun_ajar);
            if(!$semester){
                return response(['code' => 0, 'message' => "Tanggal $tgl tidak termasuk pada tahun ajar yang dipilih", 'tahun_ajar' => $tahun_ajar]);
            }

            $data = [
                'semester' => $semester,
                'tgl_absen' => $tgl,
                'anggota_kelas' => $anggota_kelas
            ];
    
            $form = view('absensi.form', $data)->render();
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal memuat form']);
        }
        return response(['code' => 1, 'form' => $form]);
    }

    public function updateOrCreate(Request $request, $semester, $tgl)
    {
        try{
            $kehadiran = $request->kehadiran;
            if(!$kehadiran){
                return response(['code' => 0, 'message' => 'Data kehadiran wajib diisi']);
            }

            DB::transaction(function () use($kehadiran, $tgl, $semester){
                foreach($kehadiran as $key => $hadir){
                    Absensi::updateOrCreate([
                        'id_anggota_kelas' => $key,
                        'tgl_absensi' => $tgl,
                        'semester' => $semester
                    ], [
                        'id_anggota_kelas' => $key,
                        'kehadiran' => $hadir,
                        'semester' => $semester,
                        'tgl_absensi' => $tgl 
                    ]);
                }
            }, 5);

            $anggota_kelas = AnggotaKelas::where('id_kelas', $request->id_kelas)->where('id_tahun_ajar', $request->id_tahun_ajar);
            $period_ganjil = Absensi::periodAbsensi($request->id_kelas, $request->id_tahun_ajar, 'ganjil');
            $period_genap = Absensi::periodAbsensi($request->id_kelas, $request->id_tahun_ajar, 'genap');

            $data = [
                'anggota_kelas' => $anggota_kelas->get(),
                'id_kelas' => $request->id_kelas,
                'id_tahun_ajar' => $request->id_tahun_ajar,
            ];

            $table_ganjil = view('absensi.table', $data += ['period' => $period_ganjil])->render();
            unset($data['period']);
            $table_genap = view('absensi.table', $data += ['period' => $period_genap])->render();
            $smt_ganjil_text = '<h4> <b> Semester Ganjil </b></h4>';
            $hr = '<hr>';
            $smt_genap_text = '<h4> <b>Semester Genap</b> </h4>';

            $table = $smt_ganjil_text.$table_ganjil.$hr.$smt_genap_text.$table_genap;

        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menyimpan data absensi']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menyimpan data absensi', 'table' => $table]);
    }
}
