<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $userAuth = Auth::user();

        $data["title_page"] ="Profil User";
        $data["userAuth"] =$userAuth;

        
        return view('Harmoni_Absensi/program/UserProfil', $data);
    }

    public function update(ProfilUserRequest $profilUserRequest)
    {
        $validateData = $profilUserRequest->only(["name", "email"]);
        
        User::where('id', $profilUserRequest->id_user)->update($validateData);
        $user = User::find(Auth::user()->id);

        return response()->json([
            "response" => "Profil berhasil diubah",
            "namaUser" => $user->name,
        ]);
    }
}
