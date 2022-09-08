<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\User;
use Yajra\DataTables\DataTables;

class DataAbsensiController extends Controller
{
    public function index()
    {
        return view('Harmoni_Absensi/program/hrd/absensi/index', [
            "title_page" => "Data Absensi",
        ]);
    }

    public function datatables()
    {
        $absensi = Absensi::all();
        return DataTables::of($absensi)
                        ->addIndexColumn()
                        ->addColumn("user_id", function($absensi){
                            $user = User::find($absensi->user_id);
                            return $user->name;
                        })
                        ->addColumn("keterangan", function($absensi){
                            return ($absensi->jam_masuk != "" && $absensi->jam_keluar != "") ? "Hadir" : "Belum Pulang";
                        })
                        ->rawColumns(["opsi"])
                        ->make(true);
    }
}
