<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WaliKelasController;
use App\Http\Controllers\TahunAjarController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\AnggotaKelasController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\NilaiEkskulController;
use App\Http\Controllers\NilaiSikapController;
use App\Http\Controllers\NilaiKesehatanController;
use App\Http\Controllers\NilaiProporsiController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\DataAdminController;
use App\Http\Controllers\AbsensiGuruController;

use App\Http\Controllers\AkademikController;
use App\Http\Controllers\RuanganController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/template', function () {
        return view('template_backend.test');
    });

    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::get('pengumuman', [DashboardController::class, 'pengumuman'])->name('pengumuman');
    });

     Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('edit/{user}', [Usercontroller::class, 'editProfile'])->name('edit');
        Route::patch('update/{user}', [Usercontroller::class, 'updateProfile'])->name('update');
    });

    Route::group(['prefix' => 'blank', 'as' => 'blank.'], function () {
        Route::get('/', function () {
            return view('sample.blank.index');
        })->name('index');
    });

    Route::group(['prefix' => 'pengumuman', 'as' => 'pengumuman.'], function () {
        Route::get('/', [PengumumanController::class, 'index'])->name('index');
        Route::get('create', [PengumumanController::class, 'create'])->name('create');
        Route::post('store', [PengumumanController::class, 'store'])->name('store');
        Route::get('edit/{pengumuman}', [PengumumanController::class, 'edit'])->name('edit');
        Route::patch('update/{pengumuman}', [PengumumanController::class, 'update'])->name('update');
        Route::delete('destroy/{pengumuman}', [PengumumanController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [PengumumanController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'siswa', 'as' => 'siswa.'], function () {
        Route::get('/', [SiswaController::class, 'index'])->name('index');
        Route::get('index-ortu', [SiswaController::class, 'indexOrtu'])->name('index_ortu');
        Route::get('create', [SiswaController::class, 'create'])->name('create');
        Route::post('store', [SiswaController::class, 'store'])->name('store');
        Route::get('show/{siswa}', [SiswaController::class, 'show'])->name('show');
        Route::get('edit/{siswa}', [SiswaController::class, 'edit'])->name('edit');
        Route::patch('update/{siswa}', [SiswaController::class, 'update'])->name('update');
        Route::delete('destroy/{siswa}', [SiswaController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [SiswaController::class, 'datatable'])->name('datatable');
        Route::get('datatable-ortu', [SiswaController::class, 'datatableOrtu'])->name('datatable_ortu');
    });

    Route::group(['prefix' => 'kelas', 'as' => 'kelas.'], function () {
        Route::get('/', [KelasController::class, 'index'])->name('index');
        Route::get('create', [KelasController::class, 'create'])->name('create');
        Route::post('store', [KelasController::class, 'store'])->name('store');
        Route::get('edit/{kelas}', [KelasController::class, 'edit'])->name('edit');
        Route::patch('update/{kelas}', [KelasController::class, 'update'])->name('update');
        Route::delete('destroy/{kelas}', [KelasController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [KelasController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'mapel', 'as' => 'mapel.'], function () {
        Route::get('/', [MapelController::class, 'index'])->name('index');
        Route::get('create', [MapelController::class, 'create'])->name('create');
        Route::post('store', [MapelController::class, 'store'])->name('store');
        Route::get('edit/{mapel}', [MapelController::class, 'edit'])->name('edit');
        Route::patch('update/{mapel}', [MapelController::class, 'update'])->name('update');
        Route::delete('destroy/{mapel}', [MapelController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [MapelController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::patch('update/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [UserController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'guru', 'as' => 'guru.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::get('show/{user}', [UserController::class, 'show'])->name('show');
        Route::patch('update/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
        Route::get('datatable/{level}', [UserController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'ortu', 'as' => 'ortu.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::get('show/{user}', [UserController::class, 'show'])->name('show');
        Route::patch('update/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
        Route::get('datatable/{level}', [UserController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'ruangan', 'as' => 'ruangan.'], function () {
        Route::get('/', [RuanganController::class, 'index'])->name('index');
        Route::get('create', [RuanganController::class, 'create'])->name('create');
        Route::post('store', [RuanganController::class, 'store'])->name('store');
        Route::get('edit/{ruangan}', [RuanganController::class, 'edit'])->name('edit');
        Route::get('show/{ruangan}', [RuanganController::class, 'show'])->name('show');
        Route::patch('update/{ruangan}', [RuanganController::class, 'update'])->name('update');
        Route::delete('destroy/{ruangan}', [RuanganController::class, 'destroy'])->name('destroy');
        Route::get('datatable/', [RuanganController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'wali_kelas', 'as' => 'wali_kelas.'], function () {
        Route::get('/', [WaliKelasController::class, 'index'])->name('index');
        Route::get('create', [WaliKelasController::class, 'create'])->name('create');
        Route::post('store', [WaliKelasController::class, 'store'])->name('store');
        Route::get('show/{wali_kelas}', [WaliKelasController::class, 'show'])->name('show');
        Route::get('edit/{wali_kelas}', [WaliKelasController::class, 'edit'])->name('edit');
        Route::patch('update/{wali_kelas}', [WaliKelasController::class, 'update'])->name('update');
        Route::post('set/{kelas}/{tahun_ajar}', [WaliKelasController::class, 'setWaliKelas'])->name('set');
        Route::delete('destroy/{wali_kelas}', [WaliKelasController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [WaliKelasController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'tahun_ajar', 'as' => 'tahun_ajar.'], function () {
        Route::get('/', [TahunAjarController::class, 'index'])->name('index');
        Route::get('create', [TahunAjarController::class, 'create'])->name('create');
        Route::post('store', [TahunAjarController::class, 'store'])->name('store');
        Route::get('edit/{tahun_ajar}', [TahunAjarController::class, 'edit'])->name('edit');
        Route::get('set-aktif/{tahun_ajar}', [TahunAjarController::class, 'setActive'])->name('set_aktif');
        Route::patch('update/{tahun_ajar}', [TahunAjarController::class, 'update'])->name('update');
        Route::delete('destroy/{tahun_ajar}', [TahunAjarController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [TahunAjarController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'absensi', 'as' => 'absensi.'], function () {
        Route::get('/', [AbsensiController::class, 'index'])->name('index');
        Route::get('generate-form/{id_kelas}/{id_tahun_ajar}/{tgl?}', [AbsensiController::class, 'generateForm'])->name('generate_form');
        Route::post('update-or-create/{semester}/{tgl?}', [AbsensiController::class, 'updateOrCreate'])->name('update_create');
        Route::post('store', [AbsensiController::class, 'store'])->name('store');
        Route::patch('update/{absensi}', [AbsensiController::class, 'update'])->name('update');
        Route::delete('destroy/{absensi}', [AbsensiController::class, 'destroy'])->name('destroy');

        Route::get('index-ortu', [AbsensiController::class, 'indexOrtu'])->name('index.ortu');
    });

        Route::group(['prefix' => 'absensiGuru', 'as' => 'absensiGuru.'], function () {
        Route::get('/', [AbsensiGuruController::class, 'index'])->name('index');
        Route::get('datatable', [AbsensiGuruController::class, 'datatable'])->name('datatable');
        Route::post('store', [AbsensiGuruController::class, 'store'])->name('store');
        Route::get('show/{user}', [AbsensiGuruController::class, 'show'])->name('show');
        // Route::delete('destroy/{absensiGuru}', [AbsensiGuruController::class, 'destroy'])->name('destroy');
        Route::get('datatable_absen/{id_guru?}', [AbsensiGuruController::class, 'datatable_absen'])->name('datatable_absen');
    });

    Route::group(['prefix' => 'jadwal', 'as' => 'jadwal.'], function () {
        Route::get('/', [JadwalController::class, 'index'])->name('index');
        Route::get('create', [JadwalController::class, 'create'])->name('create');
        Route::post('store', [JadwalController::class, 'store'])->name('store');
        Route::get('edit/{jadwal}', [JadwalController::class, 'edit'])->name('edit');
        Route::patch('update/{jadwal}', [JadwalController::class, 'update'])->name('update');
        Route::delete('destroy/{jadwal}', [JadwalController::class, 'destroy'])->name('destroy');
        Route::get('datatable/{kelas}/{id_tahun_ajar}', [JadwalController::class, 'datatable'])->name('datatable');
        
        Route::get('index-guru', [JadwalController::class, 'indexGuru'])->name('index.guru');
        Route::get('index-ortu', [JadwalController::class, 'indexOrtu'])->name('index.ortu');
        Route::get('datatable-guru', [JadwalController::class, 'datatableGuru'])->name('datatable.guru');
    });

    Route::group(['prefix' => 'anggota_kelas', 'as' => 'anggota_kelas.'], function () {
        Route::get('create/{id_kelas}/{id_tahun_ajar}', [AnggotaKelasController::class, 'create'])->name('create');
        Route::post('store', [AnggotaKelasController::class, 'store'])->name('store');
        Route::get('edit/{anggota_kelas}/{id_tahun_ajar}', [AnggotaKelasController::class, 'edit'])->name('edit');
        Route::get('get-by-kelas-tahun/{kelas}/{tahun_ajar}', [AnggotaKelasController::class, 'getByKelasTahun'])->name('get_by_kelas_tahun');
        Route::patch('update/{anggota_kelas}/{id_tahun_ajar}', [AnggotaKelasController::class, 'update'])->name('update');
        Route::delete('destroy/{anggota_kelas}', [AnggotaKelasController::class, 'destroy'])->name('destroy');
        Route::get('datatable/{kelas}/{id_tahun_ajar}/{custom_action?}', [AnggotaKelasController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'nilai', 'as' => 'nilai.'], function () {
        Route::get('index-ortu', [NilaiController::class, 'indexOrtu'])->name('index.ortu');
        Route::get('index-guru', [NilaiController::class, 'indexGuru'])->name('index.guru');

        Route::get('edit-raport/{anggota_kelas}/{semester}', [NilaiController::class, 'editRaport'])->name('edit_raport');
        Route::get('show-raport/{anggota_kelas}/{semester}', [NilaiController::class, 'showRaport'])->name('show_raport');
        Route::post('update-raport/{anggota_kelas}/{semester}', [NilaiController::class, 'updateRaport'])->name('update_raport');
        Route::post('store-mapel/{id_kelas}/{id_tahun_ajar}', [NilaiController::class, 'storeMapel'])->name('store_mapel');
        Route::delete('destroy/{id_kelas}/{id_tahun_ajar}/{id_mapel}', [NilaiController::class, 'destroyMapel'])->name('destroy_mapel');
        Route::get('datatable', [NilaiController::class, 'datatable'])->name('datatable');
        Route::get('export-raport/{anggota_kelas}/{semester}', [NilaiController::class, 'exportRaport'])->name('export_raport');
        Route::get('datatable-guru', [NilaiController::class, 'datatableGuru'])->name('datatable.guru');

        //  Route::get('export/{anggota_kelas}/{semester}', [NilaiController::class, 'export'])->name('export');
         Route::get('export/{id_kelas?}/{id_tahun_ajaran?}', [NilaiController::class, 'export'])->name('export');
    });

    Route::group(['prefix' => 'history_nilai', 'as' => 'history_nilai.'], function () {
        Route::get('/', [NilaiController::class, 'historyNilai'])->name('index');
    });

    Route::group(['prefix' => 'akademik', 'as' => 'akademik.'], function () {
        Route::get('/', [AkademikController::class, 'index'])->name('index');
        Route::get('show/{id_kelas}/{id_tahun_ajar}', [AkademikController::class, 'show'])->name('show');
        Route::get('create', [AkademikController::class, 'create'])->name('create');
        Route::post('store', [AkademikController::class, 'store'])->name('store');
        Route::get('edit/{akademik}', [AkademikController::class, 'edit'])->name('edit');
        Route::patch('update/{akademik}', [AkademikController::class, 'update'])->name('update');
        Route::delete('destroy/{akademik}', [AkademikController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [AkademikController::class, 'datatable'])->name('datatable');
    });

    
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('create', [AdminController::class, 'create'])->name('create');
        Route::post('store', [AdminController::class, 'store'])->name('store');
        Route::get('edit/{user}', [AdminController::class, 'edit'])->name('edit');
        Route::get('show/{user}', [AdminController::class, 'show'])->name('show');
        Route::patch('update/{user}', [AdminController::class, 'update'])->name('update');
        Route::delete('destroy/{user}', [AdminController::class, 'destroy'])->name('destroy');
        Route::get('datatable/{level}', [AdminController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'dataAdmin', 'as' => 'dataAdmin.'], function () {
        Route::get('/', [DataAdminController::class, 'index'])->name('index');
        Route::get('create', [DataAdminController::class, 'create'])->name('create');
        Route::post('store', [DataAdminController::class, 'store'])->name('store');
        Route::get('edit/{user}', [DataAdminController::class, 'edit'])->name('edit');
        Route::get('show/{user}', [DataAdminController::class, 'show'])->name('show');
        Route::patch('update/{user}', [DataAdminController::class, 'update'])->name('update');
        Route::delete('destroy/{user}', [DataAdminController::class, 'destroy'])->name('destroy');
        Route::get('datatable/{level}', [DataAdminController::class, 'datatable'])->name('datatable');
    });


});
