<div class="row d-none" id="mapelListContainer">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class=" mb-0 ">Daftar Mata Pelajaran</h4>
            </div>
            @if (count($mapel_of_jadwal) > 0)
                <div class="m-4" style="float: right;"><a target="_blank"
                        href="{{ route('nilai.export', [$id_kelas , $id_tahun_ajar, 'ganjil']) }}"
                        class="btn btn-sm btn-warning add" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Tambah admin"> <i class="fas fa-print"></i> Cetak Nilai Semester Ganjil</a>
                    <a target="_blank" href="{{ route('nilai.export', [$id_kelas , $id_tahun_ajar, 'genap']) }}" class="btn btn-sm btn-info add" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Tambah admin"> <i class="fas fa-print"></i> Cetak Nilai Semester Genap</a>
                </div>
            @endif
            <div class="card-body ">
                <div id="mapelListTable">
                    @include('nilai.table_mapel')
                </div>
            </div>
        </div>
    </div>
</div>
