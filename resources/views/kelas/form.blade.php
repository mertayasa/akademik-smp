<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('kode_kelas', 'Kode Kelas', ['class' => 'mb-1']) !!}
        {!! Form::text('kode', null, ['class' => 'form-control', 'id' => 'kode_kelas']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('jenjang', 'Jenjang Kelas', ['class' => 'mb-1']) !!}
        {!! Form::select('jenjang', ['' => 'Pilih Jenjang', 1 => 1, 2 => 2, 3 => 3], null, ['class' => 'form-control', 'id' => 'jenjang']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('kelompok', 'Kelompok Kelas', ['class' => 'mb-1']) !!}
        {!! Form::select('kelompok', ['' => 'Pilih Kelompok', 'Pagi' => 'Pagi', 'Siang' => 'Siang'], null, ['class' => 'form-control', 'id' => 'kelompok']) !!}
    </div>
</div>
{{-- <div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('paket', 'Paket', ['class' => 'mb-1']) !!}
        {!! Form::select('paket', ['' => 'Pilih Paket', 'Pelajaran Umum' => 'Pelajaran Umum', 'Ekstrakurikuler' => 'Ekstrakurikuler'], null, ['class' => 'form-control', 'id' => 'paket']) !!}
    </div>
</div> --}}

{{-- @if(str_contains(Route::currentRouteName(),'edit')) 
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('status', 'Status', ['class' => 'mb-1']) !!}
        {!! Form::select('status', ['aktif' => 'Aktif', 'Nonaktif' => 'Tidak Aktif'], null, ['class' => 'form-control', 'id' => 'status']) !!}
    </div>
</div>
@endif --}}
