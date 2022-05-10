<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductsImportController extends Controller
{
    public function import(Request $request): RedirectResponse
    {
        $file = $request->file('import');
        $product = Product::find();

        Excel::import(new ProductsImport($product), $file);

        return response()->redirectToRoute('products.import');
    }
}
