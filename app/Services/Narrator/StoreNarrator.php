<?php

namespace App\Services\Narrator;

use App\Models\Narrator;
use App\Services\BaseService;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class StoreNarrator extends BaseService
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

        Narrator::create([
            'name' => $data['name'],
            'slug' => $slug,
        ]);

        return true;
    }
}
