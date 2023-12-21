<?php

namespace App\Services\Author;

use App\Models\Author;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class DeleteAuthor extends BaseService
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:authors,id',
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);

        $author = Author::findOrFail($data['id']);
        $author->delete();

        return true;
    }
}
