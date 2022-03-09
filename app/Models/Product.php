<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product',
        'description',
        'price',
        'stock',
        'enable',
        'image',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }
}
