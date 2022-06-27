@extends('template_backend.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css" />
@endpush

@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3> Dashboard</h3>
            </div>

            <div class="col-auto ml-auto text-right mt-n1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="#">Sistem Informasi Akademik</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class=" mb-0 ">Tahun Ajaran : {{ $tahun_ajar->tahun_mulai }} / {{ $tahun_ajar->tahun_selesai }}</h4>
            </div>
        </div>

        @if (Auth::user()->isGuru())
            @include('dashboard.guru')
        @endif

        <div>
            @if (Auth::user()->isAdmin())
                @include('dashboard.admin')
            @endif
        </div>

        <div class="row">
            @include('dashboard.pengumuman')
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="datatables/datatables.min.js"></script>
    <script>
        $(function() {
            $('#sampleTable').DataTable({
                processing: true,
                serverSide: false
            });
        });
    </script>
@endpush
