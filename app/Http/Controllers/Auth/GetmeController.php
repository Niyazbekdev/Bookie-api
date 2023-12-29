<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class GetmeController extends Controller
{
    use JsonRespondController;

    public function index(): JsonResponse
    {

        $user = Auth::user();
        return response()->json([
            'id' => $user->id,
            'role_id' => $user->role_id,
            'name' => $user->name,
            'phone' => $user->phone,
        ]);
    }
}
