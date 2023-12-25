<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    use JsonRespondController;

    public function store(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return $this->respondSuccess();
    }
}
