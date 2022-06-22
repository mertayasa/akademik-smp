@extends('template_backend.app')

@section('content')
<div class="container-fluid p-0">
    <h1 class=" mb-3">Pengumuman</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class=" mb-0 ">Data Pengumuman</h4>
                        <a href="{{ route('pengumuman.create') }}" class="btn btn-sm btn-primary add" data-toggle="tooltip" data-placement="bottom" title="Tambah Pengumuman"> <i class="fas fa-folder-plus"></i> Pengumuman Baru</a>
                    </div>
                </div>
                <div class="px-3">
                    @include('layouts.flash')
                </div>
                <div class="card-body">
                    <div class="col-12">
                        @include('pengumuman.datatable')
                </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection