<?php

namespace App\Services\Audio;

use App\Models\Book;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class UploadAudio extends BaseService
{
    public function rules(): array
    {
        return [
            'title' => 'required',
            'filename' => 'required|file|mimes:mpeg,mpga,mp3,wav|max:34048'
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data, Book $book): Model
    {
        $this->validate($data);

        $name = $data['filename']->hashName();
        $slug = Str::slug($data['title']);

        $data['filename']->store('audio', 'public');

        return $book->audio()->create([
            'title' => $data['title'],
            'filename' => $name,
            'slug' => $slug,
        ]);
    }
}
