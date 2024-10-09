<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBukuRequest extends FormRequest
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
