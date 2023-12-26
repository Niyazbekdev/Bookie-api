<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\Register;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    use JsonRespondController;

    public function store(Request $request): JsonResponse
    {
        try {
           [$user, $token] = app(Register::class)->execute($request->all());

           return response()->json([
               'Success' => true,
               'data' => [
                   'name' => $user->name,
                   'token' => $token,
               ]
           ]);
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
