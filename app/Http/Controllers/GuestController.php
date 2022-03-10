<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GuestController extends Controller
{
    public function index(Request $request): View
    {
        if ($request->query('query')) {
            $products = Product::where('name', 'like', '%'.$request->query('query').'%')
            ->orwhere('description', 'like', '%'.$request->query('query').'%')
            ->paginate(8);
        } else {
            $products = Product::orderBy('id', 'desc')->paginate(8);
        }

        return view('welcome', compact('products'));
    }
}
