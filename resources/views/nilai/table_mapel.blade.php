<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Pelajaran</th>
                {{-- @if (Auth::user()->isAdmin())
                    <th>Aksi</th>
                @endif --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($mapel_of_jadwal as $mapel)
                <tr>
                    <td class="text-center align-middle" width="5%">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $mapel->nama }}</td>
                    {{-- @if (Auth::user()->isAdmin())
                        <td class="align-middle">
                            <button class="btn btn-sm btn-primary">Ulangan Ganjil</button>
                            <button class="btn btn-sm btn-primary">Ulangan Genap</button>
                            <button class="btn btn-sm btn-success">Raport Ganjil</button>
                            <button class="btn btn-sm btn-success">Raport Genap</button>
                        </td>
                    @endif --}}
                </tr>                
            @endforeach
        </tbody>
    </table>
</div>