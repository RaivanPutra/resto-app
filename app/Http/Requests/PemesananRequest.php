<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PemesananRequest extends FormRequest
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
            'tanggal_pemesanan' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'nama_pelanggan' => 'required',
            'jumlah_pelanggan' => 'required',
           
        ];
    }

    public function massages()
    {
        return [
            'tanggal_pemesanan.required' => 'Tanggal pemesanan harus diisi.',
            'jam_mulai.required' => 'Jam mulai harus diisi.',
            'jam_selesai.required' => 'Jam selesai harus diisi.',
            'nama_pelanggan.required' => 'Nama pelanggan harus diisi.',
            'jumlah_pelanggan.required' => 'Jumlah pelanggan harus diisi.',
        ];
    }
}
