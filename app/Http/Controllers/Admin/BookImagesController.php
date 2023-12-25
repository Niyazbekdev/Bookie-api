<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ImageResource;
use App\Models\Book;
use App\Services\Image\DeleteBookImages;
use App\Services\Image\UploadBookImages;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BookImagesController extends Controller
{
    use JsonRespondController;

    public function store(Request $request, Book $book): ImageResource|JsonResponse
    {
        try {
            $image = app(UploadBookImages::class)->execute($request->all(), $book);
            return response()->json([
                'Success' => true,
                'data' => new ImageResource($image),
            ]);
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function destroy(string $book, string $image): JsonResponse
    {
        try{
            app(DeleteBookImages::class)->execute([
                'id' =>$image,
                'book_id' => $book,
            ]);
            return $this->respondSuccess();
        }catch (ValidationException $exception){
            return  $this->respondValidatorFailed($exception->validator);
        }
    }

}
