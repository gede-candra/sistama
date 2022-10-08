<?php

namespace App\Http\Controllers;

use App\Models\PicketSchedule;
use App\Models\User;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use function PHPUnit\Framework\isNull;

class PicketScheduleController extends Controller
{
    public function index()
    {
        $data = [
            'title_page' => 'Jadwal Piket Karyawan Magang',
            'users' => User::where('role_id', 3)->get(),
        ];

        return view('program.picket-schedule.index', $data);
    }

    public function datatables(Request $request)
    {
        if ($request->ajax()) {
            
            $data = PicketSchedule::all();
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->editColumn('senin', function($data){
                            $senin = json_decode($data->senin);
                            if ($senin) {
                                $html = '';
                                foreach ($senin as $item) {
                                    $html .= '<p class="border-bottom">'.$item.'</p>';
                                }
                                return $html;
                            }
                        })
                        ->editColumn('selasa', function($data){
                            $selasa = json_decode($data->selasa);
                            if ($selasa) {
                                $html = '';
                                foreach ($selasa as $item) {
                                    $html .= '<p class="border-bottom">'.$item.'</p>';
                                }
                                return $html;
                            }
                        })
                        ->editColumn('rabu', function($data){
                            $rabu = json_decode($data->rabu);
                            if ($rabu) {
                                $html = '';
                                foreach ($rabu as $item) {
                                    $html .= '<p class="border-bottom">'.$item.'</p>';
                                }
                                return $html;
                            }
                        })
                        ->editColumn('kamis', function($data){
                            $kamis = json_decode($data->kamis);
                            if ($kamis) {
                                $html = '';
                                foreach ($kamis as $item) {
                                    $html .= '<p class="border-bottom">'.$item.'</p>';
                                }
                                return $html;
                            }
                        })
                        ->editColumn('jumat', function($data){
                            $jumat = json_decode($data->jumat);
                            if ($jumat) {
                                $html = '';
                                foreach ($jumat as $item) {
                                    $html .= '<p class="border-bottom">'.$item.'</p>';
                                }
                                return $html;
                            }
                        })
                        ->rawColumns(['senin','selasa','rabu','kamis','jumat'])
                        ->make(true);
        }

        return abort(404);
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $users          = User::where('role_id', 3)->where('name', 'LIKE', '%'.$request->search.'%')->get();
            $picketSchedule = PicketSchedule::find(1);

            return response()->json([
                'users'             => $users,
                'picket_schedule'   => json_decode($picketSchedule),
            ]);
        }
        return abort(404);
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            if ($request->id_picket == null) {
                $picketSchedule = new PicketSchedule;
                $picketSchedule->id     = 1;
                $picketSchedule->senin  = json_encode($request->senin);
                $picketSchedule->selasa = json_encode($request->selasa);
                $picketSchedule->rabu   = json_encode($request->rabu);
                $picketSchedule->kamis  = json_encode($request->kamis);
                $picketSchedule->jumat  = json_encode($request->jumat);
    
                return $picketSchedule->save();
            } else{
                $picketSchedule = PicketSchedule::findOrFail(1);
                $picketSchedule->senin  = json_encode($request->senin);
                $picketSchedule->selasa = json_encode($request->selasa);
                $picketSchedule->rabu   = json_encode($request->rabu);
                $picketSchedule->kamis  = json_encode($request->kamis);
                $picketSchedule->jumat  = json_encode($request->jumat);
    
                return $picketSchedule->save();
            }
        }

        return abort(404);
    }
}
