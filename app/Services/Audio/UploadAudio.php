<?php

namespace App\Services\Audio;

use App\Models\Book;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class UploadAudio extends BaseService
{
    public function rules(): array
    {
        return [
            'title' => 'required',
            'filename' => 'required|mimes:mp3'
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(Request $data, Book $book): Model
    {
        $this->validate($data->all());

        $name = $data->file('filename')->hashName();
        $slug = Str::slug($data['title']);

        $data->file('filename')->store('/public/audio');

        return $book->audio()->create([
            'title' => $data['title'],
            'filename' => $name,
            'slug' => $slug,
        ]);
    }
}
