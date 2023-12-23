<?php

namespace App\Services\Amdin;

use App\Models\User;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class UpdateUserRole extends BaseService
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);

        $user = User::findOrFail($data['id']);

        $user->update([
            'role_id' => $data['role_id'],
        ]);

        return true;
    }
}
