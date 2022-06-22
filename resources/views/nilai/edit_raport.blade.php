<div class="row" id="formnilaiContainer">
    <div class="col-12">
        <table class="mb-3">
            <tr>
                <td>Nama </td>
                <td width="50px" class="text-center">:</td>
                <td>{{ $anggota_kelas->siswa->nama }}</td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td width="50px" class="text-center">:</td>
                <td>{{ $anggota_kelas->kelas->kode }}</td>
            </tr>
            <tr>
                <td>Semester</td>
                <td width="50px" class="text-center">:</td>
                <td>{{ ucfirst($semester) }}</td>
            </tr>
        </table>
        {{-- <div class="card"> --}}
            {{-- <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5>Raport Semester <span id="raportSemester"> {{ ucfirst($semester) }} </span>  <span id="namaRaportAnggota"> <b> {{ $anggota_kelas->siswa->nama }} </b> </span></h5>
                    <a href="{{ route('nilai.export_raport', [$anggota_kelas->id, $semester]) }}" class="btn btn-sm btn-primary"><i class="fas fa-file-download"></i> Cetak Raport</a>
                </div>
            </div> --}}
            <div class="card-body mt-0 pt-0 px-0">
                <div class="col-12 px-0">
                    <div class="row">
                        <div class="col-12">
                            {!! Form::open(['method' => 'POST', 'id' => 'formUpdateRaport', 'route' => ['nilai.update_raport', [$anggota_kelas->id, $semester]]]) !!}
                                @include('nilai.form_raport')
                                <button class="btn btn-sm btn-primary" type="button" id="btnUpdateRaport" onclick="updateRaport()">Simpan Nilai</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
    </div>
</div>