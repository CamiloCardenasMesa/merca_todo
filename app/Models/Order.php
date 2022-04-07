<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'refence',
        'currency',
        'state',
        'process_url',
        'session_id',
        'total',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function productsOrder(): HasMany
    {
        return $this->hasMany(ProductOrder::class);
    }
}
