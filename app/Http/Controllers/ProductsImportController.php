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

        if ($file->getClientOriginalExtension() === 'xlsx') {
            Excel::import(new ProductsImport(), $file);
            return redirect()->route('admin.products.index')
                ->with('status', trans('products.import_success'));
        } else {
            return redirect()->back()
                ->with('error', trans('products.upload_fail'));
        }
    }
}
