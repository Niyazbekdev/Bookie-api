<?php

namespace App\Services\Cart;

use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class CartStore extends BaseService
{
    public function rules(): array
    {
        return [
            ''
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);

        return true;
    }
}
