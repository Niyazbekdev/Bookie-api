<?php

namespace App\Services\Review;

use App\Models\Book;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class StoreReview extends BaseService
{
    public function rules(): array
    {
        return [
            'text' => 'required',
            'rating' => 'required',
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data, Book $book): bool
    {
        $this->validate($data);

        $book->reviews()->create([
            'user_id' => auth()->id(),
            'text' => $data['text'],
            'rating' => $data['rating'],
        ]);
        return true;
    }
}
