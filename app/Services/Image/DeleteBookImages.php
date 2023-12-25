<?php

namespace App\Services\Image;

use App\Models\Book;
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
            'book_id'  => 'exists:books,id',
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data)
    {
        $this->validate($data);

        $image = Image::where('imageable_id', $data['book_id'])->findOrFail($data['id']);
        $image->delete();

        Storage::disk('public')->delete('images/'. $image['filename']);

        return true;
    }
}
