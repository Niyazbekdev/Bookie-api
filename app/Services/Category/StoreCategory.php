<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Services\BaseService;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class StoreCategory extends BaseService
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

        Category::create([
            'name' => $data['name'],
            'slug' => $slug,
        ]);

        return true;
    }
}
