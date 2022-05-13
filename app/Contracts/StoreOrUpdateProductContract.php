<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface StoreOrUpdateProductContract
{
    public static function execute(Request $request, ?Model $model = null): Model;
}
