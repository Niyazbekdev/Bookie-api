<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\CardResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CardController extends Controller
{
    public function index(User $user): AnonymousResourceCollection
    {
        $card = $user->books()->where('is_access', false)->first();
        return CardResource::collection($card);
    }

    public function store(Request $request)
    {

    }
}
