<?php

namespace App\Services\Book;

use App\Models\Book;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class ShowBook extends BaseService
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:books,id'
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data)
    {
        $this->validate($data);

        return Book::findOrFail($data['id']);
    }
}
