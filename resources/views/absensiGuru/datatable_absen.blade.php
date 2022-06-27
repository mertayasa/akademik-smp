<table class="table table-hover table-striped" width="100%" id="AbsensiGuruDataTable">
    <thead>
        <tr>
            <th style="width: 30px">No</th>
            <th></th>
            <th>Keterangan</th>
            <th>Tanggal</th>
            <th>Jam Absen</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

@push('scripts')
    <script>
        let table
        let url = "{{ route('absensiGuru.datatable_absen', $user->id) }}"

        datatable(url)

        function datatable(url) {

            table = $('#AbsensiGuruDataTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: url,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'no',
                        orderable: false,
                        searchable: false,
                        className: "text-center align-middle"
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                        visible: false,
                        searchable: false
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal',
                        className: "text-center align-middle"
                    },
                    {
                        data: 'jam_absen',
                        name: 'jam_absen',
                        className: "text-center align-middle"
                    }
                ],
                order: [
                    [1, "DESC"]
                ],
                columnDefs: [{
                        targets: '_all',
                        className: 'align-middle'
                    },
                    {
                        responsivePriority: 1,
                        targets: 1
                    },
                ],
                language: {
                    search: "",
                    searchPlaceholder: "Cari"
                },
            });
        }
    </script>
@endpush
