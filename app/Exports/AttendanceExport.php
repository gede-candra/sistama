<?php

namespace App\Exports;

use App\Models\attendance;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AttendanceExport implements FromView, ShouldAutoSize
{
    /**
     * view
     *
     * @return View
     */
    public function view(): View
    {
        return view('program.data-absensi.export', [
            'attendances' => attendance::all(),
        ]);
    }
}
