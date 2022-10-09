<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilUserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProfilController extends Controller
{
    public function index()
    {
        $userAuth = Auth::user();

        $data["title_page"] ="Profil User";
        $data["userAuth"] =$userAuth;

        
        return view('program.UserProfil', $data);
    }

    public function update(ProfilUserRequest $profilUserRequest)
    {
        $validateData = $profilUserRequest->only(["name", "email", "picture"]);
        
        if(isset($validateData['picture'])) {
            $image_path = "uploads/images/user-profile/".auth()->user()->picture;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            
            $dateNow = Carbon::now();
            $imageName = "SISTAMA-".Str::random(7)."-".$dateNow->toDateString().".png";
            $validateData['picture']->move(public_path('uploads/images/user-profile'), $imageName);
            $validateData['picture'] = $imageName;
        }

        User::where('id', $profilUserRequest->id_user)->update($validateData);
        $user = User::find(Auth::user()->id);

        return response()->json([
            "response" => "Profil berhasil diubah",
            "namaUser" => $user->name,
            "fotoUser" => $user->picture,
        ]);
    }
}
