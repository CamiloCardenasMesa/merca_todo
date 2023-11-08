<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductsImportController extends Controller
{
    public function import()
    {
        return view('import.import');
    }

    public function storeImport(Request $request)
    {
        $file = $request->file('document');

        Excel::import(new ProductsImport(), $file);

        return back()->with('status', trans('products.import_success'));
    }
}
