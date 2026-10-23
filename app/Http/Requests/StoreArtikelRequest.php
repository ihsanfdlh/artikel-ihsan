<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreArtikelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // izinkan semua pengguna yang lolos middleware menjalankan request ini
    }

    public function rules(): array
    {
    return [
        'judul' => 'required|min:5|max:255',
        'isi' => 'required|min:20',
        'status' => 'required|in:draft,terbit',
    ];
    }
}
