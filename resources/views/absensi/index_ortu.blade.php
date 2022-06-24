@extends('template_backend.app')

@section('content')
    <div class="container-fluid p-0">
        <h1 class=" mb-3">Absensi</h1>

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
                        <div id="containerAbsensi">
                            <table class="mb-3">
                                <tr>
                                    <td>Nama </td>
                                    <td width="50px" class="text-center">:</td>
                                    <td>{{ $anggota_kelas[0]->siswa->nama ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td width="50px" class="text-center">:</td>
                                    <td>{{ $anggota_kelas[0]->kelas->kode ?? '-' }}</td>
                                </tr>
                            </table>

                            <h4> <b> Semester Ganjil </b></h4>
                            @if ($period_ganjil)
                                @include('absensi.table', [
                                    'anggota_kelas' => $anggota_kelas,
                                    'period' => $period_ganjil ?? [],
                                ])
                            @else
                                <p class="text-center mb-0">Beluma ada absensi</p>
                            @endif

                            <hr>
                            
                            <h4> <b>Semester Genap</b> </h4>
                            @if ($period_genap)
                                @include('absensi.table', [
                                    'anggota_kelas' => $anggota_kelas,
                                    'period' => $period_genap ?? [],
                                ])
                            @else
                                <p class="text-center mb-0">Beluma ada absensi</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
