<?php

namespace App\DataTables;

use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class AbsensiGuruDataTable
{
    static public function set($absensiGuru)
     {
        // 
        return Datatables::of($absensiGuru)
            ->addColumn('action', function ($absensiGuru) {
                $deleteUrl = "'" . route('absensiGuru.destroy', $absensiGuru->id) . "', 'absensiGuruDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="#" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><b> Hapus</b></a>' .

                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
