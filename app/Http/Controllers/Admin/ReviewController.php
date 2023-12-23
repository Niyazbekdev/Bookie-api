<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ReviewResource;
use App\Models\Review;
use App\Services\Review\DeleteReview;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class ReviewController extends Controller
{
    use  JsonRespondController;
    public function index(Request $request): AnonymousResourceCollection
    {
        $review = Review::paginate($request->limit ?? 10);
        return ReviewResource::collection($review);
    }

    public function destroy(string $review): JsonResponse
    {
        try {
            app(DeleteReview::class)->execute([
                'id' => $review,
            ]);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
