<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\BookResource;
use App\Models\Book;
use App\Services\Book\SearchBook;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class SearchBookController extends Controller
{
    use JsonRespondController;

    public function index(Request $request): JsonResponse|AnonymousResourceCollection
    {
        try {
            $book = app(SearchBook::class)->execute($request->all());
            return BookResource::collection($book);
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
