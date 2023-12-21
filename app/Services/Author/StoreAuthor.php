<?php

namespace App\Services\Author;

use App\Models\Author;
use App\Services\BaseService;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class StoreAuthor extends BaseService
{
    public function rules(): array
    {
        return [
            'name' => 'required',
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);

        $slug = Str::slug($data['name']);

        Author::create([
            'name' => $data['name'],
            'slug' => $slug,
        ]);

        return true;
    }
}
