<?php

namespace App\Http\Controllers;

use App\Models\AbsensiGuru;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Log;
use App\DataTables\AbsensiGuruDataTable;
use Illuminate\Support\Facades\Request as FacadesRequest;


class AbsensiGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AbsensiGuru $absensiGuru, User $user)
    {
         $id_guru =  Auth::id();
         $id_card = User::where('id', $id_guru)->get()[0];
         return view('absensiGuru.index', compact('absensiGuru', 'id_card', 'user'));

        
       
        // if (Auth::user()->isGuru()){
        //  $id_guru =  Auth::id();
        //  $id_card = User::where('id', $id_guru)->get()[0];
        //    return view('absensiGuru.index', compact('absensiGuru', 'id_card', 'user'));
        // }

        // if (Auth::user()->isAdmin()) {
        //     $absensiGuru= AbsensiGuru::all();
        //     return view('absensiGuru.indexAdmin', compact('absensiGuru'));
        // }
        
    }

        public function datatable(User $user)
    {

        //  $id_guru =  Auth::id();
        //  $id_card = User::where('id', $id_guru)->get()[0];
        //  $absensiGuru = AbsensiGuru::where('id_guru', $id_guru)->get();
        // return AbsensiGuruDataTable::set($absensiGuru);

    
        if (Auth::user()->isGuru()){
            $id_guru =  Auth::id();
            $id_card = User::where('id', $id_guru)->get()[0];
            $absensiGuru = AbsensiGuru::where('id_guru', $id_guru)->get();
        return AbsensiGuruDataTable::set($absensiGuru);

        }

        if (Auth::user()->isAdmin()) {
            $absensiGuru= AbsensiGuru::all();
            $absensiGuru= AbsensiGuru::distinct()->get(['id_guru']);
        return AbsensiGuruDataTable::set($absensiGuru,$user);
        }

    }

        public function datatable_absen(User $user, $absensiGuru=null)
    {
         $absensiGurus = AbsensiGuru::where('id_guru', $absensiGuru)->get();

        return AbsensiGuruDataTable::set($absensiGurus, $user);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
         try {
            $absensiGuru = new AbsensiGuru;
            $absensiGuru->id_guru = Auth::id();
            $absensiGuru->tanggal = Carbon::today();
            $absensiGuru->status = $request->status;
            $absensiGuru->save();

        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambah absensiGuru !');
        }
        return redirect('absensiGuru')->with('success', 'Berhasil melakukan Absensi');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AbsensiGuru  $absensiGuru
     * @return \Illuminate\Http\Response
     */
    public function show(AbsensiGuru $absensiGuru, User $user)
    {
        return view('absensiGuru.show', compact('absensiGuru', 'user'));
    }
    /**
 * Show the form for editing the specified resource
     *
     * @param  \App\Models\AbsensiGuru  $absensiGuru
     * @return \Illuminate\Http\Response
     */
    public function edit(AbsensiGuru $absensiGuru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AbsensiGuru  $absensiGuru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AbsensiGuru $absensiGuru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AbsensiGuru  $absensiGuru
     * @return \Illuminate\Http\Response
     */
    public function destroy(AbsensiGuru $absensiGuru)
    {
        //
    }
}
