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
                    '<a href="#" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat Absen" style="margin-right: 5px" ><b> Lihat Absen </b></a>' .

                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
