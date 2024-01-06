<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Admin\AudioResource;
use App\Http\Resources\Admin\AuthorResource;
use App\Http\Resources\Admin\ImageResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowBookResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => new AuthorResource($this->author),
            'description' => $this->description,
            'price' => $this->price,
            'category' => new CategoryResource($this->category),
            'images' => ImageResource::collection($this->images),
            'audio' => AudioResource::collection($this->audio),
            'created_at' => $this->created_at?->format('Y-m-d H:i:s')
        ];
    }
}
