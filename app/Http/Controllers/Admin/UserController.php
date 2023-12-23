<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\UserResource;
use App\Models\User;
use App\Services\User\DeleteUser;
use App\Services\User\UpdateUserRole;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    use JsonRespondController;

    public function index(Request $request): AnonymousResourceCollection
    {
        $user = User::paginate($request->limit ?? 10);

        return UserResource::collection($user);
    }

    public function update(Request $request, string $user): JsonResponse
    {
        try {
            app(UpdateUserRole::class)->execute([
                'id' => $user,
                'role_id' => $request->role_id,
            ]);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return  $this->respondValidatorFailed($exception->validator);
        }
    }

    public function destroy(string $user): JsonResponse
    {
        try {
            app(DeleteUser::class)->execute([
                'id' => $user,
            ]);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
