<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\BookResource;
use App\Http\Resources\User\ShowBookResource;
use App\Models\Category;
use App\Services\Book\ShowBookBySlug;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class BookController extends Controller
{
    use JsonRespondController;
    public function index(Request $request, Category $category): AnonymousResourceCollection
    {
        $book = $category->books()->when($request->search ?? null, function ($query, $search){
            $query->search($search);
        })->paginate($request->limit ?? 10);

        return BookResource::collection($book);
    }

    public function show(string $book): ShowBookResource|JsonResponse
    {
        try {
            $app = app(ShowBookBySlug::class)->execute([
                'slug' => $book,
            ]);
            return new ShowBookResource($app);
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
