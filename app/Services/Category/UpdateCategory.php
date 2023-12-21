<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Services\BaseService;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class UpdateCategory extends BaseService
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:categories,id',
            'name' => 'required',
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);

        $category = Category::findOrFail($data['id']);

        $slug = Str::slug($data['name']);
        $category->update([
            'name' => $data['name'],
            'slug' => $slug,
        ]);

        return true;
    }
}
