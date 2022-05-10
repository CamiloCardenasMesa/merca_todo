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
            ->where('price', '<', 400000);
    }

    public function map($product): array
    {
        return [
        $product->id,
        $product->name,
        $product->price,
        $product->stock,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Price',
            'Stock',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:D1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                ]);
            },
        ];
    }
}
