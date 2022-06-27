@extends('template_backend.app')

@section('content')
    <div class="container-fluid p-0">
        <h1 class=" mb-3">Absensi Guru</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class=" mb-0 ">Data Absensi Guru</h4>
                        </div>
                    </div>
                    <div class="px-3">
                        @include('layouts.flash')
                    </div>

                    @if (Auth::user()->isGuru())
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-body">
                                            @include('absensiGuru.datatable')
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Absen Harian Guru</h3>
                                        </div>
                                        {!! Form::open(['route' => 'absensiGuru.store']) !!}
                                        @include('absensiGuru.form')
                                        <div class="row mt-3 m-3">
                                            <div class="col-12  pb-3 pb-md-0">
                                                @if ($cek_absen > 0)
                                                    <div class="alert alert-warning d-flex align-items-center"
                                                        role="alert">
                                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24"
                                                            role="img" aria-label="Warning:">
                                                            <use xlink:href="#exclamation-triangle-fill" />
                                                        </svg>
                                                        <div>
                                                            <i>"Hari ini Anda sudah melakukan Absensi"</i>
                                                        </div>
                                                    </div>
                                                @else
                                                    <button class="btn btn-md btn-primary" type="submit"> <i
                                                            class="fa-solid fa-floppy-disk"></i> Simpan Absen</button>
                                                @endif

                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (Auth::user()->isAdmin())
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            @include('absensiGuru.datatable')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>
@endsection
