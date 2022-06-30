<?php

namespace App\Http\Controllers;

use App\DataTables\AnggotaKelasDataTable;
use App\Models\Nilai;
use App\Models\Jadwal;
use App\Models\AnggotaKelas;
use Illuminate\Http\Request;
use App\DataTables\NilaiDataTable;
use App\Models\Ekskul;
use App\Models\Kelas;
use App\Models\NilaiEkskul;
use App\Models\NilaiKesehatan;
use App\Models\NilaiProporsi;
use App\Models\NilaiSikap;
use App\Models\Saran;
use App\Models\Mapel;
use App\Models\Prestasi;
use App\Models\Siswa;
use App\Models\TahunAjar;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use Barryvdh\DomPDF\Facade as PDF;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id_anggota_kelas = $request->get('id_anggota_kelas');
        $anggota_kelas = AnggotaKelas::with('siswa')->get()->where('siswa.id_user', Auth::id())->pluck('siswa.nama', 'id');
        $nilai = nilai::all();

        $data  =  [
            'id_anggota_kelas' => $id_anggota_kelas,
            'anggota_kelas' => $anggota_kelas,
            'nilai' => $nilai
        ];

        return view('nilai.index', $data);
    }

    public function indexOrtu(Request $request)
    {
        $id_ortu = Auth::id();
        $siswa = Siswa::where('id_user', $id_ortu)->pluck('nama', 'id');
        $id_siswa = $request->input('id_siswa', null);
        if (isset($id_siswa)) {
            $tahun_ajar_active = TahunAjar::where('status', 'aktif')->first();
            $anggota_kelas = AnggotaKelas::where('id_siswa', $id_siswa)->where('id_tahun_ajar', $tahun_ajar_active->id)->first();
            if ($anggota_kelas) {
                $mapel_of_jadwal = Jadwal::geetUniqueMapel($tahun_ajar_active->id, $anggota_kelas->id_kelas);
                $nilai = [
                    'mapel_of_jadwal' => $mapel_of_jadwal ?? [],
                    'anggota_kelas' => $anggota_kelas,
                ];
            }
        }

        $data  =  [
            'siswa' => $siswa,
            'id_siswa' => $id_siswa,
            'nilai' => $nilai ?? null
        ];

        return view('nilai.index_ortu', $data);
    }

    public function indexGuru()
    {
        return view('nilai.index_guru');
    }

    public function datatableGuru()
    {
        $tahun_ajar_active = TahunAjar::where('status', 'aktif')->first();
        $anggota_kelas = AnggotaKelas::byKelasAndTahun(Kelas::pluck('id')->toArray(), $tahun_ajar_active->id)->get();
        $custom_action = 'anggota_kelas.datatable_nilai_guru_action';

        return AnggotaKelasDataTable::set($anggota_kelas, $custom_action);
    }

    public function datatable()
    {
        $nilai = Nilai::all();
        return NilaiDataTable::set($nilai);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jadwal = Jadwal::pluck('id');
        $anggota_kelas = AnggotaKelas::where('status', 'aktif')->pluck('id');
        return view('nilai.create', compact('jadwal', 'anggota_kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Nilai::create($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data nilain Gagal Ditambahkan');
        }

        return redirect('nilai')->with('success', 'Data nilain Berhasil Ditambahkan');
    }

    public function storeMapel(Request $request, $id_kelas, $id_tahun_ajar)
    {
        try {
            $anggota_kelas_raw = AnggotaKelas::byKelasAndTahun($id_kelas, $id_tahun_ajar);
            $anggota_kelas = $anggota_kelas_raw->get();

            DB::transaction(function () use ($anggota_kelas, $request) {
                foreach ($anggota_kelas as $anggota) {
                    Nilai::updateOrCreate([
                        'id_anggota_kelas' => $anggota->id,
                        'id_mapel' => $request->id_mapel,
                        'semester' => 'ganjil',
                    ], [
                        'id_anggota_kelas' => $anggota->id,
                        'id_mapel' => $request->id_mapel,
                        'semester' => 'ganjil',
                    ]);
                }

                foreach ($anggota_kelas as $anggota) {
                    Nilai::updateOrCreate([
                        'id_anggota_kelas' => $anggota->id,
                        'id_mapel' => $request->id_mapel,
                        'semester' => 'genap',
                    ], [
                        'id_anggota_kelas' => $anggota->id,
                        'id_mapel' => $request->id_mapel,
                        'semester' => 'genap',
                    ]);
                }
            }, 5);

            $table = $this->renderNilaiMapelTable($id_kelas, $id_tahun_ajar, $anggota_kelas_raw);
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menambahkan mata pelajaran yang dinilai']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menambahkan mata pelajaran yang dinilai', 'table' => $table]);
    }

    public function destroyMapel($id_kelas, $id_tahun_ajar, $id_mapel)
    {
        $anggota_kelas = AnggotaKelas::byKelasAndTahun($id_kelas, $id_tahun_ajar);
        $nilai_by_anggota = Nilai::whereIn('id_anggota_kelas', $anggota_kelas->pluck('id')->toArray())->where('id_mapel', $id_mapel)->get();
        try {
            DB::transaction(function () use ($nilai_by_anggota) {
                foreach ($nilai_by_anggota as $nilai) {
                    $nilai->delete();
                }
            });
            $table = $this->renderNilaiMapelTable($id_kelas, $id_tahun_ajar, $anggota_kelas);
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data mata pelajaran yang dinilai']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data mata pelajaran yang dinilai', 'table' => $table]);
    }

    private function renderNilaiMapelTable($id_kelas, $id_tahun_ajar, $anggota_kelas_raw)
    {
        $mapel_of_jadwal = Jadwal::geetUniqueMapel($id_tahun_ajar, $id_kelas);
        $data = [
            'id_kelas' => $id_kelas,
            'id_tahun_ajar' => $id_tahun_ajar,
            'mapel_of_jadwal' => $mapel_of_jadwal
        ];

        return view('nilai.table_mapel', $data)->render();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        $jadwal = Jadwal::pluck('id');
        $anggota_kelas = AnggotaKelas::with('siswa')->get()->pluck('siswa.nama', 'id');
        return view('nilai.edit', compact('jadwal', 'nilai', 'anggota_kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        try {
            $nilai->update($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data nilai Gagal Di Edit');
        }

        return redirect('nilai')->with('info', 'Data nilai Berhasil Diedit  ');
    }

    public function editRaport(AnggotaKelas $anggota_kelas, $semester)
    {
        try {
            $mapel_of_jadwal = Jadwal::geetUniqueMapel($anggota_kelas->id_tahun_ajar, $anggota_kelas->id_kelas);

            $data = [
                'anggota_kelas' => $anggota_kelas,
                'semester' => $semester,
                'mapel_of_jadwal' => $mapel_of_jadwal,
            ];

            $form_raport = view('nilai.edit_raport', $data)->render();
            $raport_detail = view('nilai.raport_detail', $data)->render();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal mengambil data nilai']);
        }

        return response([
            'code' => 1,
            'form_raport' => $form_raport,
            'raport_detail' => $raport_detail,
        ]);
    }

    public function showRaport(AnggotaKelas $anggota_kelas, $semester)
    {
        try {
            $mapel_of_jadwal = Jadwal::geetUniqueMapel($anggota_kelas->id_tahun_ajar, $anggota_kelas->id_kelas);

            $data = [
                'anggota_kelas' => $anggota_kelas,
                'semester' => $semester,
                'mapel_of_jadwal' => $mapel_of_jadwal,
            ];

            $form_raport = view('nilai.show_raport', $data)->render();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal mengambil data nilai']);
        }

        return response(['code' => 1, 'form_raport' => $form_raport]);
    }

    public function updateRaport(Request $request, AnggotaKelas $anggota_kelas, $semester)
    {
        try {
            DB::transaction(function () use ($request, $anggota_kelas, $semester) {
                $data_pengetahuan = $request->input('pengetahuan', []);
                $data_keterampilan = $request->input('keterampilan', []);

                foreach ($data_pengetahuan as $key => $pengetahuan) {
                    Nilai::updateOrCreate([
                        'id_anggota_kelas' => $anggota_kelas->id,
                        'id_mapel' => $key,
                        'semester' => $semester,
                    ], [
                        'id_anggota_kelas' => $anggota_kelas->id,
                        'semester' => $semester,
                        'id_mapel' => $key,
                        'ulha1_p' => $pengetahuan['ulha1_p'] ?? 0,
                        'ulha2_p' => $pengetahuan['ulha2_p'] ?? 0,
                        'ulha3_p' => $pengetahuan['ulha3_p'] ?? 0,
                        // 'ulha4_p' => $pengetahuan['ulha4_p'] ?? 0,
                        'pts' => $pengetahuan['pts'] ?? 0,
                        'pas' => $pengetahuan['pas'] ?? 0,
                        'desk_pengetahuan' => $pengetahuan['keterangan'] ?? '-',
                    ]);
                }

                foreach ($data_keterampilan as $key => $keterampilan) {
                    Nilai::updateOrCreate([
                        'id_anggota_kelas' => $anggota_kelas->id,
                        'id_mapel' => $key,
                        'semester' => $semester,
                    ], [
                        'id_anggota_kelas' => $anggota_kelas->id,
                        'semester' => $semester,
                        'id_mapel' => $key,
                        'ulha1_k' => $keterampilan['ulha1_k'] ?? 0,
                        'ulha2_k' => $keterampilan['ulha2_k'] ?? 0,
                        'ulha3_k' => $keterampilan['ulha3_k'] ?? 0,
                        // 'ulha4_k' => $keterampilan['ulha4_k'] ?? 0,
                        'desk_keterampilan' => $keterampilan['keterangan'] ?? '-',
                    ]);
                }
            }, 3);

            $mapel_of_jadwal = Jadwal::geetUniqueMapel($anggota_kelas->id_tahun_ajar, $anggota_kelas->id_kelas);
            $raport_detail = view('nilai.raport_detail', [
                'anggota_kelas' => $anggota_kelas,
                'semester' => $semester,
                'mapel_of_jadwal' => $mapel_of_jadwal,
            ])->render();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menyimpan data nilai']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menyimpan data nilai', 'raport_detail' => $raport_detail]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        try {
            $nilai->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data nilai']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data nilai']);
    }

    public function exportRaport(AnggotaKelas $anggota_kelas, $semester)
    {
        // Memanggil relasi yg ada d dlm kurung
        $anggota_kelas->load(
            'nilai',
            'nilai_ekskul',
            'nilai_kesehatan',
            'nilai_proporsi',
            'nilai_sikap',
            'saran',
        );

        $mapel_of_jadwal = Jadwal::geetUniqueMapel($anggota_kelas->id_tahun_ajar, $anggota_kelas->id_kelas);

        $data = [
            'anggota_kelas' => $anggota_kelas,
            'semester' => $semester,
            'mapel_of_jadwal' => $mapel_of_jadwal,
        ];

        $pdf = PDF::loadview('nilai.export_raport', $data)->setPaper('a4', 'potrait');;

        return $pdf->stream('raport.pdf');
    }

    public function export($id_kelas, $id_tahun_ajar, $semester)
    {

        $anggota_kelas = AnggotaKelas::byKelasAndTahun($id_kelas, $id_tahun_ajar)->get();

        $nilai = array();
        foreach ($anggota_kelas as $data) {
            $nilai[] = Nilai::where('id_anggota_kelas', $data)->get();
        }

        $mapel_of_jadwal = Jadwal::geetUniqueMapel($id_tahun_ajar, $id_kelas);

        // $pdf = PDF::loadview('nilai.export', [
        //     'anggota_kelas' => $anggota_kelas,
        //     'nilai' => $nilai,
        //     'mapel_of_jadwal' => $mapel_of_jadwal,
        //     'tahun_ajaran' => TahunAjar::find($id_tahun_ajar),
        //     'semester' => $semester,
        //     'kelas' => Kelas::find($id_kelas)
        // ])
        // ->setPaper('a4', 'landscape');;

        // return $pdf->stream('raport.pdf');

        return view('nilai.export', [
            'anggota_kelas' => $anggota_kelas,
            'nilai' => $nilai,
            'mapel_of_jadwal' => $mapel_of_jadwal,
            'semester' => $semester,
            'tahun_ajaran' => TahunAjar::find($id_tahun_ajar),
            'kelas' => Kelas::find($id_kelas)
        ]);
    }
}
