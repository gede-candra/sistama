<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;

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
        $data_users     = User::all()->where('role_id', 3);
        $data_absensi   = Attendance::all();
        return view('program.Dashboard', [
            "title_page"        => "Dashboard",
            "users"             => $data_users,
            "absensis"          => $data_absensi,
        ]);
    }
}
