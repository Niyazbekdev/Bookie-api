<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['payment_id', 'user_id', 'amount', 'is_paid'];

    protected $casts = [
        'is_paid' => 'boolean',
    ];

    public function url(): Attribute
    {
        return new Attribute(
            get: fn($value, $attributes) => 'payme_url'
        );
    }
    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function books():BelongsToMany
    {
        return $this->belongsToMany(Book::class)->withPivot('book_id');
    }
}
