<?php

namespace App\Services\Review;

use App\Models\Review;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class DeleteReview extends BaseService
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:reviews,id',
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);

        $review = Review::findOrFail($data['id']);
        $review->delete();

        return true;
    }
}
