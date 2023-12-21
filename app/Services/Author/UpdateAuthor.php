<?php

namespace App\Services\Author;

use App\Models\Author;
use App\Services\BaseService;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class UpdateAuthor extends BaseService
{
    public function rules(): array
    {
        return [
            'id'=> 'required|exists:authors,id',
            'name' => 'required',
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);

        $author = Author::findOrFail($data['id']);
        $slug = Str::slug($data['name']);

        $author->update([
            'name' => $data['name'],
            'slug' => $slug,
        ]);

        return true;
    }
}
