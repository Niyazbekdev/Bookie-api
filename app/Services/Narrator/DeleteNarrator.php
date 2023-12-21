<?php

namespace App\Services\Narrator;

use App\Models\Narrator;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class DeleteNarrator extends BaseService
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:narrators,id',
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);

        $narrator = Narrator::findOrFail($data['id']);
        $narrator->delete();

        return true;
    }
}
