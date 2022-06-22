
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

{{-- <p class="sub-title">PENGETAHUAN DAN KETERAMPILAN</p> --}}
{{-- <p style="margin-top:-15px;"><b>Kriteria Ketuntasan Minimal Satuan Pendidikan = 65 </b></p> --}}
<table class="table table-bordered  ">
    <tr style="text-align:center;">
        <td rowspan=" 2" style="align-item: middle;"><b> No </b></td>
        <td rowspan="2"><b> Mata Pelajaran </b></td>
        <td colspan="3"><b> Pengetahuan </b></td>
        <td colspan="3"><b> Keterampilan </b></td>
    </tr>
    <tr style="text-align:center;">
        <td><b> Nilai </b></td>
        <td><b> Predikat </b></td>
        <td><b> Deskripsi </b></td>
        <td><b> Nilai </b></td>
        <td><b> Predikat </b></td>
        <td><b> Deskripsi </b></td>
    </tr>
    <tbody>
        @php
            $no = 1;
        @endphp
        @forelse ($mapel_of_jadwal as $mapel)
            <tr>
                <td>{{ $no++ }}</td>
                <td> {{ $mapel->nama }}</td>
                <td>{{ $anggota_kelas->rataNilaiPengetahuan($semester, $mapel->id) }}</td>
                <td> {{ getPredikatNilai($anggota_kelas->rataNilaiPengetahuan($semester, $mapel->id)) }}
                </td>
                <td>{{ $anggota_kelas->getNilaiValue('desk_pengetahuan', $mapel->id, $semester) }}</td>
                <td>{{ $anggota_kelas->rataNilaiKeterampilan($semester, $mapel->id) }}</td>
                <td> {{ getPredikatNilai($anggota_kelas->rataNilaiKeterampilan($semester, $mapel->id)) }}
                </td>
                <td>{{ $anggota_kelas->getNilaiValue('desk_keterampilan', $mapel->id, $semester) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">Tidak ada data</td>
            </tr>
        @endforelse
    </tbody>
</table>