<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AuthorResource;
use App\Models\Author;
use App\Services\Author\DeleteAuthor;
use App\Services\Author\StoreAuthor;
use App\Services\Author\UpdateAuthor;
use App\Traits\JsonRespondController;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class AuthorController extends Controller
{
    use JsonRespondController;

    public function index(Request $request): AnonymousResourceCollection
    {
        $author = Author::when($request->search?? null, function ($query, $search){
            $query->search($search);
        })->paginate($request->limit ?? 10);

        return AuthorResource::collection($author);
    }

    public function store(Request $request): JsonResponse
    {
        try {
            app(StoreAuthor::class)->execute($request->all());
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function update(Request $request, string $author): JsonResponse
    {
        try {
            app(UpdateAuthor::class)->execute([
                'id' => $author,
                'name' => $request->name,
            ]);

            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function destroy(string $author): JsonResponse
    {
        try {
            app(DeleteAuthor::class)->execute([
                'id' => $author,
            ]);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
