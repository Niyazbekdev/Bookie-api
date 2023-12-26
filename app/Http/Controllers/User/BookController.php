<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\BookResource;
use App\Http\Resources\User\ShowBookResource;
use App\Models\Book;
use App\Models\Category;
use App\Traits\JsonRespondController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

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

    public function show(string $book)
    {
        try {
            $booki = Book::where('slug', $book)->first();
            return new ShowBookResource($booki);
        }catch (ModelNotFoundException){
            return $this->respondNotFound();
        }
    }
}
