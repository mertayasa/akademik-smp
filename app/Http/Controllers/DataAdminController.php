<?php

namespace App\Http\Controllers;

use App\DataTables\DataAdminDataTable;
use Illuminate\Http\Request;
use App\Http\Requests\DataAdminRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request as FacadesRequest;


class DataAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        // $dataAdmin = User::where('level', 'admin')->get();
        // dd($dataAdmin);
        return view('dataAdmin.index');
        

    }

    public function datatable()
    {
        // $dataAdmin = User::where('level', 'admin')->get();
        // return DataAdminDataTable::set($dataAdmin);

        if (FacadesRequest::is('*admin*')) {
            $dataAdmin = User::where('level', 'admin')->get();
            return DataAdminDataTable::set($dataAdmin, 'dataAdmin');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dataAdmin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataAdminRequest $request)
    {
        try {
            $data = $request->all();
            // if($request['lampiran']){
            //     $base_64_lampiran = json_decode($request['lampiran'], true);
            //     $upload_image = uploadFile($base_64_lampiran, 'lampiran');
            //     if ($upload_image === 0) {
            //         return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
            //     }
            //     $data['lampiran'] = $upload_image;
            // }

            User::create($data);
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data dataAdminn Gagal Ditambahkan');
        }

        return redirect('dataAdmin')->with('success', 'Data dataAdminn Berhasil Ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dataAdmin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dataAdmin  $dataAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(DataAdminRequest $request, User $user)
    {
        try {
            $data = $request->all();
            // if($request['lampiran']){
            //     $base_64_lampiran = json_decode($request['lampiran'], true);
            //     $upload_image = uploadFile($base_64_lampiran, 'lampiran');
            //     if ($upload_image === 0) {
            //         return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
            //     }
            //     $data['lampiran'] = $upload_image;
            // }

            $user->update($data);
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data dataAdmin Gagal Di Edit');
        }

        return redirect('dataAdmin')->with('info', 'Data dataAdmin Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dataAdmin  $dataAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        try {
            $user->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data dataAdmin']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data dataAdmin']);
    }
}

