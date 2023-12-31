<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GetmeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return response([
            'data' => [
                'id' => $user->id,
                'role_id' => $user->role_id,
                'name' => $user->name,
                'phone' => $user->phone,
            ]
        ]);
    }
}
