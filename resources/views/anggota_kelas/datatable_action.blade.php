<div class="btn btn-sm-group">
    <a href="{{ route('siswa.show', $anggota_kelas->siswa->id)   }}" class="btn btn-sm btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Lihat Profil" style="margin-right: 5px" > <b> Profil </b> </a>
    {{-- <a href="#" class="btn btn-sm btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="Lihat Nilai" style="margin-right: 5px" ><b> Nilai</b></a> --}}
    @if (Auth::user()->isAdmin())
        <a href="#" onclick="deleteModel(`{{ route('anggota_kelas.destroy', $anggota_kelas->id) }}`, 'AnggotaKelasDataTable')" class="btn btn-sm btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus Dari Kelas" style="margin-right: 5px"><b> Hapus</b></a>
    @endif
</div>