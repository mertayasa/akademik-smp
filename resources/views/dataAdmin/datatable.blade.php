<table class="table table-hover table-striped" width="100%" id="DataAdminDataTable">
    <thead>
        <tr>
            <th style="width: 30px">No</th>
            <th></th>
            <th>Foto</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>ID Card</th>
            <th>No Handphone</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

@push('scripts')
    <script>
        let table
        let url = "{{ route('dataAdmin.datatable', 'admin') }}"

        datatable(url)

        function datatable(url) {

            table = $('#DataAdminDataTable').DataTable({
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
                        data: 'foto',
                        name: 'foto'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'nip',
                        name: 'nip',
                        className: "text-center align-middle"
                    },
                    {
                        data: 'id_card',
                        name: 'id_card',
                        className: "text-center align-middle"
                    },
                    {
                        data: 'no_tlp',
                        name: 'no_tlp',
                        className: "text-center align-middle"
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
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
