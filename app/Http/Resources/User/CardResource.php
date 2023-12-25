<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Admin\AuthorResource;
use App\Http\Resources\Admin\ImageResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => new AuthorResource($this->author),
            'price' => $this->price,
            'image' => ImageResource::collection($this->images),
        ];
    }
}
