<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBukuRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'judul' => ['required'],
            'penulis' => ['required'],
            'kategori' => ['required'],
            'sampul' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
