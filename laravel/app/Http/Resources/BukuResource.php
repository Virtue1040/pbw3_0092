<?php

namespace App\Http\Resources;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Buku */
class BukuResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'judul' => $this->judul,
            'penulis' => $this->penulis,
            'kategori' => $this->kategori,
            'sampul' => $this->sampul,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
