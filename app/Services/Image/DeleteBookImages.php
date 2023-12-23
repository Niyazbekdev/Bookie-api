<?php

namespace App\Services\Image;

use App\Models\Image;
use App\Services\BaseService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class DeleteBookImages extends BaseService
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:images,id',
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);

        $image = Image::findOrFail($data['id']);
        $image->delete();

        Storage::disk('public')->delete('images/'. $image['filename']);

        return true;
    }
}
