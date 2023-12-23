<?php

namespace App\Services\Image;

use App\Models\Book;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class UploadBookImages extends BaseService
{
    public function rules(): array
    {
        return [
            'filename' => 'file|mimes:jpg,bmp,png|max:2048'
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data, Book $book): Model
    {
        $this->validate($data);

        $name = $data['filename']->hashName();

        $data['filename']->store('images', 'public');

        return $book->images()->create([
            'filename' => $name
        ]);
    }
}
