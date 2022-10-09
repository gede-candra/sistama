<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Http\Requests\KaryawanRequest;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usermodel = User::all()->where('role_id', 3);
        return view('program.data-karyawan-magang.index',[
            "title_page" => "Data Karyawan Magang",
            'users' => $usermodel,
        ]);
    }
    public function datatables(Request $request)
    {
        if ($request->ajax()) {
            
            $data = User::where('role_id', 3);
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn("opsi", function($data){
                            return "<div class='d-flex'>
                                        <button type='button' onclick='info(".$data->id.")' class='btn rounded-circle btn-outline-info info'><i class='fa-solid fa-circle-info'></i></button>
                                        <button type='button' onclick='edit(".$data->id.")' class='ml-2 btn rounded-circle btn-outline-warning edit'><i class='fa-solid fa-pen-to-square'></i></button>
                                        <button type='button' onclick='destroy(".$data->id.")' class='ml-2 btn rounded-circle btn-outline-danger delete'><i class='fa-solid fa-trash-can'></i></button>
                                    </div>";
                        })
                        ->rawColumns(["opsi"])
                        ->make(true);
        }

        return abort(404);
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
    public function store(KaryawanRequest $request)
    {
        $validasi = $request->only(["name", "email", "password"]);
        $validasi["role_id"] = 3;
        $validasi["password"] = Hash::make($validasi['password']);
        
        User::create($validasi);

        return response()->json([
            "response" => "Data telah berhasil ditambahkan",
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        if ($request->ajax()) {
            $datauser       = User::findOrFail($id);
            $dataabsensi    = Attendance::where('user_id', $id)->count();
            return response()->json([
                'datauser'      => $datauser,
                'dataabsensi'   => $dataabsensi,
            ]);
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KaryawanRequest $request)
    {
        $validateData = $request->only(["name", "email", "password"]);
        if(empty($validateData["password"])) {
            unset($validateData['password']);
        }else{
            $validateData["password"] = Hash::make($validateData['password']);
        }
        
        User::where('id', $request->id_user)->update($validateData);

        return response()->json([
            "response" => "Data telah berhasil diubah",
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
        User::destroy($id);
        return response()->json([
            "response" => "Data telah berhasil dihapus",
        ]);
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'Data-Karyawan-Magang-Sistama.xlsx'); 
    }
}