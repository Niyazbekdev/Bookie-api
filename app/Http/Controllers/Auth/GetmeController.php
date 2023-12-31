<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class GetmeController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $role_id = Role::where('id', $user->role_id)->first();
        $role = $role_id['name'];

        return response([
            'data' => [
                'id' => $user->id,
                'role' => $role,
                'name' => $user->name,
                'phone' => $user->phone,
            ]
        ]);
    }
}
