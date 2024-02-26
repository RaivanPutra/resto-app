<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PelangganRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required',
            'email' => 'required',
            'no_tlp' => 'required',
            'alamat' => 'required'
        ];
    }

    public function massages()
    {
        return [
            'nama.required' => 'Nama pelanggan harus diisi.',
            'email.required' => 'Email harus diisi.',
            'no_tlp.required' => 'No telepon harus diisi.',
            'alamat.required' => 'Alamat harus diisi.',
        ];
    }
}
