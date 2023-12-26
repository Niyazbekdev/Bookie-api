<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'payment' => new PaymentResource($this->payment),
            'user' =>  new UserReviewResource($this->user),
            'amount' => $this->amount,
            'is_paid' => $this->is_paid,
            'url' => $this->url,
            //'books' => BookResource::collection($this->books),
        ];
    }
}
