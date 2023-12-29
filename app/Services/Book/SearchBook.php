<?php

namespace App\Services\Book;

use App\Models\Book;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class SearchBook extends BaseService
{
    public function rules(): array
    {
        return [
            'search' => 'nullable'
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data)
    {
        $this->validate($data);

        return Book::when($data['search'] ?? null, function ($query, $search) {
            $query->search($search);
        })->paginate(10);
    }
}
