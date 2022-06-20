<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('mapel', 'Nama Mata Pelajaran', ['class' => 'mb-1']) !!}
        {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'mapel']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('kelompok', 'Kelompok', ['class' => 'mb-1']) !!}
        {!! Form::select('kelompok', \App\Models\Mapel::$kelompok, null, ['class' => 'form-control', 'id' => 'kelompok']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('paket', 'Paket', ['class' => 'mb-1']) !!}
        {!! Form::select('paket', \App\Models\Mapel::$paket, null, ['class' => 'form-control', 'id' => 'paket']) !!}
    </div>
</div>

{{-- @if(str_contains(Route::currentRouteName(),'edit')) 
    <div class="row mt-3">
        <div class="col-12  pb-3 pb-md-0">
            {!! Form::label('status', 'Status', ['class' => 'mb-1']) !!}
            {!! Form::select('status', ['aktif' => 'Aktif', 'Nonaktif' => 'Tidak Aktif'], null, ['class' => 'form-control', 'id' => 'status']) !!}
        </div>
    </div>
@endif --}}
