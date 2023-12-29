<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ManyShowBookController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $book = Book::orderByDesc('count')->paginate($request->limit ?? 10);
        return BookResource::collection($book);
    }
}
