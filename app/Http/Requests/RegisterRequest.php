<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'password' => 'required',
            'name'     => 'required',
            'email'    => 'required|unique:users|email:dns',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Nama Lengkap tidak boleh kosong.',
            'email.required'    => 'Email tidak boleh kosong.',
            'email.unique'      => 'Email ini sudah terdaftar.',
            'email.email'       => 'Email tidak valid.',
            'password.required' => 'Password tidak boleh kosong.',
        ];
    }
}
