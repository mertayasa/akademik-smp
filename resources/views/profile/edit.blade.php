@extends('template_backend.app')

@section('content')
    <section class="section col-12">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Edit Profil</h4>
                        {{-- <a href="{{route('patient.create')}}" class="btn btn-sm btn-primary">Tambah Registrasi</a> --}}
                    </div>
                    <div class="card-body">
                        @include('layouts.flash')
                        {!! Form::model($user, ['route' => ['profile.update', $user->id], 'method' => 'patch']) !!}
                        @include('profile.form')
                        <div class="row mt-3">
                            <div class="col-12">
                                <a href="{{ route('siswa.index_ortu') }}" class="btn btn-sm btn-danger">Kembali</a>
                                <button class="btn btn-sm btn-primary ml-3" type="submit">Simpan</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
