<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ProfilUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $user = User::find($this->id_user);
        return [
            'name'      => 'required',
            'email'     => $this->email == $user->email ? ['required'] : ['required', 'unique:users,email'],
            'picture'   => ['mimes:png,jpeg,jpg','image'],
        ];
    }

    public function messages()
    {
        return [
            "name.required"     => "Nama Lengkap tidak boleh kosong.",
            "email.required"    => "Email tidak boleh kosong.",
            "email.unique"      => "Email ini sudah digunakan.",
            'picture.image'     => 'Format foto profil bukan berupa gambar',
            'picture.mimes'     => 'Format foto profil hanya boleh .png, .jpeg, dan .jpg',
        ];
    }
}
