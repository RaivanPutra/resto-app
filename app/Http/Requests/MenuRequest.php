<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'id_jenis' => 'required',
            'nama_menu' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'deskripsi' => 'required'
        ];
    }

    public function massages()
    {
        return [
            'nema_menu.required' => 'Nama menu harus diisi.',
            'id_jenis.required' => 'Id jenis harus diisi.',
            'harga.required' => 'Harga harus diisi.',
            'deskripsi.required' => 'Deskripsi menu harus diisi.',
        ];
    }
}