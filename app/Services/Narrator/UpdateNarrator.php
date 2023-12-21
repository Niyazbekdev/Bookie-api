<?php

namespace App\Services\Narrator;

use App\Models\Narrator;
use App\Services\BaseService;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class UpdateNarrator extends BaseService
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:narrators,id',
            'name' => 'required',
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);

        $narrator = Narrator::findOrFail($data['id']);

        $slug = Str::slug($data['name']);

        $narrator->update([
            'name' => $data['name'],
            'slug' => $slug,
        ]);

        return true;
    }
}
