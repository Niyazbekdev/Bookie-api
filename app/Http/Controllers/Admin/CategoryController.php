<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CategoryResource;
use App\Models\Category;
use App\Services\Category\DeleteCategory;
use App\Services\Category\StoreCategory;
use App\Services\Category\UpdateCategory;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    use JsonRespondController;
    public function index(Request $request): AnonymousResourceCollection
    {
        $category = Category::when($request->search ?? null, function ($query, $search){
            $query->search($search);
        })->paginate(10);
        return CategoryResource::collection($category);
    }

    public function store(Request $request): JsonResponse
    {
        try {
            app(StoreCategory::class)->execute($request->all());
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function update(Request $request, string $category): JsonResponse
    {
        try {
            app(UpdateCategory::class)->execute([
                'id' => $category,
                'name' => $request->name,
            ]);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function destroy(string $category): JsonResponse
    {
        try {
            app(DeleteCategory::class)->execute([
                'id' => $category,
            ]);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
