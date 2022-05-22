<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class ProductsExport implements FromQuery, ShouldAutoSize, WithMapping, WithHeadings, WithEvents
{
    use Exportable;

    public function query()
    {
        return Product::query()
            ->where('enable', true)
            ->whereBetween('created_at', ['2022-05-21 02:01:51', '2022-05-22 02:01:51'])
            ->whereYear('created_at', '2022')
            ->whereMonth('created_at', '<=', '05')
            ->where('stock', '>=', '5');
    }

    public function map($product): array
    {
        return [
        $product->id,
        $product->name,
        $product->description,
        $product->price,
        $product->stock,
        $product->category_id,
        $product->enable,
        ];
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'description',
            'price',
            'stock',
            'category_id',
            'enable',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:H1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                ]);
            },
        ];
    }
}
