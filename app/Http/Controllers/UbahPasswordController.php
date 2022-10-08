<?php

namespace App\Http\Controllers;

use App\Http\Requests\UbahPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UbahPasswordController extends Controller
{
    public function index(){
        $userAuth = Auth::user();
        return view('program.UbahPassword', [
            "title_page" => "Ubah Password",
            "userAuth"   => $userAuth,
        ]);
    }

    public function update(UbahPasswordRequest $ubahPasswordRequest){
        $validateData = $ubahPasswordRequest->only(["pass_lama", "pass_baru", "konfirmasi_pass_baru"]);

        if (!(Hash::check($validateData['pass_lama'], Auth::user()->password))) {
            return response()->json([
                "error_pass_lama" => "Password lama anda tidak sesuai",
            ]);
        }

        if(strcmp($validateData['pass_lama'], $validateData['pass_baru']) == 0){
            return response()->json([
                "error_pass_baru" => "Kata Sandi Baru tidak boleh sama dengan kata sandi lama.",
            ]);
        }

        if($validateData['pass_baru'] != $validateData['konfirmasi_pass_baru']){
            return response()->json([
                "error_konfir_pass" => "Konfirmasi password baru anda tidak sesuai.",
            ]);
        }

        //Change Password
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($validateData['konfirmasi_pass_baru']);
        $user->save();

        return response()->json([
            "response" => "Password berhasil diubah",
        ]);
    }
}
