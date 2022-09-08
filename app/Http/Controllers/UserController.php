<?php

namespace App\Http\Controllers;

use App\Http\Requests\KaryawanRequest;
use App\Models\Absensi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $usermodel = User::all()->where('posisi', 'Karyawan');
        return view('Harmoni_Absensi.program.hrd.data_karyawan.index',[
            "title_page" => "Data Karyawan",
            'users' => $usermodel,
        ]);
    }
    public function datatables()
    {
        $data = User::where('posisi', 'Karyawan');
        return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn("opsi", function($data){
                            return "<button onclick='info(".$data->id.")' data-id=".$data->id." class='btn btn-info info'><i class='fa-solid fa-circle-info'></i></button><button onclick='edit(".$data->id.")' data-id=".$data->id." class='ml-2 btn btn-warning edit'><i class='fa-solid fa-pen-to-square'></i></button><button type='submit' onclick='destroy(".$data->id.")' data-id=".$data->id." class='ml-2 btn btn-danger delete'><i class='fa-solid fa-trash-can'></i></button>";
                        })
                        ->rawColumns(["opsi"])
                        ->make(true);
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
        $validasi["posisi"] = "Karyawan";
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
    public function edit($id)
    {
        $datauser = User::all()->find($id);
        $dataabsensi = Absensi::all()->where('user_id', $id)->count();
        return response()->json([
            'datauser' => $datauser,
            'dataabsensi' => $dataabsensi,
        ]);
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
}
