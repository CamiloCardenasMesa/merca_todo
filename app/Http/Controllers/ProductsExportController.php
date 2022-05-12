<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use Maatwebsite\Excel\Excel;

class ProductsExportController extends Controller
{
    public function export(Excel $excel)
    {
        return $excel->download(new ProductsExport(), 'products.xlsx');
    }
}
