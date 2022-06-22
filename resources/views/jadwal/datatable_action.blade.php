@if (Auth::user()->isAdmin())
    @php
        $deleteUrl = "'" . route('jadwal.destroy', $jadwal->id) . "', 'jadwalDataTable'";
        $deleteUrl = route('jadwal.destroy', $jadwal->id) . "', 'jadwalDataTable";
    @endphp

    <div class="btn btn-sm-group">
        <a href="#" data-url="{{ route('jadwal.update', $jadwal->id)  }}" data-jadwal="{!! htmlspecialchars(json_encode($jadwal), ENT_QUOTES, 'UTF-8')  !!}" class="btn btn-sm btn-sm btn-warning" onclick="editJadwal(this)" data-toggle="modal" data-target="#jadwalModal" data-toggle="tooltip" data-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>
        <a href="#" onclick="deleteModel('{{ $deleteUrl }}')" class="btn btn-sm btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus" style="margin-right: 5px"><b> Hapus </b></a>
    </div>
@endif