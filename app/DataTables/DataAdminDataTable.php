<?php

namespace App\DataTables;

use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class DataAdminDataTable
{
    static public function set($dataAdmin, $level)
    {
        return Datatables::of($dataAdmin, $level)
            ->editColumn('foto', function ($dataAdmin){
                return '<img src="'.$dataAdmin->getFoto().'" alt="" width="75px">';
            })
            ->addColumn('action', function ($dataAdmin) use ($level) {
                return
                    '<div class="btn-group">' .
                    '<a href="' . route($level . '.edit', $dataAdmin->id) . '" class="btn  btn-sm  btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>' .
                    // '<a href="' . route($level . '.show', $dataAdmin->id) . '" class="btn  btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat" style="margin-right: 5px" ><b> Lihat</b></a>' .
                    '</div>';
            })->addIndexColumn()->rawColumns(['action', 'foto'])->make(true);
    }
}
