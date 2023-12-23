<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => new UserReviewResource($this->user),
            'text' => $this->text,
            'rating' => $this->rating,
        ];
    }
}
