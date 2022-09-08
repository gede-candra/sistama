<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $data_users             = User::all()->where('posisi', 'Karyawan');
        $data_absensis          = Absensi::all();
        $auth                   = Auth::user();
        $data_absensis_karyawan = Absensi::all()->where("user_id", $auth->id);
        return view('Harmoni_Absensi/program/Dashboard', [
            "title_page"        => "Dashboard",
            "users"             => $data_users,
            "absensis"          => $data_absensis,
            "absensis_karyawan" => $data_absensis_karyawan,
        ]);
    }
}
