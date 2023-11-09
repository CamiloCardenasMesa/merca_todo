<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Storage::deleteDirectory('public/product_images');
        Storage::makeDirectory('public/product_images');
    }
}
