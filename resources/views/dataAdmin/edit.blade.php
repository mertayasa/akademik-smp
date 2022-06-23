@extends('template_backend.app')

@section('content')
    <div class="container-fluid p-0">
        <h1 class=" mb-3">Data Admin</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class=" mb-0 ">Edit Data Admin</h4>
                    </div>
                    <div class="card-body pt-0">
                        @include('layouts.flash')
                        {!! Form::model($user, ['route' => ['dataAdmin.update', $user->id], 'method' => 'patch']) !!}
                        @include('dataAdmin.form')
                        <div class="row mt-3">
                            <div class="col-12">
                                <a href="{{ route('dataAdmin.index') }}" class="btn btn-sm btn-danger">Kembali</a>
                                <button class="btn btn-sm btn-primary ml-3" type="submit">Simpan</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
