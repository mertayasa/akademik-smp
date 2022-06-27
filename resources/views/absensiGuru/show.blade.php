@extends('template_backend.app')

@section('content')
    <div class="container-fluid p-0">
        <h1 class=" mb-3">Absensi Guru</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class=" mb-0 ">Detail Absensi</h4>
                        </div>
                    </div>
                    <div class="px-3">
                        @include('layouts.flash')
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        @include('absensiGuru.datatable_absen')
                                    </div>
                                </div>
                                <a href="{{ route('absensiGuru.index') }}" class="btn btn-sm btn-danger">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
