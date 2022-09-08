<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UbahPasswordRequest extends FormRequest
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
            "pass_lama"             => "required",
            "pass_baru"             => "required",
            "konfirmasi_pass_baru"  => "required",
        ];
    }

    public function messages()
    {
        return [
            "pass_lama.required"            => "Password Lama tidak boleh kosong",
            "pass_baru.required"            => "Password Baru tidak boleh kosong",
            "konfirmasi_pass_baru.required" => "Konfirmasi Password Baru tidak boleh kosong",
        ];
    }
}
