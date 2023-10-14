<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use App\Jobs\SendEmailJob;
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
        $file = $request->file('import_file');

        Excel::import(new ProductsImport(), $file);

        SendEmailJob::dispatch('GeneralManager@gmail.com', 'import success');

        return back()->with('status', 'Excel File Import Succesfully');
    }
}
