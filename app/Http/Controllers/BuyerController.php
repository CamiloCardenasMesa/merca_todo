<?php

namespace App\Http\Controllers;

use App\Constants\Permissions;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BuyerController extends Controller
{
    public function index(Request $request): View
    {
        $query = $request->query('query');

        $products = Product::searchByNameOrDescription($query)
            ->where('enable', true)
            ->orderBy('id', 'desc')
            ->paginate(8);

        return view('welcome', compact('products'));
    }

    public function show(Product $product): View|RedirectResponse
    {
        if (!$product->enable) {
            return redirect()->route('welcome')
                ->with('status', trans('products.not_available'));
        }

        return view('buyer.products.show', compact('product'));
    }

    public static function userHasPermission(): bool
    {
        $allowedPermissions = [
            Permissions::USER_LIST,
            Permissions::USER_SHOW,
            Permissions::USER_CREATE,
            Permissions::USER_EDIT,
            Permissions::USER_DELETE,
            Permissions::PRODUCT_LIST,
            Permissions::PRODUCT_SHOW,
            Permissions::PRODUCT_CREATE,
            Permissions::PRODUCT_EDIT,
            Permissions::PRODUCT_DELETE,
            Permissions::ROLE_LIST,
            Permissions::ROLE_SHOW,
            Permissions::ROLE_CREATE,
            Permissions::ROLE_EDIT,
            Permissions::ROLE_DELETE,
            Permissions::ORDER_LIST,
            Permissions::ORDER_SHOW,
        ];

        foreach ($allowedPermissions as $permission) {
            if (auth()->user()->can($permission)) {
                return true;
            }
        }

        return false;
    }
}
