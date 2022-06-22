@extends('template_backend.app')


@section('content')
    <div class="container-fluid p-0">
        @if (Auth::user()->isAdmin())
            <div class="card-header mb-3">
                {!! Form::open(['method' => 'get']) !!}
                <div class="row align-items-end">
                    <div class="col-12 col-md-4">
                        {!! Form::label('user', 'Tahun Ajaran ', ['class' => 'mb-1']) !!}
                        <div class="input-group mb-2">
                            {!! Form::select('id_tahun_ajar', $tahun_ajar, $id_tahun_ajar, ['class' => 'form-control', 'id' => 'filterStatus']) !!}
                            <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                            </div>
                        </div>
                      </div>
                </div>
                {!! Form::close() !!}
            </div>
        @endif

        <div class="w-100">
            <div class="row">
                @foreach ($kelas as $data)
                    <div class="col-sm-4" id="card">
                        <div class="card">
                            <div class="card-body">
                                <h3> {{ $data->kode }}</h3>
                                <p> Total Anggota : {{ count($data->getAnggotaKelas($id_tahun_ajar)) }}</p>
                                <p> Wali Kelas : {{ $data->getWaliKelas($id_tahun_ajar)[0]->user->nama ?? '-' }} </p>
                                <a href="{{ route('akademik.show', [$data->id, $id_tahun_ajar]) }}"
                                    class="btn btn-sm btn-primary stretched-link">Lihat Kelas</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    @endsection
