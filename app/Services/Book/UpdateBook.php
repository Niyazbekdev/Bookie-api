<?php

namespace App\Services\Book;

use App\Models\Book;
use App\Services\BaseService;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class UpdateBook extends BaseService
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:books,id',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:authors,id',
            'narrator_id' => 'required|exists:narrators,id',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'language' => 'required',
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);

        $book = Book::findOrFail($data['id']);
        $slug = Str::slug($data['title']);

        $book->update([
            'category_id' => $data['category_id'],
            'author_id' => $data['author_id'],
            'narrator_id' => $data['narrator_id'],
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
            'language' => $data['language'],
            'slug' => $slug,
        ]);

        return true;
    }
}
