<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Audio extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function url(): string
    {
        return config('app.url') . '/storage/audios/' . $this->filename;
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
