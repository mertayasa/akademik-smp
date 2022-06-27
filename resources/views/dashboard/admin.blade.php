<div class="row">
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $siswa_count }}</h3>
                <p>Jumlah Siswa</p>
            </div>
            <div class="icon">
                <i class="fas fa-users nav-icon"></i>
            </div>
            <a href="{{ route('siswa.index') }}" class="small-box-footer text-right pr-2">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $guru_count }}</h3>
                <p>Jumlah Guru</p>
            </div>
            <div class="icon">
                <i class="fas fa-users nav-icon"></i>
            </div>
            <a href="{{ route('guru.index') }}" class="small-box-footer text-right pr-2">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $ortu_count }}</h3>
                <p>Jumlah Orang Tua</p>
            </div>
            <div class="icon">
                <i class="fas fa-users nav-icon"></i>
            </div>
            <a href="{{ route('ortu.index') }}" class="small-box-footer text-right pr-2">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $kelas_count }}</h3>
                <p>Jumlah Kelas</p>
            </div>
            <div class="icon">
                <i class="fas fa-home nav-icon"></i>
            </div>
            <a href="{{ route('kelas.index') }}" class="small-box-footer text-right pr-2">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $ruangan_count }}</h3>
                <p>Jumlah Ruangan</p>
            </div>
            <div class="icon">
                <i class="fas fa-door-open nav-icon"></i>
            </div>
            <a href="{{ route('ruangan.index') }}" class="small-box-footer text-right pr-2">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $mapel_count }}</h3>
                <p>Jumlah Mata Pelajaran</p>
            </div>
            <div class="icon">
                <i class="fas fa-book-open nav-icon"></i>
            </div>
            <a href="{{ route('mapel.index') }}" class="small-box-footer text-right pr-2">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>