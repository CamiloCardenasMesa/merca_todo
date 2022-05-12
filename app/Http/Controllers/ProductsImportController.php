<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductsImportController extends Controller
{
    public function showImport()
    {
        return view('import.import');
    }

    public function storeImport(Request $request)
    {
        $file = $request->file('import_file');
        Excel::import(new ProductsImport(), $file);

        return back()->with('status', 'Excel File Import Succesfully');
    }
}
