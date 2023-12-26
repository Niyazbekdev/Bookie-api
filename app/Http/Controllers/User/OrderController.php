<?php

namespace App\Http\Controllers\User;

use App\Events\OrderPaid;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\OrderResource;
use App\Models\Book;
use App\Models\Order;
use App\Services\Order\StoreOrder;
use App\Traits\JsonRespondController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    use JsonRespondController;

    public function store(Request $request): OrderResource|JsonResponse
    {
        try {
            $order = app(StoreOrder::class)->execute($request->all());
//            event(new OrderPaid($order));
            return new OrderResource($order);
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }

    public function update()
    {
        
    }
}
