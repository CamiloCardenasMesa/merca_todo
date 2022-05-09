<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class StoreOrUpdateProductContract
{
    abstract public static function execute(Request $request, ?Model $model = null): Model;
}
