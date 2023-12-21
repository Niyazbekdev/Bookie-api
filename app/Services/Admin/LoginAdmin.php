<?php

namespace App\Services\Admin;

use App\Models\Role;
use App\Models\User;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginAdmin extends BaseService
{
    public function rules(): array
    {
        return [
            'phone' => 'required',
            'password' => 'required',
        ];
    }

    /**
     * @throws ValidationException
     * @throws Exception
     */
    public function execute(array $data): array
    {
        $this->validate($data);
        $user = User::where('phone', $data['phone'])->first();

        if(!$user or !Hash::check($data['password'], $user->password)){
            throw ValidationException::withMessages([
                'phone' => 'user not found or password in correct'
            ]);
        }

        $role_id = Role::where('id', $user->role_id)->first();
        $role = $role_id['name'];

        $token = $user->createToken('user model', [$role])->plainTextToken;

        return [$user, $role, $token];
    }
}
