<div class="row mt-3 m-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('id_guru', 'ID Card', ['class' => 'mb-1']) !!}
        {!! Form::number('id_card', $id_card->id_card, ['class' => 'form-control', 'id' => 'id_guru', 'readonly' => 'true'], ['readonly']) !!}
    </div>
</div>

<div class="row mt-3 m-3">
    {{-- <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('status', 'Keterangan Kehadiran', ['class' => 'mb-1']) !!}
        {!! Form::select('status', ['Hadir' => 'Hadir', 'Ijin' => 'Ijin', 'Sakit' => 'Sakit', 'Bertugas Keluar' => 'Bertugas Keluar', 'Terlambat' => 'Terlambat', 'Tanpa Keterangan' => 'Tanpa Keterangan'], null, ['class' => 'form-control', 'id' => 'status']) !!}
    </div> --}}

    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('status', 'Keterangan Kehadiran', ['class' => 'mb-1']) !!}
        {!! Form::select('status', [\App\Models\absensiGuru::$status, null], null, ['class' => 'form-control', 'id' => 'status']) !!}
    </div>
</div>
