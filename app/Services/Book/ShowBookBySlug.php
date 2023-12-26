<?php

namespace App\Services\Book;

use App\Models\Book;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class ShowBookBySlug extends BaseService
{
    public function rules(): array
    {
        return [
            'slug' => 'required|exists:books,slug'
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data)
    {
        $this->validate($data);

        return Book::findBySlug($data['slug']);
    }
}
