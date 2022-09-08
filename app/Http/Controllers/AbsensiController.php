<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carbon   = new Carbon();
        $userAuth = Auth::user();
        $user     = User::find($userAuth->id);
        return view('Harmoni_Absensi/program/karyawan/absensi/index', [
            "title_page" => "Absensi Karyawan",
            "waktu"      => date("Y-m-d", strtotime($carbon)),
            "user"       => $user,
        ]);
    }

    public function datatables()
    {
        $absensi = Absensi::all()->where("user_id", Auth::user()->id);
        return DataTables::of($absensi)
                        ->addIndexColumn()
                        ->addColumn("keterangan", function($absensi){
                            return ($absensi->jam_masuk != "" && $absensi->jam_keluar != "") ? "Hadir" : "Belum Pulang";
                        })
                        ->rawColumns(["opsi"])
                        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Absensi $absensi)
    {
        $waktu    = new Carbon();
        $userAuth = Auth::user();

        $absensi->user_id = $userAuth->id;
        $absensi->jam_masuk = date("H:i:s ", strtotime($waktu));
        $absensi->tgl_kerja = $waktu;

        $absensi->save();

        $userAuth = Auth::user();
        $user     = User::find($userAuth->id);

        return response()->json([
            "response"   => "Absen Kedatangan Berhasil",
            "id_absensi" => $user->absensis->last()->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $waktu    = new Carbon();
        $absensi  = Absensi::find($id);

        $absensi->jam_keluar = date("H:i:s ", strtotime($waktu));

        $absensi->save();

        return response()->json([
            "response" => "Absen Kepulangan Berhasil",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
