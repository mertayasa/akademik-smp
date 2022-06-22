@php
    $deleteUrl = "'" . route('siswa.destroy', $siswa->id) . "', 'SiswaDataTable'";
@endphp

<div class="btn btn-sm-group">
    <a href=" {{ route('siswa.edit', $siswa->id) }}" class="btn btn-sm btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>
    <a href=" {{ route('siswa.show', $siswa->id) }}" class="btn btn-sm btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="Show" style="margin-right: 5px" ><b> Lihat </b></a>
    <a href="#" onclick="deleteModel({{ $deleteUrl }})" class="btn btn-sm btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus" style="margin-right: 5px"><b> Hapus</b></a>
</div>
