<?php

namespace App\Http\Controllers;

use App\Exports\AttendanceExport;
use App\Models\Attendance;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class DataAbsensiController extends Controller
{
    public function index()
    {
        return view('program.data-absensi.index', [
            "title_page" => "Data Absensi",
        ]);
    }

    public function datatables()
    {
        $absensi = Attendance::all();
        return DataTables::of($absensi)
                        ->addIndexColumn()
                        ->addColumn("user_id", function($absensi){
                            return $absensi->users->name;
                        })
                        ->addColumn("keterangan", function($absensi){
                            return ($absensi->addmission_time != "" && $absensi->time_out != "") ? "Hadir" : "Belum Pulang";
                        })
                        ->rawColumns(["opsi"])
                        ->make(true);
    }
    
    /**
     * export
     *
     * @return void
     */
    public function export()
    {
        return Excel::download(new AttendanceExport, 'Data-Absensi-Sistama.xlsx'); 
    }
}
