<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\NarratorResource;
use App\Models\Narrator;
use App\Services\Narrator\DeleteNarrator;
use App\Services\Narrator\StoreNarrator;
use App\Services\Narrator\UpdateNarrator;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class NarratorController extends Controller
{
    use JsonRespondController;

    public function index(Request $request): AnonymousResourceCollection
    {
        $narrator = Narrator::when($request->search ?? null, function ($query, $search){
            $query->search($search);
        })->paginate($request->limit ?? 10);

        return NarratorResource::collection($narrator);
    }

    public function store(Request $request): JsonResponse
    {
        try {
            app(StoreNarrator::class)->execute($request->all());
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function update(Request $request, string $narrator): JsonResponse
    {
        try {
            app(UpdateNarrator::class)->execute([
                'id' => $narrator,
                'name' => $request->name,
            ]);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function destroy(string $narrator): JsonResponse
    {
        try {
            app(DeleteNarrator::class)->execute([
                'id' => $narrator,
            ]);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
