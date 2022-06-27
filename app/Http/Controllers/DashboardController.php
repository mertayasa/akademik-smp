<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use App\Models\Mapel;
use App\Models\Pengumuman;
use App\Models\Ekskul;
use App\Models\Kelas;
use App\Models\Ruangan;
use App\Models\TahunAjar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $dashboard_data = [
            'tahun_ajar' => TahunAjar::where('status', 'aktif')->first(),
        ];

        if(Auth::user()->isOrtu()){
            $dashboard_data += $this->generateDashboardData();
        }else if(Auth::user()->isAdmin()){
            $dashboard_data += $this->generateDashboardData();
        }else{
            $dashboard_data += $this->generateDashboardData();
        }
        
        return view('dashboard.index', $dashboard_data);
    }

    public function generateDashboardData()
    {
        $siswa_count = Siswa::where('status', 'aktif')->count();
        $guru_count = User::where('level', 'guru')->count();
        $ortu_count = User::where('level', 'ortu')->count();
        $kelas_count = Kelas::count();
        $mapel_count = Mapel::count();
        $ruangan_count = Ruangan::count();
        $pengumuman = Pengumuman::where('status', 'aktif')->get();

        $dashboard_data = [
            'siswa_count' => $siswa_count,
            'guru_count' => $guru_count,
            'ortu_count' => $ortu_count,
            'kelas_count' => $kelas_count,
            'ruangan_count' => $ruangan_count,
            'mapel_count' => $mapel_count,
            'pengumuman' => $pengumuman,
        ];

        return $dashboard_data;
    }

    public function pengumuman()
    {
        return view('dashboard.pengumuman');
    }
}
