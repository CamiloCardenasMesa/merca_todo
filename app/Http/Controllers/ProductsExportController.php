<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Jobs\SendEmailJob;

class ProductsExportController extends Controller
{
    public function export()
    {
        $user = auth()->user();
        $filePath = asset('storage/products.xlsx');

        (new ProductsExport())->store('products.xlsx', 'public')->chain([
            new SendEmailJob($user, $filePath),
        ]);

        return redirect()->back()->with('status', trans('products.verify_download'));
    }
}
