<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link" style="">
        <img src="{{ asset('images/default/favicon.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">SIAKAD</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                {{-- Dashboard --}}
                @php
                    $is_open_dashboard = isActive([
                        'dashboard',
                    ]);
                @endphp
                <li class="nav-item has-treeview {{ $is_open_dashboard == 'active' ? 'menu-open' : '' }}" id="liDashboard">
                    <a href="#" class="nav-link" id="Dashboard">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.index') }}" class="nav-link {{ isActive('dashboard') }}" id="Home">
                                <i class="fas fa-home nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.index') }}" class="nav-link {{ isActive('dashboard') }}" id="AdminHome">
                                <i class="fas fa-home nav-icon"></i>
                                <p>Dashboard Admin</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Master Data --}}
                @php
                    $is_open_master = isActive([
                        'kelas',
                        'guru',
                        'ortu',
                        'siswa',
                        'mapel',
                    ]);
                @endphp
                <li class="nav-item has-treeview {{ $is_open_master == 'active' ? 'menu-open' : ''  }}" id="liMasterData">
                    <a href="#" class="nav-link" id="MasterData">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Master Data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="{{ route('guru.index') }}" class="nav-link {{ isActive('guru') }}" id="DataGuru">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Data Guru</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ortu.index') }}" class="nav-link {{ isActive('ortu') }}" id="DataOrangTua">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Data Orang Tua</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('guru.index') }}" class="nav-link {{ isActive('guru') }}" id="DataAdmin">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Data Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kelas.index') }}" class="nav-link {{ isActive('kelas') }}" id="DataKelas">
                                <i class="fas fa-home nav-icon"></i>
                                <p>Data Kelas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('siswa.index') }}" class="nav-link {{ isActive('siswa') }}" id="DataSiswa">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Data Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('mapel.index') }}" class="nav-link {{ isActive('mapel') }}" id="DataMapel">
                                <i class="fas fa-book nav-icon"></i>
                                <p>Data Mata Pelajaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link" id="DataUser">
                                <i class="fas fa-user-plus nav-icon"></i>
                                <p>Data User</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Pengumuman --}}
                <li class="nav-item">
                    <a href="{{ route('pengumuman.index') }}" class="nav-link {{ isActive('pengumuman') }}" id="Home">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>Pengumuman</p>
                    </a>
                </li>

                {{-- Akademik --}}
                <li class="nav-item has-treeview">
                    <a href="{{ url('/') }}" class="nav-link" id="Home">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>Akademik</p>
                    </a>
                </li>

                {{-- Absensi Guru --}}
                <li class="nav-item">
                    <a href="" class="nav-link" id="AbsensiGuru">
                        <i class="fas fa-calendar-check nav-icon"></i>
                        <p>Absensi Guru</p>
                    </a>
                </li>

                {{-- Trash --}}
                <li class="nav-item has-treeview" id="liViewTrash">
                    <a href="#" class="nav-link" id="ViewTrash">
                        <i class="nav-icon fas fa-recycle"></i>
                        <p>
                            View Trash
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="" class="nav-link" id="TrashJadwal">
                                <i class="fas fa-calendar-alt nav-icon"></i>
                                <p>Trash Jadwal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link" id="TrashGuru">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Trash Guru</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link" id="TrashKelas">
                                <i class="fas fa-home nav-icon"></i>
                                <p>Trash Kelas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link" id="TrashSiswa">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Trash Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link" id="TrashMapel">
                                <i class="fas fa-book nav-icon"></i>
                                <p>Trash Mapel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link" id="TrashUser">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Trash User</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>