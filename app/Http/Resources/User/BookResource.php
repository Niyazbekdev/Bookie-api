<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Admin\ImageResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title'  => $this->title,
            'slug' => $this->slug,
            'count' => $this->count,
            'price' => $this->price,
            'images' =>  ImageResource::collection($this->images),
            'created_at' => $this->created_at?->format('Y-m-d H:i:s')
        ];
    }
}
