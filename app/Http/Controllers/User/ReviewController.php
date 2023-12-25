<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ReviewResource;
use App\Models\Book;
use App\Models\Review;
use App\Services\Review\StoreReview;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class ReviewController extends Controller
{
    use JsonRespondController;

    public function index(Book $book): AnonymousResourceCollection
    {
        $review = $book->reviews()->get();

        return ReviewResource::collection($review);
    }

    public function store(Request $request, Book $book): JsonResponse
    {
        try {
            app(StoreReview::class)->execute($request->all(), $book);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
