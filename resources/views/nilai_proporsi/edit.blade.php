
@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <h1 class=" mb-3">Nilai Proporsi</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class=" mb-0 ">Edit Nilai Proporsi</h4>
                </div>
                <div class="card-body pt-0">
                    @include('layouts.flash')
                        @include('layouts.error_message')
                        {!! Form::model($nilai_proporsi, ['route' => ['nilai_proporsi.update', $nilai_proporsi->id], 'method' => 'patch']) !!}
                        @include('nilai_proporsi.form')
                        <div class="row mt-3">
                            <div class="col-12">
                                <a href="{{ route('nilai_proporsi.index') }}" class="btn btn-sm btn-danger">Kembali</a>
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
