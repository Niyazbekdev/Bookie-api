<?php

namespace App\Services\Book;

use App\Models\Book;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class DeleteBook extends BaseService
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:books,id',
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);

        $book = Book::findOrFail($data['id']);
        $book->delete();

        return true;
    }
}
