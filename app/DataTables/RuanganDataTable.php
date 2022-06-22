<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class RuanganDataTable
{
    static public function set($ruangan)
    {
        return Datatables::of($ruangan)
            ->editColumn('is_lokal', function ($ruangan) {
                return isLokal($ruangan->is_lokal);
            })

            ->addColumn('action', function ($ruangan) {
                $deleteUrl = "'" . route('ruangan.destroy', $ruangan->id) . "', 'RuanganDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('ruangan.edit', $ruangan->id) . '" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><b> Hapus</b></a>' .
                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
