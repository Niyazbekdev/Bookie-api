<?php

namespace App\Services\Amdin;

use App\Models\User;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class DeleteUser extends BaseService
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:users,id',
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);

        $user = User::findOrFail($data['id']);
        $user->delete();

        return true;
    }
}
