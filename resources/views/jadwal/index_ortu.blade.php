@extends('template_backend.app')

@section('content')
    <div class="container-fluid p-0">
        <h1 class=" mb-3">Jadwal</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['method' => 'get']) !!}
                        <div class="row align-items-end">
                            <div class="col-12 col-md-4">
                                {!! Form::label('user', 'Nama Siswa', ['class' => 'mb-1']) !!}
                                <div class="input-group mb-2">
                                    {!! Form::select('id_siswa', ['' => 'Pilih Siswa'] + $siswa->toArray(), $id_siswa ?? null, ['class' => 'form-control', 'id' => 'filterSiswa', 'autocomplete' => 'off']) !!}
                                    <div class="input-group-prepend">
                                            <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div id="containerJadwal">
                            @if (isset($groupped_jadwal))
                                @include('jadwal.table')
                            @else
                                <p class="text-center mb-0">Tidak ada data jadwal</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
