<div class="form-container mb-3 mt-3">
    <h5> <b> Form Nilai Pengetahuan </b></h5>
    <div class="border p-2 p-md-3">
        @foreach ($mapel_of_jadwal as $mapel)
            @if ($mapel->is_lokal == false)
                <div class="row mb-3">
                    <div class="col-12 col-md-3 my-auto">
                            {{ $mapel->nama }}
                    </div>
                    <div class="col-12 col-md-9">
                        <div class="row">
                            {!! Form::hidden('pengetahuan['. $mapel->id .'][id_mapel]', $mapel->id, []) !!}
                            <div class="col-12 col-md-16-6">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'ULHA 1', ['class' => 'mb-1']) !!}
                                {!! Form::number('pengetahuan['. $mapel->id .'][ulha1_p]', $anggota_kelas->getNilaiValue('ulha1_p', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 col-md-16-6">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'ULHA 2', ['class' => 'mb-1']) !!}
                                {!! Form::number('pengetahuan['. $mapel->id .'][ulha2_p]', $anggota_kelas->getNilaiValue('ulha2_p', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 col-md-16-6">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'ULHA 3', ['class' => 'mb-1']) !!}
                                {!! Form::number('pengetahuan['. $mapel->id .'][ulha3_p]', $anggota_kelas->getNilaiValue('ulha3_p', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            {{-- <div class="col-12 col-md-16-6">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'ULHA 4', ['class' => 'mb-1']) !!}
                                {!! Form::number('pengetahuan['. $mapel->id .'][ulha4_p]', $anggota_kelas->getNilaiValue('ulha4_p', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div> --}}
                            <div class="col-12 col-md-16-6">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'PTS', ['class' => 'mb-1']) !!}
                                {!! Form::number('pengetahuan['. $mapel->id .'][pts]', $anggota_kelas->getNilaiValue('pts', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 col-md-16-6">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'PAS', ['class' => 'mb-1']) !!}
                                {!! Form::number('pengetahuan['. $mapel->id .'][pas]', $anggota_kelas->getNilaiValue('pas', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 mt-2">
                                {!! Form::label('keterangan'.Str::camel($mapel->nama), 'Deskripsi', ['class' => 'mb-1']) !!}
                                {!! Form::text('pengetahuan['. $mapel->id .'][keterangan]', $anggota_kelas->getNilaiValue('desk_pengetahuan', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'keterangan'.Str::camel($mapel->nama)]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                @if (!$loop->last)
                    <hr>
                @endif
            @endif
        @endforeach
    </div>
</div>

<div class="form-container mb-3">
    <h5> <b> Form Nilai Keterampilan </b></h5>
    <div class="border p-2 p-md-3">
        @foreach ($mapel_of_jadwal as $mapel)
            @if ($mapel->is_lokal == false)
                <div class="row mb-3">
                    <div class="col-12 col-md-3 my-auto">
                            {{ $mapel->nama }}
                    </div>
                    <div class="col-12 col-md-9">
                        <div class="row">
                            {!! Form::hidden('keterampilan['. $mapel->id .'][id_mapel]', $mapel->id, []) !!}
                            <div class="col-12 col-md-3">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'ULHA 1', ['class' => 'mb-1']) !!}
                                {!! Form::number('keterampilan['. $mapel->id .'][ulha1_k]', $anggota_kelas->getNilaiValue('ulha1_k', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 col-md-3">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'ULHA 2', ['class' => 'mb-1']) !!}
                                {!! Form::number('keterampilan['. $mapel->id .'][ulha2_k]', $anggota_kelas->getNilaiValue('ulha2_k', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 col-md-3">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'ULHA 3', ['class' => 'mb-1']) !!}
                                {!! Form::number('keterampilan['. $mapel->id .'][ulha3_k]', $anggota_kelas->getNilaiValue('ulha3_k', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            {{-- <div class="col-12 col-md-3">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'ULHA 4', ['class' => 'mb-1']) !!}
                                {!! Form::number('keterampilan['. $mapel->id .'][ulha4_k]', $anggota_kelas->getNilaiValue('ulha4_k', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div> --}}
                            <div class="col-12 mt-2">
                                {!! Form::label('keterangan'.Str::camel($mapel->nama), 'Deskripsi', ['class' => 'mb-1']) !!}
                                {!! Form::text('keterampilan['. $mapel->id .'][keterangan]', $anggota_kelas->getNilaiValue('desk_keterampilan', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'keterangan'.Str::camel($mapel->nama)]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                @if (!$loop->last)
                    <hr>
                @endif
            @endif
        @endforeach
    </div>
</div>

