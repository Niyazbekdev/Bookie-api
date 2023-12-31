<?php

namespace App\Services\Auth;

use App\Models\Role;
use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Register extends BaseService
{
    public function rules(): array
    {
        return [
            'name'=> 'required',
            'phone' => 'required',
            'password' => 'required',
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data): array
    {
        $this->validate($data);

        $userphone = User::where('phone', $data['phone'])->first();
        if( ! $userphone){
            $user = User::create([
                'role_id' => 3,
                'name' => $data['name'],
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
            ]);
        }else{
            throw ValidationException::withMessages([
                'phone' => 'The user has already registered'
            ]);
        }

        $role_id = Role::where('id', 3)->first();
        $role = $role_id['name'];

        $token = $user->createToken('user model', [$role])->plainTextToken;

        return [$user, $role, $token];
    }
}
