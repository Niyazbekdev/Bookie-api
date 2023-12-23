<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'language' => $this->language,
            'category' => new CategoryResource($this->category),
            'narrator' => new NarratorResource($this->narrator),
            'author' => new  AuthorResource($this->author),
        ];
    }
}
