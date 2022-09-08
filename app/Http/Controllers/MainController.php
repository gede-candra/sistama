<?php

namespace App\Http\Controllers;

use App\Http\Requests\KaryawanRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function index(){
        return view(".Harmoni_Absensi.layouts.front-main");
    }
    public function register(RegisterRequest $registerRequest)
    {
        $validasi = $registerRequest->only(["name", "email", "password", "posisi"]);
        $validasi["password"] = Hash::make($validasi['password']);
             
        User::create($validasi);

        return response()->json([
            "response" => "Data telah berhasil ditambahkan",
        ]);
    }

    public function login(LoginRequest $loginRequest)
    {
        $validasi = $loginRequest->only(["email", "password"]);

        if (Auth::attempt($validasi)) {
            $user = Auth::user();
            if ($user->posisi == "HRD") {
                return response()->json([
                    "respon" => "HRD"
                ]);
            }elseif($user->posisi == "Karyawan"){
                return response()->json([
                    "respon" => "Karyawan"
                ]);
            }else{
                return response()->json([
                    "respon" => "Tidak Ada Posisi"
                ]);
            }
        } else{
            return response()->json([
                "respon" => "Login Gagal"
            ]);
        }
    }

    public function logout(Request $request) {
        $request->session()->flush();
        Auth::logout();
        return Redirect('/');
    }
}
