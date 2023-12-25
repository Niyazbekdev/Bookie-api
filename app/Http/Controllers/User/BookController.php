<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\BookResource;
use App\Http\Resources\User\ShowBookResource;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BookController extends Controller
{
    public function index(Request $request, Category $category): AnonymousResourceCollection
    {
        $book = $category->books()->when($request->search ?? null, function ($query, $search){
            $query->search($search);
        })->paginate($request->limit ?? 10);

        return BookResource::collection($book);
    }

    public function show(string $book): ShowBookResource
    {
        $booki = Book::findBySlug($book);
        return new ShowBookResource($booki);
    }
}
