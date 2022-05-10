<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, ShouldQueue, WithHeadingRow
{
    protected Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @return Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'product_id' => $this->product->getKey(),
            'name' => Arr::get($row, 'name'),
            'description' => Arr::get($row, 'description'),
            'stock' => Arr::get($row, 'stock'),
        ]);
    }
}
