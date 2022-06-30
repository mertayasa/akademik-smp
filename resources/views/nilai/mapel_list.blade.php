<div class="row d-none" id="mapelListContainer">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class=" mb-0 ">Daftar Mata Pelajaran</h4>
            </div>
            <div class="m-4" style="float: right;"><a
                    href="{{ route('nilai.export', $id_kelas . '/' . $id_tahun_ajar) }}"
                    class="btn btn-sm btn-warning add" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="Tambah admin"> <i class="fas fa-print"></i> Cetak Nilai Semester Ganjil</a>
                <a href="#" class="btn btn-sm btn-info add" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="Tambah admin"> <i class="fas fa-print"></i> Cetak Nilai Semester Genap</a>
            </div>
            <div class="card-body ">
                <div id="mapelListTable">
                    @include('nilai.table_mapel')
                </div>
            </div>
        </div>
    </div>
</div>
