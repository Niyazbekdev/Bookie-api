<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AllBooksResource;
use App\Http\Resources\Admin\BookResource;
use App\Models\Book;
use App\Services\Book\DeleteBook;
use App\Services\Book\ShowBook;
use App\Services\Book\StoreBook;
use App\Services\Book\UpdateBook;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class BookController extends Controller
{
    use JsonRespondController;

    public function index(Request $request): AnonymousResourceCollection
    {
        $book = Book::when($request->search ?? null, function ($query, $search){
            $query->search($search);
        })->paginate($request->limit ?? 10);

        return AllBooksResource::collection($book);
    }

    public function show(string $book): JsonResponse|BookResource
    {
        try {
            $app = app(ShowBook::class)->execute([
                'id' => $book,
            ]);
            return new BookResource($app);
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            app(StoreBook::class)->execute($request->all());
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return  $this->respondValidatorFailed($exception->validator);
        }
    }

    public function update(Request $request, string $book): JsonResponse
    {
        try {
            app(UpdateBook::class)->execute([
                'id' => $book,
                'category_id' => $request->category_id,
                'author_id' => $request->author_id,
                'narrator_id' => $request->narrator_id,
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
            ]);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function destroy(string $book): JsonResponse
    {
        try {
            app(DeleteBook::class)->execute([
                'id' => $book,
            ]);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
