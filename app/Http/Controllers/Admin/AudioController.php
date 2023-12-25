<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AudioResource;
use App\Models\Book;
use App\Services\Audio\DeleteAudio;
use App\Services\Audio\UploadAudio;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AudioController extends Controller
{
    use JsonRespondController;

    public function store(Request $request, Book $book): JsonResponse
    {
        try {
            $audio = app(UploadAudio::class)->execute($request->all(), $book);
            return response()->json([
                'Success' => true,
                'data' => new AudioResource($audio),
            ]);
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function destroy(string $book, string $audio): JsonResponse
    {
        try {
            app(DeleteAudio::class)->execute([
                'id' => $audio,
                'book_id' => $book,
            ]);
            return  $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
