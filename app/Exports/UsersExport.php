<?php

namespace App\Exports;

use App\Models\user;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromView, ShouldAutoSize
{    
    /**
     * view
     *
     * @return View
     */
    public function view(): View
    {
        return view('program.data-karyawan-magang.export', [
            'users' => user::all()->where('role_id', 3),
        ]);
    }
}
