<table>
    <thead>
        <tr>
            <th colspan="4">No</th>
            <th colspan="4">Nama</th>
            {{-- @foreach ($nilai as $item)
                <th>{{ $item->id_mapel }}</th>
            @endforeach --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($nilai as $item)
            <tr>
                <td>{{ $item->id_anggota_kelas }}</td>
                <td>{{ $item->pts }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
x
