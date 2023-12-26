<?php

namespace App\Services\Order;

use App\Models\Book;
use App\Models\Order;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class StoreOrder extends BaseService
{
    public function rules(): array
    {
        return [
            'payment_id' => 'required|exists:payments,id',
            'books' => 'array',
            'books.*' => 'required|exists:books,id'
        ];
    }
    /**
     * @throws ValidationException
     */
    public function execute(array $data): Order
    {
        $this->validate($data);

        $amount = 0;

        foreach ($data['books'] as $item){
            $key = Book::findOrFail($item);
            $amount += $key['price'];
        }

        return Order::create([
            'payment_id' => $data['payment_id'],
            'user_id' => auth()->id(),
            'amount' => $amount,
            'is_paid' => false,
        ]);
    }
}
