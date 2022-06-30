<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> --}}
    <link href="{{ asset('admin/css/print.css') }}" rel="stylesheet">

    <title>LEGER NILAI SISWA KELAS {{ strtoupper($kelas->kode) }} TAHUN PELAJARAN : {{ $tahun_ajaran->tahun_mulai }} / {{ $tahun_ajaran->tahun_selesai }}, SEMESTER : @if ($semester == 'ganjil') 1 @else 2 @endif</title>

    <style>
        .table td,
        .table th {
            padding: 2px;
        }

        @page {
            size: a4 landscape;
            margin: 10;
            padding: 10; // you can set margin and padding 0
        }

        body {
            font-size: 10px;
            text-align: center;
        }

        @media print {
            body {

                font-size: 10px !important; 
                -webkit-print-color-adjust: exact !important;
            }

            tr.vendorListHeading {
                background-color: #1a4567 !important;
                -webkit-print-color-adjust: exact; 
            }
        }

        .text-left{
            text-align: left;
        }
        .text-right{
            text-align: right;
        }
        table{
            width: 100%;
            border-collapse: collapse;
        }

        tr, td{
            border: 1px solid #000;
        }
    </style>
</head>

<body style="font-family:Arial, Helvetica, sans-serif">
    <p class="text-left mb-0">SMP NEGERI 3 MENGWI</p>
    <p class="text-left mb-0">LEGER NILAI SISWA KELAS {{ strtoupper($kelas->kode) }}</p>
    <p class="text-left">TAHUN PELAJARAN : {{ $tahun_ajaran->tahun_mulai }} / {{ $tahun_ajaran->tahun_selesai }}, SEMESTER : @if ($semester == 'ganjil') 1 @else 2 @endif </p>
    <table class="table table-bordered">
        <thead>
            <tr>
            <tr style="text-align:center;">
                <td rowspan="3" style="vertical-align: bottom;"><b> No </b></td>
                <td rowspan="3" style="vertical-align: bottom;"><b> Nama </b></td>
                @foreach ($mapel_of_jadwal as $mapel)
                    <td colspan="4" style="vertical-align: bottom;"><b> {{ $mapel->nama }} </b></td>
                @endforeach
                <td colspan="4" rowspan="1" style="vertical-align: bottom;"><b> Rata-Rata </b></td>
                <td colspan="10"></td>
            </tr>

            <tr style="text-align:center;">
                @foreach ($mapel_of_jadwal as $mapel)
                    <td colspan="2" style="vertical-align: bottom;"><b> Peng </b></td>
                    <td colspan="2" style="vertical-align: bottom;"><b> Ket </b></td>
                @endforeach
                <td colspan="2" rowspan="2" style="vertical-align: bottom;">Peng</td>
                <td colspan="2" rowspan="2" style="vertical-align: bottom;">Ket</td>
                <td rowspan="2" colspan="2"></td>
                <td rowspan="2" colspan="2"></td>
                <td rowspan="2" colspan="2" style="vertical-align: bottom">Jumlan <br> Peng & Ket</td>
                <td rowspan="2" colspan="2" style="vertical-align: bottom">Rerata</td>
                <td rowspan="2" colspan="2" style="vertical-align: bottom">Rank</td>
            </tr>
            <tr style="text-align: center">
                @foreach ($mapel_of_jadwal as $mapel)
                    <td><b> N </b></td>
                    <td><b> P </b></td>
                    <td><b> N </b></td>
                    <td><b> P </b></td>
                @endforeach
            </tr>
            </tr>
        </thead>
        <tbody>
            @php
                $ranking = [];
            @endphp
            @foreach ($anggota_kelas as $anggota)
                @php
                    $total_peng_siswa = 0;
                    $total_ket_siswa = 0;
                @endphp
                <tr>
                    <td class="text-center td{{ $anggota->id }}">{{ $loop->iteration }}</td>
                    <td class="text-left td{{ $anggota->id }}">{{ $anggota->siswa->nama }}</td>
                    @foreach ($mapel_of_jadwal as $mapel)
                        @php
                            $rata_peng = $anggota->rataNilaiPengetahuan($semester, $mapel->id);
                            $rata_ket = $anggota->rataNilaiKeterampilan($semester, $mapel->id);
                            
                            $total_peng_siswa = $total_peng_siswa + $rata_peng;
                            $total_ket_siswa = $total_ket_siswa + $rata_ket;
                        @endphp
                        <td class="text-center td{{ $anggota->id }}">{{ $rata_peng }}</td>
                        <td class="text-center td{{ $anggota->id }}">
                            {{ getPredikatNilai($anggota->rataNilaiPengetahuan($semester, $mapel->id)) }}</td>
                        <td class="text-center td{{ $anggota->id }}">{{ $rata_ket }}</td>
                        <td class="text-center td{{ $anggota->id }}">
                            {{ getPredikatNilai($anggota->rataNilaiKeterampilan($semester, $mapel->id)) }}</td>
                    @endforeach
                    <td colspan="2" class="text-center td{{ $anggota->id }}">
                        {{ round($total_peng_siswa / $mapel_of_jadwal->count(), 2) }}</td>
                    <td colspan="2" class="text-center td{{ $anggota->id }}">
                        {{ round($total_ket_siswa / $mapel_of_jadwal->count(), 2) }}</td>
                    <td colspan="2" class="text-center td{{ $anggota->id }}">{{ $total_peng_siswa }}</td>
                    <td colspan="2" class="text-center td{{ $anggota->id }}">{{ $total_peng_siswa }}</td>
                    <td colspan="2" class="text-center td{{ $anggota->id }}">
                        {{ $total_ket_siswa + $total_peng_siswa }}</td>
                    <td colspan="2" class="text-center td{{ $anggota->id }}">
                        {{ round(($total_ket_siswa + $total_peng_siswa) / ($mapel_of_jadwal->count() * 2), 2) }}</td>
                    <td colspan="2" class="text-center td{{ $anggota->id }}" id="rankind{{ $anggota->id }}">1
                    </td>
                    @php
                        $ranking[$anggota->id] = round(($total_ket_siswa + $total_peng_siswa) / ($mapel_of_jadwal->count() * 2), 2);
                    @endphp
                </tr>
            @endforeach
        </tbody>
    </table>

    <div id="ranking" data-ranking=<?php echo json_encode($ranking); ?>></div>
</body>

<script>
    const rankingRaw = document.getElementById('ranking').getAttribute('data-ranking')
    const rankingParsed = JSON.parse(rankingRaw)
    const rankingSorted = Object.entries(rankingParsed).sort((a, b) => b[1] - a[1]).map(el => el[0])

    for (let i = 0; i < rankingSorted.length; i++) {
        const element = document.getElementById(`rankind${rankingSorted[i]}`);
        element.innerHTML = i + 1;

        if (i == 0) {
            const tdSiswa = document.getElementsByClassName(`td${rankingSorted[i]}`)
            for (let j = 0; j < tdSiswa.length; j++) {
                tdSiswa[j].style.backgroundColor = '#03a1fc'
            }
        }

        if (i == 1) {
            const tdSiswa = document.getElementsByClassName(`td${rankingSorted[i]}`)
            for (let j = 0; j < tdSiswa.length; j++) {
                tdSiswa[j].style.backgroundColor = '#51c95b'
            }
        }

        if (i == 2) {
            const tdSiswa = document.getElementsByClassName(`td${rankingSorted[i]}`)
            for (let j = 0; j < tdSiswa.length; j++) {
                tdSiswa[j].style.backgroundColor = '#bfc951'
            }
        }
    }

    window.print();
</script>
