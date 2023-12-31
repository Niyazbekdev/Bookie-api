<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class GetmeController extends Controller
{
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
