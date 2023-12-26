<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\LoginAdmin;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use JsonRespondController;

    public function store(Request $request)
    {
        try {
            [$user, $role, $token] = app(LoginAdmin::class)->execute($request->all());

            return response()->json([
                'data' => [
                    'name' => $user->name,
                    'phone' => $user->phone,
                    'role' => $role,
                    'token' => $token,
                ]
            ]);
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
}
