<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
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
        return view('program.magang.absensi.index', [
            "title_page" => "Absensi Karyawan Magang",
            "waktu"      => date("Y-m-d", strtotime($carbon)),
            "user"       => $user,
        ]);
    }

    public function datatables()
    {
        $attendance = Attendance::all()->where("user_id", Auth::user()->id);
        return DataTables::of($attendance)
                        ->addIndexColumn()
                        ->addColumn("keterangan", function($attendance){
                            return ($attendance->addmission_time != "" && $attendance->time_out != "") ? "Hadir" : "Belum Pulang";
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
    public function store(Attendance $attendance)
    {
        $waktu    = new Carbon();
        $userAuth = Auth::user();

        $attendance->user_id = $userAuth->id;
        $attendance->addmission_time = date("H:i:s ", strtotime($waktu));
        $attendance->work_date = $waktu;

        $attendance->save();

        $userAuth = Auth::user();
        $user     = User::find($userAuth->id);

        return response()->json([
            "response"   => "Absen Kedatangan Berhasil",
            "id_absensi" => $user->attendances->last()->id,
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
        $absensi  = Attendance::find($id);

        $absensi->time_out = date("H:i:s ", strtotime($waktu));

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
