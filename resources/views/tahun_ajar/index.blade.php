@extends('template_backend.app')

@section('content')
    <div class="container-fluid p-0">
        <h1 class=" mb-3">Tahun Ajaran</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class=" mb-0 ">Data Tahun Ajaran</h4>
                            <a href="{{ route('tahun_ajar.create') }}" class="btn btn-sm btn-primary add" data-toggle="tooltip"
                                data-placement="bottom" title="Tambah tahun_ajar"> <i class="fas fa-folder-plus"></i>
                                Tahun Ajar Baru</a>
                        </div>
                    </div>
                    <div class="px-3">
                        @include('layouts.flash')
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                            @include('tahun_ajar.datatable')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <span class="text-danger"> <b> <i>Catatan :</i> </b> </span> <br>
                        <ul class="mb-0">
                            <li>Hanya boleh ada satu tahun ajaran yang aktif</li> 
                            <li>Tahun ajar yang aktif akan otomatis menjadi tahun ajar default</li> 
                            <li>Data (jadwal, nilai, dll) yang ditampilkan di halaman guru, siswa dan wali akan berdasarkan tahun ajar default</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
