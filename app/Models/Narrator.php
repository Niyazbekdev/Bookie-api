<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Narrator extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    public function scopeSearch(Builder $builder, $search)
    {
        $builder->where('name', 'like', "%{$search}%");
    }
}
