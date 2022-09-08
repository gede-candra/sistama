<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KaryawanRequest extends FormRequest
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
        return [
            'password' => $this->id_user ? '' : ['required'],
            'name'     => 'required',
            'email'    => $this->id_user ? ['required', 'email:dns', Rule::unique('users', "email")->ignore($this->id_user)] : ['required', 'email:dns', 'unique:users,email'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Lengkap tidak boleh kosong.',
            'email.required' => 'Email tidak boleh kosong.',
            'email.unique' => 'Email ini sudah terdaftar.',
            'email.email' => 'Email tidak valid.',
            'password.required' => 'Password tidak boleh kosong.',
        ];
    }
}
